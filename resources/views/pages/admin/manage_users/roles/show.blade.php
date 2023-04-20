@extends('layouts.home')
@section('styles')

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

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">บทบาทหน้าที่</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{$role->display_name}}</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xxl-12">
                @if(Session::has('success_insert'))
                <div class="alert alert-success solid alert-rounded  fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    <strong>สำเร็จ!</strong> แก้ไขข้อมูลเรียบร้อย ..
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
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header  border-0 pb-0">
                        <h4 class="fs-20 mb-0 text-black card-title">{{$role->display_name}} <em>({{$role->name}})</em></h4>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kt_modal_edit_role">แก้ไข</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#kt_modal_delete_card">ลบข้อมูล</button>
                            </div>

                    </div>
                    <div class="card-body">
                        <div id="DZ_W_Todo1" class="widget-media">
                            <ul class="timeline">
                                @foreach ($role->permissions as $r)
                                <li>
                                    <div class="timeline-panel">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1{{ $r->id }}" checked required="" disabled>
                                            <label class="custom-control-label" for="customCheckBox1{{ $r->id }}"></label>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mb-1">{{$r->display_name}}</h5>
                                            <small class="d-block">({{$r->description}})</small>
                                        </div>

                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modals')
<!--begin::Modal - Customers - Add-->
<div class="modal fade" id="kt_modal_edit_role">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form" action="{{ route('role.update', $role->id) }}" id="kt_modal_edit_role_form" method="POST">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="modal-header">
                    <h5 class="modal-title">แก้ไขข้อมูลบทบาทหน้าที่</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mb-1"><strong>ชื่อ (Display Name)</strong></label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-solid" value="{{ $role->display_name }}" name="display_name" placeholder="ชื่อ (Display Name)" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mb-1"><strong>ชื่อบ่งชี้เฉพาะ</strong></label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-solid" value="{{ $role->name }}" name="name" placeholder="ชื่อบ่งชี้เฉพาะ" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mb-1"><strong>รายละเอียด</strong></label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="description" value="{{ $role->description }}"  placeholder="รายละเอียด" />
                        </div>
                    </div>

                        <h4 class="fv-row mb-7"> สิทธิ์การใช้งาน</h4>
                        <!--end::Input group-->
                        <div id="DZ_W_Todo1" class="widget-media">

                            <ul class="timeline">
                                @foreach ($permissions as $permission)
                                <li>
                                    <div class="timeline-panel">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input class="custom-control-input" name="permissions[]" type="checkbox" value="{{$permission->id}}" id="CheckBox1{{ $permission->id }}"
                                                @foreach ($role->permissions as $r)
                                                {{ $permission->id == $r->id ? 'checked' : '' }}
                                                @endforeach >
                                            <label class="custom-control-label" for="CheckBox1{{ $permission->id }}"></label>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mb-1">{{$permission->display_name}}</h5>
                                            <small class="d-block">({{$permission->description}})</small>
                                        </div>

                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>


                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_edit_role_cancel" class="btn btn-light me-3" data-dismiss="modal">ยกเลิก</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_edit_role_submit" class="btn btn-primary">
                        <span class="indicator-label">แก้ไขข้อมูล</span>

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
<div class="modal fade" tabindex="-1" id="kt_modal_delete_card">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="delete" name="delete" action="{{ route('role.destroy', $role->id)}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="modal-header">
                    <h5 class="modal-title">ลบข้อมูล</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <p><h5>คุณต้องการลบ " {{ $role->name }} " ใช่หรือไม่?</h5></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">ลบข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')


<script>

</script>

@endsection


