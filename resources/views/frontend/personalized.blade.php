@extends("layouts.frontend.master")
@section("content")


<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Personalized your Keyboard</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="row">
        <div class="col-2">
            <div class="form-group">
                <label for="">Do you want it lubed?</label>
                <select name="lubed" id="" class="form-control">
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="">Type of switch</label>
                <select name="type_of_switch" id="" class="form-control">
                    <option value="clacky">Clacky</option>
                    <option value="thocky">Thocky</option>
                </select>
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <button class="btn btn-primary mt-3" id="go">
                    Go
                </button>
            </div>
           
        </div>
       
        

    </div>
</div>
<div class="nk-block">
    <div class="row g-gs">
        @foreach ($products as $product)
        <div class="col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-bordered product-card">
                <div class="product-thumb">
                    <a href="{{ route('frontend.details', ['product' => $product]) }}">
                        <img class="card-img-top" src="{{ $product->image }}" alt="">
                    </a>
                    <ul class="product-badges">
                        {{-- <li><span class="badge bg-success">New</span></li> --}}
                    </ul>
                </div>
                <div class="card-inner text-center">
                    <ul class="product-tags">
                        <li><a href="#">{{ $product->category->name }}</a></li>
                    </ul>
                    <h5 class="product-title"><a href="{{ route('frontend.details', ['product' => $product]) }}">{{ $product->name }}</a></h5>
                    <div class="product-price text-primary h5"> {{ $product->price_formatted }}</div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>

@endsection

@push('script')
    <script>
        $('#go').on('click', function(){
            window.location.href = "{{ route('frontend.personalized') }}" + "?type_of_switch=" + $('select[name="type_of_switch"]').val() + "&lubed=" + $('select[name="lubed"]').val();
        });
    </script>

@endpush