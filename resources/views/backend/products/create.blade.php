@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Products', 'url' => route('products.index')),
        array('name' => 'Create', 'url' => route('products.create')),
    ]"/>
    

    {{-- TITLE --}}
    <x-datatable-head title="New Product" />

    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('products.store') }}" class="row" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <x-input name="name" label="Name" type="text" :is-required="true"/>
                </div>

                <div class="col-6">
                    <x-input name="price" label="Price" type="number" :is-required="true"/>
                </div>

                <div class="col-6">
                    <x-select name="category_id" label="Category" :options="$categories"  :is-required="true"/>
                </div>

                <div class="col-6">
                    <x-select name="is_active" label="Is Active" :options="[['id' => 1, 'name' => 'YES'], ['id' => 2, 'name' => 'NO']]"  :is-required="true"/>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                    </div>
                </div>

                <div class="col-6">
                    <x-input name="image" label="Image" type="file" :is-required="true"/>
                </div>

                <div class="col-12 mt-2">
                    <input type="submit" value="Submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection