<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\DiscountRequest;
use App\Models\AdminModel\DiscountModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $discounts = DiscountModel::all();
            return Datatables::of($discounts)
                ->editColumn('type', function ($discount) {
                    if ($discount->type == 1) {
                        return "<span class='badge badge-success'>Giảm tiền mặt</span>";
                    }
                    return "<span class='badge badge-danger'>Giảm phần trăm</span>";
                })
                ->editColumn('activated', function ($discount) {
                    if ($discount->activated == 1) {
                        return "<span class='badge badge-success'>Actived</span>";
                    }
                    return "<span class='badge badge-danger'>Not Actived</span>";
                })
                ->addColumn('action', function ($discount) {
                    $routeEdit = route('discount.edit', $discount->id);
                    $routeDelete = route('discount.delete', $discount->id);
                    $deleteAjax = "deleteAjax('$routeDelete')";
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">" . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">" . ' <i class="fas fa-trash"></i>' . '</button>';
                    $element = '<div class="d-flex justify-content-around" >' . $buttonEdit . $buttonDelete . '</div>';
                    return $element;
                })
                ->rawColumns(['type', 'activated', 'action'])
                ->make(true);
        }
        return view('admin.discount.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.action');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountRequest $request)
    {
        $discountModel = new DiscountModel();
        if ($discountModel->create($request->validated())) {
            return response()->json([
                'statusCode' => '200'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminModel\DiscountModel  $discountModel
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscountModel $discountModel)
    {
        return view('admin.discount.action', compact('discountModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminModel\DiscountModel  $discountModel
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountRequest $request, DiscountModel $discountModel)
    {
        if ($discountModel->update($request->validated())) {
            return response()->json([
                'statusCode' => '200',
                'href' => route('discount.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminModel\DiscountModel  $discountModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscountModel $discountModel)
    {
        if ($discountModel->delete()) {
            return response()->json(['statusCode' => 200]);
        } else {
            return response()->json(['statusCode' => 400]);
        }
    }
}
