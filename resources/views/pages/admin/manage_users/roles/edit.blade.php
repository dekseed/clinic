@extends('layouts.home')
@section('styles')


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
                            <h2 class="content-header-title float-left mb-0">สิทธิ์การใช้งาน</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าหลัก</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">จัดการข้อมูลสมาชิก</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('permission_role') }}">สิทธิ์การใช้งาน</a>
                                    </li>
                                    <li class="breadcrumb-item active">บทบาทหน้าที่
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                        <!-- users edit account form start -->
                                        <form action="{{route('roles.update', $role->id)}}" method="POST" novalidate>
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <input type="hidden" :value="permissionsSelected" name="permissions">

                                            <h6 class="mb-1 py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>บทบาทหน้าที่</h6>
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>ชื่อ (Display Name)</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control" value="{{ $role->display_name }}" name="display_name" placeholder="ชื่อ (Display Name)" required data-validation-required-message="This username field is required">
                                                                        <div class="form-control-position">
                                                                            <i class="feather icon-user"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>ชื่อบ่งชี้เฉพาะ</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control" value="{{ $role->name }}" name="name" placeholder="ชื่อบ่งชี้เฉพาะ" value="Angelo Sashington" disabled>
                                                                        <div class="form-control-position">
                                                                            <i class="feather icon-mail"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>รายละเอียด</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control" name="description" value="{{ $role->description }}"  placeholder="อธิบายสิ่งที่ได้รับอนุญาตนี้" required data-validation-required-message="This name field is required">
                                                                        <div class="form-control-position">
                                                                            <i class="feather icon-smartphone"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="table-responsive border rounded px-1 ">
                                                        <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Permission</h6>
                                                        @foreach ($permissions as $permission)
                                                        <div class="form-group col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" v-model="permissionsSelected" value="{{$permission->id}}">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">{{$permission->display_name}} <em>({{$permission->description}})</em></span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                        แก้ไข</button>
                                                    <a href="{{route('permission_role')}}" class="btn btn-outline-warning waves-effect waves-light"><i class="fa fa-arrow-circle-left m-r-10"></i> กลับ</a>
                                                </div>

                                        </form>
                                        <!-- users edit account form ends -->
                            </div>
                        </div>
                    </div>
                </section>
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
        permissionsSelected: {!!$role->permissions->pluck('id')!!}
    }
  });
</script>

@endsection
