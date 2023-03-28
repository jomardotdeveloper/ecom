@extends("layouts.frontend.master")
@section("content")

<div class="card card-bordered card-preview">
    
    <div class="card-inner">
        <h4>Checkout</h4>
        <form action="{{ route('frontend.proceed') }}?is_cart=true" class="row" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="is_cart" value="true" />
            @foreach ($carts as $cart)
                <input type="hidden" name="product_ids[]" value="{{ $cart->product_id }}">
                <input type="hidden" name="product_quantities[]" value="{{ $cart->quantity }}">
            @endforeach
            

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
                        
                            @foreach ($carts as $cart)
                            <tr>
                                <td>{{ $cart->product->name }}</td>
                                <td>{{ $cart->quantity  }}</td>  
                            </tr>
                            @endforeach
                             
                        
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