<x-guest-layout>


    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card bg-pattern">

                <div class="card-body p-4">

                    <div class="text-center w-75 m-auto">
                        <div class="auth-brand">
                            <span class="logo-lg">
                                <img src="{{ asset("images/custom/feba_logo.png") }}" alt="" height="32">
                            </span>
                        </div>
                        <p class="text-muted mb-4 mt-3">{{__("Enter your email address and password to access admin panel.")}}</p>
                    </div>
                    <!-- Session Status -->
                    <x-auth-session-status :status="session('status')" />



                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email Address -->
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email')"/>
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" :error="$errors->has('username')" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <x-input-label for="password" :value="__('Password')"/>
                            <div class="input-group input-group-merge">
                                <x-text-input id="password"
                                              type="password"
                                              name="password"
                                              required autocomplete="current-password" />
                                <div class="input-group-text" data-password="false" onclick="showPass(this)">
                                    <span class="password-eye"></span>
                                </div>
                            </div>

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3">
                            <div class="form-check">
                                <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            </div>
                        </div>

                        <div class="text-center d-grid">
                            <x-primary-button>
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>

                    </form>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->
            @if (Route::has('password.request'))
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p> <a href="{{ route('password.request') }}" class="text-white-50 ms-1">{{ __('Заборављена лозинка?') }}</a></p>
                    </div> <!-- end col -->
                </div>
            @endif
            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
    @section('page-js-script')
        <script type="text/javascript">
            function showPass(btn) {
                var input = document.getElementById("password");
                if (btn.getAttribute('data-password') == "false") {
                    input.setAttribute("type", "text");
                    btn.setAttribute('data-password', 'true');
                    btn.classList.add("show-password");
                } else {
                    input.setAttribute("type", "password");
                    btn.setAttribute('data-password', 'false');
                    btn.classList.remove("show-password");
                }
            }
        </script>
    @endsection
</x-guest-layout>
