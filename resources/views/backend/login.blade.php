<!DOCTYPE html>
<html lang="zxx" class="js">

@include('layouts.backend.head')
<body class="nk-body bg-white npc-default pg-error">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo text-center">
                            <a href="{{ route('login') }}" class="logo-link">
                                <img src="{{ asset('logo/logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content text-center">
                                        <h4 class="nk-block-title">Login</h4>
                                    </div>
                                </div>
                                
                                @include('backend.includes.alerts')

                                <form action="{{ route('authenticate') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email or Username</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control form-control-lg" id="default-01" name="email" placeholder="Enter your email address or username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                            
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password" required>
                                        </div>
                                    </div>
                                    {{-- <a href="{{ route('forgot') }}">Forgot Password?</a> --}}
                                    
                                    <div class="form-group mt-2">
                                        <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                    <center>

                                        <a href="{{ route('frontend.index') }}">Go back to home</a>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.backend.script')
    </body>
</html>