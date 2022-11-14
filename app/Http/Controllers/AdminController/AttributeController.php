<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\AttributeRequest;
use App\Models\AdminModel\AttributeModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $attributes = AttributeModel::all();
            return Datatables::of($attributes)
                ->editColumn('activated', function ($attribute) {
                    if ($attribute->activated == 1) {
                        return "<span class='badge badge-success'>Actived</span>";
                    }
                    return "<span class='badge badge-danger'>Not Actived</span>";
                })
                ->addColumn('action', function ($attribute) {
                    $routeEdit = route('attribute.edit', $attribute->id);
                    $routeDelete = route('attribute.delete', $attribute->id);
                    $deleteAjax = "deleteAjax('$routeDelete')";
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">" . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">" . ' <i class="fas fa-trash"></i>' . '</button>';
                    $element = '<div class="d-flex justify-content-around" >' . $buttonEdit . $buttonDelete . '</div>';
                    return $element;
                })
                ->rawColumns(['activated', 'action'])
                ->make(true);
        }
        return view('admin.attribute.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute.action');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $attributeModel = new AttributeModel();
        if ($attributeModel->create($request->validated())) {
            return response()->json([
                'statusCode' => '200'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminModel\AttributeModel  $attributeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeModel $attributeModel)
    {
        return view('admin.attribute.action', compact('attributeModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminModel\AttributeModel  $attributeModel
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, AttributeModel $attributeModel)
    {
        if ($attributeModel->update($request->validated())) {
            return response()->json([
                'statusCode' => '200',
                'href' => route('attribute.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminModel\AttributeModel  $attributeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeModel $attributeModel)
    {
        if ($attributeModel->delete()) {
            return response()->json(['statusCode' => 200]);
        } else {
            return response()->json(['statusCode' => 400]);
        }
    }
}
