@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Orders', 'url' => route('orders.index')),
        array('name' => 'Edit', 'url' => route('orders.create')),
    ]"/>
    

    {{-- TITLE --}}
    <x-datatable-head title="Edit Order" />

    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('orders.update', ['order' => $order]) }}" class="row" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-6">
                    <x-select name="user_id" label="Customer" :options="$customers"  :is-required="true" :default-value="$order->user_id"/>
                </div>

                <div class="col-6">
                    <x-input name="address" label="Shipping Address" type="text" :is-required="true" :default-value="$order->address"/>
                </div>

                <div class="col-6">
                    <x-input name="contact" label="Contact" type="text" :is-required="true" :default-value="$order->contact"/>
                </div>

                <div class="col-6">
                    <x-input name="shipping_fee" label="Shipping Fee" type="text" :is-required="true" :default-value="$order->shipping_fee"/>
                </div>

                <div class="col-6">
                    <x-select name="is_paid" label="Is Paid" :options="[['id' => 1, 'name' => 'YES'], ['id' => 2, 'name' => 'NO']]"  :is-required="true"  :default-value="$order->payment->is_paid ? 1 : 2"/>
                </div>

                <div class="col-6">
                    <x-input name="proof_of_payment" label="Update Proof of Payment" type="file" />
                </div>


                {{-- <div class="col-6"></div> --}}

                <div class="col-2">
                    <div class="form-group">
                        <button class="btn btn-primary mt-2" type="button" data-bs-toggle="modal" data-bs-target="#order-line-create-modal">Add Product</button>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <table class="table" id="order_line">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($order->products); $i++)
                                <tr>
                                    <td>
                                        <input type="hidden" name="product_ids[]" value="{{ $order->products[$i]->id }}"/>
                                        {{ $order->products[$i]->name }}
                                    </td>
                                    <td>
                                        <input type="hidden" name="product_quantities[]" value="{{ $order->product_quantities[$i] }}"/>
                                        {{ $order->product_quantities[$i] }}
                                    </td>
                                    <td>
                                        <div class="text-center" style="font-size:20px;">
                                            <a href="javascript:void(0);" class="text-danger" onclick="removeProduct(this)">
                                                <i class="icon ni ni-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                            {{-- <tr id="last">
                                <td>
                                    <x-select name="product_ids[]" label="Product" :options="$products"  :is-required="true"/>
                                </td>
                                <td>
                                    <x-input name="product_quantities[]" label="Quantity" type="number" :is-required="true"/>
                                </td>
                                <td>
                                    <div class="text-center mt-4" style="font-size:20px;">
                                        <a href="javascript:void(0);" class="text-danger">
                                            <i class="icon ni ni-trash"></i>
                                        </a>
                                    </div>
                                   
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>

                <div class="col-12 mt-2">
                    <input type="submit" value="Submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


{{-- INVOICE CREATE MODAL --}}
<x-modal id="order-line-create-modal" title="Add Product" footer="Order">
    <form action="#" class="row" method="POST">
        <div class="col-12">
            <x-select name="product_id" label="Product" :options="$products" />
        </div>

        <div class="col-12">
            <x-input name="product_quantity" label="Quantity" type="number" />
        </div>

        <div class="col-12 mt-2">
            <button type="button" class="btn btn-primary" onclick="add()">Add</button>
        </div>
    </form>
</x-modal>

@push('scripts')
    <script>
        var count = parseInt('{{ count($order->products) }}');

        function add() {
            var product_id = $('select[name="product_id"]').val();
            var product_name = $('select[name="product_id"] option:selected').text();
            var product_quantity = $('input[name="product_quantity"]').val();

            if (product_id == '' || product_quantity == '') {
                alert('Please select product and quantity');
                return;
            }

            var html = '<tr id="last">';
            html += '<td>';
            html += '<input type="hidden" name="product_ids[]" value="'+product_id+'">';
            html += product_name;
            html += '</td>';
            html += '<td>';
            html += '<input type="hidden" name="product_quantities[]" value="'+product_quantity+'">';
            html += product_quantity;
            html += '</td>';
            html += '<td>';
            html += '<div class="text-center" style="font-size:20px;">';
            html += '<a href="javascript:void(0);" class="text-danger" onclick="removeProduct(this)">';
            html += '<i class="icon ni ni-trash"></i>';
            html += '</a>';
            html += '</div>';
            html += '</td>';
            html += '</tr>';
            $('#no_product').remove();
            $('#order_line tbody').append(html);
            $('#order-line-create-modal').modal('hide');
            count++;
        }

        function removeProduct(element) {
            $(element).closest('tr').remove();

            count--;

            if (count == 0) {
                var html = '<tr id="no_product">';
                html += '<td colspan="3">No Product ..</td>';
                html += '</tr>';
                $('#order_line tbody').append(html);
            }
        }
    </script>
@endpush