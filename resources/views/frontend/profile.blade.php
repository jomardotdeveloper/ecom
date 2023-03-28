@extends("layouts.frontend.master")
@section("content")
<div class="nk-block nk-block-lg">
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