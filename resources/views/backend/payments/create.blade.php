@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Payments', 'url' => route('payments.index')),
        array('name' => 'Create', 'url' => route('payments.create')),
    ]"/>
    

    {{-- TITLE --}}
    <x-datatable-head title="New Payment" />

    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('payments.store') }}" class="row" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="col-6">
                    <x-select name="order_id" label="Order" :options="$orders"  :is-required="true"/>
                </div>

                <div class="col-6">
                    <x-input name="amount" label="Amount" type="number" :is-required="true"/>
                </div>

                <div class="col-6">
                    <x-select name="is_paid" label="Is Paid" :options="[['id' => 1, 'name' => 'YES'], ['id' => 2, 'name' => 'NO']]"  :is-required="true"/>
                </div>

                <div class="col-6">
                    <x-input name="proof_of_payment" label="Proof of Payment" type="file" />
                </div>



                <div class="col-12 mt-2">
                    <input type="submit" value="Submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection