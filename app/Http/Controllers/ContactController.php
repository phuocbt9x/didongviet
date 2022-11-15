<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            'required' => 'Trường này không được bỏ trống!',
            'email' => 'Trường này kiểu email'
        ]);
        $contactModel = new ContactModel();
        $contactModel->create($request->all());
        return redirect()->back()->withErrors(['message' => 'Chúng tôi đã nhận được phản hồi từ bạn!']);
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
        //
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
        //
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
