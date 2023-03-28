@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Customers', 'url' => route('customers.index')),
        array('name' => 'Edit', 'url' => route('customers.create')),
    ]"/>
    

    {{-- TITLE --}}
    <x-datatable-head title="Edit Customer" />

    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('customers.update', ['customer' => $customer]) }}" class="row" method="POST">
                @csrf
                @method('PUT')
                <div class="col-4">
                    <x-input name="first_name" label="First Name" type="text" :is-required="true" :default-value="$customer->first_name"/>
                </div>
                <div class="col-4">
                    <x-input name="middle_name" label="Middle Name" type="text" :default-value="$customer->middle_name"/>
                </div>
                <div class="col-4">
                    <x-input name="last_name" label="Last Name" type="text" :is-required="true" :default-value="$customer->last_name"/>
                </div>
                <div class="col-6">
                    <x-input name="email" label="Email" type="email" :is-required="true" :default-value="$customer->email"/>
                </div>
                <div class="col-12 mt-2">
                    <input type="submit" value="Submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection