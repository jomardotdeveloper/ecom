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
                                        <h4 class="nk-block-title">Reset Password</h4>
                                    </div>
                                </div>
                                
                                @include('backend.includes.alerts')

                                @if ($linkIsValid)
                                <form action="{{ route('reset-password') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $_GET['email'] }}">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="password" class="form-control form-control-lg" id="default-01" name="password" placeholder="Enter your new password" required>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Confirm Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="password" class="form-control form-control-lg" id="default-01" name="password_confirmation" placeholder="Enter again" required>
                                        </div>

                                        
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Send Reset Link</button>
                                    </div>
                                </form><!-- form -->
                                @else
                                <div class="alert alert-danger">
                                    <p>Link is invalid or expired</p>
                                </div>
                                @endif
                                
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