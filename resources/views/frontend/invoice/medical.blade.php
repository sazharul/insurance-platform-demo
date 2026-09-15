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
                                                <td>Overseas Mediclaim Insurance</td>
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
                                                <td class="header_title" colspan="100">Overseas Mediclaim Insurance Information</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Mediclaim Type') }}</td>
                                                <td>{{ $invoice_info->created_at->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Insurance Type</td>
                                                <td>
                                                    @if ($allData->is_schengen == 1)
                                                        {{ __('Schengene Country') }}
                                                    @else
                                                        {{ __('Non Schengene Country') }}
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Plan Type') }}</td>
                                                <td>
                                                    @if ($allData->is_including == 1)
                                                        {{ __('Including USA & CANADA') }}
                                                    @else
                                                        {{ __('Excluding USA & CANADA') }}
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Travel Duration') }}</td>
                                                <td>{{ $allData->visit_day }} Days</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Age') }}</td>
                                                <td>{{ app()->getLocale() == 'en' ? $allData->age : $numto->bnNum($allData->age) }}
                                                    {{ $allData->age > 0 ? __('Year') : __('Month') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Date of Departure') }}</td>
                                                <td>{{ $allData->user_date_of_departure }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Return Date') }}</td>
                                                <td>{{ $allData->user_return_date }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Sum Insured') }}</td>
                                                <td>US $50,000.00 or 30,000 euro</td>
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
                                                <td>{{ $insured_city->where('id', $personalInfo->insured_permanent_city)->first() ? $insured_city->where('id', $personalInfo->insured_permanent_city)->first()->en_name : '' }}</td>
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
                                                <td>{{ $insured_city->where('id', $personalInfo->insured_mailing_city)->first() ? $insured_city->where('id', $personalInfo->insured_mailing_city)->first()->en_name : '' }}</td>
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
                                            <tr>
                                                <td>{{ __('Net Premium') }}</td>
                                                <td>
                                                    BDT {{ app()->getLocale() == 'en' ? number_format($country->amount, 2) : $numto->bnCommaLakh($country->amount) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Add 15% VAT') }}</td>
                                                <td>
                                                    BDT {{ app()->getLocale() == 'en' ? number_format($allData->vat, 2) : $numto->bnCommaLakh($allData->vat) }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Stamp Charge') }}</td>
                                                <td>
                                                    BDT {{ app()->getLocale() == 'en' ? number_format($allData->stamp_amount, 2) : $numto->bnCommaLakh($allData->stamp_amount) }}</td>
                                            </tr>

                                            <tr style="color: red; font-weight: bold;">
                                                <td>{{ __('Total Premium') }}</td>
                                                <td>
                                                    BDT {{ app()->getLocale() == 'en' ? number_format($allData->total_premium, 2) : $numto->bnCommaLakh($allData->total_premium) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @php
                                $is_exists_orders = \App\Models\Order::where('invoice_sessions', $invoice_info->id)->first();

                                if (isset($is_exists_orders)){
                                    $trans_id = $is_exists_orders->transaction_id;
                                }else {
                                    $trans_id = '';
                                }
                            @endphp
                            @if($invoice_info->status != 'Paid')
                                <div class="col-lg-12" style="text-align: center;">
                                    <form action="{{ url('/pay') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="tran_id" value="{{ $trans_id }}">
                                        <input type="hidden" name="invoice_id" value="{{ $invoice_info->id }}">
                                        <a href="{{ route('ps.overseas_mediclaim_insurance') }}" class="danger_payment_btn">Close</a>
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
