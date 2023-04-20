@extends("layouts.frontend.master")
@section("content")

<div class="invoice">
    <div class="invoice-wrap">
        {{-- LOGO --}}
        <div class="invoice-brand text-center">
            <img src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="">
        </div>
        <div class="invoice-head">
            <div class="invoice-contact">
                <span class="overline-title">Customer</span>
                <div class="invoice-contact-info">
                    <h4 class="title">{{ $order->user->full_name }}</h4>
                    <ul class="list-plain">
                        <li><em class="icon ni ni-map-pin-fill"></em><span>{{ $order->address }}</span></li>
                        <li><em class="icon ni ni-call-fill"></em><span>{{ $order->contact }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="invoice-desc">
                <h3 class="title">Order</h3>
                <ul class="list-plain">
                    <li class="invoice-id"><span>Order #</span>: {{ $order->formatted_id }}<span></span></li>
                    <li class="invoice-date"><span>Due Date</span>: {{ $order->created_at->format('d M Y') }}<span></span></li>
                </ul>
            </div>
        </div>
        <div class="invoice-bills">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($order->products); $i++)
                            <tr>
                                <td>
                                    {{ $order->products[$i]->name }}
                                </td>
                                <td>
                                    {{ $order->products[$i]->price_formatted }}
                                </td>
                                <td>
                                    {{ $order->product_quantities[$i] }}
                                </td>
                                <td>
                                    {{ 
                                        "₱ " . number_format( (floatval($order->product_quantities[$i]) * floatval($order->products[$i]->price) ), 2);
                                    }}
                                </td>
                            </tr>
                        @endfor
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Shipping Fee</td>
                            <td> {{  "₱ " . number_format($order->shipping_fee, 2) }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Grand Total</td>
                            <td> {{ $order->total_formatted }}</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid without the signature and seal. </div>
            </div>
        </div>
    </div>
</div>



@endsection