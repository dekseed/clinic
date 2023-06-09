@extends('layouts.home')
@section('styles')
<link href="{{ asset('assets') }}/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets') }}/vendor/chartist/css/chartist.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendor/select2/css/select2.min.css">
<link href="{{ asset('assets') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets') }}/ijaboCropTool-master/ijaboCropTool.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.css">
<style>
    .inline-flex {
  display: inline-flex !important;
  margin: .5em !important;
}
@media (max-width: 575px) {
    .upload_pic{
        position: absolute;
        margin-left: -15px;
        margin-top: -10px;
    }
}
@media (min-width: 575px) {
    .upload_pic{
        position: absolute;
        margin-left: 120px;
        margin-top: -10px;
    }
}
</style>
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $user->title_names->name }}{{ $user->first_name }} {{ $user->last_name }}</a></li>
            </ol>
        </div>
        <div class="d-block d-sm-flex mb-3 mb-md-4">
            <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded mb-2 mr-1" data-toggle="modal" data-target="#editProfile"><i class="las scale5 la-pencil-alt mr-2"></i> แก้ไขข้อมูล</a>
            <a href="javascript:void(0);" class="btn btn-info btn-rounded mb-2 mr-1" data-toggle="modal" data-target="#editPassword"><i class="lar la-calendar-plus mr-2 scale5 mr-2"></i> เปลี่ยนรหัสผ่าน</a>
            <a href="javascript:void(0);" class="btn btn-warning btn-rounded mb-2" data-toggle="modal" data-target="#editRole">
                @if($user->roles->count() == 0)
                   + เพิ่มข้อมูลบทบาทหน้าที่
                @else
                <i class="fa fa-ban text-primary mr-2"></i> แก้ไขข้อมูลบทบาทหน้าที่
                @endif
            </a>
            {{-- <div class="dropdown ml-auto mr-1 d-inline-block">
                <button type="button" class="btn btn-primary btn-rounded dropdown-toggle light font-w600  mb-2" data-toggle="dropdown" aria-expanded="false">
                    <i class="las la-check-circle scale5 mr-3"></i>ตัวเลือก
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#editProfile"><i class="las scale5 la-pencil-alt mr-2"></i> </a>
                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#editPassword"></a>

                </div>
            </div>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#editProfile" class="btn btn-primary btn-rounded mb-2"><i class="las scale5 la-pencil-alt mr-2"></i> แก้ไข</a> --}}

        </div>
        <div class="row">
            <div class="col-xxl-12">
                @if(Session::has('success'))
                <div class="alert alert-success solid alert-rounded  fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    <strong>สำเร็จ!</strong> แก้ไขข้อมูลเรียบร้อย ..
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                </div>
                @elseif(Session::has('success_role_insert'))
                <div class="alert alert-success solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    <strong>สำเร็จ!</strong> แก้ไขข้อมูลบทบาทหน้าที่เรียบร้อย ..
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
            {{-- <div class="col-xl-3 col-lg-4 col-xxl-4">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h4 class="fs-20 font-w600 mb-0">Appointment Schdule</h4>
                    </div>
                    <div class="card-body pt-4">
                        <div id="DZ_W_Todo2" class="widget-media dz-scroll ps ps--active-y height370">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-panel bgl-dark flex-wrap border-0 p-3 rounded">
                                        <div class="media bg-transparent mr-2">
                                            <img class="rounded-circle" alt="image" width="48" src="images/widget/6.jpg">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mb-1 fs-18">Cive Slauw</h5>
                                            <span>Physical Therapy</span>
                                        </div>
                                        <ul class="mt-3 d-flex flex-wrap text-primary font-w600">
                                            <li class="mr-2">Sat, 23/08/2020</li>
                                            <li>08:00 - 09:30 AM</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel bgl-dark flex-wrap border-0 p-3 rounded">
                                        <div class="media bg-transparent mr-2">
                                            <img class="rounded-circle" alt="image" width="48" src="images/widget/7.jpg">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mb-1 fs-18">Cive Slauw</h5>
                                            <span>Physical Therapy</span>
                                        </div>
                                        <ul class="mt-3 d-flex flex-wrap text-primary font-w600">
                                            <li class="mr-2">Sat, 23/08/2020</li>
                                            <li>08:00 - 09:30 AM</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel bgl-dark flex-wrap border-0 p-3 rounded">
                                        <div class="media bg-transparent mr-2">
                                            <img class="rounded-circle" alt="image" width="48" src="images/widget/8.jpg">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mb-1 fs-18">Cive Slauw</h5>
                                            <span>Physical Therapy</span>
                                        </div>
                                        <ul class="mt-3 d-flex flex-wrap text-primary font-w600">
                                            <li class="mr-2">Sat, 23/08/2020</li>
                                            <li>08:00 - 09:30 AM</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel bgl-dark flex-wrap border-0 p-3 rounded">
                                        <div class="media bg-transparent mr-2">
                                            <img class="rounded-circle" alt="image" width="48" src="images/widget/5.jpg">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mb-1 fs-18">Cive Slauw</h5>
                                            <span>Physical Therapy</span>
                                        </div>
                                        <ul class="mt-3 d-flex flex-wrap text-primary font-w600">
                                            <li class="mr-2">Sat, 23/08/2020</li>
                                            <li>08:00 - 09:30 AM</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel bgl-dark flex-wrap border-0 p-3 rounded">
                                        <div class="media bg-transparent mr-2">
                                            <img class="rounded-circle" alt="image" width="48" src="images/widget/1.jpg">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mb-1 fs-18">Cive Slauw</h5>
                                            <span>Physical Therapy</span>
                                        </div>
                                        <ul class="mt-3 d-flex flex-wrap text-primary font-w600">
                                            <li class="mr-2">Sat, 23/08/2020</li>
                                            <li>08:00 - 09:30 AM</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel bgl-dark flex-wrap border-0 p-3 rounded">
                                        <div class="media bg-transparent mr-2">
                                            <img class="rounded-circle" alt="image" width="48" src="images/widget/6.jpg">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mb-1 fs-18">Cive Slauw</h5>
                                            <span>Physical Therapy</span>
                                        </div>
                                        <ul class="mt-3 d-flex flex-wrap text-primary font-w600">
                                            <li class="mr-2">Sat, 23/08/2020</li>
                                            <li>08:00 - 09:30 AM</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="col-xl-8 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-sm-flex d-block text-center text-sm-left pb-4 mb-4 border-bottom">
                            <img alt="image" class="rounded mr-sm-4 mr-0" width="130" src="{{ asset('assets') }}/images/profile/{{ $user->pic }}">
                            {{-- <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                            </form> --}}

                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 upload_pic"  data-toggle="modal" data-target="#upload_pic"><i class="fa fa-pencil"></i></a>

                            <div class="media-body align-items-center">

                                <div class="d-sm-flex d-block justify-content-between my-3 my-sm-0">
                                    <div>
                                        <h3 class="fs-22 text-black font-w600 mb-0">{{ $user->title_names->name }}{{ $user->first_name }} {{ $user->last_name }}</h3>
                                        <p class="mb-2 mb-sm-2">Check In date 21 August 2020, 12:45 AM</p>
                                    </div>
                                    {{-- <span>#P-00016</span> --}}
                                </div>
                                <a href="javascript:void(0);" class="btn bgl-primary btn-rounded text-black mb-2 mr-2">
                                    <svg class="mr-2 scale5" width="14" height="14" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 0.500061V3.00006H21.25L16.625 7.62506C15 6.25006 12.875 5.50006 10.5 5.50006C5 5.50006 0.5 10.0001 0.5 15.5001C0.5 21.0001 5 25.5001 10.5 25.5001C16 25.5001 20.5 21.0001 20.5 15.5001C20.5 13.1251 19.75 11.0001 18.375 9.37506L23 4.75006V8.00006H25.5V0.500061H18ZM10.5 23.0001C6.375 23.0001 3 19.6251 3 15.5001C3 11.3751 6.375 8.00006 10.5 8.00006C14.625 8.00006 18 11.3751 18 15.5001C18 19.6251 14.625 23.0001 10.5 23.0001Z" fill="#2BC155"></path>
                                    </svg>
                                    Male
                                </a>
                                <a href="javascript:void(0);" class="btn bgl-primary btn-rounded mb-2 text-black">
                                    <svg class="mr-2 scale5" width="14" height="14" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M27.75 11.5C27.7538 10.8116 27.568 10.1355 27.213 9.54575C26.8581 8.95597 26.3476 8.47527 25.7376 8.15632C25.1276 7.83737 24.4415 7.69248 23.7547 7.73752C23.0678 7.78257 22.4065 8.01581 21.8434 8.4117C21.2803 8.80758 20.837 9.35083 20.5621 9.98192C20.2872 10.613 20.1913 11.3076 20.2849 11.9896C20.3785 12.6715 20.6581 13.3146 21.0929 13.8482C21.5277 14.3819 22.101 14.7855 22.75 15.015V19C22.75 20.6576 22.0915 22.2473 20.9194 23.4194C19.7473 24.5915 18.1576 25.25 16.5 25.25C14.8424 25.25 13.2527 24.5915 12.0806 23.4194C10.9085 22.2473 10.25 20.6576 10.25 19V17.65C12.3301 17.3482 14.2323 16.3083 15.6092 14.7203C16.9861 13.1322 17.746 11.1019 17.75 9V1.5C17.75 1.16848 17.6183 0.850537 17.3839 0.616116C17.1495 0.381696 16.8315 0.25 16.5 0.25H12.75C12.4185 0.25 12.1005 0.381696 11.8661 0.616116C11.6317 0.850537 11.5 1.16848 11.5 1.5C11.5 1.83152 11.6317 2.14946 11.8661 2.38388C12.1005 2.6183 12.4185 2.75 12.75 2.75H15.25V9C15.25 10.6576 14.5915 12.2473 13.4194 13.4194C12.2473 14.5915 10.6576 15.25 9 15.25C7.34239 15.25 5.75268 14.5915 4.58058 13.4194C3.40848 12.2473 2.75 10.6576 2.75 9V2.75H5.25C5.58152 2.75 5.89946 2.6183 6.13388 2.38388C6.3683 2.14946 6.5 1.83152 6.5 1.5C6.5 1.16848 6.3683 0.850537 6.13388 0.616116C5.89946 0.381696 5.58152 0.25 5.25 0.25H1.5C1.16848 0.25 0.850537 0.381696 0.616116 0.616116C0.381696 0.850537 0.25 1.16848 0.25 1.5V9C0.25402 11.1019 1.01386 13.1322 2.3908 14.7203C3.76773 16.3083 5.6699 17.3482 7.75 17.65V19C7.75 21.3206 8.67187 23.5462 10.3128 25.1872C11.9538 26.8281 14.1794 27.75 16.5 27.75C18.8206 27.75 21.0462 26.8281 22.6872 25.1872C24.3281 23.5462 25.25 21.3206 25.25 19V15.015C25.9792 14.7599 26.6114 14.2848 27.0591 13.6552C27.5069 13.0256 27.7483 12.2726 27.75 11.5Z" fill="#2BC155"></path>
                                    </svg>
                                    {{ $user->jobs_title->name }}
                                </a>
                            </div>

                        </div>
                        <div class="row">
                            {{-- <div class="col-lg-6 mb-3">
                                <div class="media">
                                    <span class="p-3 border border-primary-light rounded-circle mr-3">
                                        <svg width="22" height="22" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0)">
                                            <path d="M27.5716 13.4285C27.5716 22.4285 16.0001 30.1428 16.0001 30.1428C16.0001 30.1428 4.42871 22.4285 4.42871 13.4285C4.42871 10.3596 5.64784 7.41637 7.8179 5.24631C9.98797 3.07625 12.9312 1.85712 16.0001 1.85712C19.0691 1.85712 22.0123 3.07625 24.1824 5.24631C26.3524 7.41637 27.5716 10.3596 27.5716 13.4285Z" stroke="#2BC155" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M16.0002 17.2857C18.1305 17.2857 19.8574 15.5588 19.8574 13.4286C19.8574 11.2983 18.1305 9.57141 16.0002 9.57141C13.87 9.57141 12.1431 11.2983 12.1431 13.4286C12.1431 15.5588 13.87 17.2857 16.0002 17.2857Z" stroke="#2BC155" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0">
                                            <rect width="30.8571" height="30.8571" fill="white" transform="translate(0.571533 0.571411)"></rect>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    <div class="media-body">
                                        <span class="d-block text-light mb-2">Address</span>
                                        <p class="fs-18 text-dark">795 Folsom Ave, Suite 600 San Francisco, <strong>CADGE 94107</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="map-bx mb-3">
                                    <img src="images/svg/map.svg" alt="">
                                    <a href="javascript:void(0);" class="map-button">View in Fullscreen</a>
                                    <a class="map-marker" href="#">
                                        <i class="las la-map-marker-alt"></i>
                                    </a>
                                </div>
                            </div> --}}
                            <div class="col-lg-6 mb-lg-0 mb-3">
                                <div class="media">
                                    <span class="p-3 border border-primary-light rounded-circle mr-3">
                                        <svg width="22" height="22" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M28.2884 21.7563V25.6138C28.2898 25.9719 28.2165 26.3264 28.073 26.6545C27.9296 26.9826 27.7191 27.2771 27.4553 27.5192C27.1914 27.7613 26.8798 27.9456 26.5406 28.0604C26.2014 28.1751 25.8419 28.2177 25.4853 28.1855C21.5285 27.7555 17.7278 26.4035 14.3885 24.238C11.2817 22.2638 8.64771 19.6297 6.67352 16.523C4.50043 13.1685 3.14808 9.34928 2.72601 5.37477C2.69388 5.0192 2.73614 4.66083 2.8501 4.32248C2.96405 3.98413 3.14721 3.67322 3.38792 3.40953C3.62862 3.14585 3.92159 2.93517 4.24817 2.79092C4.57475 2.64667 4.9278 2.57199 5.28482 2.57166H9.14232C9.76634 2.56552 10.3713 2.78649 10.8445 3.1934C11.3176 3.60031 11.6267 4.16538 11.714 4.78329C11.8768 6.01778 12.1788 7.22988 12.6141 8.39648C12.7871 8.85671 12.8245 9.35689 12.722 9.83775C12.6194 10.3186 12.3812 10.76 12.0354 11.1096L10.4024 12.7426C12.2329 15.9617 14.8983 18.6271 18.1174 20.4576L19.7504 18.8246C20.1001 18.4789 20.5414 18.2406 21.0223 18.1381C21.5031 18.0355 22.0033 18.073 22.4636 18.246C23.6302 18.6813 24.8423 18.9832 26.0767 19.1461C26.7014 19.2342 27.2718 19.5488 27.6796 20.0301C28.0874 20.5113 28.304 21.1257 28.2884 21.7563Z" stroke="#2BC155" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                    <div class="media-body">
                                        <span class="d-block text-light mb-2">เบอร์โทรศัพท์</span>
                                        <p class="fs-18 text-dark font-w600 mb-0">+66 {{ $user->tel }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="media">
                                    <span class="p-3 border border-primary-light rounded-circle mr-3">
                                        <svg width="22" height="22" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.14344 5.14331H25.7168C27.1312 5.14331 28.2884 6.30056 28.2884 7.71498V23.145C28.2884 24.5594 27.1312 25.7166 25.7168 25.7166H5.14344C3.72903 25.7166 2.57178 24.5594 2.57178 23.145V7.71498C2.57178 6.30056 3.72903 5.14331 5.14344 5.14331Z" stroke="#2BC155" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M28.2884 7.71503L15.4301 16.7159L2.57178 7.71503" stroke="#2BC155" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                    <div class="media-body">
                                        <span class="d-block text-light mb-2">อีเมล์</span>
                                        <p class="fs-18 text-dark font-w600 mb-0">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-12">
                <div class="card border-0 pb-0">
                    <div class="card-header border-0 pb-0">
                        <h4 class="card-title">บทบาทหน้าที่</h4>
                    </div>
                    <div class="card-body">
                        <div id="DZ_W_Todo4" class="widget-media">
                            <ul class="timeline">
                                {{ $user->roles->count() == 0 ? 'ไม่มีข้อมูล' : '' }}
                                @foreach($user->roles as $role)
                                <li>
                                    <div class="timeline-panel">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1{{ $role->id }}" checked required="" disabled>
                                            <label class="custom-control-label" for="customCheckBox1{{ $role->id }}"></label>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mb-0">{{$role->display_name}} ({{$role->name}})</h5>
                                            <small class="text-muted">{{$role->description}}</small>
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


<!-- Modal เปลี่ยนรหัสผ่าน -->
<div class="modal fade" id="editPassword">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เปลี่ยนรหัสผ่าน</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form class="form-editPassword" action="{{route('user.update', $user->id)}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="form-validation">
                        <div class="alert alert-danger solid alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-1 mb-2 text-white">คำแนะนำ ..</h5>
                                    <p class="mb-0">รหัสผ่านต้องมีตัวอักษรภาษาอังกฤษหรือตัวเลขมากกว่า 6 ตัวขึ้นไป</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="val_password">รหัสผ่าน
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="val_password" name="val_password" placeholder="รหัสผ่าน..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="val_confirm_password">ยืนยันรหัสผ่าน <span
                                    class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="val_confirm_password" name="val_confirm_password" placeholder="..ยืนยันรหัสผ่าน">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">เปลี่ยนรหัสผ่าน</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal update -->
<div class="modal fade" id="editProfile">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">แก้ไขข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{route('user.update', $user->id)}}" method="POST" class="form-editUser">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-body">

                        <div class="form-group">
                            <label class="mb-1" for="val_title_name"><strong>คำนำหน้า</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <select class="disabling-options" id="val_title_name" name="val_title_name">
                                    <option value="">คำนำหน้า</option>
                                    @foreach($titleName_id as $item)
                                    <option {{ $item->id == $user->titleName_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="val_first_name"><strong>ชื่อหน้า</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ชื่อหน้า..." id="val_first_name" name="val_first_name" value="{{ $user->first_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="val_last_name"><strong>นามสกุล</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ชื่อหน้า..." id="val_last_name" name="val_last_name" value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="val_email"><strong>Email</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="val_email" name="val_email" placeholder="hello@example.com" value="{{ $user->email }}">
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
                                    <input type="number" class="form-control" placeholder="เบอร์โทรศัพท์..." id="val_tel" name="val_tel" value="{{ $user->tel }}">
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
                                    <option {{ $item->id == $user->jobs_title_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
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

<!-- Modal role -->
<div class="modal fade" id="editRole">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">บทบาทหน้าที่</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{route('user.update', $user->id)}}" method="POST" novalidate>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-body">

                    <div id="DZ_W_Todo4" class="widget-media">
                        <ul class="timeline">
                            @foreach ($role_id as $permission)
                            <li>
                                <div class="timeline-panel">
                                    <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                        <input class="custom-control-input" name="role[]" type="checkbox" id="custom{{$permission->id}}" value="{{$permission->id}}"
                                        @foreach($user->roles as $role)
                                        {{ $permission->id == $role->id ? 'checked' : '' }}
                                        @endforeach
                                        />
                                        <label class="custom-control-label" for="custom{{$permission->id}}"></label>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">{{$permission->display_name}} ({{$permission->name}})</h5>
                                        <small class="text-muted">{{$permission->description}}</small>
                                    </div>

                                </div>
                            </li>
                            @endforeach

                        </ul>
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

<!-- Modal upload_pic -->
<div class="modal fade" id="upload_pic">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">อัพโหลดรูปภาพ</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="avatar-preview text-center mb-3">
                        {{-- <img alt="image"  class="rounded mr-sm-4 mr-0" width="130" src="{{ asset('assets') }}/images/profile/12.png"> --}}
                        <div id="imagePreview" style="background-image: url({{ asset('assets') }}/images/profile/{{ $user->pic }});">
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">อัพโหลดรูปภาพ</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" accept=".png, , .jpg , .jpeg">
                            <label class="custom-file-label">เลือกรูป</label>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">อัพโหลดรูปภาพ</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')

<!-- Chart Chartist plugin files -->
<script src="{{ asset('assets') }}/vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
<script src="{{ asset('assets') }}/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('assets') }}/vendor/select2/js/select2.full.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins-init/select2-init.js"></script>

<!-- Dashboard 1 -->
<script src="{{ asset('assets') }}/js/dashboard/doctor-details.js"></script>
<script src="{{ asset('assets') }}/js/plugins-init/jquery.validate-init.js"></script>

<script src="{{ asset('assets') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
{{-- <script src="{{ asset('assets') }}/js/plugins-init/sweetalert.init.js"></script> --}}
<script src="{{ asset('assets') }}/ijaboCropTool-master/ijaboCropTool.min.js"></script>

@endsection
