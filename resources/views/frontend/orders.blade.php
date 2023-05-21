@extends("layouts.frontend.master")
@section("content")
<x-datatable-head title="Reservation" description="You have {{ count($orders) }} orders"/>
@include('backend.includes.alerts')
<div class="card card-bordered card-preview">
    <div class="card-inner">
        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
            {{-- HEAD --}}
            <thead>
                <tr class="nk-tb-item nk-tb-head">
                    <th class="nk-tb-col"><span class="sub-text">Reservation #</span></th>
                    <th class="nk-tb-col"><span class="sub-text">Customer</span></th>
                    <th class="nk-tb-col"><span class="sub-text">Date</span></th>
                    <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                    <th class="nk-tb-col"><span class="sub-text">Total</span></th>
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
                    <x-datatable-action :items="[
                        array('name' => 'View', 'url' => route('frontend.vorder', $order), 'icon'=> 'icon ni ni-eye'),
                    ]"/>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection