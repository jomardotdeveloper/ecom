@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'My Profile', 'url' => 'javascript:void(0);'),
    ]"/>

    {{-- TITLE --}}
    <x-datatable-head title="My Profile" description=""/>
    
    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            @include('backend.includes.profile')
        </div>
    </div>
</div>

@endsection