@extends('layouts.home')
@section('styles')


@endsection
@section('content')

<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">สิทธิ์การใช้งาน</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าหลัก</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">จัดการข้อมูลสมาชิก</a>
                                    </li>
                                    <li class="breadcrumb-item active"> สิทธิ์การใช้งาน / บทบาทหน้าที่
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        @if(Session::has('message-permission'))
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">

                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                        สิทธิ์การใช้งาน
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        บทบาทหน้าที่
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @elseif(Session::has('message'))
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">

                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                        สิทธิ์การใช้งาน
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        บทบาทหน้าที่
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @else
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">

                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                        สิทธิ์การใช้งาน
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        บทบาทหน้าที่
                                    </a>
                                </li>
                            </ul>
                        </div>
                         @endif
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                @if(Session::has('message-permission'))
                                                    <div class="alert alert-primary">
                                                        <span class="text-bold-700 font-medium-3 mr-1"><i class="feather icon-check mr-1"></i>{{ Session::get('message-permission') }}</span>
                                                    </div>

                                                @endif
                                                <div class="card-header mb-1">
                                                    <span class="text-left mr-1 "><h4>สิทธิ์การใช้งาน</h4></span>
                                                    <span class="text-right mb-1"><a class="btn btn-outline-success  waves-effect waves-light" href="{{ route('permission.create')}}">เพิ่มสิทธิ์การใช้งาน</a></span>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">สิทธิ์การใช้งาน</th>
                                                                <th class="text-center">คำบ่งชี้</th>
                                                                <th class="text-center">ลักษณะ</th>
                                                                <th class="text-center">ตัวเลือก</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1 ?>
                                                            @foreach ($permissions as $role)
                                                            <tr>
                                                                <th class="text-center" scope="row">{{$role->name}}</th>
                                                                <td>{{$role->display_name}}</td>
                                                                <td>{{$role->description}}</td>
                                                                <td class="product-action text-center">
                                                                    {{-- <span class="edit">
                                                                        <a class="" href="{{ route('permission.edit', $role->id)}}">
                                                                                <i class="feather icon-edit"></i></a>
                                                                    </span> --}}
                                                                    <span class="delete">
                                                                        <a class="" data-href="{{ route('permission.destroy', $role->id)}}"
                                                                            data-toggle="modal" data-target="#default<?= $role->id ?>"><i class="feather icon-trash"></i></a>
                                                                    </span>

                                                                </td>
                                                            </tr>
                                                            <div class="modal fade text-left" id="default<?= $role->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <form id="delete" name="delete" action="{{ route('permission.destroy', $role->id)}}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}

                                                                        <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel1">ลบข้อมูล</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <h5>คุณต้องการลบ " {{$role->name}} " ใช่หรือไม่?</h5>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                        <button type="button" class="btn grey mb-1 btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
                                                                        <button type="submit" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">ลบข้อมูล</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div  role="tabpanel" class="tab-pane fade " id="account-vertical-password" aria-labelledby="account-pill-password" aria-expanded="false">
                                                 @if(Session::has('message'))
                                                    <div class="alert alert-primary">
                                                        <span class="text-bold-700 font-medium-3 mr-1"><i class="feather icon-check mr-1"></i>{{ Session::get('message') }}</span>

                                                    </div>

                                                @endif
                                                <div class="card-header mb-1">
                                                    <span class="text-left mr-1 "><h4>บทบาทหน้าที่</h4></span>
                                                    <span class="text-right mb-1"><a class="btn btn-outline-success  waves-effect waves-light" href="{{ route('roles.create')}}">เพิ่มบทบาทหน้าที่</a></span>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-start flex-wrap">
                                                    @foreach ($roles as $roless)
                                                        <div class="text-center bg-light colors-container rounded text-white width-350 height-200 d-flex align-items-center justify-content-center my-1 ml-50 shadow">
                                                            <span class="align-middle mt-1">
                                                                <h5 class="title">{{$roless->display_name}}</h5>
                                                                <h4 class=""><em>{{$roless->name}}</em></h4>
                                                                <p>
                                                                    {{$roless->description}}
                                                                </p>
                                                                <a href="{{route('roles.show', $roless->id)}}" class="btn btn-relief-success mr-1 mb-1 waves-effect waves-light">
                                                                    รายละเอียด</a>
                                                                <a href="{{route('roles.edit', $roless->id)}}" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">แก้ไข</a>
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
@section('scripts')
{{-- <script>
    var app = new Vue({
        el: '#app',
        data: {
            auto_password: true
        }
    });
</script> --}}

@endsection
