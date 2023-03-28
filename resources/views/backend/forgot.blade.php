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
                                        <h4 class="nk-block-title">Forgot Password</h4>
                                    </div>
                                </div>
                                
                                @include('backend.includes.alerts')
                                <form action="{{ route('send') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control form-control-lg" id="default-01" name="email" placeholder="Enter your email address" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Send Reset Link</button>
                                    </div>
                                </form><!-- form -->
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