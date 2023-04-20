@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Inventory', 'url' => '#'),
    ]"/>

    {{-- TITLE --}}
    <x-datatable-head title="Transfer" description="You have {{ count($stocks) }} transfers"/>
    
    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    {{-- CREATE BUTTON --}}
    <a href="{{ route('stocks.create') }}"  class="btn btn-primary d-none d-md-inline-flex mb-2"><em class="icon ni ni-plus"></em></a>

    {{-- DATA TABLE --}}
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                {{-- HEAD --}}
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        {{-- <th class="nk-tb-col"><span class="sub-text">ID</span></th> --}}
                        <th class="nk-tb-col"><span class="sub-text">Product</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Quantity</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Operation Type</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                        </th>
                    </tr>
                </thead>
                {{-- BODY --}}
                <tbody>
                    @foreach ($stocks as $stock)
                    <tr class="nk-tb-item">
                        {{-- <td class="nk-tb-col">
                            {{ $stock->id }}
                        </td> --}}
                        <td class="nk-tb-col">
                            {{ $stock->product->name }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $stock->quantity }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $stock->operation_type }}
                        </td>
                        <?php
                        
                            $actions = [
                                    array('name' => 'Edit', 'url' => route('stocks.edit', $stock), 'icon'=> 'icon ni ni-pen'),
                                    array('name' => 'Delete', 
                                        'onclick' => 'deleteRecord(' . '`' . route('stocks.destroy', ['stock' => $stock]) . '`' .')', 
                                        'icon'=> 'icon ni ni-trash'),
                            ];

                            if($stock->is_validated) {
                                $actions = [];
                            }
                        ?>
                        @if ($stock->is_validated)
                        <td class="nk-tb-col nk-tb-col-tools p-2"></td>
                        @else
                        <x-datatable-action :items="$actions"/>
                        @endif
                       
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