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
                                                           name="insured_full_name" value="" aria-label="Username"
                                                           required>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input_field">
                                                    <label for="">{{ __('NID Number') }}*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ __('NID Number') }}*" name="insured_nid"
                                                           value="" aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured Permanent Address') }}*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ __('Insured Permanent Address') }}*"
                                                           name="insured_permanent_address" value=""
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
                                                            <option value="{{ $city->id }}">
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
                                                           aria-label="Username" required>

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
                                                           aria-label="Username" required>

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
                                                            <option value="{{ $city->id }}">
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
                                                           name="insured_mobile_number" value="" aria-label="Username"
                                                           required>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured E-mail Address') }}*</label>
                                                    <input type="text" class="form-control"
                                                           name="insured_email_address" value=""
                                                           placeholder="{{ __('Insured E-mail Address') }}*"
                                                           aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured Father Name') }}*</label>
                                                    <input type="text" class="form-control" name="insured_father_name"
                                                           value="" placeholder="{{ __('Insured Father Name') }}*"
                                                           aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured Mother Name') }}*</label>
                                                    <input type="text" class="form-control" name="insured_mother_name"
                                                           value="" placeholder="{{ __('Insured Mother Name') }}*"
                                                           aria-label="Username" required>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <input type="hidden" name="calculator_id" value="{{ $calculator->id }}">
                                    <input type="hidden" name="total_amount"
                                           value="{{ $request_all['total_amount'] ?? ($people !== null && session('type') == 1 ? $people->calculatorPeoplePersonalAccident[0]->net_premium + round(($people->calculatorPeoplePersonalAccident[0]->net_premium * $people->calculatorPeoplePersonalAccident[0]->vat) / 100) : $people->calculatorPeoplePersonalAccident[1]->net_premium * session('people_number') + round(($people->calculatorPeoplePersonalAccident[1]->net_premium * $people->calculatorPeoplePersonalAccident[1]->vat) / 100) * session('people_number')) }}">
                                    <input type="hidden" name="teriff_code"
                                           value="{{ $request_all['teriff_code'] ?? ($people !== null && session('type') == 1 ? $people->calculatorPeoplePersonalAccident[0]->teriff_code : $people->calculatorPeoplePersonalAccident[1]->teriff_code) }}">
                                    <input type="hidden" name="net_premium"
                                           value="{{ $request_all['net_premium'] ?? ($people !== null && session('type') == 1 ? $people->calculatorPeoplePersonalAccident[0]->net_premium : $people->calculatorPeoplePersonalAccident[1]->net_premium * session('people_number')) }}">
                                    <input type="hidden" name="vat"
                                           value="{{ $request_all['vat'] ?? ($people !== null && session('type') == 1 ? round(($people->calculatorPeoplePersonalAccident[0]->net_premium * $people->calculatorPeoplePersonalAccident[0]->vat) / 100) : round(($people->calculatorPeoplePersonalAccident[1]->net_premium * $people->calculatorPeoplePersonalAccident[1]->vat) / 100) * session('people_number')) }}">

                                    <input type="hidden" name="people_personal_id"
                                           value="{{ $request_all['people_personal_id'] ?? session('type') }}">
                                    <input type="hidden" name="people_number_of_people"
                                           value="{{ $request_all['people_number_of_people'] ?? (session('type') != 1 ? session('people_number') : '') }}">
                                    <input type="hidden" name="insured_amount"
                                           value="{{ $request_all['insured_amount'] ?? ($people !== null && session('type') == 1 ? $people->calculatorPeoplePersonalAccident[0]->capital_sum_insured : $people->calculatorPeoplePersonalAccident[1]->capital_sum_insured) }}">
                                    <input type="hidden" name="dob"
                                           value="{{ $request_all['dob'] ?? session('bongo_dob') }}">

                                    <div class="contact_area calculator_submit">
                                        <div class="row">
                                            <div class="text-center">
                                                <h1>{{ __('Nominee Information') }}</h1>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="input_field">
                                                    <label for="">{{ __('Name of Nominee') }}*</label>
                                                    <input type="text" class="form-control" name="nominee_full_name"
                                                           value="" placeholder="{{ __('Name of Nominee') }}*"
                                                           aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input_field">
                                                    <label for="">{{ __('Relationship with Nominee') }}*</label>
                                                    <input type="text" class="form-control"
                                                           name="nominee_relationship" value=""
                                                           placeholder="{{ __('Relationship with Nominee') }}*"
                                                           aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="input_field">
                                                    <label for="">{{ __('Nominee Address') }}*</label>
                                                    <input type="text" class="form-control" name="nominee_address"
                                                           value="" placeholder="{{ __('Nominee Address') }}*"
                                                           aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input_field">
                                                    <label for="">{{ __('Nominee Mobile Number') }}*</label>
                                                    <input type="text" class="form-control"
                                                           name="nominee_mobile_number" value=""
                                                           placeholder="{{ __('Nominee Mobile Number') }}*"
                                                           aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="input_field">
                                                    <label
                                                        for="">{{ __('Nominee NID or Birth Certificate Number') }}*</label>
                                                    <input type="text" class="form-control"
                                                           name="nominee_nid_or_birth_certificate" value=""
                                                           placeholder="{{ __('Nominee NID or Birth Certificate Number') }}*"
                                                           aria-label="Username" required>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    {{-- <div class="contact_area calculator_submit">
                                        <div class="row">
                                            <div class="text-center">
                                                <h1>{{ __('Policy Information') }}</h1>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="input_field">
                                                    <label for="">{{ __('Policy Start Date') }}*</label>
                                                    <input type="date" class="form-control" name="policy_start_date"
                                                        placeholder="{{ __('Name of Nominee') }}*"
                                                        aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input_field">
                                                    <label for="">{{ __('Policy End Date') }}*</label>
                                                    <input type="date" class="form-control" name="policy_end_date"
                                                        value="Friend" aria-label="Username" required>

                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="contact_area calculator_submit">
                                        <div class="row">
                                            <div class="text-center">
                                                <h1>{{ __('Uploads Documents') }}</h1>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="input_field">
                                                    <label for="">{{ __('Insured NID') }}*</label>
                                                    <input type="file" class="form-control" name="insured_nid_file"
                                                           placeholder="" aria-label="Username" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="input_field">
                                                    <label
                                                        for="">{{ __('Nominee NID/Birth Certificate') }}*</label>
                                                    <input type="file" class="form-control" name="nominee_nid"
                                                           placeholder="" aria-label="Username" required>

                                                </div>
                                            </div>


                                        </div>
                                    </div>

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
