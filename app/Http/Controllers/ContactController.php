<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use App\Models\ContactModel;
use Illuminate\Http\Request;
use Mail;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contacts = ContactModel::all();
            return Datatables::of($contacts)
                ->editColumn('activated', function ($contact) {
                    if ($contact->activated == 1) {
                        return "<span class='badge badge-success'>Actived</span>";
                    }
                    return "<span class='badge badge-danger'>Not Actived</span>";
                })
                ->addColumn('action', function ($contact) {
                    $routeEdit = route('contact.edit', $contact->id);
                    $routeDelete = route('contact.delete', $contact->id);
                    $deleteAjax = "deleteAjax('$routeDelete')";
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">" . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">" . ' <i class="fas fa-trash"></i>' . '</button>';
                    $element = '<div class="d-flex justify-content-around" >' . $buttonEdit . $buttonDelete . '</div>';
                    return $element;
                })
                ->rawColumns(['activated', 'action'])
                ->make(true);
        }
        return view('admin.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'content' => 'required'
        ], [
            'required' => 'Tr?????ng n??y kh??ng ???????c b??? tr???ng!',
            'email' => 'Tr?????ng n??y ki???u email'
        ]);
        $contactModel = new ContactModel();
        $contactModel->create($request->all());
        return redirect()->back()->withErrors(['message' => 'Ch??ng t??i ???? nh???n ???????c ph???n h???i t??? b???n!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactModel  $contactModel
     * @return \Illuminate\Http\Response
     */
    public function show(ContactModel $contactModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactModel  $contactModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactModel $contactModel)
    {
        return view('admin.contact.update', compact('contactModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactModel  $contactModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactModel $contactModel)
    {
        if ($request->filled('feedback')) {
            $request = $request->merge(['activated' => 1]);
            $data['name'] = $contactModel->name;
            $data['title'] = $contactModel->title;
            $data['content'] = $contactModel->content;
            $data['feedback'] = $request->feedback;
            Mail::to($contactModel->email)->send(new FeedbackMail($data));
        }
        $request = $request->except('feedback');
        if ($contactModel->update($request)) {
            return redirect()->route('contact.index')
                ->withErrors(['message' => 'C???p nh???t th??nh c??ng!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactModel  $contactModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactModel $contactModel)
    {
        //
    }
}
