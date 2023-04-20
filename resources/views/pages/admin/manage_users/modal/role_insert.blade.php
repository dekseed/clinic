<!--begin::Modal - Customers - Add-->
<div class="modal fade" id="kt_modal_role_insert" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="{{ route('user.update', $user->id) }}" id="kt_modal_role_insert_form" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_role_insert_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">บทบาทหน้าที่</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_role_insert_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_role_insert_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_role_insert_header" data-kt-scroll-wrappers="#kt_modal_role_insert_scroll" data-kt-scroll-offset="300px">

                        @foreach ($role_id as $permission)
                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bold">{{$permission->display_name}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div class="fs-7 fw-bold text-muted">{{$permission->description}}</div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input" name="role[]" type="checkbox" value="{{$permission->id}}"
                                        @foreach($user->roles as $role)
                                        {{ $permission->id == $role->id ? 'checked' : '' }}
                                        @endforeach
                                        />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <span class="form-check-label fw-bold text-muted">Yes</span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <!--begin::Wrapper-->
                            </div>
                            <!--end::Input group-->
                        @endforeach


                        </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_role_insert_cancel" class="btn btn-light me-3">ยกเลิก</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_role_insert_submit" class="btn btn-primary">
                        @if($user->roles->count() == 0)
                        <span class="indicator-label">เพิ่มบทบาทหน้าที่</span>
                        @else
                        <span class="indicator-label">อัปเดตบทบาทหน้าที่</span>
                        @endif
                        <span class="indicator-progress">กรุณารอสักครู่...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
