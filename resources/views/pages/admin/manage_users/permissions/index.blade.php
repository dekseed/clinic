@extends('layouts.home')
@section('styles')
<link href="{{ asset('assets') }}/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
<link href="{{ asset('assets') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets') }}/vendor/select2/css/select2.min.css">

@endsection
@section('breadcrumb')

<div class="header-left">
    <div class="dashboard_bar">
        สิทธิ์การใช้งาน
    </div>
</div>

@endsection
@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">ข้อมูลผู้ใช้</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">สิทธิ์การใช้งาน</a></li>
            </ol>
        </div>
        <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
            <div class="mr-auto d-lg-block">
                <a href="#" data-toggle="modal" data-target="#kt_modal_add_user" class="btn btn-primary btn-rounded">+ เพิ่มสิทธิ์การใช้งาน</a>
                <a href="#" data-toggle="modal" data-target="#kt_modal_add_user2" class="btn btn-info btn-rounded">+ CRUD สิทธิ์การใช้งาน</a>
            </div>
            {{-- <div class="input-group search-area ml-auto d-inline-flex mr-2">
                <input type="text" class="form-control" placeholder="Search here">
                <div class="input-group-append">
                    <button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
                </div>
            </div> --}}
            <a href="javascript:void(0);" class="settings-icon"><i class="flaticon-381-settings-2 mr-0"></i></a>
        </div>
        <div class="row">
            <div class="col-xl-12">

                    <div class="col-xxl-12">
                        @if(Session::has('success_insert'))
                        <div class="alert alert-success solid alert-rounded  fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            <strong>สำเร็จ!</strong> เพิ่มข้อมูลสิทธิ์การใช้งานเรียบร้อย ..
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @elseif(Session::has('success_delete'))
                        <div class="alert alert-success solid alert-rounded  fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            <strong>สำเร็จ!</strong> ลบข้อมูลสิทธิ์การใช้งานเรียบร้อย ..
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

                <div class="table-responsive">
                    {{-- <table id="example5" class="table shadow-hover  table-bordered mb-4 dataTablesCard fs-14"> --}}
                        <table id="example3" class="table shadow-hover display min-w850">
                        <thead>
                            <tr>
                                <th>
                                    <div class="checkbox align-self-center">
                                        <div class="custom-control custom-checkbox ">
                                            <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </div>
                                </th>
                                <th class="min-w-125px">สิทธิ์การใช้งาน</th>
                                <th class="min-w-125px">คำบ่งชี้</th>
                                <th class="min-w-125px">ลักษณะ</th>

								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permission as $item)

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="checkbox text-right align-self-center">
                                            <div class="custom-control custom-checkbox ">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" value="{{ $item->id }}" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                   {{ $item->display_name }}
                                </td>
                                <td>
                                    {{ $item->description }}
                                 </td>


                                <td class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#default<?= $item->id ?>" class="sweet-success-cancel">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 6H5H21" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#F46B68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                    <!-- Modal delete -->
                                    <div class="modal fade text-left" id="default<?= $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form id="delete" name="delete" action="{{ route('permission.destroy', $item->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel1">ลบข้อมูล</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>คุณต้องการลบ " {{ $item->name }} " ใช่หรือไม่?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
                                                <button type="submit" class="btn btn-outline-primary">ลบข้อมูล</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modals')
<!--begin::Modal - Customers - Add-->
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="{{ route('permission.store') }}" id="kt_modal_add_user_form" method="POST">
                {{method_field('POST')}}
                {{csrf_field()}}
                <input type="hidden" name="permission_type" value="basic">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">สิทธิ์การใช้งานขั้นพื้นฐาน</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">ชื่อ (Display Name)</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" value="{{ old('display_name') }}" name="display_name" placeholder="ชื่อ (Display Name)" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">ชื่อบ่งชี้เฉพาะ</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" value="{{ old('name') }}" name="name" placeholder="ชื่อบ่งชี้เฉพาะ" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 mb-2">อธิบายสิ่งที่ได้รับอนุญาตนี้</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="description" value="{{ old('description') }}"  placeholder="อธิบายสิ่งที่ได้รับอนุญาตนี้" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_user_cancel" class="btn btn-light me-3" data-dismiss="modal">ยกเลิก</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_user_submit" class="btn btn-primary">
                        <span class="indicator-label">เพิ่มข้อมูล</span>

                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_add_user2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="{{ route('permission.store') }}" id="kt_modal_add_user_form2" method="POST">
                {{method_field('POST')}}
                {{csrf_field()}}
                <input type="hidden" name="permission_type" value="crud">
                <div class="modal-header">
                    <h5 class="modal-title">CRUD สิทธิ์การใช้งาน</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll2" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header2" data-kt-scroll-wrappers="#kt_modal_add_user_scroll2" data-kt-scroll-offset="300px">

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">ชื่อ</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" value="{{ old('resource') }}" name="resource" placeholder="ชื่อ (Display Name)" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_user_cancel2" class="btn btn-light me-3" data-dismiss="modal">ยกเลิก</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_user_submit2" class="btn btn-primary">
                        <span class="indicator-label">เพิ่มข้อมูล</span>

                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - Customers - Add-->
@endsection
@section('scripts')


<script src="{{ asset('assets') }}/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('assets') }}/vendor/select2/js/select2.full.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins-init/select2-init.js"></script>

<script src="{{ asset('assets') }}/js/plugins-init/jquery.validate-init.js"></script>

<script src="{{ asset('assets') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins-init/sweetalert.init.js"></script>

<script src="{{ asset('assets') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>

<script src="{{ asset('assets') }}/js/plugins-init/datatables.init.js"></script>
<script>
    (function($) {

        var table = $('#example5').DataTable({
            searching: false,
            paging:true,
            select: false,
            //info: false,
            lengthChange:false

        });
        $('#example tbody').on('click', 'tr', function () {
            var data = table.row( this ).data();

        });

    })(jQuery);
</script>

@endsection
