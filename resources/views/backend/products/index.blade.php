@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Products', 'url' => '#'),
    ]"/>

    {{-- TITLE --}}
    <x-datatable-head title="Products" description="You have {{ count($products) }} products"/>
    
    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    {{-- CREATE BUTTON --}}
    <a href="{{ route('products.create') }}"  class="btn btn-primary d-none d-md-inline-flex mb-2"><em class="icon ni ni-plus"></em></a>

    {{-- DATA TABLE --}}
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                {{-- HEAD --}}
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Category</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Price</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Active</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Stock</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                        </th>
                    </tr>
                </thead>
                {{-- BODY --}}
                <tbody>
                    @foreach ($products as $product)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">
                            {{ $product->name }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $product->category->name }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $product->price_formatted }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $product->is_active ? 'Yes' : 'No' }}
                        </td>
                        <td class="nk-tb-col">
                            {{ $product->stocks_total }}
                        </td>
                        <x-datatable-action :items="[
                            array('name' => 'View', 'url' => route('products.show', $product), 'icon'=> 'icon ni ni-eye'),
                            array('name' => 'Edit', 'url' => route('products.edit', $product), 'icon'=> 'icon ni ni-pen'),
                            array('name' => 'Archive', 
                                  'onclick' => 'deleteRecord(' . '`' . route('products.destroy', ['product' => $product]) . '`' .')', 
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