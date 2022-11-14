@extends('customer.layout.main')
@section('content')
<!--shop  area start-->
<div class="shop_area shop_reverse">
    <div class="container">
        <div class="shop_inner_area">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <div class="sidebar_widget">
                        <div class="widget_list widget_filter">
                            <h2>Filter by price</h2>
                            <form action="{{ Request::fullUrl() }}" method="POST">
                                @method('GET')
                                <div id="slider-range"></div>
                                <button type="submit">Filter</button>
                                <input type="text" name="price" id="amount" />
                            </form>
                        </div>
                        <div class="widget_list widget_categories">
                            <h2>Category</h2>
                            <ul>
                                <li>
                                    <a href="{{ route('shop.shop') }}" style="{{ (request()->category) ? '' : " color:
                                        #ff6a28" }}">
                                        ALL PRODUCT
                                        <span style="{{ (request()->category) ? '' : " background: #ff6a28; color:
                                            #fff;" }}">
                                            {{ $countProducts; }}
                                        </span>
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('shop.shop') . '/?category=' . $category->slug  }} "
                                        style="{{ (request()->category == $category->slug) ? ' color: #ff6a28' : " " }}">
                                        {{ ucfirst($category->name) }}
                                        <span style="{{ (request()->category == $category->slug) ? 'background: #ff6a28; color:
                                            #fff;' : "" }}">
                                            {{ $category->productCategory->count(); }}
                                        </span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_title">
                        <h1>shop</h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div class=" niceselect_option">
                            <form class="select_option" action="#">
                                <select name="orderby" id="short">
                                    <option selected value="1">Sort by average rating</option>
                                    <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form>
                        </div>
                        <div class="page_amount">
                            <p>Showing 1–9 of {{ (request()->category) ? $products->count() : $countProducts }} results
                            </p>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    @if ($products->isNotEmpty())

                    <div class="row shop_wrapper">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('shop.detail', $product->slug) }}"><img
                                            src="{{ asset($product->image) }}" alt=""></a>
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
                                    <div class="double_base">
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
                                        @if ($product->productNew())
                                        <div class="label_product">
                                            <span>new</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="product_content grid_content"
                                    style="display: flex; flex-direction: column; align-items: center;">
                                    <h3><a href="{{ route('shop.detail', $product->slug) }}">{{ $product->name ?? ''
                                            }}</a></h3>
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
                    {{ $products->links('vendor.pagination.bootstrap-5') }}
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                    @else
                    <div class="d-flex justify-content-center">
                        <h3>Không có sản phẩm</h3>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
<!--shop  area end-->

</body>

</html>
@endsection
@push('script')
<script>
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 50000000,
        step: 1000,
        values: [ {{ ( !empty($priceFillter) ) ? $priceFillter : '0, 50000000' }}],
        slide: function( event, ui ) {
            $( "#amount" ).val( "" + new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(ui.values[ 0 ])  + " - " +  new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(ui.values[ 1 ]));
        }
    });
    $( "#amount" ).val( "" + new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format($( "#slider-range" ).slider( "values", 0 )) +
       " - " + new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format($( "#slider-range" ).slider( "values", 1 ) ));
</script>
@endpush