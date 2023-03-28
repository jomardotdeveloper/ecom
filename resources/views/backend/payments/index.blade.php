@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Payments', 'url' => '#'),
    ]"/>

    {{-- TITLE --}}
    <x-datatable-head title="Payments" description="You have {{ count($payments) }} payments"/>
    
    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    {{-- CREATE BUTTON --}}
    <a href="{{ route('payments.create') }}"  class="btn btn-primary d-none d-md-inline-flex mb-2"><em class="icon ni ni-plus"></em></a>

    {{-- DATA TABLE --}}
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                {{-- HEAD --}}
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">Payment #</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Order #</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Customer</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Date</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Proof of Payment</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Total</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                        </th>
                    </tr>
                </thead>
                {{-- BODY --}}
                <tbody>
                    @foreach ($payments as $payment)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">
                            {{ $payment->formatted_id }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $payment->order->formatted_id }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $payment->order->user->full_name }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $payment->created_at->format('d M Y') }}
                        </td>
                        <td class="nk-tb-col">
                            @if ($payment->proof_of_payment)
                                <a href="{{ $payment->proof_of_payment }}" class="btn btn-primary" target="_blank">View</a>
                            @else
                                <span>No proof of payment</span>
                            @endif
                        </td>
                        <td class="nk-tb-col">
                            {{ $payment->status }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $payment->formatted_amount }}
                        </td>
                        <x-datatable-action :items="[
                            array('name' => 'Edit', 'url' => route('payments.edit', $payment), 'icon'=> 'icon ni ni-pen'),
                            array('name' => 'Delete', 
                                  'onclick' => 'deleteRecord(' . '`' . route('payments.destroy', ['payment' => $payment]) . '`' .')', 
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