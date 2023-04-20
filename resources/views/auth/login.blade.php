@extends('layouts.login')

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

                        <h4 class="text-center mb-4">เข้าสู่ระบบ</h4>
                        @if(Session::has('error'))
                        <div class="alert alert-danger solid alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong>ขัดข้อง!</strong> อีเมล์หรือรหัสผ่านไม่ถูกต้อง ..
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @endif
                        <form method="POST" class="form-login" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label class="mb-1"><strong>Email</strong></label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="val_email" id="val_email" placeholder="hello@example.com" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>รหัสผ่าน</strong></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="val_password" id="val_password" required>
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                   <div class="custom-control custom-checkbox ml-1">
                                        <input type="checkbox" class="custom-control-input" name="remember" value="1" id="basic_checkbox_1">
                                        <label class="custom-control-label" for="basic_checkbox_1">จดจำฉัน</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="#">ลืมรหัสผ่าน?</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
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

</script>

@endsection
