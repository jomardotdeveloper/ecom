@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Dashboard', 'url' => '#'),
    ]"/>

    {{-- TITLE --}}
    <x-datatable-head title="Dashboard" description=""/>

    <div class="row g-gs">
        <div class="col-xxl-12 col-md-12">
            <div class="card h-100">
                <div class="card-inner">
                    <div class="card-title-group mb-2">
                        <div class="card-title">
                            <h6 class="title">Metrics</h6>
                        </div>
                    </div>
                    <ul class="nk-store-statistics">
                        <li class="item">
                            <div class="info">
                                <div class="title">Orders</div>
                                <div class="count">{{ $number_of_orders }}</div>
                            </div>
                            <em class="icon bg-primary-dim ni ni-bag"></em>
                        </li>
                        <li class="item">
                            <div class="info">
                                <div class="title">Customers</div>
                                <div class="count">{{ $number_of_customers }}</div>
                            </div>
                            <em class="icon bg-info-dim ni ni-users"></em>
                        </li>
                        <li class="item">
                            <div class="info">
                                <div class="title">Products</div>
                                <div class="count">{{ $number_of_products }}</div>
                            </div>
                            <em class="icon bg-pink-dim ni ni-box"></em>
                        </li>
                        <li class="item">
                            <div class="info">
                                <div class="title">Categories</div>
                                <div class="count">{{ $number_of_categories }}</div>
                            </div>
                            <em class="icon bg-purple-dim ni ni-server"></em>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection