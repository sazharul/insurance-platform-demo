@extends('frontend.layouts.master')
@section('title', $calculator->en_name)

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $calculator->{app()->getLocale() . '_name'} }} {{ __('Invoice') }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ __('Products & Services') }}</span> / <span
                        class="text-success fw-bold">{{ $calculator->{app()->getLocale() . '_name'} }}</span></h6>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="fire_container pb-5">
                    <div class="fire_container_content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered east_invoice_table">
                                        <tbody>
                                            <tr>
                                                <td class="header_title" colspan="100">General Information</td>
                                            </tr>
                                            <tr>
                                                <td>Application Date</td>
                                                <td>{{ $invoice_info->created_at->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Insurance Type</td>
                                                <td>Motor Insurance</td>
                                            </tr>
                                            <tr>
                                                <td>Application Type</td>
                                                <td>New</td>
                                            </tr>

                                            <tr>
                                                <td>Status</td>
                                                <td>{{ $invoice_info->status }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered east_invoice_table">
                                        <tbody>
                                            <tr>
                                                <td class="header_title" colspan="100">Motor Insurance Information</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Vehicle Category') }}</td>
                                                <td>{{ $tariff->calculator_vehicle_category->{app()->getLocale() . '_name'} }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Plan Type') }}</td>
                                                <td>{{ $allData->selected_insurance_type }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Vehicle Type') }}</td>
                                                <td>{{ $tariff->calculator_vehicle_type->{app()->getLocale() . '_name'} }}
                                                </td>
                                            </tr>

                                            @if (isset($risk_cover))
                                                <tr>
                                                    <td>{{ __('Risk Coverage') }}</td>
                                                    <td>
                                                        @foreach ($risk_cover as $item)
                                                            {{ $item->en_name }} ,
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td>{{ __('Vehicle Price') }}</td>
                                                <td>{{ $allData->vehicle_price }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Engine Capacity') }}</td>
                                                <td>{{ $allData->engine_capacity_cc }} CC</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Number of passenger') }}</td>
                                                <td>{{ $allData->passenger }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Policy start date') }}</td>
                                                <td>{{ $allData->policy_start_date }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Policy end date') }}</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $allData->policy_start_date)->addYear()->subDays(1)->format('d/m/Y') }}
                                                </td>
                                            </tr>

                                            @if ($allData->vehicle_weight_ton)
                                                <tr>
                                                    <td>{{ __('Truck weight') }}</td>
                                                    <td>{{ $allData->vehicle_weight_ton }}</td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td>{{ __('Vehicle Brand/Make') }}</td>
                                                <td>{{ $personalInfo->motor_vehicle_brand_make }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Year Of Manufacture  ') }}</td>
                                                <td>{{ $personalInfo->motor_year_of_manufacture }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Registration Number ') }}</td>
                                                <td>{{ $personalInfo->motor_metro }} {{ $personalInfo->motor_mark }}
                                                    {{ $personalInfo->motor_reg_number }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Registration Date') }}</td>
                                                <td>{{ $personalInfo->motor_registration_date }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Engine Number ') }}</td>
                                                <td>{{ $personalInfo->motor_engin_number }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Chasis Number  ') }}</td>
                                                <td>{{ $personalInfo->motor_chasis_number }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered east_invoice_table">
                                        <tbody>
                                            <tr>
                                                <td class="header_title" colspan="100">Personal Information</td>
                                            </tr>
                                            <tr>
                                                <td>Insured Full Name</td>
                                                <td>{{ $personalInfo->insured_full_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>NID Number</td>
                                                <td>{{ $personalInfo->insured_nid }}</td>
                                            </tr>

                                            <tr>
                                                <td>Insured Permanent Address</td>
                                                <td>{{ $personalInfo->insured_permanent_address }}</td>
                                            </tr>

                                            <tr>
                                                <td>Insured Permanent City</td>
                                                <td>{{ $insured_city->where('id', $personalInfo->insured_permanent_city)->first() ? $insured_city->where('id', $personalInfo->insured_permanent_city)->first()->en_name : '' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Insured Present Address</td>
                                                <td>{{ $personalInfo->insured_present_address }}</td>
                                            </tr>

                                            <tr>
                                                <td>Insured Mailing Address</td>
                                                <td>{{ $personalInfo->insured_mailing_address }}</td>
                                            </tr>

                                            <tr>
                                                <td>Insured City</td>
                                                <td>{{ $insured_city->where('id', $personalInfo->insured_mailing_city)->first() ? $insured_city->where('id', $personalInfo->insured_mailing_city)->first()->en_name : '' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Mobile Number</td>
                                                <td>{{ $personalInfo->insured_mobile_number }}</td>
                                            </tr>

                                            <tr>
                                                <td>Insured E-mail Address</td>
                                                <td>{{ $personalInfo->insured_email_address }}</td>
                                            </tr>

                                            <tr>
                                                <td>Insured Occupation</td>
                                                <td>{{ $personalInfo->insured_occupation }}</td>
                                            </tr>

                                            <tr>
                                                <td>Insured Passport Number</td>
                                                <td>{{ $personalInfo->insured_passport_number }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered east_invoice_table">
                                        <tbody>
                                            <tr>
                                                <td class="header_title" colspan="100">Uploaded Document List</td>
                                            </tr>
                                            <tr>
                                                <td>Insured NID</td>
                                                <td>{{ isset($personalInfo->insured_nid_file) ? 'YES' : 'NO' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nominee NID</td>
                                                <td>{{ isset($personalInfo->nominee_nid) ? 'YES' : 'NO' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered east_invoice_table">
                                        <tbody>
                                            <tr>
                                                <td class="header_title" colspan="100">Premium Calculation</td>
                                            </tr>


                                            @if ($allData->basic_premium > 0)
                                                <tr>
                                                    <td>{{ __('Basic Premium') }}</td>
                                                    <td>{{ app()->getLocale() == 'en' ? number_format($allData->basic_premium, 2) : $numto->bnCommaLakh($allData->basic_premium) }}
                                                    </td>
                                                </tr>
                                            @endif

                                            @if ($allData->tachometer_amount > 0)
                                                <tr>
                                                    <td>{{ __('Tachometer') }} ({{ eng_to_bng($tachometer) }})</td>
                                                    <td>
                                                        {{ app()->getLocale() == 'en' ? number_format($allData->tachometer_amount, 2) : $numto->bnCommaLakh($allData->tachometer_amount) }}
                                                    </td>
                                                </tr>
                                            @endif


                                            @if ($allData->selected_insurance_type != 'Act Liability')
                                                <tr>
                                                    <td>+{{ $allData->fiv }} On FIV</td>
                                                    <td>
                                                        {{ app()->getLocale() == 'en' ? number_format($allData->fiv_amount, 2) : $numto->bnCommaLakh($allData->fiv_amount) }}
                                                    </td>
                                                </tr>
                                            @endif

                                            @if ($allData->selected_insurance_type != 'Act Liability' && isset($risk_cover))

                                                <tr>
                                                    <td>
                                                        @php
                                                            $allData->fiv = 0;
                                                        @endphp
                                                        @foreach ($risk_cover as $cover_item)
                                                            @php
                                                                $allData->fiv += $cover_item->value;
                                                            @endphp
                                                        @endforeach
                                                        <span>
                                                            Less: {{ number_format($allData->fiv, 2) }}% on FIV for

                                                            @foreach ($risk_cover as $cover_item)
                                                                {{ $cover_item->{app()->getLocale() . '_name'} }}
                                                                {{ !$loop->last ? ',' : '' }}
                                                            @endforeach
                                                        </span>
                                                    </td>
                                                    <td>{{ app()->getLocale() == 'en' ? number_format($allData->covarage_amount, 2) : $numto->bnCommaLakh($allData->covarage_amount) }}
                                                    </td>
                                                </tr>
                                            @endif

                                            @if (isset($allData->request_ncb))
                                                <tr>
                                                    <td>{{ __('Less: ' . $allData->request_ncb . '% NCB') }}
                                                    </td>
                                                    <td>{{ app()->getLocale() == 'en' ? number_format($allData->ncb, 2) : $numto->bnCommaLakh($allData->ncb) }}
                                                    </td>
                                                </tr>
                                            @endif

                                            @if (isset($allData->request_loading))
                                                <tr>
                                                    <td>{{ __('Add: ' . $allData->request_loading . '% Claim Loading') }}
                                                    </td>
                                                    <td>{{ app()->getLocale() == 'en' ? number_format($allData->loading, 2) : $numto->bnCommaLakh($allData->loading) }}
                                                    </td>
                                                </tr>
                                            @endif

                                            @if ($allData->vtss_amount > 0)
                                                <tr>
                                                    <td>{{ __('VTS Meter') }} ({{ $allData->vtss }})
                                                    </td>
                                                    <td>{{ app()->getLocale() == 'en' ? number_format($allData->vtss_amount, 2) : $numto->bnCommaLakh($allData->vtss_amount) }}
                                                    </td>
                                                </tr>
                                            @endif


                                            @if ($allData->act > 0)
                                                <tr>
                                                    <td>Act Liability Premium</td>
                                                    <td>{{ app()->getLocale() == 'en' ? number_format($allData->act, 2) : $numto->bnCommaLakh($allData->act) }}
                                                    </td>
                                                </tr>
                                            @endif

                                            <tr style="color: red; font-weight: bold;">
                                                <td>{{ __('Total Premium') }}</td>
                                                <td>
                                                    {{ app()->getLocale() == 'en' ? number_format($allData->total_premium, 2) : $numto->bnCommaLakh($allData->total_premium) }}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @php
                                $is_exists_orders = \App\Models\Order::where('invoice_sessions', $invoice_info->id)->first();

                                if (isset($is_exists_orders)) {
                                    $trans_id = $is_exists_orders->transaction_id;
                                } else {
                                    $trans_id = '';
                                }
                            @endphp

                            @if ($invoice_info->status != 'Paid')
                                <div class="col-lg-12" style="text-align: center;">
                                    <form action="{{ url('/pay') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="tran_id" value="{{ $trans_id }}">
                                        <input type="hidden" name="invoice_id" value="{{ $invoice_info->id }}">
                                        <a href="{{ route('ps.motor_insurance') }}" class="danger_payment_btn">Close</a>
                                        <button type="submit" class="payment_proceed_btn">Pay Now</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
