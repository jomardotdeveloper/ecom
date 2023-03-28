@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Categories', 'url' => route('categories.index')),
        array('name' => 'Create', 'url' => route('categories.create')),
    ]"/>
    

    {{-- TITLE --}}
    <x-datatable-head title="New Category" />

    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('categories.store') }}" class="row" method="POST">
                @csrf
                <div class="col-6">
                    <x-input name="name" label="Name" type="text" :is-required="true"/>
                </div>

                <div class="col-12 mt-2">
                    <input type="submit" value="Submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection