@extends('layouts.login')

@section('styles')
   <link rel="stylesheet" href="{{ asset('assets') }}/vendor/select2/css/select2.min.css">
   <link href="{{ asset('assets') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="row justify-content-center h-100 align-items-center">
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="text-center">
                <img src="{{ asset('assets') }}/images/logoclinic.png" width="300" class="mt-5 img-fluid" alt="">

            </div>
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <h4 class="text-center mb-4">สร้างบัญชี</h4>
                        <form method="POST" class="form-valide" action="{{ route('register') }}">
                            @csrf

                            {{-- <div class="form-group">
                                <label class="mb-1" for="val-title_name"><strong>คำนำหน้า</strong>
                                    <span class="text-danger">*</span>
                                </label>

                                <select class="disabling-options" id="val-title_name" name="title_name">
                                    <option value="">คำนำหน้า</option>

                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label class="mb-1" for="val-first_name"><strong>ชื่อหน้า</strong>
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" placeholder="ชื่อหน้า..." id="val-first_name" name="first_name">
                            </div>
                            <div class="form-group">
                                <label class="mb-1" for="val-last_name"><strong>นามสกุล</strong>
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" placeholder="ชื่อหน้า..." id="val-last_name" name="last_name">
                            </div>
                            <div class="form-group">
                                <label class="mb-1" for="val-Email"><strong>Email</strong>
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="val-Email" name="email" placeholder="hello@example.com">
                            </div>
                            <div class="form-group">
                                <label class="mb-1" for="val-Email"><strong>รหัสผ่าน</strong>
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" id="val-password" name="password" placeholder="รหัสผ่าน..">
                            </div>
                            <div class="form-group">
                                <label class="mb-1" for="val-Email"><strong>ยืนยันรหัสผ่าน</strong>
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" id="val-confirm-password" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน..">
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-block">สร้างบัญชี</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

<script src="{{ asset('assets') }}/vendor/select2/js/select2.full.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins-init/select2-init.js"></script>

<script>

@if(Session::has('error'))
    $(window).on("load", function(){
        Swal.fire({
                    text:"ขออภัย, ดูเหมือนว่ามีข้อผิดพลาดบางอย่างที่ตรวจพบ โปรดลองอีกครั้ง",
                    icon:"error",buttonsStyling:!1,
                    confirmButtonText:"ตกลง, เข้าใจแล้ว!",
                    customClass:{confirmButton:"btn btn-primary"}})
    });
@endif

jQuery(".form-valide").validate({
    rules: {
        "val-username": {
            required: !0,
            minlength: 3
        },
        "val-email": {
            required: !0,
            email: !0
        },
        "val-password": {
            required: !0,
            minlength: 5
        },
        "val-confirm-password": {
            required: !0,
            equalTo: "#val-password"
        },
        "val-select2": {
            required: !0
        },

    },
    messages: {
        "val-username": {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 3 characters"
        },
        "val-email": "Please enter a valid email address",
        "val-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        "val-confirm-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        },
        "val-select2": "Please select a value!",
        "val-select2-multiple": "Please select at least 2 values!",
        "val-suggestions": "What can we do to become better?",
        "val-skill": "Please select a skill!",
        "val-currency": "Please enter a price!",
        "val-website": "Please enter your website!",
        "val-phoneus": "Please enter a US phone!",
        "val-digits": "Please enter only digits!",
        "val-number": "Please enter a number!",
        "val-range": "Please enter a number between 1 and 5!",
        "val-terms": "You must agree to the service terms!"
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});

</script>

@endsection

                                {{-- <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> --}}
