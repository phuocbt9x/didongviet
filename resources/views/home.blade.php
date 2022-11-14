@extends('customer.layout.main')
@section('content')
<!--slider area start-->
<div class="slider_area slider_style home_three_slider owl-carousel">
    @foreach ($banners->where('type', 1)->slice(0, 3) as $slide)
    <div class="single_slider" data-bgimg="{{ asset($slide->image) }}" style="background-size: contain !important">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="slider_content content_one">
                        <h3>{{ $slide->title ?? '' }}</h3>
                        <p>{{ $slide->content ?? '' }}</p>
                        @if (!empty($slide->link))
                        <a href="{{ $slide->link }}">Xem Ngay</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!--slider area end-->

<!--banner area start-->
<div class="banner_section banner_section_three">
    <div class="container-fluid">
        <div class="row ">
            @foreach ($banners->where('type', 0)->slice(0, 3) as $slide)
            <div class="col-lg-4 col-md-6">
                <div class="banner_area">
                    <div class="banner_thumb">
                        <a {{ (!empty($slide->link)) ? "href='$slide->link' " : '' }}>
                            <img src="{{ asset($slide->image) }}" alt="#">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--banner area end-->

<!--product section area start-->
<section class="product_section womens_product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Sản phẩm của chúng tôi</h2>
                    <p>Các sản phẩm thiết kế hiện đại,mới nhất</p>
                </div>
            </div>
        </div>
        <div class="product_area">
            <div class="row">
                <div class="col-12">
                    <div class="product_tab_button">
                        <ul class="nav" role="tablist">
                            @foreach ($categories as $key=>$category)
                            <li>
                                <a class="{{ ($key == 0) ? 'active' : ''}}" data-toggle="tab"
                                    href="#{{ $category->slug }}" role="tab" aria-controls="clothing"
                                    aria-selected="true">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                @foreach ($categories as $key=>$category)
                <div class="row tab-pane fade show {{ ($key == 0) ? 'active' : '' }}" id="{{ $category->slug }}"
                    role="tabpanel">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        @foreach ($productsCategory->where('category_id', $category->id)->slice(0, 4) as $product)
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
                                        height: 42px;" href="{{ route('shop.detail', $product->slug) }}"
                                            title="quick_view">Xem sản
                                            phẩm</a>
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
                @endforeach

            </div>
        </div>

    </div>
</section>
<!--product section area end-->

<!--banner area start-->
<section class="banner_section banner_section_three">
    <div class="container-fluid">
        <div class="row ">
            @foreach ($banners->where('type', 0)->slice(3, 2) as $slide)
            <div class="col-lg-6 col-md-6">
                <div class="banner_area">
                    <div class="banner_thumb">
                        <a {{ (!empty($slide->link)) ? "href='$slide->link' " : '' }}>
                            <img src="{{ asset($slide->image) }}" alt="#">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--banner area end-->

<!--product section area start-->
<section class="product_section womens_product bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Sản phẩm thịnh hành</h2>
                    <p>Sản phẩm ấn tượng và bán chạy nhất</p>
                </div>
            </div>
        </div>
        <div class="product_area">
            <div class="row">
                @if ($products->isNotEmpty())
                <div class="product_carousel product_three_column4 owl-carousel">
                    @foreach ($products as $product)
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
                                    height: 42px;" href="{{ route('shop.detail', $product->slug) }}"
                                        title="quick_view">Xem sản
                                        phẩm</a>
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
                @else
                <div class="d-flex justify-content-center">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <h3 style="color: red; display: block">
                            <i>Không tìm thấy sản phẩm!</i>
                        </h3>
                        <a class="button" href="{{ route('shop.home') }}" style="width: 55%">
                            Xem thêm sản phẩm khác
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
</section>
<!--product section area end-->
@endsection