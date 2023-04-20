@extends('layouts.home')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="{{ asset('assets') }}/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

@endsection
@section('breadcrumb')

<div class="header-left">
    <div class="dashboard_bar">
        บทบาทหน้าที่
    </div>
</div>

@endsection
@section('content')

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">ข้อมูลผู้ใช้</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">บทบาทหน้าที่</a></li>
					</ol>
                </div>
                <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
                    <div class="mr-auto d-lg-block">
                        <a href="#" data-toggle="modal" data-target="#kt_modal_new_role" class="btn btn-primary btn-rounded">+ เพิ่มข้อมูลบทบาทหน้าที่</a>
                    </div>
                    {{-- <div class="input-group search-area ml-auto d-inline-flex mr-2">
                        <input type="text" class="form-control" placeholder="Search here">
                        <div class="input-group-append">
                            <button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
                        </div>
                    </div> --}}
                    <a href="javascript:void(0);" class="settings-icon"><i class="flaticon-381-settings-2 mr-0"></i></a>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xxl-12">
                        @if(Session::has('success_delete'))
                        <div class="alert alert-success solid alert-rounded  fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            <strong>สำเร็จ!</strong> ลบข้อมูลเรียบร้อย ..
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>

                        @elseif(Session::has('error'))
                        <div class="alert alert-danger solid alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong>ขัดข้อง!</strong> มีข้อผิดพลาดบางอย่าง กรุณาลองใหม่ ..
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    @foreach($roles as $item)
                        <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-4">
                            <div class="widget-stat card">
                                <div class="card-body p-4">
                                    <div class="media">
                                        <span class="mr-3">
                                            <i class="flaticon-381-calendar-1"></i>
                                        </span>
                                        <div class="media-body text-right">
                                            <h5 class="mb-1">{{ $item->display_name }}</h5>
                                            <p class="">({{ $item->name }})</p>
                                            <small>รายละเอียด : {{ $item->description }}</small>

                                            <a href="{{ route('role.show', $item->id) }}" class="btn my-2 btn-primary btn px-4">ดูข้อมูล</a>
											{{-- <a href="#" class="btn btn-outline-danger btn-xxs">Delete</a> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    {{-- <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-4">
                        <div class="widget-stat card bg-success">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-diamond"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Earning</p>
                                        <h3 class="text-white">$56K</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-4">
                        <div class="widget-stat card bg-info">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-heart"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Total Patient</p>
                                        <h3 class="text-white">783K</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-4">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-user-7"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Chef</p>
                                        <h3 class="text-white">$76</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>


@endsection
@section('modals')
{{-- <!--begin::Modal - Customers - Add-->
<div class="modal fade" id="kt_modal_new_role">
    <div class="modal-dialog" role="document">

            <form class="form" action="{{ route('role.store') }}" id="kt_modal_new_role_form" method="POST">
                {{method_field('POST')}}
                {{csrf_field()}}

                <div class="modal-header">
                    <h5 class="modal-title">บทบาทหน้าที่</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal - Customers - Add--> --}}
<div class="modal fade" id="kt_modal_new_role">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form" action="{{ route('role.store') }}" id="kt_modal_new_role_form" method="POST">
                {{method_field('POST')}}
                {{csrf_field()}}

            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="display_name">ชื่อ (Display Name)
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="display_name" name="display_name" value="{{ old('display_name') }}" placeholder="ชื่อ (Display Name)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="name">ชื่อบ่งชี้เฉพาะ
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="ชื่อบ่งชี้เฉพาะ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="vdescription">รายละเอียด
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="รายละเอียด">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <h4 class="fv-row mb-7"> สิทธิ์การใช้งาน</h4>
                        @foreach ($permissions as $permission)
                        {{-- <div class="form-group">
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="role[]" value="{{$permission->id}}" type="checkbox" id="flexSwitchCheckDefault{{$permission->id}}">
                                <label class="form-check-label" for="flexSwitchCheckDefault{{$permission->id}}">{{$permission->description}}t</label>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" id="check{{$permission->id}}" name="permissions[]" value="{{$permission->id}}" type="checkbox">
                                <label class="form-check-label" for="check{{$permission->id}}">
                                    {{$permission->description}}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('assets') }}/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->

<script>
     "use strict";
    var KTModalCustomerAdd=function(){
        var t,e,o,n,r,i;
        return{
            init:function(){
                i=new bootstrap.Modal(document.querySelector("#kt_modal_new_role")),
                r=document.querySelector("#kt_modal_new_role_form"),
                t=r.querySelector("#kt_modal_new_role_submit"),
                e=r.querySelector("#kt_modal_new_role_cancel"),
                o=r.querySelector("#kt_modal_new_role_close"),
                n=FormValidation.formValidation(
                    r,{fields:{
                        titleName_id:{validators:{notEmpty:{message:"กรุณาเลือก ยศ/คำนำหน้า ให้เรียบร้อย"}}},
                        first_name:{validators:{notEmpty:{message:"กรุณากรอก ชื่อ ให้เรียบร้อย"}}},
                        last_name:{validators:{notEmpty:{message:"กรุณากรอก นามสกุล ให้เรียบร้อย"}}},
                        email:{validators:{notEmpty:{message:"กรุณากรอกอีเมล์ให้เรียบร้อย"}}},
                        password:{validators:{notEmpty:{message:"กรุณากรอก รหัสผ่าน ให้เรียบร้อย"},
                        }},
                        "confirm-password":{validators:{notEmpty:{message:"กรุณากรอก ยืนยันรหัสผ่าน ให้เรียบร้อย"},
                        identical:{compare:function(){
                            return r.querySelector('[name="password"]').value
                        },message:"รหัสผ่านและการยืนยันไม่เหมือนกัน"}}},


                        affiliation_id:{validators:{notEmpty:{message:"กรุณาเลือก หน่วย/สังกัด ให้เรียบร้อย"}}},
                        tel:{validators:{notEmpty:{message:"กรุณากรอก เบอร์โทรศัพท์ ให้เรียบร้อย"}}},

                    },
                        plugins:{trigger:new FormValidation.plugins.Trigger,
                                bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}
                        }),
                t.addEventListener("click",(function(e){
                                e.preventDefault(),
                                n&&n.validate()
                                .then((function(e){
                                    console.log("validated!")
                                    ,"Valid"==e?(t.setAttribute("data-kt-indicator","on"),
                                    t.disabled=!0,
                                    setTimeout((function(){
                                        t.removeAttribute("data-kt-indicator"),
                                        document.getElementById('kt_modal_new_role_form').submit()
                                        // Swal.fire({
                                        //     text:"Form has been successfully submitted!",
                                        //     icon:"success",buttonsStyling:!1,
                                        //     confirmButtonText:"Ok, got it!",
                                        //     customClass:{confirmButton:"btn btn-primary"}
                                        // })

                                    // .then((function(e){
                                    //     e.isConfirmed&&(
                                    //         i.hide(),
                                    //         t.disabled=!1,
                                    //         window.location=r.getAttribute("data-kt-redirect"))
                                    //     }))
                                    }),2e3)):Swal.fire({
                                        text:"ขออภัย, ดูเหมือนว่าจะมีการตรวจพบข้อผิดพลาด โปรดลองอีกครั้ง",
                                        icon:"error",
                                        buttonsStyling:!1,
                                        confirmButtonText:"โอเค, เข้าใจแล้ว!",
                                        customClass:{confirmButton:"btn btn-primary"}})
                                    }))}
                                    )),
                                e.addEventListener("click",(function(t){
                                    t.preventDefault(),
                                    Swal.fire({
                                        text:"คุณแน่ใจหรือว่าต้องการยกเลิก?",
                                        icon:"warning",
                                        showCancelButton:!0,
                                        buttonsStyling:!1,
                                        confirmButtonText:"ใช่, ฉันต้องการยกเลิก!",
                                        cancelButtonText:"ไม่",
                                        customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-active-light"}
                                    }).then((function(t){
                                        t.value?(r.reset(),i.hide()):"cancel"===t.dismiss&&Swal.fire({
                                            text:"แบบฟอร์มของคุณยังไม่ถูกยกเลิก!.",
                                            icon:"error",buttonsStyling:!1,
                                            confirmButtonText:"โอเค, เข้าใจแล้ว!",
                                            customClass:{confirmButton:"btn btn-primary"}})
                                        }))
                                    })),
                                    o.addEventListener("click",(function(t){
                                        t.preventDefault(),
                                        Swal.fire({
                                            text:"คุณแน่ใจหรือว่าต้องการยกเลิก?",
                                            icon:"warning",
                                            showCancelButton:!0,
                                            buttonsStyling:!1,
                                            confirmButtonText:"ใช่, ฉันต้องการยกเลิก!",
                                            cancelButtonText:"ไม่",
                                            customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-active-light"}
                                        })
                                        .then((function(t){t.value?(r.reset(),i.hide()):"cancel"===t.dismiss&&Swal.fire({
                                            text:"แบบฟอร์มของคุณยังไม่ถูกยกเลิก!.",
                                            icon:"error",buttonsStyling:!1,
                                            confirmButtonText:"โอเค, เข้าใจแล้ว!",
                                            customClass:{confirmButton:"btn btn-primary"}})
                                        }))
                                    }))
                                }
                }
    }();

    KTUtil.onDOMContentLoaded((function(){KTModalCustomerAdd.init()}));


                @if(Session::has('error'))
                                   Swal.fire({
                                     text:"ขออภัย, ดูเหมือนว่ามีข้อผิดพลาดบางอย่างที่ตรวจพบ โปรดลองอีกครั้ง",
                                     icon:"error",buttonsStyling:!1,
                                     confirmButtonText:"ตกลง, เข้าใจแล้ว!",
                                     customClass:{confirmButton:"btn btn-primary"}})

                @elseif(Session::has('success_insert'))
                                Swal.fire({
                                        text:"เพิ่มข้อมูลบทบาทหน้าที่เรียบร้อย !",
                                        icon:"success",buttonsStyling:!1,
                                        confirmButtonText:"โอเค, เข้าใจแล้ว!",
                                        customClass:{confirmButton:"btn btn-primary"}
                                    })
                @elseif(Session::has('success_delete'))
                                Swal.fire({
                                        text:"ลบข้อมูลเรียบร้อย !",
                                        icon:"success",buttonsStyling:!1,
                                        confirmButtonText:"โอเค, เข้าใจแล้ว!",
                                        customClass:{confirmButton:"btn btn-primary"}
                                    })
                @endif
</script>

<script>

</script>

@endsection
