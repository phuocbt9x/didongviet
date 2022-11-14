<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\CouponRequest;
use App\Models\AdminModel\CouponModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $coupones = CouponModel::all();
            return Datatables::of($coupones)
                ->editColumn('activated', function ($coupon) {
                    if ($coupon->activated == 1) {
                        return "<span class='badge badge-success'>Actived</span>";
                    }
                    return "<span class='badge badge-danger'>Not Actived</span>";
                })
                ->editColumn('type', function ($coupon) {
                    if ($coupon->type == 1) {
                        return "<span class='badge badge-success'>Giảm tiền mặt</span>";
                    }
                    return "<span class='badge badge-danger'>Giảm phần trăm</span>";
                })
                ->editColumn('time_start', function ($coupon) {
                    return date('d/m/Y', strtotime($coupon->time_start));
                })
                ->editColumn('time_end', function ($coupon) {
                    return date('d/m/Y', strtotime($coupon->time_end));
                })
                ->addColumn('action', function ($coupon) {
                    $routeEdit = route('coupon.edit', $coupon->id);
                    $routeDelete = route('coupon.delete', $coupon->id);
                    $deleteAjax = "deleteAjax('$routeDelete')";
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">" . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">" . ' <i class="fas fa-trash"></i>' . '</button>';
                    $element = '<div class="d-flex justify-content-around" >' . $buttonEdit . $buttonDelete . '</div>';
                    return $element;
                })
                ->rawColumns(['type', 'activated', 'time_start', 'time_end', 'action'])
                ->make(true);
        }
        return view('admin.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.action');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $couponModel = new CouponModel();
        if ($couponModel->create($request->validated())) {
            return response()->json([
                'statusCode' => '200'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminModel\CouponModel  $couponModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponModel $couponModel)
    {
        return view('admin.coupon.action', compact('couponModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminModel\CouponModel  $couponModel
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, CouponModel $couponModel)
    {
        if ($couponModel->update($request->validated())) {
            return response()->json([
                'statusCode' => '200',
                'href' => route('coupon.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminModel\CouponModel  $couponModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponModel $couponModel)
    {
        if ($couponModel->delete()) {
            return response()->json(['statusCode' => 200]);
        } else {
            return response()->json(['statusCode' => 400]);
        }
    }
}
