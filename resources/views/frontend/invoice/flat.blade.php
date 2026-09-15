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
                                                <td>{{ $calculator->{app()->getLocale() . '_name'} }}</td>
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

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered east_invoice_table">
                                        <tbody>
                                            <tr>
                                                <td class="header_title" colspan="100">Nominee Information</td>
                                            </tr>
                                            <tr>
                                                <td>Nominee Full Name</td>
                                                <td>{{ $personalInfo->nominee_full_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nominee Full Name</td>
                                                <td>{{ $personalInfo->nominee_full_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nominee Relationship</td>
                                                <td>{{ $personalInfo->nominee_relationship }}</td>
                                            </tr>

                                            <tr>
                                                <td>Nominee Address</td>
                                                <td>{{ $personalInfo->nominee_address }}</td>
                                            </tr>

                                            <tr>
                                                <td>Nominee Mobile Number</td>
                                                <td>{{ $personalInfo->nominee_mobile_number }}</td>
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
                                                <td>{{ __('District') }}</td>
                                                <td>{{ $criteria->district->{app()->getLocale() . '_name'} }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Property Location') }}</td>
                                                <td>{{ $criteria->location->{app()->getLocale() . '_name'} }}</td>
                                            </tr>

                                            @foreach ($allData->cal as $item)
                                                <tr>
                                                    <td>{{ $item->risk_coverage->{app()->getLocale() . '_name'} }} @ {{ $item->value }} TK
                                                        on {{ number_format($request_all->total_amount,2) }}</td>
                                                    <td> {{ app()->getLocale() == 'en' ? number_format($item->self_value, 2) : $numto->bnCommaLakh($item->self_value) }}

                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td>{{ __('Net Premium') }}</td>
                                                <td> {{ app()->getLocale() == 'en' ? number_format($allData->net_premium, 2) : $numto->bnCommaLakh($allData->net_premium) }}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Add 15% VAT') }}</td>
                                                <td>
                                                    {{ app()->getLocale() == 'en' ? number_format($allData->vat, 2) : $numto->bnCommaLakh($allData->vat) }}

                                                </td>
                                            </tr>
                                            <tr>
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
                                        <a href="{{ route('ps.flat_apartment_owner_insurance') }}" class="danger_payment_btn">Close</a>
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
