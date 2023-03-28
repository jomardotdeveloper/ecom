@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'Settings', 'url' => 'javascript:void(0);'),
        array('name' => 'Posts', 'url' => route('announcements.index')),
        array('name' => 'Create', 'url' => route('announcements.create')),
    ]"/>
    

    {{-- TITLE --}}
    <x-datatable-head title="New Post" />

    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('announcements.store') }}" class="row" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="col-6">
                    <x-input name="title" label="Title" type="text" :is-required="true"/>
                </div>

                <div class="col-6">
                    <x-input name="image" label="Image" type="file" :is-required="true"/>
                </div>

                <div class="col-6">
                    <x-select name="is_promotion" label="Is Promotion" :options="[['id' => 1, 'name' => 'YES'], ['id' => 2, 'name' => 'NO']]"  :is-required="true"/>
                </div>

                <div class="col-12 mt-2">
                    <textarea class="tinymce-basic form-control" name="description">Hello, World!</textarea>
                </div>



                <div class="col-12 mt-2">
                    <input type="submit" value="Submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<link rel="stylesheet" href="{{ asset('backend/assets/css/editors/tinymce.css?ver=3.0.0') }}">
<script src="{{ asset('backend/assets/js/libs/editors/tinymce.js?ver=3.0.0') }}"></script>
<script src="{{ asset('backend/assets/js/editors.js?ver=3.0.0') }}"></script>
@endpush
