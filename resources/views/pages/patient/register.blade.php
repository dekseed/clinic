@extends('layouts.patient')
@section('styles')
<link href="{{ asset('assets') }}/vendor/jquery-steps/css/jquery.steps.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets') }}/vendor/select2/css/select2.min.css">
<link href="{{ asset('assets') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
{{-- <script src="http://fordev22.com/picker_date_thai.js"></script> --}}
@endsection
@section('breadcrumb')

<div class="header-left">
    <div class="dashboard_bar">
        แบบฟอร์มลงทะเบียนผู้ป่วยใหม่
    </div>
</div>

@endsection
@section('content')

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">

                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">แบบฟอร์มลงทะเบียนผู้ป่วยใหม่</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('register_store.patient') }}" id="step-form-horizontal" class="step-form-horizontal" method="POST">
                                    {{csrf_field()}}
                                    <div>
                                        <h4>ข้อมูลทั่วไป</h4>
                                        <section>
                                            <div class="card-header">
                                                <h4 class="card-intro-title">ข้อมูลทั่วไป</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-group">
                                                            <label class="mb-1" for="title_name"><strong>คำนำหน้า</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <select class="disabling-options" id="title_name" name="title_name">
                                                                    <option value="">คำนำหน้า</option>
                                                                    @foreach($title_name as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="first_name"><strong>ชื่อหน้า</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="ชื่อหน้า...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 mb-2">
                                                        <div class="form-group" for="last_name">
                                                            <label class="text-label"><strong>นามสกุล</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="นามสกุล...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group" for="birthday">
                                                            <label class="text-label"><strong>วัน เดือน ปี เกิด(ค.ศ.)</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input id="my_date" class="form-control" name="birthday">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group" for="phonenumber">
                                                            <label class="text-label"><strong>เบอร์โทรศัพท์</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="number" name="phonenumber" id="phonenumber" class="form-control" placeholder="085-657-9007" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group" for="cid">
                                                            <label class="text-label"><strong>เลขที่บัตรประจำตัวประชาชน/พาสปอร์ต</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="number" name="cid" id="cid" class="form-control" placeholder="1234567890123">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group" for="sex">
                                                            <label class="text-label"><strong>เพศ</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <select class="title-select form-control" data-validation-required-message="เพศ" id="sex" name="sex">
                                                                    <option value="">สถานภาพ</option>
                                                                    <option value="ชาย">ชาย</option>
                                                                    <option value="หญิง">หญิง</option>
                                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h4>ข้อมูลส่วนตัว</h4>
                                        <section>
                                            <div class="card-header">
                                                <h4 class="card-intro-title">ข้อมูลส่วนตัว</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group" for="status_patient_id">
                                                            <label class="text-label"><strong>สถานภาพ</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <select class="title-select form-control" data-validation-required-message="เลือกสถานภาพ" id="status_patient_id" name="status_patient_id"  required>
                                                                    <option value="">สถานภาพ</option>
                                                                    @foreach($status_patient as $list)
                                                                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group" for="occupation">
                                                            <label class="text-label"><strong>อาชีพ</strong></label>
                                                            <input type="text" name="occupation" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="study"><strong>จบการศึกษา</strong></label>
                                                            <input type="text" name="study" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="ethnicity"><strong>เชื้อชาติ</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" name="ethnicity" id="ethnicity" class="form-control" placeholder="เชื้อชาติ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="nationality"><strong>สัญชาติ</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="nationality" id="nationality" class="form-control" placeholder="สัญชาติ">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="religion"><strong>ศาสนา</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" name="religion" id="religion" class="form-control" placeholder="ศาสนา">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </section>
                                        <h4>ข้อมูลญาติ</h4>
                                        <section>
                                            <div class="card-header">
                                                <h4 class="card-intro-title">ข้อมูลญาติ</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="first_name_father"><strong>ชื่อบิดา</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="first_name_father" name="first_name_father" placeholder="ชื่อบิดา">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="last_name_father"><strong>นามสกุลบิดา</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" name="last_name_father" id="last_name_father" class="form-control" placeholder="นามสกุลบิดา">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="first_name_mother"><strong>ชื่อมารดา</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" name="first_name_mother" id="first_name_mother" class="form-control" placeholder="ชื่อมารดา">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="last_name_mother"><strong>นามสกุลมารดา</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" name="last_name_mother" id="last_name_mother" class="form-control" placeholder="นามสกุลมารดา">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="first_name_relation"><strong>ชื่อบุคคลที่ติดต่อได้ในกรณีฉุกเฉิน</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="first_name_relation" name="first_name_relation" placeholder="ชื่อบุคคลที่ติดต่อได้ในกรณีฉุกเฉิน">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="last_name_relation"><strong>นามสกุลบุคคลที่ติดต่อได้ในกรณีฉุกเฉิน</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" id="last_name_relation" name="last_name_relation" class="form-control" placeholder="นามสกุลบุคคลที่ติดต่อได้ในกรณีฉุกเฉิน">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="relation_tel"><strong>เบอร์โทรบุคคลที่ติดต่อ</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="number" id="relation_tel" name="relation_tel" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="relationship"><strong>ความสัมพันธ์</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" id="relationship" name="relationship" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h4>ข้อมูลที่อยู่</h4>
                                        <section>
                                            <div class="card-header">
                                                <h4 class="card-intro-title">ข้อมูลที่อยู่</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="home_id"><strong>เลขที่บ้าน</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="home_id" name="home_id" placeholder="เลขที่บ้าน">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="moo"><strong>หมู่ที่</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" name="moo" id="moo" class="form-control" placeholder="หมู่ที่">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="district"><strong>ตำบล</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" name="district" id="district" class="form-control" placeholder="ตำบล">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="amphoe"><strong>อำเภอ</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" name="amphoe" id="amphoe" class="form-control" placeholder="อำเภอ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="province"><strong>จังหวัด</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="province" id="province" placeholder="จังหวัด">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="zip_code"><strong>รหัสไปรษณีย์</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="number" class="form-control" id="zip_code" name="zip_code" placeholder="รหัสไปรษณีย์">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h4 class="mt-5">Social Media</h4>
                                        <section>
                                            <div class="card-header">
                                                <h4 class="card-intro-title">Social Media</h4>
                                            </div>
                                             <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="email"><strong>อีเมล์</strong></label>
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="id_line"><strong>ID LINE</strong></label>
                                                            <input type="text" name="id_line" id="id_line" class="form-control" placeholder="ID LINE">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label" for="facebook"><strong>facebook</strong></label>
                                                            <input type="text" name="facebook" id="facebook" class="form-control" placeholder="facebook">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

@endsection
@section('modals')


@endsection
@section('scripts')
    <script src="{{ asset('assets') }}/vendor/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="{{ asset('assets') }}/js/plugins-init/jquery.validate-init.js"></script>
    <!-- Form step init -->

    <script src="{{ asset('assets') }}/js/plugins-init/jquery-steps-init.js"></script>
    <script src="{{ asset('assets') }}/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins-init/select2-init.js"></script>
    <script src="{{ asset('assets') }}/js/picker_date_thai.js"></script>
    <script>

        picker_date(document.getElementById("my_date"),{year_range:"-45:+10"});
        picker_date(document.getElementById("my_date2"),{year_range:"-45:+10"});

        </script>
@endsection
