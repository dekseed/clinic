@extends('layouts.home')
@section('styles')
<link href="{{ asset('assets') }}/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
<link href="{{ asset('assets') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets') }}/vendor/select2/css/select2.min.css">
@endsection
@section('breadcrumb')

<div class="header-left">
    <div class="dashboard_bar">
        ข้อมูลผู้ใช้
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">รายการ</a></li>
            </ol>
        </div>
        <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
            <div class="mr-auto d-lg-block">
                <a href="#" data-toggle="modal" data-target="#CreateUser" class="btn btn-primary btn-rounded">+ เพิ่มข้อมูลผู้ใช้</a>
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
                        @if(Session::has('success_destroy'))
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
                                <th>ชื่อ - นามสกุล</th>
                                <th>Email</th>

                                <th>ตำแหน่ง</th>
                                {{-- <th>กำหนดการ</th> --}}
                                <th>เบอร์โทรศัพท์</th>
                                <th></th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                            @if($item->id == '1')
                            @else
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="checkbox text-right align-self-center">
                                            <div class="custom-control custom-checkbox ">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" value="{{ $item->id }}" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </div>
                                        <img alt="" src="{{ asset('assets') }}/images/profile/{{ $item->picname }}" height="43" width="43" class="rounded-circle ml-4">
                                    </div>
                                </td>
                                <td>{{ $item->title_names->name }}{{ $item->first_name }} {{ $item->last_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->jobs_title->name }}</td>
                                {{-- <td>
                                    <a href="#" class="btn btn-primary light btn-rounded btn-sm text-nowrap" >5 การนัดหมาย</a>
                                </td> --}}
                                <td><span class="font-w500">+66 {{ $item->tel }}</span></td>
                                <td class="text-center">
                                    <a href="{{ route('user.show', $item->id) }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
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
                                                <form id="delete" name="delete" action="{{ route('user.destroy', $item->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel1">ลบข้อมูล</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>คุณต้องการลบ " {{ $item->title_names->name }}{{ $item->first_name }} {{ $item->last_name }} " ใช่หรือไม่?</h5>
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
                            @endif
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

<!-- Modal update -->
<div class="modal fade" id="CreateUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เพิ่มข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{route('user.store')}}" method="POST" class="form-CreateUser">
                @csrf
                <div class="modal-body">

                        <div class="form-group">
                            <label class="mb-1" for="val_title_name"><strong>คำนำหน้า</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <select class="disabling-options" id="val_title_name" name="val_title_name">
                                    <option value="">คำนำหน้า</option>
                                    @foreach($titleName_id as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="val_first_name"><strong>ชื่อหน้า</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ชื่อหน้า..." id="val_first_name" name="val_first_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="val_last_name"><strong>นามสกุล</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ชื่อหน้า..." id="val_last_name" name="val_last_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="val_tel"><strong>เบอร์โทรศัพท์</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group mb-3  input-success">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+66 (0)</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="เบอร์โทรศัพท์..." id="val_tel" name="val_tel">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="val_jobs_title"><strong>ตำแหน่ง</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <select class="disabling-options" id="val_jobs_title" name="val_jobs_title">
                                    <option value="">ตำแหน่ง</option>
                                    @foreach($val_jobs_title as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="val_email"><strong>Email</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="val_email" name="val_email" placeholder="hello@example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="val_password"><strong>รหัสผ่าน</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="val_password" name="val_password" placeholder="รหัสผ่าน..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="val_confirm_password"><strong>ยืนยันรหัสผ่าน</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="val_confirm_password" name="val_confirm_password" placeholder="ยืนยันรหัสผ่าน..">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')

<!--begin::Page Vendors Javascript(used by this page)-->

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
