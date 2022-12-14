@extends('customer.layout.main')
@section('content')
<!--product details start-->
<div class="product_details">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="product-details-tab">
                    <div id="img-1">
                        <img src="{{ asset($productModel->image) }}" data-zoom-image="{{ asset($productModel->image) }}"
                            alt="big-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="product_d_right">
                    <form id="dataFormCart" action="#">
                        @csrf
                        @method('POST')
                        <h1>{{ $productModel->name }}</h1>
                        <input type="hidden" name="product_id" value="{{ $productModel->id }}">
                        <div class=" product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="review ml-2"><span> 1 review </span></li>
                            </ul>
                        </div>
                        <div class="product_price">
                            <div class="product_content">
                                <input type="hidden" name="price" value="{{ $productModel->priceSale() }}">
                                <span class="current_price">{{ number_format($productModel->priceSale()) }}</span>
                                @if ($productModel->discount)
                                <span class="old_price">{{ number_format($productModel->price) }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="product_variant size">
                            <h3 class="mr-5">Stock</h3>
                            @if ($productModel->stock == 0)
                            <strong style="color: red; font-size: large;">H???t h??ng</strong>
                            @else
                            <strong style="color: green; font-size: large;">C??n h??ng</strong>
                            @endif
                        </div>
                        @foreach ($attributes as $attribute)
                        <input type="hidden" name="attribute[]" value="{{ $attribute->id }}">
                        <div class="product_variant color">
                            <h3>{{ $attribute->name }}</h3>
                            <select class="niceselect_option" id="{{ $attribute->id }}" name="{{ $attribute->id }}">
                                @foreach ($productModel->attributeProduct as $productAttribute)
                                @foreach ($attribute->getValue as $item)
                                @if ($productAttribute->attribute_value_id === $item->id)
                                <option value="{{ $item->id }}">{{ $item->value }}</option>
                                @endif
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                        @endforeach
                        <div class="priduct_social">
                            <h3 class="mr-5">Quantity</h3>
                            <input min="1" max="100" value="1" type="number" name="quantity">
                        </div>
                        <div class="product_variant quantity mt-5">
                            <button class="button" type="submit">add to cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="
                                @if(empty($errors->has('message')))
                                    active
                                @endif" id="descriptionZone" data-toggle="tab" href="#info" role="tab"
                                    aria-controls="info" aria-selected="false">More info</a>
                            </li>
                            <li>
                                <a class="@error('message')
                                    active
                                @enderror" data-toggle="tab" id="reviewZone" href="#reviews" role="tab"
                                    aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show @if(empty($errors->has('message')))
                            active
                        @endif" id="info" role="tabpanel">
                            <div class="product_info_content" id="description" style="padding-top: 20px;">
                                {!! $productModel->description !!}
                            </div>
                            <div class="button-view">
                                <a id="btn-block-description" class="button"
                                    style="background: linear-gradient(180deg, rgba(255, 255, 255, 0), #ff6a28);">
                                    Xem th??m
                                </a>
                                <a id="btn-none-description" class="button"
                                    style="background: linear-gradient(180deg, rgba(255, 255, 255, 0), #ff6a28); display:none;">
                                    Thu g???n
                                </a>
                            </div>
                        </div>

                        <div class="tab-pane fade @error('message') active @enderror" id="reviews" role="tabpanel">
                            @if($productModel->review->isNotEmpty())
                            <div class="product_info_content" id="reviewTag">
                                @foreach ($productModel->review as $review)
                                <div class="product_info_inner">
                                    <div class="product_ratting mb-10"
                                        style="width: 15%; display: flex; flex-direction: column; align-items: center;">
                                        <img style="width: 40%; border-radius:50%"
                                            src="{{ asset( ($review->avatar()->avatar) ?? 'uploads/avatar/avatar-defautl.png') }}"
                                            alt="">
                                        <strong>{{ ucfirst($review->name) }}</strong>
                                        <p>{{ date('d/m/Y', strtotime($review->created_at)) }}</p>
                                    </div>
                                    <div class="product_demo">
                                        <div class="product_ratting mb-10"
                                            style="width: 25%; list-style: outside none none;">
                                            <ul style="display: flex;">
                                                @for ($i = 0; $i < $review->star; $i++)
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                    </li>
                                                    @endfor
                                            </ul>
                                        </div>
                                        <p>{{ $review->comment }}</p>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                            <div class="button-view">
                                <a id="btn-block-review" class="button"
                                    style="background: linear-gradient(180deg, rgba(255, 255, 255, 0), #ff6a28);">
                                    Xem th??m
                                </a>
                                <a id="btn-none-review" class="button"
                                    style="background: linear-gradient(180deg, rgba(255, 255, 255, 0), #ff6a28); display:none;">
                                    Thu g???n
                                </a>
                            </div>
                            @endif
                            <div class="product_review_form mt-5">
                                <form action="{{ route('review.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="product_id" value="{{ $productModel->id }}">
                                    <h2>Add a review </h2>
                                    <p>Your email address will not be published. Required fields are marked </p>
                                    @error('message')
                                    <span style="color:#fd06ea">{{ $message }}</span>
                                    @enderror
                                    <div class="feedback">
                                        <span>Your rating</span>
                                        <div class="rating">
                                            <input value="5" type="radio" name="star" id="rating-5">
                                            <label for="rating-5"></label>
                                            <input value="4" type="radio" name="star" id="rating-4">
                                            <label for="rating-4"></label>
                                            <input value="3" type="radio" name="star" id="rating-3">
                                            <label for="rating-3"></label>
                                            <input value="2" type="radio" name="star" id="rating-2">
                                            <label for="rating-2"></label>
                                            <input value="1" type="radio" name="star" id="rating-1">
                                            <label for="rating-1"></label>
                                        </div>
                                        @error('star')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Your review </label>
                                            <textarea style="margin-bottom: 0" name="comment"
                                                id="review_comment"></textarea>
                                            @error('comment')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="author">Name</label>
                                            <input name="name" id="author" type="text">
                                            @error('name')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="email">Email </label>
                                            <input name="email" id="email" type="text">
                                            @error('email')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<!--product section area start-->
<section class="product_section related_product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Related Products</h2>
                    <p>Contemporary, minimal and modern designs embody the Lavish Alice handwriting</p>
                </div>
            </div>
        </div>
        <div class="product_area">
            <div class="row">
                <div class="product_carousel product_three_column4 owl-carousel">
                    @foreach ($productModel->productRelated() as $product)
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="{{ route('shop.detail', $product->slug) }}">
                                    <img src="{{ asset($product->image) }}" alt="">
                                </a>
                                <div class="quick_button">
                                    <a style="background: aqua;
                                border-radius: 25px;
                                display: flex;
                                flex-direction: row;
                                align-items: center;
                                justify-content: space-around;
                                height: 42px;" href="{{ route('shop.detail', $product->slug) }}" title="quick_view">Xem
                                        s???n
                                        ph???m</a>
                                </div>
                                @if (!empty($product->discount))
                                <div class="product_sale">
                                    <span>
                                        - {{ number_format($product->discount->getDiscount->value) }}
                                        @if ($product->discount->getDiscount->type === 0)
                                        %
                                        @endif
                                    </span>
                                </div>
                                @endif
                            </div>
                            <div class="product_content"
                                style=" display: flex; flex-direction: column; align-items: center;">
                                <h3><a href="{{ route('shop.detail', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <div>
                                    <span class="current_price">{{ number_format($product->priceSale(), 0, ',', '.')
                                        }}</span>
                                    @if ($product->discount)
                                    <span class="old_price">{{ number_format($product->price, 0, ',', '.') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
<!--product section area end-->

@endsection
@push('script')
<script>
    $(document).ready(function(){
        $('#descriptionZone').click(function(){
            $('#description').height('350px');
            document.getElementById("btn-none-description").style.display = "none";
            document.getElementById("btn-block-description").style.display = "block";
        })

        $('#reviewZone').click(function(){
            $('#reviewTag').height('140px');
            document.getElementById("btn-none-review").style.display = "none";
            document.getElementById("btn-block-review").style.display = "block";
        })

        $('#btn-block-description').click(function(){
            $('#description').height('auto');
            document.getElementById("btn-block-description").style.display = "none";
            document.getElementById("btn-none-description").style.display = "block";
        })

        $('#btn-none-description').click(function(){
            $('#description').height('300px');
            document.getElementById("btn-none-description").style.display = "none";
            document.getElementById("btn-block-description").style.display = "block";
        })

        $('#btn-block-review').click(function(){
            $('#reviewTag').height('auto');
            document.getElementById("btn-block-review").style.display = "none";
            document.getElementById("btn-none-review").style.display = "block";
        })

        $('#btn-none-review').click(function(){
            $('#reviewTag').height('150px');
            document.getElementById("btn-none-review").style.display = "none";
            document.getElementById("btn-block-review").style.display = "block";
        })
    })
</script>
@endpush