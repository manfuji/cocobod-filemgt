<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   "
    id="sidenav-main" style="    background: #4e2d01;">
    {{-- <div class="sidenav-header">bg-gradient-dark --}}
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/logo-c.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">File Manager</span>
    </a>
    </div>
    <style>
        .bg-gradient-primary {
            background-image: linear-gradient(195deg, #f1d03f 0%, #bfa53b 100%);
        }
    </style>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('dashboard') ? 'active bg-gradient-primary' : '' }}"
                    href="/dashboard">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('employees') ? 'active bg-gradient-primary' : '' }}"
                    href="/employees">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">group</i>
                    </div>
                    <span class="nav-link-text ms-1">Employees</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('department') ? 'active bg-gradient-primary' : '' }}"
                    href="/department">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">grid_on</i>
                    </div>
                    <span class="nav-link-text ms-1">Department</span>
                </a>
            </li>
            {{-- <li class="nav-item">
          <a class="nav-link text-white " href="/generals">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Generals</span>
          </a>
        </li> --}}
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('medicals') ? 'active bg-gradient-primary' : '' }}"
                    href="/medicals">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Medical Records</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('appraisal') ? 'active bg-gradient-primary' : '' }}"
                    href="/appraisal">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">subtitles</i>
                    </div>
                    <span class="nav-link-text ms-1">Appraisals</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('appointment') ? 'active bg-gradient-primary' : '' }}"
                    href="/appointment">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Appointments</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('promtrans') ? 'active bg-gradient-primary' : '' }}"
                    href="/promtrans">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">subject</i>
                    </div>
                    <span class="nav-link-text ms-1">Promotions & Transfers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('qualification') ? 'active bg-gradient-primary' : '' }}"
                    href="/qualification">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">school</i>
                    </div>
                    <span class="nav-link-text ms-1">Qualifications</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="/application">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">graphic_eq</i>
                    </div>
                    <span class="nav-link-text ms-1">Applications</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="/training">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">grain</i>
                    </div>
                    <span class="nav-link-text ms-1">Training Letters</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('user') ? 'active bg-gradient-primary' : '' }}"
                    href="/user">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            {{-- <li class="nav-item">
          <a class="nav-link text-white " href="/profile">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li> --}}
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('logout_user') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Out</span>
                </a>
            </li>
            {{-- <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-up.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">S</span>
          </a>
        </li> --}}
        </ul>
    </div>
    {{-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div> --}}
</aside>
