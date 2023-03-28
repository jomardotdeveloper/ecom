@extends("layouts.frontend.master")
@section("content")
<x-datatable-head title="Cart" description="You have {{ count($carts) }} items in your cart"/>

<a href="{{ route('frontend.checkout-multiple') }}"  class="btn btn-primary d-none d-md-inline-flex mb-2">Checkout</a>

@include('backend.includes.alerts')
<div class="card card-bordered card-preview">
    <div class="card-inner">
        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
            {{-- HEAD --}}
            <thead>
                <tr class="nk-tb-item nk-tb-head">
                    <th class="nk-tb-col"><span class="sub-text">Product</span></th>
                    <th class="nk-tb-col"><span class="sub-text">Quantity</span></th>
                    <th class="nk-tb-col nk-tb-col-tools text-end">
                    </th>
                </tr>
            </thead>
            {{-- BODY --}}
            <tbody>
                @foreach ($carts as $cart)
                <tr class="nk-tb-item">
                    <td class="nk-tb-col">
                        {{ $cart->product->name }}
                    </td>
                    <td class="nk-tb-col">
                        {{ $cart->quantity }}
                    </td>
                    <x-datatable-action :items="[
                        array('name' => 'Delete', 
                              'onclick' => 'deleteRecord(' . '`' . route('carts.destroy', ['cart' => $cart]) . '`' .')', 
                              'icon'=> 'icon ni ni-trash'),
                    ]"/>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection