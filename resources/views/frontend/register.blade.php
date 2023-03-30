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
                            <label class="custom-control-label" for="checkbox">I agree to <a class="text-primary" data-bs-toggle="modal" data-bs-target="#modalLarge">Privacy Policy Terms.</a></label>
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
<div class="modal fade" tabindex="-1" id="modalLarge">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terms & Conditions</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <div class="entry">
                    <h3>Terms and Conditions</h3>
                    <p>Greetings! Welcome to Kurdtbro Switches, a website that provides modded mechanical keyboard switches for the community. Kindly carefully read our terms and conditions since these are what establish the terms of your interaction with us and governs the use of our website. By registering, you are obliged to follow the terms and conditions of our website, if you do not agree with any of the terms and conditions, please do not proceed with the registration.</p>
                    <h4>Introduction</h4>
                    <p>Our website is operated and owned by Kurdtbro Switches. Our website allows customers to buy keyboard switches and products related online. By using our website, you are obliged to agree by these terms and conditions.</p>
                  
                    <h4>Registration</h4>
                    <p>To be able to browse and purchase products provided in our website, signing-up or registration of an account is required. In the process, you will be required to give personal information. You agree to be fully responsible for the activities that will occur under your account and that all information provided while registering are complete and accurate.</p>
                    <h4>Ordering</h4>
                    <p>When placing an order on our website, you may be required to provide additional personal data such as your shipping address and payment information. By placing an order, you consent to the collection, use, and disclosure of this personal data as necessary to process and fulfill your order.</p>
                    
                    <h4>Payment</h4>
                    <p>We use the third-party payment processor known as Gcash to process payments for orders placed on our website. Your payment information will be collected and processed by these third-party payment processors, and we do not have access to your full payment information. However, we may receive confirmation of your payment from the payment processor in order to process and fulfill your order.</p>
                    <h4>Delivery</h4>
                    <p>We may share your personal data with third-party shipping providers in order to fulfill and deliver your order. This may include sharing your shipping address and contact information. We will only share the minimum necessary personal data with these third-party providers in order to fulfill and deliver your order.</p>
                    <h4>Data Privacy</h4>
                    <p>Kurdtbro Switches respects our users' privacy and is committed to protecting their personal data. This section of the terms and conditions sets our policies and procedures for collecting, using, and disclosing your personal data in connection with your use of our website.</p>
                    <h4>Data Collection and Use</h4>
                    <p>When you register for an account on our website or place an order in Kurdtbro Switches, we may collect personal data such as the user's name, email address, shipping address, and payment information. This personal data is collected to process and fulfill your order. </p>
                    <h4>Data Disclosure</h4>
                    <p>Kurdtbro Switches may share your personal data with third-party service providers such as payment processors and shipping providers in order to process and fulfill your order. </p>
                    <h4>Data Retention</h4>
                    <p>Kurdtbro Switches will only retain your personal data for as long as necessary to fulfill the purposes for which it was collected, including for the purposes of processing and fulfilling your order.</p>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">Terms and Conditions</span>
            </div>
        </div>
    </div>
</div>

@endsection

