@extends('layouts.home')
@section('styles')
   <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/app-user.css">

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
                                    <li class="breadcrumb-item active">เพิ่มสิทธิ์การใช้งาน
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
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                            <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">สิทธิ์การใช้งานขั้นพื้นฐาน</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                            <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">CRUD สิทธิ์การใช้งาน</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">

                                        <!-- users edit account form start -->
                                        <form action="{{route('permission.store')}}" method="POST" novalidate>
                                            {{method_field('POST')}}
                                            {{csrf_field()}}
                                            <input name="permission_type" id="permission_type" value="basic" type="hidden">
                                            <h6 class="mb-1 py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>สิทธิ์การใช้งานขั้นพื้นฐาน</h6>
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>ชื่อ (Display Name)</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control" value="{{ old('display_name') }}" name="display_name" placeholder="ชื่อ (Display Name)" value="adoptionism744" required data-validation-required-message="This username field is required">
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
                                                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="ชื่อบ่งชี้เฉพาะ" value="Angelo Sashington" required data-validation-required-message="This name field is required">
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
                                                                        <input type="text" class="form-control" name="description" value="{{ old('description') }}"  placeholder="อธิบายสิ่งที่ได้รับอนุญาตนี้" required data-validation-required-message="This name field is required">
                                                                        <div class="form-control-position">
                                                                            <i class="feather icon-smartphone"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                        สร้างสิทธิ์การใช้งาน</button>
                                                    <a href="{{route('permission_role')}}" class="btn btn-outline-warning waves-effect waves-light"><i class="fa fa-arrow-circle-left m-r-10"></i> กลับ</a>
                                                </div>

                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                    <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                        <!-- users edit Info form start -->
                                        <form action="{{route('permission.store')}}" method="POST" novalidate>
                                            {{method_field('POST')}}
                                            {{csrf_field()}}
                                            <input name="permission_type" id="permission_type" value="crud" type="hidden" >
                                                <div class="col-12">
                                                    <h5 class="mb-1"><i class="feather icon-user mr-25"></i> CRUD สิทธิ์การใช้งาน</h5>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label>Resource</label>
                                                                    <input type="text" class="form-control" value="{{ old('resource') }}" v-model="resource" name="resource" placeholder="ชื่อ (Display Name)" id="resource" required data-validation-required-message="This username field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <div class="row mt-1">
                                                <div class="col-12 col-sm-3">

                                                                <fieldset>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="create" v-model="crudSelected" native-value="create" value="create">
                                                                        <label for="customCheck1">create</label>
                                                                    </div>
                                                                </fieldset>

                                                                <fieldset>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="read" v-model="crudSelected" native-value="read" value="read">
                                                                        <label for="customCheck2">read</label>
                                                                    </div>
                                                                </fieldset>

                                                                <fieldset>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="update" v-model="crudSelected" native-value="update" value="update">
                                                                        <label for="customCheck3">update</label>
                                                                    </div>
                                                                </fieldset>

                                                                <fieldset>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="delete" v-model="crudSelected" native-value="delete" value="delete">
                                                                        <label for="customCheck3">delete</label>
                                                                    </div>
                                                                </fieldset>

                                                </div>
                                                <div class="col-12 col-sm-9">
                                                    <input type="hidden" name="crud_selected" :value="crudSelected">
                                                    <div class="table-responsive border rounded px-1 ">
                                                        <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Permission</h6>
                                                        <table class="table table-borderless" v-if="resource.length >= 3 && crudSelected.length > 0">
                                                            <thead>
                                                                <tr>
                                                                    <th>ชื่อ</th>
                                                                    <th>Slug</th>
                                                                    <th>รายละเอียด</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr v-for="item in crudSelected">
                                                                    <td v-text="crudName(item)"></td>
                                                                    <td v-text="crudSlug(item)"></td>
                                                                    <td v-text="crudDescription(item)"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                        สร้างสิทธิ์การใช้งาน</button>
                                                    <a href="{{route('permission_role')}}" class="btn btn-outline-warning waves-effect waves-light"><i class="fa fa-arrow-circle-left m-r-10"></i> กลับ</a>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit Info form ends -->
                                    </div>
                                </div>
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
<script type="text/javascript">
  var app = new Vue({
    el: '#app',
    data: {
      permissionType: 'basic',
      resource: '',
      crudSelected: ['create', 'read', 'update', 'delete']
    },
    methods: {
      crudName: function(item) {
        return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
      },
      crudSlug: function(item) {
        return item.toLowerCase() + "-" + app.resource.toLowerCase();
      },
      crudDescription: function(item) {
        return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
      }
    }
  });
</script>
<!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets') }}/js/scripts/pages/app-user.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/navs/navs.js"></script>
    <!-- END: Page JS-->
@endsection
