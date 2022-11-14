<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest\ReviewRequest;
use App\Models\CustomerModel\ReviewModel;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        if (ReviewModel::create($request->validated())) {
            return redirect()->back()->withErrors(['message' => 'Đánh giá của bạn đã được chúng tôi ghi nhận!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerModel\ReviewModel  $reviewModel
     * @return \Illuminate\Http\Response
     */
    public function show(ReviewModel $reviewModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerModel\ReviewModel  $reviewModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ReviewModel $reviewModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerModel\ReviewModel  $reviewModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReviewModel $reviewModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerModel\ReviewModel  $reviewModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReviewModel $reviewModel)
    {
        //
    }
}
