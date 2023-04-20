<div class="me-3">
    <a href="#" class="btn btn-icon btn-custom btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
                <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </a>
    <!--begin::Menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <!--begin::Avatar-->
                <div class="symbol symbol-50px me-5">
                    <img alt="Logo" src="{{ asset('assets') }}/media/avatars/150-26.jpg" />
                </div>
                <!--end::Avatar-->
                <!--begin::Username-->
                <div class="d-flex flex-column">
                    <div class="fw-bolder d-flex align-items-center fs-5">
                        {{ auth()->user()->first_name }}
                        {{-- <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span> --}}
                    </div>
                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                </div>
                <!--end::Username-->
            </div>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <a href="../../demo9/dist/account/overview.html" class="menu-link px-5">ข้อมูลส่วนตัว</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <a href="../../demo9/dist/pages/projects/list.html" class="menu-link px-5">
                <span class="menu-text">My Projects</span>
                <span class="menu-badge">
                    <span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
                </span>
            </a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        {{-- <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
            <a href="#" class="menu-link px-5">
                <span class="menu-title">My Subscription</span>
                <span class="menu-arrow"></span>
            </a>
            <!--begin::Menu sub-->
            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="../../demo9/dist/account/referrals.html" class="menu-link px-5">Referrals</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="../../demo9/dist/account/billing.html" class="menu-link px-5">Billing</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="../../demo9/dist/account/statements.html" class="menu-link px-5">Payments</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="../../demo9/dist/account/statements.html" class="menu-link d-flex flex-stack px-5">Statements
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="View your statements"></i></a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content px-3">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                            <span class="form-check-label text-muted fs-7">ระบบแจ้งเตือน</span>
                        </label>
                    </div>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu sub-->
        </div> --}}
        <!--end::Menu item-->
        <!--begin::Menu item-->
        {{-- <div class="menu-item px-5">
            <a href="../../demo9/dist/account/statements.html" class="menu-link px-5">My Statements</a>
        </div> --}}
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        {{-- <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
            <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">Language
                <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
                <img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('assets') }}/media/flags/united-states.svg" alt="" /></span></span>
            </a>
            <!--begin::Menu sub-->
            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="../../demo9/dist/account/settings.html" class="menu-link d-flex px-5 active">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" src="{{ asset('assets') }}/media/flags/united-states.svg" alt="" />
                    </span>English</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="../../demo9/dist/account/settings.html" class="menu-link d-flex px-5">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" src="{{ asset('assets') }}/media/flags/spain.svg" alt="" />
                    </span>Spanish</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="../../demo9/dist/account/settings.html" class="menu-link d-flex px-5">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" src="{{ asset('assets') }}/media/flags/germany.svg" alt="" />
                    </span>German</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="../../demo9/dist/account/settings.html" class="menu-link d-flex px-5">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" src="{{ asset('assets') }}/media/flags/japan.svg" alt="" />
                    </span>Japanese</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="../../demo9/dist/account/settings.html" class="menu-link d-flex px-5">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" src="{{ asset('assets') }}/media/flags/france.svg" alt="" />
                    </span>French</a>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu sub-->
        </div> --}}
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-5 my-1">
            <a href="../../demo9/dist/account/settings.html" class="menu-link px-5">Account Settings</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="menu-link px-5">{{ __('ออกจากระบบ') }}</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <div class="menu-content px-5">
                <label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode" id="kt_user_menu_dark_mode_toggle" data-kt-url="../../demo9/dist/index.html" />
                    <span class="pulse-ring ms-n1"></span>
                    <span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
                </label>
            </div>
        </div>
        <!--end::Menu item-->
    </div>
    <!--end::Menu-->
</div>
