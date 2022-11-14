@push('script')
<script>
    function applyCoupon(){
        this.event.preventDefault();
        let couponCode = $('#counpon').val();
        let url = "{{ route('cart.coupon') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {coupon: couponCode},
            dataType: 'json'
        }).done(function (response) {
            if(response.messageError != null){
                toastMessageDanger(response.messageError);
            }
            if(response.message !=null){
                toastMessage(response.message);
            }
            handleData(response);
        })
    }

    $('#dataFormCart').submit(function(event){
        event.preventDefault();
        let data = new FormData(this);
        let url = "{{ route('cart.add') }}";
        let response = sendAjax(url, data, 'cartAdd');
        handleData(response);
        if(response.status == 200){
            toastMessage('Sản phẩm đã được thêm vào giỏ hàng!');
        }
    });

    function updateItem(){
        let url = '{{ route('cart.update') }}';
        let data = [];
        $('table tbody tr td').each(function(){
            $(this).find('input').each(function(){
                let item = {key: $(this).data('id'), value: $(this).val()};
                data.push(item);
            })
        });
        $.ajax({
            url: url,
            type: 'POST',
            data: {data: data},
            dataType: 'json'
        }).done(function (response) {
            toastMessage('Giỏ hàng đã được cập nhật lại!');
            handleData(response);
        })
    }

    function deleteItem(id){
        let urlDelete = '{{ route("cart.delete", ":id") }}';
        urlDelete = urlDelete.replace(':id', id);
        let confirmCheck = confirm("Bạn có muốn xóa sản phẩm khỏi giỏ hàng!");
        if(confirmCheck){
            $.ajax({
            url: urlDelete,
            method: 'GET',
            typeData: 'json'
            }).done(function(response){
                toastMessage('Sản phẩm đã được xóa khỏi giỏ hàng!');
                handleData(response);
            })
        }
    }

    function handleData(response){
        let status = response.statusCode;
        let data = response.data;
        if(status == 200){
            cartMini(data);
            cart(data);
        }
    }

    function cartMini(data) {
        let cart_mini = $("#cart_mini");
        let formmatterCurrency = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND'});
        let formmatterNumber = new Intl.NumberFormat('vi-VN');
        let ele_cart = `<div class="cart_link">
                                <a href="#" id="cart_link_a">
                                    <i class="fa fa-shopping-basket"></i>
                                    ${data.totalItemCart} sản phẩm
                                </a>
                                <!--mini cart-->
                                <div class="mini_cart"> `;

        let items = data.itemCart;
        let urlDetail = '{{ route("shop.detail", ":slug") }}';
        if (items != 0){
            for(let key in items ){
                ele_cart += `<div class="cart_item bottom">
                            <div class="cart_img">
                                <a href="${urlDetail.replace(':slug', items[key].productInfo.slug)}">
                                    <img src="${'{{ asset('/') }}' + items[key].productInfo.image}" alt="">
                                </a>
                            </div>
                            <div class="cart_info">
                                <a href="${urlDetail.replace(':slug', items[key].productInfo.slug)}">
                                    ${items[key].productInfo.name}
                                </a>
                                <span>
                                    ${formmatterNumber.format(items[key].quantity)}x  ${formmatterCurrency.format(items[key].productInfo.price)}
                                </span>
                            </div>
                            <div class="cart_remove">
                                <a href="#" onclick ="deleteItem(${key})"><i class="ion-android-close"></i></a>
                            </div>
                        </div>`;
            };
        }else{
            ele_cart += `<div class="cart_item cart_null bottom">
                            <div class="cart_img">
                                <a href="#"><img src="{{ asset('uploads/image/cart-null.png') }}"
                                        alt=""></a>
                            </div>
                            <div class="cart_info">
                                <span>Giỏ hàng của bạn còn trống!</span>
                            </div>
                        </div>`;
        }
        

        ele_cart += `<div class="cart__table">
                                <table>
                                    <tbody>
                                        `;
                                        
        if(data.coupon != null){
            switch (data.coupon['type']) {
                case 0:
                    ele_cart += `
                        <tr>
                            <td class="text-left">Tổng đơn:</td>
                            <td class="text-right">
                                ${formmatterCurrency.format(data.totalPriceCart)}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">Giảm giá:</td>
                            <td class="text-right">
                                - ${formmatterNumber.format(data.coupon['value']) + '%'}
                            </td>
                        </tr>`;
                    break;
                case 1:
                    ele_cart += `
                        <tr>
                            <td class="text-left">Tổng đơn:</td>
                            <td class="text-right">
                                ${formmatterCurrency.format(data.totalPriceCart)}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">Giảm giá:</td>
                            <td class="text-right">
                                - ${formmatterCurrency.format(data.coupon['value'])}
                            </td>
                        </tr>`;
                    break;
                    break;
            }
        }

        ele_cart += `<tr>
                            <td class="text-left">Tổng đơn:</td>
                            <td class="text-right">
                                ${formmatterCurrency.format(data.finalTotalPriceCart)}
                            </td>
                    </tr>
                                </tbody>
                                </table>
                            </div>

                            <div class="cart_button view_cart">
                                <a href="{{ route('shop.cart') }}">Giỏ hàng</a>
                            </div>
                            <div class="cart_button checkout">
                                <a href="{{ route('order.index') }}">Thanh toán</a>
                            </div>
                        </div>
                        <!--mini cart end-->
                    </div>`;
                    
        cart_mini.empty();
        cart_mini.html(ele_cart);
    }

    function cart(data) {
        let body_cart = $('#body_cart');
        let action_cart = $('#action_cart');
        let coupon_cart = $('#coupon_cart');
        let formmatterCurrency = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND'});
        let formmatterNumber = new Intl.NumberFormat('vi-VN');
        let ele_cart = ``;
        let ele_total = ``;
        let ele_coupon = ``;
        let string = ``;
        let items = data.itemCart;
        let urlDetail = '{{ route("shop.detail", ":slug") }}';
        if (items != 0){
            for(let key in items ){
                ele_cart += `<tr>
                                <td class="product_thumb">
                                    <a href="${urlDetail.replace(':slug', items[key].productInfo.slug)}">
                                        <img src="${'{{ asset('/') }}' + items[key].productInfo.image}" alt="">
                                    </a>
                                </td>
                                <td class="product_name">
                                    <a href="${urlDetail.replace(':slug', items[key].productInfo.slug)}">
                                        ${items[key].productInfo.name}
                                    </a>
                                    <p>
                                    ( `;
                
                for(let index in items[key].productInfo.attribute){
                    string += `${items[key].productInfo.attribute[index]} - `;
                    
                }
                ele_cart += string.substring(0, string.length - 2);
                ele_cart += ` )      
                            </p>
                            </td>
                                <td class="product-price">
                                    ${formmatterCurrency.format(items[key].productInfo.price)}
                                </td>
                                <td class="product_quantity">
                                    <input min="1" data-id="${key}" max="100" value="${items[key].quantity}" type="number">
                                </td>
                                <td class="product_total">
                                    ${formmatterCurrency.format(items[key].price)}
                                </td>
                                <td class="product_remove">
                                    <a href="#" onclick ="deleteItem(${key})">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>`;
            };

            ele_total = `<div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="cart_amount">
                                    ${formmatterCurrency.format(data.totalPriceCart)}
                                </p>
                            </div>`;
            if(data.coupon != null){
                ele_total += `<div class="cart_subtotal ">
                                    <p>Discount</p>`;
                switch (data.coupon['type']) {
                    case 0:
                        ele_total += `<p class="cart_amount">
                                    -${formmatterNumber.format(data.coupon['value'])}%                           
                                    </p>`
                        break;
                    case 1:
                        ele_total += `<p class="cart_amount">
                                    -${formmatterCurrency.format(data.coupon['value'])}                                  
                                    </p>`
                        break; 
                }
            }
            ele_total += `</div>
                            <hr>
                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount">
                                    ${formmatterCurrency.format(data.finalTotalPriceCart)}
                                </p>
                            </div>
                            <div class="checkout_btn">
                                <a href="{{ route('order.index') }}">Proceed to Checkout</a>
                            </div>`;

            ele_coupon = `<p>Enter your coupon code if you have one.</p>
                        <input placeholder="Coupon code" type="text" value="${(data.coupon == null) ? '' : data.coupon['code']}"
                                    id="counpon" style="text-transform:uppercase">
                        <button type="submit" onclick="applyCoupon()">Apply coupon</button>`;

        }else{
           
            ele_cart += `<tr>
                            <td class="product_thumb" colspan="6">
                                <a href="#">
                                    <img src="{{ asset('uploads/image/cart-null.png') }}" alt=""
                                        style="width: 15%;">
                                </a>
                                <span>Giỏ hàng của bạn còn trống!</span>
                            </td>
                        </tr>`;

            ele_total = `<div class="coupon_inner" id="action_cart">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">
                                        0 ₫
                                    </p>
                                </div>
                                <hr>
                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">
                                        0 ₫
                                    </p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="{{ route('order.index') }}">Proceed to Checkout</a>
                                </div>
                            </div>`;
            
            ele_coupon = `<p>Enter your coupon code if you have one.</p>
                        <input placeholder="Coupon code" type="text" value=""
                                    id="counpon" style="text-transform:uppercase">
                        <button type="submit" onclick="applyCoupon()">Apply coupon</button>`;
        }

        body_cart.empty();
        body_cart.html(ele_cart);
        action_cart.empty();
        action_cart.html(ele_total);
        coupon_cart.empty();
        coupon_cart.html(ele_coupon);
    }
   

</script>
@endpush