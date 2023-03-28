@extends("layouts.frontend.master")
@section("content")

<div class="card card-bordered card-preview">
    
    <div class="card-inner">
        <h4>Checkout</h4>
        <form action="{{ route('frontend.proceed') }}" class="row" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="product_ids[]" value="{{ $product->id }}">
            <input type="hidden" name="product_quantities[]" value="{{ $quantity }}">

            <div class="col-6">
                <x-input name="address" label="Shipping Address" type="text" :is-required="true"/>
            </div>

            <div class="col-6">
                <x-input name="contact" label="Contact" type="text" :is-required="true"/>
            </div>

            <div class="col-6">
                <x-input name="proof_of_payment" label="Proof of Payment" type="file" :is-required="true"/>
            </div>



            <div class="col-12 mt-2">
                <table class="table" id="order_line">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $quantity  }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <div class="form-group ">
                    <input type="Submit" value="Checkout" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>
</div>

@endsection