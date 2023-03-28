<div class="nk-header-tools">
    <ul class="nk-quick-nav">
        <li class="dropdown user-dropdown order-sm-first">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                <div class="user-toggle">
                    <div class="user-avatar sm">
                        <em class="icon ni ni-user-alt"></em>
                    </div>
                    <div class="user-info d-none d-xl-block">
                        <div class="user-status">Customer</div>
                        <div class="user-name dropdown-indicator">{{ auth()->user()->full_name }}</div>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1 is-light">
                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                    <div class="user-card">
                        <div class="user-avatar">
                            <span>{{ auth()->user()->first_name[0] }}{{ auth()->user()->last_name[0] }} </span>
                        </div>
                        <div class="user-info">
                            <span class="lead-text">{{ auth()->user()->full_name }}</span>
                            <span class="sub-text">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-inner">
                    <ul class="link-list">
                        <li><a href="{{ route('frontend.profile') }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                    </ul>
                </div>
                <div class="dropdown-inner">
                    <ul class="link-list">
                        <li><a href="javascript:void(0);" onclick="logout()"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</div>