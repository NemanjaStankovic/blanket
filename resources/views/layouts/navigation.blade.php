<div class="topbar">
        <div class="topbar-menu d-flex align-items-center gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-box">

                <!-- Brand Logo Dark -->
                <a href="/dashboard" class="logo-dark">
                    <img src="assets/images/logo.png" alt="logo" class="logo-lg">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </div>

            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('subject.index')" :active="request()->routeIs('subject.index')">
                    {{ __('Predmeti') }}
                </x-nav-link>
            </div>

            <!-- User Dropdown -->
            <div class="dropdown page-title-right">
                <a class="btn btn-light dropdown-toggle " data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <div>{{ Auth::user()->name}}
                        <i class="mdi mdi-chevron-down"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome {{ Auth::user()->name}}!</h6>
                        <h7> {{ Auth::user()->email}}</h7>
                    </div>

                    <!-- item-->
                    <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" class="dropdown-item notify-item" onclick="event.preventDefault();this.closest('form').submit();">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @if(Session::has('flash_msg'))
        <div class="jq-toast-wrap top-right">
            <div class="toast fade show d-flex align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    {{Session::get('flash_msg')}}
                </div>
                <button type="button" class="btn-close btn-close-white ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif
