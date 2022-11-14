<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\BannerRequest;
use App\Models\AdminModel\BannerModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $banners = BannerModel::all();
            return Datatables::of($banners)
                ->editColumn('activated', function ($banner) {
                    if ($banner->activated == 1) {
                        return "<span class='badge badge-success'>Actived</span>";
                    }
                    return "<span class='badge badge-danger'>Not Actived</span>";
                })
                ->editColumn('type', function ($banner) {
                    if ($banner->type == 0) {
                        return "<span class='badge badge-success'>Banner</span>";
                    }
                    return "<span class='badge badge-danger'>Slide</span>";
                })
                ->editColumn('image', function ($banner) {
                    return "<img src=" . asset($banner->image) . " style='width: 350px; height: 100px; object-fit: cover; ' />";
                })
                ->editColumn('time_start', function ($coupon) {
                    return date('d/m/Y', strtotime($coupon->time_start));
                })
                ->editColumn('time_end', function ($coupon) {
                    return date('d/m/Y', strtotime($coupon->time_end));
                })
                ->addColumn('action', function ($banner) {
                    $routeEdit = route('banner.edit', $banner->id);
                    $routeDelete = route('banner.delete', $banner->id);
                    $deleteAjax = "deleteAjax('$routeDelete')";
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">" . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">" . ' <i class="fas fa-trash"></i>' . '</button>';
                    $element = '<div class="d-flex justify-content-around" >' . $buttonEdit . $buttonDelete . '</div>';
                    return $element;
                })
                ->rawColumns(['image', 'type', 'time_start', 'time_end', 'activated', 'action'])
                ->make(true);
        }
        return view('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.action');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->image;
            $nameImage = $image->getClientOriginalName();
            $dirFolder = 'uploads/image/banner/';
            $newimage = $dirFolder . 'banner-' . time() . '-' . $nameImage;
            $requestValidate = $request->validated();
            $requestValidate['image'] = $newimage;
            $bannerModel = new BannerModel();
            if ($bannerModel->create($requestValidate)) {
                $image->move($dirFolder, $newimage);
                return response()->json([
                    'statusCode' => '200'
                ]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminModel\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BannerModel $bannerModel)
    {
        return view('admin.banner.action', compact('bannerModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminModel\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, BannerModel $bannerModel)
    {
        $dataMerge = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->image;
            $nameimage = $image->getClientOriginalName();
            $dirFolder = 'uploads/image/banner/';
            $newimage = $dirFolder . 'banner-' . time() . '-' . $nameimage;
            $dataMerge['image'] = $newimage;
            $image->move($dirFolder, $newimage);
            @unlink($bannerModel->image);
        }
        if ($bannerModel->update($dataMerge)) {
            return response()->json([
                'statusCode' => '200',
                'href' => route('banner.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminModel\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BannerModel $bannerModel)
    {
        //
    }
}
