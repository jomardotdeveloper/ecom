@extends("layouts.frontend.master")
@section("content")
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Posts</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-search"></em>
                                </div>
                                <input type="text" class="form-control" id="search" placeholder="Quick search">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="row g-gs">
        @foreach ($announcements as $announcement)
        <div class="col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-bordered product-card">
                <div class="product-thumb">
                    <a href="{{ route('frontend.post', ['announcement' => $announcement]) }}">
                        <img class="card-img-top" src="{{ $announcement->image }}" alt="">
                    </a>
                    <ul class="product-badges">
                        {{-- <li><span class="badge bg-success">New</span></li> --}}
                    </ul>
                </div>
                <div class="card-inner text-center">
                    <h5 class="product-title"><a href="{{ route('frontend.post', ['announcement' => $announcement]) }}">{{ $announcement->title }}</a></h5>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>

@endsection

@push('script')
    <script>
        $('#search').on('keypress', function(){
            if (event.key === "Enter") {
                window.location.href = "{{ route('frontend.posts') }}?search=" + $(this).val();
            }
        });
    </script>

@endpush