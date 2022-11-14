<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\AttributeValueRequest;
use App\Models\AdminModel\AttributeModel;
use App\Models\AdminModel\AttributeValueModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $values = AttributeValueModel::all();
            return Datatables::of($values)
                ->editColumn('attribute_id', function ($value) {
                    return "<span class='badge badge-info'>" . $value->attribute->name . "</span>";
                })
                ->editColumn('activated', function ($value) {
                    if ($value->activated == 1) {
                        return "<span class='badge badge-success'>Actived</span>";
                    }
                    return "<span class='badge badge-danger'>Not Actived</span>";
                })
                ->addColumn('action', function ($value) {
                    $routeEdit = route('attributeValue.edit', $value->id);
                    $routeDelete = route('attributeValue.delete', $value->id);
                    $deleteAjax = "deleteAjax('$routeDelete')";
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">" . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">" . ' <i class="fas fa-trash"></i>' . '</button>';
                    $element = '<div class="d-flex justify-content-around" >' . $buttonEdit . $buttonDelete . '</div>';
                    return $element;
                })
                ->rawColumns(['attribute_id', 'activated', 'action'])
                ->make(true);
        }
        return view('admin.attributeValue.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = AttributeModel::where('activated', '1')->get();
        return view('admin.attributeValue.action', compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeValueRequest $request)
    {
        $attributeValueModel = new AttributeValueModel();
        if ($attributeValueModel->create($request->validated())) {
            return response()->json([
                'statusCode' => '200'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminModel\AttributeValueModel  $attributeValueModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeValueModel $attributeValueModel)
    {
        $attributes = AttributeModel::where('activated', '1')->get();
        return view('admin.attributeValue.action', compact('attributeValueModel', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminModel\AttributeValueModel  $attributeValueModel
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeValueRequest $request, AttributeValueModel $attributeValueModel)
    {
        if ($attributeValueModel->update($request->validated())) {
            return response()->json([
                'statusCode' => '200',
                'href' => route('attributeValue.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminModel\AttributeValueModel  $attributeValueModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeValueModel $attributeValueModel)
    {
        if ($attributeValueModel->delete()) {
            return response()->json(['statusCode' => 200]);
        } else {
            return response()->json(['statusCode' => 400]);
        }
    }
}
