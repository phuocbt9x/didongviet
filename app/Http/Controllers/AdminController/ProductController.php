<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\ProductRequest;
use App\Models\AdminModel\AttributeModel;
use App\Models\AdminModel\CategoryModel;
use App\Models\AdminModel\DiscountModel;
use App\Models\AdminModel\ProductAttributeModel;
use App\Models\AdminModel\ProductDiscountModel;
use App\Models\AdminModel\ProductModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = ProductModel::all();
            return Datatables::of($products)
                ->editColumn('category_id', function ($product) {
                    return $product->category->name;
                })
                ->editColumn('image', function ($product) {
                    return "<img src=" . asset($product->image) . " style='width: 100px; height: 100px; object-fit: cover; ' />";
                })
                ->editColumn('type', function ($product) {
                    if ($product->type == 1) {
                        return "<span class='badge badge-success'>Giảm tiền mặt</span>";
                    }
                    return "<span class='badge badge-danger'>Giảm phần trăm</span>";
                })
                ->editColumn('activated', function ($product) {
                    if ($product->activated == 1) {
                        return "<span class='badge badge-success'>Actived</span>";
                    }
                    return "<span class='badge badge-danger'>Not Actived</span>";
                })
                ->addColumn('action', function ($product) {
                    $routeDetail = route('product.show', $product->slug);
                    $routeEdit = route('product.edit', $product->slug);
                    $routeDelete = route('product.delete', $product->slug);
                    $deleteAjax = "deleteAjax('$routeDelete')";
                    $buttonDetail = '<button class="btn btn-sm btn-warning" onclick="window.location.href=\'' . "$routeDetail'\">"
                        . '<i class="fas fa-eye"></i>' . '</button>';
                    $buttonEdit = '<button class="btn btn-sm btn-success" onclick="window.location.href=\'' . "$routeEdit'\">" . '<i class="fas fa-pen-alt"></i>' . '</button>';
                    $buttonDelete = '<button class="btn btn-sm btn-danger btn-delete" onclick="' . "$deleteAjax\">" . ' <i class="fas fa-trash"></i>' . '</button>';
                    $element = '<div class="d-flex justify-content-around" >' . $buttonDetail . $buttonEdit . $buttonDelete . '</div>';
                    return $element;
                })
                ->rawColumns(['image', 'category_id', 'type', 'activated', 'action'])
                ->make(true);
        }
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryModel::where('activated', 1)->get();
        $attributes = AttributeModel::where('activated', 1)->get();
        $discounts = DiscountModel::where('activated', 1)->get();
        return view('admin.product.action', compact('categories', 'attributes', 'discounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->image;
            $nameImage = $image->getClientOriginalName();
            $dirFolder = 'uploads/image/product/';
            $newimage = $dirFolder . 'product-' . time() . '-' . $nameImage;
            $requestValidate = $request->validated();
            $dataMerge = $requestValidate->only(['name', 'slug', 'category_id', 'image', 'stock', 'price', 'description', 'activated']);
            $dataMerge['image'] = $newimage;
            $productModel = new ProductModel();
            $product = $productModel->create($dataMerge);
            if ($product) {
                $image->move($dirFolder, $newimage);
                if ($requestValidate->filled('discount')) {
                    $discountProduct = new ProductDiscountModel();
                    $dataDiscount = [
                        'product_id' => $product->id,
                        'discount_id' => $requestValidate->discount,
                        'activated' => 1
                    ];
                    $discountProduct->create($dataDiscount);
                }

                $attributes = $requestValidate->attribute;

                if ($attributes) {
                    foreach ($attributes as $attribute) {
                        $attribute_values = $requestValidate->$attribute;
                        foreach ($attribute_values as $attribute_value) {
                            $dataAttribute = [
                                'product_id' => $product->id,
                                'attribute_value_id' => $attribute_value
                            ];
                            $productAttribute = new ProductAttributeModel();
                            $productAttribute->create($dataAttribute);
                        }
                    }
                }
                return response()->json([
                    'statusCode' => '200'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminModel\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductModel $productModel)
    {
        $arrtribute = $productModel->attributeProducts->pluck('attribute_id');
        $attributes = AttributeModel::whereIn('id', $arrtribute)->get();
        return view('admin.product.detail', compact('productModel', 'attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminModel\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductModel $productModel)
    {
        $categories = CategoryModel::where('activated', 1)->get();
        $attributes = AttributeModel::where('activated', 1)->get();
        $discounts = DiscountModel::where('activated', 1)->get();
        return view('admin.product.action', compact('productModel', 'categories', 'attributes', 'discounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminModel\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, ProductModel $productModel)
    {
        $requestValidate = $request->validated();
        $dataMerge = $requestValidate->only(['name', 'slug', 'category_id', 'image', 'stock', 'price', 'description', 'activated']);
        if ($request->hasFile('image')) {
            $image = $request->image;
            $nameImage = $image->getClientOriginalName();
            $dirFolder = 'uploads/image/product/';
            $newimage = $dirFolder . 'product-' . time() . '-' . $nameImage;
            $dataMerge['image'] = $newimage;
            @unlink($productModel->image);
            $image->move($dirFolder, $newimage);
        }
        if ($requestValidate->filled('discount')) {
            $discountProduct = ProductDiscountModel::where('product_id', $productModel->id)->first();
            if ($discountProduct) {
                ProductDiscountModel::destroy($discountProduct->id);
            }
            $discountProduct = new ProductDiscountModel();
            $dataDiscount = [
                'product_id' => $productModel->id,
                'discount_id' => $requestValidate->discount,
                'activated' => 1
            ];
            $discountProduct->create($dataDiscount);
        } else {
            $discountProduct = ProductDiscountModel::where('product_id', $productModel->id)->first();
            if ($discountProduct) {
                ProductDiscountModel::destroy($discountProduct->id);
            }
        }
        $attributes = $requestValidate->attribute;
        if ($attributes) {
            ProductAttributeModel::where('product_id', $productModel->id)->delete();
            foreach ($attributes as $attribute) {
                $attribute_values = $requestValidate->$attribute;
                foreach ($attribute_values as $attribute_value) {
                    $dataAttribute = [
                        'product_id' => $productModel->id,
                        'attribute_value_id' => $attribute_value
                    ];
                    $productAttribute = new ProductAttributeModel();
                    $productAttribute->create($dataAttribute);
                }
            }
        }
        if ($productModel->update($dataMerge)) {
            return response()->json([
                'statusCode' => '200',
                'href' => route('product.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminModel\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductModel $productModel)
    {
        if ($productModel->delete()) {
            @unlink($productModel->image);
            return response()->json(['statusCode' => 200]);
        } else {
            return response()->json(['statusCode' => 400]);
        }
    }
}
