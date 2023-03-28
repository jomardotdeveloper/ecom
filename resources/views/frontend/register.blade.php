@extends("layouts.frontend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- TITLE --}}
    <x-datatable-head title="Register" description=""/>
    
    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form class="row" method="POST" action="{{ route('frontend.create-account') }}">
                @csrf
                <div class="col-4">
                    <x-input name="first_name" label="First Name" type="text" :is-required="true" />
                </div>
    
                <div class="col-4">
                    <x-input name="middle_name" label="Middle Name" type="text" />
                </div>
    
                <div class="col-4">
                    <x-input name="last_name" label="Last Name" type="text" :is-required="true" />
                </div>
    
                <div class="col-4">
                    <x-input name="email" label="Email" type="email" :is-required="true" />
                </div>

                <div class="col-4">
                    <x-input name="password" label="Password" type="password" :is-required="true" />
                </div>

                <div class="col-4">
                    <x-input name="password_confirmation" label="Confirm Password" type="password" :is-required="true" />
                </div>
                
                <div class="col-6 mt-2">
                    <div class="form-group">
                        <div class="custom-control custom-control-xs custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox" name="terms">
                            <label class="custom-control-label" for="checkbox">I agree to <a href="{{ route('frontend.terms') }}" target="_blank" >Privacy Policy Terms.</a></label>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 mt-2">
                    <input type="submit" value="Submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection