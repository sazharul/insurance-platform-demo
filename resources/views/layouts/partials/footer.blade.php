@php
    use Rakibhstu\Banglanumber\NumberToBangla;

    $numto = new NumberToBangla();
@endphp
<section class="main_footer_section">
    <div class="container">
        {{--        <div class="row"> --}}
        {{--            <div class="col-md-12"> --}}
        {{--                <div class="footer_news_letter"> --}}
        {{--                    <h2>Newsletter</h2> --}}
        {{--                    <p>Be the first one to know  about discounts, offers and events weekly <br> in your mailbox. Unsubscribe whenever you like with one click.</p> --}}
        {{--                    <div class="email_input"> --}}
        {{--                        <input type="text" placeholder="Enter your email"> --}}
        {{--                        <img src="{{ asset('images/icon/sms_send_icon.png') }}" alt=""> --}}
        {{--                        <button>Submit</button> --}}
        {{--                    </div> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </div> --}}

        @php
            $footer_content = App\Models\HomePage::first();
        @endphp
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer_main_list">
                    <img src="{{ asset($footer_content->footer_logo) }}" alt="">
                    <p>{{ $footer_content->{app()->getLocale() . '_footer_logo_description'} }}</p>
                    <a href="{{ $footer_content->play_store_link }}"><img
                            src="{{ asset($footer_content->play_store_icon) }}" alt=""></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="footer_main_list">
                    <img src="{{ asset('images/location_large_white.png') }}" alt="">
                    <p> {{ $footer_content->{app()->getLocale() . '_location'} }} <br>
                        {{ __('PABX') }} : {{ eng_to_bng($footer_content->footer_pabx) }} <br>
                        {{ __('Hotline') }} : {{ eng_to_bng($footer_content->footer_hotline) }} </p>
                    <img src="{{ asset('images/icon/email_large_icon.png') }}" alt="">
                    <p class="email_font_size">{{ $footer_content->email }}</p>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="footer_main_list">
                    <h2>{{ $footer_content->{app()->getLocale() . '_foot_product'} }}</h2>
                    <a href="{{ route('ps.productAndService') }}">
                        {{ $footer_content->{app()->getLocale() . '_foot_product_list1'} }} </a>
                    <a href="{{ route('ps.marine_cargo_insurance') }}">
                        {{ $footer_content->{app()->getLocale() . '_foot_product_list2'} }} </a>
                    <a href="{{ route('ps.motor_insurance') }}">
                        {{ $footer_content->{app()->getLocale() . '_foot_product_list3'} }} </a>
                    <a href="{{ route('ps.miscellaneous.insurance.details') }}">
                        {{ $footer_content->{app()->getLocale() . '_foot_product_list4'} }} </a>
                    <a href="{{ route('ps.engineering.insurance.details') }}">
                        {{ $footer_content->{app()->getLocale() . '_foot_product_list5'} }} </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer_main_list">
                    <h2> {{ $footer_content->{app()->getLocale() . '_foot_about'} }} </h2>
                    <a href="{{ route('company_profile') }}">
                        {{ $footer_content->{app()->getLocale() . '_foot_about_list1'} }} </a>
                    <a href="{{ route('mission_vission') }}">
                        {{ $footer_content->{app()->getLocale() . '_foot_about_list2'} }} </a>
                    <a href="{{ route('ir.code_of_conduct') }}">
                        {{ $footer_content->{app()->getLocale() . '_foot_about_list3'} }} </a>
                    <a href="{{ route('ps.underwriting') }}">
                        {{ $footer_content->{app()->getLocale() . '_foot_about_list4'} }} </a>
                    <a href="{{ route('ps.claim') }}">
                        {{ $footer_content->{app()->getLocale() . '_foot_about_list5'} }} </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="footer_main_list">
                    <h2> {{ $footer_content->{app()->getLocale() . '_foot_legal'} }} </h2>
                    <a href="{{ route('privacyPolicy') }}"> {{ $footer_content->{app()->getLocale() . '_foot_legal_list1'} }}
                    </a>
                    <a href="javascript:void(0)"> {{ $footer_content->{app()->getLocale() . '_foot_legal_list2'} }}
                    </a>
                </div>
            </div>
{{--            <img src="{{ asset('ssl.jpg') }}" alt="">--}}
        </div>
    </div>
</section>

<section class="footer_bottom_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="footer_bottom_left">
                    <p> {{ $footer_content->{app()->getLocale() . '_all_rights_reserved'} }} </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="footer_bottom_right">
                    <a href="http://wiztecbd.com/" target="_blank">Developed by : <b>Wizard Software & Technology
                            Bangladesh ltd.</b></a>
                </div>
            </div>
        </div>
    </div>
</section>
