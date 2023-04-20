@extends('layouts.home')
@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/app-user.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/forms/select/select2.min.css">

@endsection
@section('content')

<div id="app">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                 <div class="content-header-left col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">แก้ไขข้อมูลสมาชิก</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าหลัก</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">จัดการข้อมูลสมาชิก</a>
                                    </li>
                                    <li class="breadcrumb-item active">แก้ไขข้อมูลสมาชิก
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- users edit start -->
                 <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                            <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">ข้อมูลบัญชีผู้ใช้</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                            <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">ตั้งรหัสผ่าน</span>
                                        </a>
                                    </li>

                                </ul>
                                <form action="{{route('users.update', $user->id)}}" method="POST" novalidate>
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                            <!-- users edit media object start -->
                                                @if(Session::has('message'))
                                                        <div class="alert alert-primary">
                                                            <span class="text-bold-700 font-medium-3 mr-1"><i class="feather icon-check mr-1"></i>{{ Session::get('message-permission') }}</span>
                                                        </div>

                                                    @endif
                                            <div class="media mb-2">
                                                <a class="mr-2 my-25" href="#">
                                                    <img src="{{ asset('images') }}/no_image_user.png" alt="users avatar" class="users-avatar-shadow rounded" height="90" width="90">
                                                </a>
                                                <div class="media-body mt-50">
                                                    <h4 class="media-heading">{{$user->title_name->name}}{{$user->name}}</h4>
                                                    <div class="col-12 d-flex mt-1 px-0">
                                                        <a href="#" class="btn btn-primary d-none d-sm-block mr-75">เลือกรูป</a>
                                                        <a href="#" class="btn btn-primary d-block d-sm-none mr-75"><i class="feather icon-edit-1"></i></a>
                                                        <a href="#" class="btn btn-outline-danger d-none d-sm-block">ลบ</a>
                                                        <a href="#" class="btn btn-outline-danger d-block d-sm-none"><i class="feather icon-trash-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                                <input type="hidden" :value="rolesSelected" name="roles">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>คำนำหน้า</label>
                                                                <select class="select2 form-control" name="title_name_id">
                                                            @foreach ($titlename as $titlenames)
                                                                <option {{ $user->title_name_id == $titlenames->id ? 'selected' : '' }} value="{{$titlenames->id}}">{{$titlenames->name}}</option>

                                                            @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>ชื่อหน้า</label>
                                                                <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}" placeholder="ชื่อหน้า" required data-validation-required-message="This name field is required">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>นามสกุล</label>
                                                                <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}" placeholder="นามสกุล" required data-validation-required-message="This name field is required">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>อีเมล์</label>
                                                                <input type="email" class="form-control" placeholder="อีเมล์" name="email" value="{{$user->email}}" required data-validation-required-message="This email field is required">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>แผนก</label>
                                                            {{-- <select class="select2-data-array-dep form-control" id="select2-array" name="department" required></select> --}}
                                                            <select class="select2 form-control" name="department">
                                                            @foreach ($department as $departments)
                                                                <option {{ $user->department_id == $departments->id ? 'selected' : '' }} value="{{$departments->id}}">{{$departments->name}}</option>

                                                            @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name"> ตำแหน่ง </label>
                                                                <input type="text" id="position" class="form-control" placeholder="ตำแหน่ง" name="position" value="{{$user->position}}" required autocomplete="position">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>สถานะ</label>

                                                                <fieldset>
                                                                    <div class="vs-radio-con vs-radio-success">
                                                                        <input type="radio"  name="status" {{ $user->status == '1' ? 'checked' : '' }} value="1">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        <span class="">อนุมัติ</span>
                                                                    </div>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="vs-radio-con vs-radio-danger">
                                                                        <input type="radio"  name="status" {{ $user->status == '0' ? 'checked' : '' }} value="0">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        <span class="">ไม่อนุมัติ</span>
                                                                    </div>
                                                                </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="table-responsive border rounded px-1 ">
                                                                <h6 class="border-bottom py-1 mx-1 mb-1 font-medium-2"><i class="feather icon-lock mr-50 "></i>บทบาทหน้าที่</h6>
                                                                @foreach ($roles as $role)
                                                                <div class="form-group col-12">
                                                                    <fieldset class="checkbox">
                                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                                        <input type="checkbox" v-model="rolesSelected" value="{{$role->id}}">
                                                                            <span class="vs-checkbox">
                                                                                <span class="vs-checkbox--check">
                                                                                    <i class="vs-icon feather icon-check"></i>
                                                                                </span>
                                                                            </span>
                                                                            <span class="">{{$role->display_name}}</span>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">บันทึก</button>
                                                <a href="{{route('users.show', $user->id)}}" class="btn btn-warning waves-effect waves-light">ยกเลิก</a>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                            <!-- users edit Info form start -->
                                                <div class="row">

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-new-password">New Password</label>
                                                                        <input type="password" name="password" id="account-new-password" class="form-control" placeholder="New Password" required data-validation-required-message="The password field is required" minlength="6">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label for="account-retype-new-password">Retype New
                                                                            Password</label>
                                                                        <input type="password" name="password_confirmation" class="form-control" required id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <hr>
                                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">บันทึก</button>
                                                                <a href="{{route('users.show', $user->id)}}" class="btn btn-warning waves-effect waves-light">ยกเลิก</a>
                                                            </div>
                                            <!-- users edit Info form ends -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
</div>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    var app = new Vue({
      el: '#app',
      data: {
        password_options: 'keep',
        rolesSelected: {!! $user->roles->pluck('id') !!}
      }
    });
</script>
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets') }}/js/scripts/pages/app-user.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/navs/navs.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/forms/select/form-select2.js"></script>
    <!-- END: Page JS-->


@endsection
