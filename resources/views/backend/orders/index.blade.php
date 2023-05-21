@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Reservations', 'url' => '#'),
    ]"/>

    {{-- TITLE --}}
    <x-datatable-head title="Reservations" description="You have {{ count($orders) }} orders"/>
    
    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    {{-- CREATE BUTTON --}}
    <a href="{{ route('orders.create') }}"  class="btn btn-primary d-none d-md-inline-flex mb-2"><em class="icon ni ni-plus"></em></a>

    {{-- DATA TABLE --}}
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                {{-- HEAD --}}
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">Reservation #</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Customer</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Date</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Total</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Proof of Payment</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                        </th>
                    </tr>
                </thead>
                {{-- BODY --}}
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">
                            {{ $order->formatted_id }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $order->user->full_name }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $order->created_at->format('d M Y') }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $order->status }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $order->total_formatted }}
                        </td>
                        <td class="nk-tb-col">
                            @if ($order->payment->proof_of_payment)
                                <a href="{{ $order->payment->proof_of_payment }}" class="btn btn-primary" target="_blank">View</a>
                            @else
                                <span>No proof of payment</span>
                            @endif
                        </td>
                        <x-datatable-action :items="[
                            array('name' => 'View', 'url' => route('orders.show', $order), 'icon'=> 'icon ni ni-eye'),
                            array('name' => 'Edit', 'url' => route('orders.edit', $order), 'icon'=> 'icon ni ni-pen'),
                            array('name' => 'Delete', 
                                  'onclick' => 'deleteRecord(' . '`' . route('orders.destroy', ['order' => $order]) . '`' .')', 
                                  'icon'=> 'icon ni ni-trash'),
                        ]"/>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- END OF DATATABLE --}}
</div>
@endsection
@push('scripts')
<script src="{{ asset('backend/assets/js/libs/datatable-btns.js?ver=3.0.0') }}"></script>
@endpush