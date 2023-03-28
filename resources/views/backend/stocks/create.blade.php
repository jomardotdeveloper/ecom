@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Inventory', 'url' => route('stocks.index')),
        array('name' => 'Create', 'url' => route('stocks.create')),
    ]"/>
    

    {{-- TITLE --}}
    <x-datatable-head title="New Transfer" />

    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('stocks.store') }}" class="row" method="POST">
                @csrf
                <div class="col-6">
                    <x-select name="product_id" label="Product" :options="$products"  :is-required="true"/>
                </div>

                <div class="col-6">
                    <x-select name="is_validated" label="Is Validated" :options="[['id' => 1, 'name' => 'YES'], ['id' => 2, 'name' => 'NO']]"  :is-required="true"/>
                </div>

                <div class="col-6">
                    <x-select name="is_return" label="Is Return" :options="[['id' => 1, 'name' => 'YES'], ['id' => 2, 'name' => 'NO']]"  :is-required="true"/>
                </div>

                <div class="col-6">
                    <x-input name="quantity" label="Quantity" type="number" :is-required="true"/>
                </div>

                <div class="col-12 mt-2">
                    <input type="submit" value="Submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection