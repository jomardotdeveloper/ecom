<!DOCTYPE html>
<html lang="zxx" class="js">

@include('layouts.frontend.head')
<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
        <div class="nk-wrap ">
            <div class="nk-header nk-header-fluid is-theme">
                <div class="container-xl wide-xl">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger me-sm-2 d-lg-none">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a>
                        </div>
                        <div class="nk-header-brand">
                            <a href="{{ route('frontend.index') }}" class="logo-link">
                                <img class="logo-light logo-img" src="{{ asset('logo/logo.png') }}" srcset="{{ asset('logo/logo.png') }} 2x" alt="logo">
                                <img class="logo-dark logo-img" src="{{ asset('logo/logo.png') }}" srcset="{{ asset('logo/logo.png') }} 2x" alt="logo-dark">
                            </a>
                        </div>
                        <div class="nk-header-menu" data-content="headerNav">
                            <div class="nk-header-mobile">
                                <div class="nk-header-brand">
                                    <a href="{{ route('frontend.index') }}" class="logo-link">
                                        <img class="logo-light logo-img" src="{{ asset('logo/logo.png') }}" srcset="{{ asset('logo/logo.png') }} 2x" alt="logo">
                                        <img class="logo-dark logo-img" src="{{ asset('logo/logo.png') }}" srcset="{{ asset('logo/logo.png') }} 2x" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-menu-trigger me-n2">
                                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-arrow-left"></em></a>
                                </div>
                            </div>
                            <ul class="nk-menu nk-menu-main ui-s2">
                                <li class="nk-menu-item">
                                    <a href="{{ route('frontend.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Products</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('frontend.personalized') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Personalized</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('frontend.posts') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Posts</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('frontend.terms') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Terms & Conditions</span>
                                    </a>
                                </li>
                                @auth
                                <li class="nk-menu-item">
                                    <a href="{{ route('carts.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Cart</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('frontend.order') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Orders</span>
                                    </a>
                                </li>
                                @endauth
                                @guest
                                <li class="nk-menu-item">
                                    <a href="{{ route('login') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Login</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('frontend.register') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">Register</span>
                                    </a>
                                </li>
                            
                                @endguest
                                
                                
                            </ul>
                        </div>
                        @auth
                        @include('layouts.frontend.dropdown')    
                        @endauth

                        
                    </div>
                </div>
            </div>
            <div class="nk-content nk-content-fluid">
                <div class="container-xl wide-xl">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}" id="logoutForm">
        @csrf
        {{-- <input type="hidden" name="logout" value="1"> --}}
    </form>
    @include('layouts.frontend.script')
    <script>
        function logout() {
            document.getElementById('logoutForm').submit();
        }

        $(document).ready(function(){
            var menus = $('.nk-menu-item');

            menus.each(function(index, element){
                $(element).removeClass('active');
            });
        });
    </script>

    @stack('script')
</body>

</html>