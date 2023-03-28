@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Users', 'url' => route('users.index')),
        array('name' => 'Create', 'url' => route('users.create')),
    ]"/>
    

    {{-- TITLE --}}
    <x-datatable-head title="New User" />

    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('users.store') }}" class="row" method="POST">
                @csrf
                <div class="col-4">
                    <x-input name="first_name" label="First Name" type="text" :is-required="true"/>
                </div>
                <div class="col-4">
                    <x-input name="middle_name" label="Middle Name" type="text" />
                </div>
                <div class="col-4">
                    <x-input name="last_name" label="Last Name" type="text" :is-required="true"/>
                </div>
                <div class="col-6">
                    <x-input name="email" label="Email" type="email" :is-required="true"/>
                </div>
                <div class="col-6">
                    <x-input name="password" label="Password" type="password" :is-required="true"/>
                </div>
                <div class="col-6">
                    <x-input name="password_confirmation" label="Confirm Password" type="password" :is-required="true"/>
                </div>
                <div class="col-12 mt-2">
                    <input type="submit" value="Submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection