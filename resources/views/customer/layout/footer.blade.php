<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6 col-md-6">
                    <div class="widgets_container contact_us">
                        <h3>Liên hệ chúng tôi</h3>
                        <div class="footer_contact">
                            <p>Address: Hưng Hà - Thái Bình - Việt Nam</p>
                            <p>Phone: <a href="tel:0975 041 697">(0975) 041 697</a> </p>
                            <p>Email: <a href="mailto:phuocbt9x@gmail.com">phuocbt9x@gmail.com</a></p>
                            <ul>
                                <li><a href="https://www.facebook.com/phuocbt698" title="facebook"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="https://github.com/phuocbt9x" title="github"><i
                                            class="fa fa-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="widgets_container newsletter">
                        <h3>Các phương thức thanh toán online </h3>
                        <div class="row">
                            <div class="col-sm-3">
                                <img style="border: solid; border-radius: 6px"
                                    src="{{ asset('assets/customer/img/momopay.png') }}" alt="" width="50%" />
                            </div>
                            <div class="col-sm-3">
                                <img style="border: solid; border-radius: 6px"
                                    src="{{ asset('assets/customer/img/zalopay.png') }}" alt="" width="50%" />
                            </div>
                            <div class="col-sm-3">
                                <img style="border: solid; border-radius: 6px"
                                    src="{{ asset('assets/customer/img/viettelmoney.png') }}" alt="" width="50%" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer area end-->
    <!-- JS============================================ -->
    <!-- Plugins JS -->
    <script src="{{ asset('assets/customer') }}/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/customer') }}/js/main.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/admin') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets/admin') }}/plugins/toastr/toastr.min.js"></script>
    <!-- Ajax Custom -->
    <script src="{{ asset('assets/custom') }}/ajax.js"></script>
    @error('nullCart')
    <script>
        toastMessageDanger('{{ $message }}');
    </script>
    @enderror
    @error('login')
    <script>
        toastMessageDanger('{{ $message }}');
    </script>
    @enderror
    @error('message')
    <script>
        toastMessage('{{ $message }}');
    </script>
    @enderror
</footer>