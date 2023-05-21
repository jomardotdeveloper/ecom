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
        {{-- @foreach ($low_on_stock_products as $prod)
        <div class="example-alert">
            <div class="alert alert-danger alert-icon alert-dismissible">
                <em class="icon ni ni-cross-circle"></em> <strong>Warning</strong>! {{ $prod->name }} is running out of stock <button class="close" data-bs-dismiss="alert"></button>
            </div>
        </div>
        @endforeach --}}
        {{-- <div class="col-xxl-4 col-md-4">
            <form class="row" method="POST" action="{{ route('setting') }}">
                @csrf
                <div class="col-10">
                    <x-input name="default_shipping_fee" label="Default Shipping Fee" type="text" :default-value="$default_shipping_fee" :is-required="true"/>
                </div>
                <div class="col-2" style="margin-top:2rem;">
                    <input type="submit" value="Save Changes" class="btn btn-sm btn-primary" />
                </div>
            </form>
        </div> --}}
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
                                <div class="title">Reservations</div>
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
                                <div class="title">Items</div>
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