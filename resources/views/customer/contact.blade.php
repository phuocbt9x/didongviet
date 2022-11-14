@extends('customer.layout.main')
@section('content')
<!--contact area start-->
<div class="contact_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact_message content">
                    <h3>Liên hệ</h3>
                    <ul>
                        <li><i class="fa fa-fax"></i> Số nhà 232, đường Trần Hưng Đạo , phường Thanh Bình, thành phố
                            Ninh Bình</li>
                        <li><i class="fa fa-phone"></i> <a
                                href="mailto:khuonghung1423@gmail.com">khuonghung1423@gmail.com</a></li>
                        <li><i class="fa fa-envelope-o"></i> (+84) 888195313</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="contact_message form">
                    <h3>Gửi thông tin phản hồi</h3>
                    <form id="contact-form" method="POST" action="php/contact.php">
                        <p>
                            <label> Địa chỉ email</label>
                            <input name="email" placeholder="Email *" type="email">
                        </p>
                        <p>
                            <label> Tiêu đề</label>
                            <input name="subject" placeholder="Subject *" type="text">
                        </p>
                        <div class="contact_textarea">
                            <label> Thông tin</label>
                            <textarea placeholder="Message *" name="message" class="form-control2"></textarea>
                        </div>
                        <button type="submit"> Send</button>
                        <p class="form-messege"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--contact area end-->

<!--contact map start-->
<div class="contact_map">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="map-area">
                    <iframe id="googleMap" style="border: none;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3742.9298516338627!2d105.96738361530592!3d20.261743818893542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313679dd0a34002d%3A0xf4c06f1e513c7618!2zVHLhuqduIEjGsG5nIMSQ4bqhbywgVMOibiBUaMOgbmgsIFRwLiBOaW5oIELDrG5oLCBOaW5oIELDrG5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1635102766441!5m2!1svi!2s"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!--contact map end-->
@endsection