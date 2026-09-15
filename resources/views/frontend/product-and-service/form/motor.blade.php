@extends('frontend.layouts.master')
@section('title', $calculator->en_name)

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $calculator->{app()->getLocale() . '_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ __('Products & Services') }}</span> / <span
                        class="text-success fw-bold">{{ $calculator->{app()->getLocale() . '_name'} }}</span></h6>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">

            <div class="row mt-5 mb-5">
                @if ($calculator->notice != null)
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger">
                                {!! $calculator->notice !!}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="fire_container pb-5">
                    <div class="fire_container_content">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('calculation.invoice') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="contact_area calculator_submit">
                                        <div class="row">
                                            <div class="text-center">
                                                <h1>{{ __('Insured Personal Information') }}</h1>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured Full Name') }}*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ __('Insured Full Name') }}*"
                                                           name="insured_full_name"
                                                           value="{{ $order->insured_full_name ?? '' }}" aria-label="Username"
                                                           required>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input_field">
                                                    <label for="">{{ __('NID Number') }}*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ __('NID Number') }}*" name="insured_nid"
                                                           value="{{ $order->insured_nid ?? '' }}" aria-label="Username"
                                                           required>

                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured Permanent Address') }}*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ __('Insured Permanent Address') }}*"
                                                           name="insured_permanent_address"
                                                           value="{{ $order->insured_permanent_address ?? '' }}"
                                                           aria-label="Username" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured Permanent City') }}*</label>
                                                    <select class="form-select form-select-lg mb-3"
                                                            aria-label=".form-select-lg example" name="insured_permanent_city"
                                                            required>
                                                        <option value="">{{ __('Insured City') }}</option>
                                                        @foreach ($insured_city as $city)
                                                            <option value="{{ $city->id }}"
                                                                {{ isset($order) && $order->insured_permanent_city == $city->id ? 'selected' : '' }}>
                                                                {{ $city->{app()->getLocale() . '_name'} }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured Present Address') }}*</label>
                                                    <input type="text" class="form-control"
                                                           name="insured_present_address"
                                                           placeholder="{{ __('Insured Present Address') }}*"
                                                           aria-label="Username" required
                                                           value="{{ $order->insured_present_address ?? '' }}">

                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="input_field">
                                                    <label for="">
                                                        <div class="d-flex justify-content-start">
                                                            <span>{{ __('Insured Mailing Address') }}</span> <span
                                                                class="me-4">*</span>
                                                            <span class="me-1"><input type="checkbox"
                                                                                      onchange="toggleMailingAddress(this)"> </span>
                                                            <span>Same as present
                                                                address</span>
                                                        </div>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           name="insured_mailing_address"
                                                           placeholder="{{ __('Insured Mailing Address') }}*"
                                                           aria-label="Username" required
                                                           value="{{ $order->insured_mailing_address ?? '' }}">

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured City') }}*</label>
                                                    <select class="form-select form-select-lg mb-3"
                                                            aria-label=".form-select-lg example" name="insured_mailing_city"
                                                            required>
                                                        <option value="">{{ __('Insured City') }}</option>
                                                        @foreach ($insured_city as $city)
                                                            <option value="{{ $city->id }}"
                                                                {{ isset($order) && $order->insured_mailing_city == $city->id ? 'selected' : '' }}>
                                                                {{ $city->{app()->getLocale() . '_name'} }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="input_field">
                                                    <label for="">{{ __('Mobile Number') }}*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ __('Mobile Number') }}*"
                                                           name="insured_mobile_number"
                                                           value="{{ $order->insured_mobile_number ?? '' }}"
                                                           aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured E-mail Address') }}*</label>
                                                    <input type="text" class="form-control"
                                                           name="insured_email_address"
                                                           value="{{ $order->insured_email_address ?? '' }}"
                                                           placeholder="{{ __('Insured E-mail Address') }}*"
                                                           aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured Occupation') }}</label>
                                                    <input type="text" class="form-control" name="insured_occupation"
                                                           value="{{ $order->insured_occupation ?? '' }}"
                                                           placeholder="{{ __('Insured\'s Occupation') }}*"
                                                           aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured Passport Number') }}</label>
                                                    <input type="text" class="form-control"
                                                           name="insured_passport_number"
                                                           value="{{ $order->insured_passport_number ?? '' }}"
                                                           placeholder="{{ __('Insured Passport Number') }}*"
                                                           aria-label="Username">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- calculator --}}
                                    <input type="hidden" name="calculator_id" value="{{ $calculator->id }}">
                                    <input type="hidden" name="total_amount"
                                           value="{{ $request_all['total_amount'] ?? $total_premium }}">
                                    <input type="hidden" name="net_premium"
                                           value="{{ $request_all['net_premium'] ?? $net_premium }}">
                                    <input type="hidden" name="vat"
                                           value="{{ $request_all['vat'] ?? $vat_amount }}">
                                    <input type="hidden" name="dob" value="{{ $request_all['dob'] ?? null }}">
                                    <input type="hidden" name="capacity_id"
                                           value="{{ $request_all['capacity_id'] ?? null }}">
                                    <input type="hidden" name="stamp_charge"
                                           value="{{ $request_all['stamp_charge'] ?? '' }}">
                                    <input type="hidden" name="insured_amount"
                                           value="{{ $request_all['insured_amount']??session('motor')['vehicle_price'] }}">

                                    <input type="hidden" name="insurance_sub_type_id"
                                           value="{{ $request_all['insurance_sub_type_id'] ?? null }}">
                                    <input type="hidden" name="teriff_code"
                                           value="{{ $request_all['teriff_code'] ?? $tariff->teriff_code }}">
                                    <input type="hidden" name="user_visit_country"
                                           value="{{ $request_all['user_visit_country'] ?? null }}">
                                    <input type="hidden" name="user_date_of_departure"
                                           value="{{ $request_all['user_date_of_departure'] ?? null }}">
                                    <input type="hidden" name="user_return_date"
                                           value="{{ $request_all['user_return_date'] ?? null }}">
                                    <input type="hidden" name="policy_start_date"
                                           value="{{ $request_all['policy_start_date'] ?? session('motor')['policy_start_date'] }}">

                                    <div class="contact_area calculator_submit">
                                        <div class="row">
                                            <div class="text-center">
                                                <h1>{{ __('Vehicle Information') }}</h1>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="input_field">
                                                    <label for="">{{ __('Vehicle Brand/Make') }}*</label>
                                                    <input type="text" class="form-control"
                                                           name="motor_vehicle_brand_make" placeholder="" required
                                                           value="{{ $order->motor_vehicle_brand_make ?? '' }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="input_field">
                                                    <label for="">{{ __('Year Of Manufacture  ') }}*</label>
                                                    <input type="text" class="form-control"
                                                           name="motor_year_of_manufacture" placeholder="" required
                                                           value="{{ $order->motor_year_of_manufacture ?? '' }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3">
                                                <div class="input_field">
                                                    <label for="">{{ __('Registration Number ') }}*</label>
                                                    <select class="form-control" name="motor_metro" required>
                                                        <option value="0" disabled selected>Select (Metro)</option>
                                                        <option value="Bagerhat"
                                                            {{ isset($order) && $order->motor_metro == 'Bagerhat' ? 'selected' : '' }}>
                                                            Bagerhat
                                                        </option>
                                                        <option value="Bandarban"
                                                            {{ isset($order) && $order->motor_metro == 'Bandarban' ? 'selected' : '' }}>
                                                            Bandarban
                                                        </option>
                                                        <option value="Barguna"
                                                            {{ isset($order) && $order->motor_metro == 'Barguna' ? 'selected' : '' }}>
                                                            Barguna
                                                        </option>
                                                        <option value="Barisal"
                                                            {{ isset($order) && $order->motor_metro == 'Barisal' ? 'selected' : '' }}>
                                                            Barisal
                                                        </option>
                                                        <option value="Bhola"
                                                            {{ isset($order) && $order->motor_metro == 'Bhola' ? 'selected' : '' }}>
                                                            Bhola
                                                        </option>
                                                        <option value="Bogra"
                                                            {{ isset($order) && $order->motor_metro == 'Bogra' ? 'selected' : '' }}>
                                                            Bogra
                                                        </option>
                                                        <option value="Brahmanbaria"
                                                            {{ isset($order) && $order->motor_metro == 'Brahmanbaria' ? 'selected' : '' }}>
                                                            Brahmanbaria
                                                        </option>
                                                        <option value="Chandpur"
                                                            {{ isset($order) && $order->motor_metro == 'Chandpur' ? 'selected' : '' }}>
                                                            Chandpur
                                                        </option>
                                                        <option value="Chittagong"
                                                            {{ isset($order) && $order->motor_metro == 'Chittagong' ? 'selected' : '' }}>
                                                            Chittagong
                                                        </option>
                                                        <option value="Chuadanga"
                                                            {{ isset($order) && $order->motor_metro == 'Chuadanga' ? 'selected' : '' }}>
                                                            Chuadanga
                                                        </option>
                                                        <option value="Comilla"
                                                            {{ isset($order) && $order->motor_metro == 'Comilla' ? 'selected' : '' }}>
                                                            Comilla
                                                        </option>
                                                        <option value="Coxs Bazar"
                                                            {{ isset($order) && $order->motor_metro == 'Coxs Bazar' ? 'selected' : '' }}>
                                                            Cox's Bazar
                                                        </option>
                                                        <option value="Dhaka"
                                                            {{ isset($order) && $order->motor_metro == 'Dhaka' ? 'selected' : '' }}>
                                                            Dhaka
                                                        </option>
                                                        <option value="Dinajpur"
                                                            {{ isset($order) && $order->motor_metro == 'Dinajpur' ? 'selected' : '' }}>
                                                            Dinajpur
                                                        </option>
                                                        <option value="Faridpur"
                                                            {{ isset($order) && $order->motor_metro == 'Faridpur' ? 'selected' : '' }}>
                                                            Faridpur
                                                        </option>
                                                        <option value="Feni"
                                                            {{ isset($order) && $order->motor_metro == 'Feni' ? 'selected' : '' }}>
                                                            Feni
                                                        </option>
                                                        <option value="Gaibandha"
                                                            {{ isset($order) && $order->motor_metro == 'Gaibandha' ? 'selected' : '' }}>
                                                            Gaibandha
                                                        </option>
                                                        <option value="Gazipur"
                                                            {{ isset($order) && $order->motor_metro == 'Gazipur' ? 'selected' : '' }}>
                                                            Gazipur
                                                        </option>
                                                        <option value="Gopalganj"
                                                            {{ isset($order) && $order->motor_metro == 'Gopalganj' ? 'selected' : '' }}>
                                                            Gopalganj
                                                        </option>
                                                        <option value="Habiganj"
                                                            {{ isset($order) && $order->motor_metro == 'Habiganj' ? 'selected' : '' }}>
                                                            Habiganj
                                                        </option>
                                                        <option value="Jamalpur"
                                                            {{ isset($order) && $order->motor_metro == 'Jamalpur' ? 'selected' : '' }}>
                                                            Jamalpur
                                                        </option>
                                                        <option value="Jessore"
                                                            {{ isset($order) && $order->motor_metro == 'Jessore' ? 'selected' : '' }}>
                                                            Jessore
                                                        </option>
                                                        <option value="Jhalokati"
                                                            {{ isset($order) && $order->motor_metro == 'Jhalokati' ? 'selected' : '' }}>
                                                            Jhalokati
                                                        </option>
                                                        <option value="Jhenaidah"
                                                            {{ isset($order) && $order->motor_metro == 'Jhenaidah' ? 'selected' : '' }}>
                                                            Jhenaidah
                                                        </option>
                                                        <option value="Joypurhat"
                                                            {{ isset($order) && $order->motor_metro == 'Joypurhat' ? 'selected' : '' }}>
                                                            Joypurhat
                                                        </option>
                                                        <option value="Khagrachhari"
                                                            {{ isset($order) && $order->motor_metro == 'Khagrachhari' ? 'selected' : '' }}>
                                                            Khagrachhari
                                                        </option>
                                                        <option value="Khulna"
                                                            {{ isset($order) && $order->motor_metro == 'Khulna' ? 'selected' : '' }}>
                                                            Khulna
                                                        </option>
                                                        <option value="Kishoreganj"
                                                            {{ isset($order) && $order->motor_metro == 'Kishoreganj' ? 'selected' : '' }}>
                                                            Kishoreganj
                                                        </option>
                                                        <option value="Kurigram"
                                                            {{ isset($order) && $order->motor_metro == 'Kurigram' ? 'selected' : '' }}>
                                                            Kurigram
                                                        </option>
                                                        <option value="Kushtia"
                                                            {{ isset($order) && $order->motor_metro == 'Kushtia' ? 'selected' : '' }}>
                                                            Kushtia
                                                        </option>
                                                        <option value="Lakshmipur"
                                                            {{ isset($order) && $order->motor_metro == 'Lakshmipur' ? 'selected' : '' }}>
                                                            Lakshmipur
                                                        </option>
                                                        <option value="Lalmonirhat"
                                                            {{ isset($order) && $order->motor_metro == 'Lalmonirhat' ? 'selected' : '' }}>
                                                            Lalmonirhat
                                                        </option>
                                                        <option value="Madaripur"
                                                            {{ isset($order) && $order->motor_metro == 'Madaripur' ? 'selected' : '' }}>
                                                            Madaripur
                                                        </option>
                                                        <option value="Magura"
                                                            {{ isset($order) && $order->motor_metro == 'Magura' ? 'selected' : '' }}>
                                                            Magura
                                                        </option>
                                                        <option value="Manikganj"
                                                            {{ isset($order) && $order->motor_metro == 'Manikganj' ? 'selected' : '' }}>
                                                            Manikganj
                                                        </option>
                                                        <option value="Meherpur"
                                                            {{ isset($order) && $order->motor_metro == 'Meherpur' ? 'selected' : '' }}>
                                                            Meherpur
                                                        </option>
                                                        <option value="Moulvibazar"
                                                            {{ isset($order) && $order->motor_metro == 'Moulvibazar' ? 'selected' : '' }}>
                                                            Moulvibazar
                                                        </option>
                                                        <option value="Munshiganj"
                                                            {{ isset($order) && $order->motor_metro == 'Munshiganj' ? 'selected' : '' }}>
                                                            Munshiganj
                                                        </option>
                                                        <option value="Mymensingh"
                                                            {{ isset($order) && $order->motor_metro == 'Mymensingh' ? 'selected' : '' }}>
                                                            Mymensingh
                                                        </option>
                                                        <option value="Naogaon"
                                                            {{ isset($order) && $order->motor_metro == 'Naogaon' ? 'selected' : '' }}>
                                                            Naogaon
                                                        </option>
                                                        <option value="Narail"
                                                            {{ isset($order) && $order->motor_metro == 'Narail' ? 'selected' : '' }}>
                                                            Narail
                                                        </option>
                                                        <option value="Narayanganj"
                                                            {{ isset($order) && $order->motor_metro == 'Narayanganj' ? 'selected' : '' }}>
                                                            Narayanganj
                                                        </option>
                                                        <option value="Narsingdi"
                                                            {{ isset($order) && $order->motor_metro == 'Narsingdi' ? 'selected' : '' }}>
                                                            Narsingdi
                                                        </option>
                                                        <option value="Natore"
                                                            {{ isset($order) && $order->motor_metro == 'Natore' ? 'selected' : '' }}>
                                                            Natore
                                                        </option>
                                                        <option value="Nawabganj"
                                                            {{ isset($order) && $order->motor_metro == 'Nawabganj' ? 'selected' : '' }}>
                                                            Nawabganj
                                                        </option>
                                                        <option value="Netrakona"
                                                            {{ isset($order) && $order->motor_metro == 'Netrakona' ? 'selected' : '' }}>
                                                            Netrakona
                                                        </option>
                                                        <option value="Nilphamari"
                                                            {{ isset($order) && $order->motor_metro == 'Nilphamari' ? 'selected' : '' }}>
                                                            Nilphamari
                                                        </option>
                                                        <option value="Noakhali"
                                                            {{ isset($order) && $order->motor_metro == 'Noakhali' ? 'selected' : '' }}>
                                                            Noakhali
                                                        </option>
                                                        <option value="Pabna"
                                                            {{ isset($order) && $order->motor_metro == 'Pabna' ? 'selected' : '' }}>
                                                            Pabna
                                                        </option>
                                                        <option value="Panchagarh"
                                                            {{ isset($order) && $order->motor_metro == 'Panchagarh' ? 'selected' : '' }}>
                                                            Panchagarh
                                                        </option>
                                                        <option value="Patuakhali"
                                                            {{ isset($order) && $order->motor_metro == 'Patuakhali' ? 'selected' : '' }}>
                                                            Patuakhali
                                                        </option>
                                                        <option value="Pirojpur"
                                                            {{ isset($order) && $order->motor_metro == 'Pirojpur' ? 'selected' : '' }}>
                                                            Pirojpur
                                                        </option>
                                                        <option value="Rajbari"
                                                            {{ isset($order) && $order->motor_metro == 'Rajbari' ? 'selected' : '' }}>
                                                            Rajbari
                                                        </option>
                                                        <option value="Rajshahi"
                                                            {{ isset($order) && $order->motor_metro == 'Rajshahi' ? 'selected' : '' }}>
                                                            Rajshahi
                                                        </option>
                                                        <option value="Rangamati"
                                                            {{ isset($order) && $order->motor_metro == 'Rangamati' ? 'selected' : '' }}>
                                                            Rangamati
                                                        </option>
                                                        <option value="Rangpur"
                                                            {{ isset($order) && $order->motor_metro == 'Rangpur' ? 'selected' : '' }}>
                                                            Rangpur
                                                        </option>
                                                        <option value="Satkhira"
                                                            {{ isset($order) && $order->motor_metro == 'Satkhira' ? 'selected' : '' }}>
                                                            Satkhira
                                                        </option>
                                                        <option value="Shariatpur"
                                                            {{ isset($order) && $order->motor_metro == 'Shariatpur' ? 'selected' : '' }}>
                                                            Shariatpur
                                                        </option>
                                                        <option value="Sherpur"
                                                            {{ isset($order) && $order->motor_metro == 'Sherpur' ? 'selected' : '' }}>
                                                            Sherpur
                                                        </option>
                                                        <option value="Sirajganj"
                                                            {{ isset($order) && $order->motor_metro == 'Sirajganj' ? 'selected' : '' }}>
                                                            Sirajganj
                                                        </option>
                                                        <option value="Sunamganj"
                                                            {{ isset($order) && $order->motor_metro == 'Sunamganj' ? 'selected' : '' }}>
                                                            Sunamganj
                                                        </option>
                                                        <option value="Sylhet"
                                                            {{ isset($order) && $order->motor_metro == 'Sylhet' ? 'selected' : '' }}>
                                                            Sylhet
                                                        </option>
                                                        <option value="Tangail"
                                                            {{ isset($order) && $order->motor_metro == 'Tangail' ? 'selected' : '' }}>
                                                            Tangail
                                                        </option>
                                                        <option value="Thakurgaon"
                                                            {{ isset($order) && $order->motor_metro == 'Thakurgaon' ? 'selected' : '' }}>
                                                            Thakurgaon
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3">
                                                <div class="input_field">
                                                    <label for="">&nbsp;</label>
                                                    <select class="form-control" required name="motor_mark">
                                                        <option value="0" disabled selected>Select (Mark)</option>
                                                        <option value="KA"
                                                            {{ isset($order) && $order->motor_mark == 'KA' ? 'selected' : '' }}>
                                                            KA
                                                        </option>
                                                        <option
                                                            value="KHA"{{ isset($order) && $order->motor_mark == 'KHA' ? 'selected' : '' }}>
                                                            KHA
                                                        </option>
                                                        <option
                                                            value="GA"{{ isset($order) && $order->motor_mark == 'GA' ? 'selected' : '' }}>
                                                            GA
                                                        </option>
                                                        <option
                                                            value="HA"{{ isset($order) && $order->motor_mark == 'HA' ? 'selected' : '' }}>
                                                            HA
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3">
                                                <div class="input_field">
                                                    <label for="">&nbsp;</label>
                                                    <input class="form-control" type="text" name="motor_reg_number"
                                                           placeholder="(Reg. Number)"
                                                           value="{{ $order->motor_reg_number ?? '' }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3">
                                                <div class="input_field">
                                                    <label for="">{{ __('Registration Date') }}</label>
                                                    <input class="form-control" type="date"
                                                           name="motor_registration_date" value="{{ date('Y-m-d') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="input_field">
                                                    <label for="">{{ __('Engine Number ') }}*</label>
                                                    <input class="form-control" type="text" required
                                                           name="motor_engin_number"
                                                           value="{{ $order->motor_engin_number ?? '' }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="input_field">
                                                    <label for="">{{ __('Chasis Number  ') }}*</label>
                                                    <input class="form-control" type="text" required
                                                           name="motor_chasis_number"
                                                           value="{{ $order->motor_chasis_number ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="contact_area calculator_submit">
                                        <div class="row">
                                            <div class="text-center">
                                                <h1>{{ __('Uploads Documents') }}</h1>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured NID') }}*</label>
                                                    <input type="file" class="form-control" name="insured_nid_file"
                                                           placeholder="" aria-label="Username"
                                                    @if (!isset($order)) {{ 'required' }} @endif>

                                                </div>
                                                @if (isset($order))
                                                    <iframe src="{{ asset($order->insured_nid_file) }}"
                                                            frameborder="0"></iframe>
                                                @endif
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="input_field">
                                                    <label for="">{{ __('Nominee NID') }}*</label>
                                                    <input type="file" class="form-control" name="nominee_nid"
                                                           placeholder="" aria-label="Username"
                                                    @if (!isset($order)) {{ 'required' }} @endif>

                                                </div>
                                                @if (isset($order))
                                                    <iframe src="{{ asset($order->nominee_nid) }}"
                                                            frameborder="0"></iframe>
                                                @endif
                                            </div>

                                            @if (isset($order))
                                                <input type="hidden" name="cirtificate_registration"
                                                       value="{{ $order->code }}">
                                            @endif
                                        </div>
                                    </div>
                                    {{--                                    <div class="contact_area calculator_submit">--}}
                                    {{--                                        <div class="col-lg-12">--}}
                                    {{--                                            <button class="contact_us_btn">{{ __('Submit') }}</button>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    <div class="contact_area calculator_submit">
                                        <div class="col-lg-12">
                                            <div class="terms_section">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="terms_condition" required>
                                                    <label class="form-check-label" for="terms_condition">
                                                        I accept the all <a href="#" style="color: #009156;">Terms & Conditions</a>
                                                    </label>
                                                </div>
                                                <br>

                                                <a href="{{ route('ps.overseas_mediclaim_insurance') }}"
                                                   class="payment_proceed_btn go_back">{{ __('Go Back') }}</a>
                                                <button class="payment_proceed_btn" type="submit">{{ __('Submit') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addOneYear(e) {
            let date = $(e).val();
            date = date.split("/");
            date = date[1] + "/" + date[0] + "/" + date[2];

            const dateCopy = new Date(date);

            dateCopy.setFullYear(dateCopy.getFullYear() + 1);

            $("#policy_end_date").val(dateCopy);
            console.log(dateCopy);
        }


        function toggleMailingAddress(e) {
            var data = $("input[name=insured_present_address]").val();
            if ($(e).is(":checked")) {
                $("input[name=insured_mailing_address]").val(data);
            }
        }
    </script>
@endsection
