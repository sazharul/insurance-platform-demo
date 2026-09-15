@extends('backend.layouts.master')
@section('title', 'Premium Calculator Manage Page details')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3>{{ $order->calculator->en_name }} ({{ $order->calculator->bn_name }})</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row ">
                <div class="col-12 QA_section">
                    <div class="card QA_table ">
                        <div class="card-header">
                            Invoice - {{ $order->id }} |
                            <strong>{{ $order->created_at->format('d F, Y - H:i A') }}</strong>
                            <span class="float-end">
                                <strong>Status:</strong>
                                {{ $order->status }}
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <h6 class="mb-3">Personal Information:</h6>
                                    <div>
                                        <strong>Full name: {{ $order->insured_full_name }}</strong>
                                    </div>
                                    <div><strong>NID: </strong>{{ $order->insured_nid }}</div>
                                    <div><strong>Permanent address: </strong>{{ $order->insured_permanent_address }}</div>
                                    <div><strong>Permanent city: </strong>{{ $order->insuredPermanentCity->en_name ?? '' }}
                                    </div>
                                    @if ($order->insured_present_address)
                                        <div><strong>Present address: </strong>{{ $order->insured_present_address }}</div>
                                    @endif
                                    <div><strong>Mailing address: </strong>{{ $order->insured_mailing_address }}</div>
                                    <div><strong>Mailing city: </strong>{{ $order->insuredMailingCity->en_name ?? '' }}
                                    </div>
                                    <div><strong>Mobile number: </strong>{{ $order->insured_mobile_number }}</div>
                                    <div><strong>Email: </strong>{{ $order->insured_email_address }}</div>
                                    @if ($order->insured_father_name)
                                        <div><strong>Father name: </strong>{{ $order->insured_father_name }}</div>
                                    @endif
                                    @if ($order->insured_mother_name)
                                        <div><strong>Mother name: </strong>{{ $order->insured_mother_name }}</div>
                                    @endif
                                    @if ($order->insured_occupation)
                                        <div><strong>Occupation: </strong>{{ $order->insured_occupation }}</div>
                                    @endif
                                    @if ($order->insured_passport_number)
                                        <div><strong>Passport number: </strong>{{ $order->insured_passport_number }}</div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @if ($order->nominee_full_name)
                                        <h6 class="mb-3">Nominee Information:</h6>
                                        @if ($order->nominee_full_name)
                                            <div><strong>Name of Nominee: </strong>{{ $order->nominee_full_name }}</div>
                                        @endif
                                        @if ($order->nominee_relationship)
                                            <div><strong>Relationship with Nominee:
                                                </strong>{{ $order->nominee_relationship }}</div>
                                        @endif
                                        @if ($order->nominee_address)
                                            <div><strong>Nominee Address: </strong>{{ $order->nominee_address }}</div>
                                        @endif
                                        @if ($order->nominee_mobile_number)
                                            <div><strong>Nominee Mobile Number:
                                                </strong>{{ $order->nominee_mobile_number }}
                                            </div>
                                        @endif
                                    @endif
                                    <br>
                                    @if ($order->calculator_id == 3)
                                        <h6 class="mb-3">Policy Information:</h6>
                                        <div><strong>Start date:
                                            </strong>{{ $order->sellDetails->details['policy_start_date'] }}</div>
                                        {{-- @php
                                            $end_date = date('Y-m-d', strtotime($order->sellDetails->details['policy_start_date']));
                                        @endphp
                                        <div><strong>End datedd:
                                            </strong>{{ $end_date }}
                                        </div> --}}
                                    @else
                                        @if ($order->policy_start_date && $order->policy_end_date)
                                            <h6 class="mb-3">Policy Information:</h6>
                                            <div><strong>Start date: </strong>{{ $order->policy_start_date }}</div>
                                        @endif
                                        {{-- @if ($order->policy_start_date && $order->policy_end_date)
                                            <div><strong>End date: </strong>{{ $order->policy_end_date }}
                                            </div>
                                        @endif --}}
                                    @endif
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Documents:</h6>
                                    <div>
                                        <a href="{{ asset($order->insured_nid_file) }}" download
                                            class="btn btn-outline-success btn-sm"> Insured NID</a>

                                    </div>
                                    <br>
                                    <div>
                                        <a href="{{ asset($order->nominee_nid) }}" download
                                            class="btn btn-outline-info btn-sm"> Nominee NID</a>
                                    </div>

                                </div>
                            </div>
                            {{-- {{ dd($order->sellDetails->details, $order) }} --}}
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($order->calculator_id == 3)
                                            @php
                                                $data = $order->sellDetails->details;
                                            @endphp

                                            @if ($data['selected_insurance_type'] == 'Comprehensive' && isset($data['risk_cover']))
                                                @foreach ($data['risk_cover'] as $key => $risk)
                                                    <tr>
                                                        <td class="center">{{ '#' }}</td>
                                                        <td class="left strong">Risk coverage #{{ ++$key }}</td>
                                                        <td class="left">{{ $risk['en_name'] }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Vehicle category</td>
                                                <td class="left">
                                                    {{ $data['tariff']['calculator_vehicle_category']['en_name'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Vehicle type</td>
                                                <td class="left">
                                                    {{ $data['tariff']['calculator_vehicle_type']['en_name'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Vehicle engine capacity</td>
                                                <td class="left">

                                                    {{ $data['engine_capacity_cc'] }} CC
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Vehicle weight</td>
                                                <td class="left">
                                                    {{ $data['vehicle_weight_ton'] ?? 'N/A' }} Ton
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Passenger</td>
                                                <td class="left">
                                                    {{ $data['passenger'] }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Insurance Type </td>
                                                <td class="left">
                                                    {{ $data['selected_insurance_type'] }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Insurance </td>
                                                <td class="left">
                                                    {{ $data['insurance_first'] }}</td>
                                            </tr>
                                            @if ($order->cirtificate_registration)
                                                <tr>
                                                    <td class="center">#</td>
                                                    <td class="left strong">First Time Insurance Certificate</td>
                                                    <td class="left">
                                                        {{ $order->cirtificate_registration ?? '' }}</td>
                                                </tr>
                                            @endif
                                            @if ($data['ncb'] > 0)
                                                <tr>
                                                    <td class="center">#</td>
                                                    <td class="left strong">NCB</td>
                                                    <td class="left">
                                                        {{ $data['ncb'] ?? '' }} TK Less</td>
                                                </tr>
                                            @endif
                                            @if ($data['loading'] > 0)
                                                <tr>
                                                    <td class="center">#</td>
                                                    <td class="left strong">Loading</td>
                                                    <td class="left">
                                                        {{ $data['loading'] ?? '' }} TK Add</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Brand</td>
                                                <td class="left">
                                                    {{ $order->motor_vehicle_brand_make ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Year of manufacture</td>
                                                <td class="left">
                                                    {{ $order->motor_year_of_manufacture ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Motor metro</td>
                                                <td class="left">
                                                    {{ $order->motor_metro ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Motor mark</td>
                                                <td class="left">
                                                    {{ $order->motor_mark ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Motor registration number</td>
                                                <td class="left">
                                                    {{ $order->motor_reg_number ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Motor registration date</td>
                                                <td class="left">
                                                    {{ $order->motor_registration_date ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Motor engine number</td>
                                                <td class="left">
                                                    {{ $order->motor_engin_number ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Motoro chasis number</td>
                                                <td class="left">
                                                    {{ $order->motor_chasis_number ?? '' }}</td>
                                            </tr>
                                        @elseif ($order->calculator_id == 4)
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Insurance sub type </td>
                                                <td class="left">
                                                    {{ $order->sellDetails->details['insurance_sub_type']['en_name'] }}
                                                </td>
                                            </tr>
                                            @foreach ($order->sellDetails->details['all_country'] as $key => $country)
                                                <tr>
                                                    <td class="center">{{ '#' }}</td>
                                                    <td class="left strong">Country name #{{ ++$key }}</td>
                                                    <td class="left">
                                                        {{ $country['en_name'] }} ({{ $country['type'] == 1 ? 'NONSCHENGEN' : 'SCHENGEN' }})
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Departure date</td>
                                                <td class="left">
                                                    {{ $order->user_date_of_departure }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Return date </td>
                                                <td class="left">
                                                    {{ $order->user_return_date }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Date of birth </td>
                                                <td class="left">
                                                    {{ $order->dob }}</td>
                                            </tr>
                                        @elseif ($order->calculator_id == 5)
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Risk cover </td>
                                                <td class="left">
                                                    {{ $order->sellDetails->details['risk']['en_name'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Property occupation</td>
                                                <td class="left">
                                                    {{ $order->sellDetails->details['occupation']['en_name'] }}</td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Personal medical benifits </td>
                                                <td class="left">
                                                    {{ $order->personal_medical_benifits == 1 ? 'Yes' : 'No' }}</td>
                                            </tr>
                                        @elseif ($order->calculator_id == 6)
                                            @if ($order->people_personal_id == 1)
                                                <tr>
                                                    <td class="center">#</td>
                                                    <td class="left strong">Plan type </td>
                                                    <td class="left">
                                                        Individual
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">#</td>
                                                    <td class="left strong">Date of birth </td>
                                                    <td class="left">
                                                        {{ $order->dob }}
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td class="center">#</td>
                                                    <td class="left strong">Plan type </td>
                                                    <td class="left">
                                                        Group
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">#</td>
                                                    <td class="left strong">Number of people </td>
                                                    <td class="left">
                                                        {{ $order->dob }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @elseif ($order->calculator_id == 7)
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Date of birth </td>
                                                <td class="left">
                                                    {{ $order->dob }}</td>
                                            </tr>
                                        @elseif($order->calculator_id == 8)
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">District </td>
                                                <td class="left">
                                                    {{ $order->sellDetails->details['district']['en_name'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center">#</td>
                                                <td class="left strong">Location </td>
                                                <td class="left">
                                                    {{ $order->sellDetails->details['location']['en_name'] }}
                                                </td>
                                            </tr>
                                            @foreach ($order->sellDetails->details['coverage'] as $key => $coverage)
                                                <tr>
                                                    <td class="center">{{ '#' }}</td>
                                                    <td class="left strong">Coverage area #{{ ++$key }}</td>
                                                    <td class="left">{{ $coverage['risk_coverage']['en_name'] }} -
                                                        ({{ number_format($coverage['self_value'], 2) }} BDT)
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5"></div>
                                <div class="col-lg-4 col-sm-5 ms-auto QA_section">
                                    <table class="table table-clear QA_table">
                                        <tbody>
                                            @if ($order->insured_amount)
                                                <tr>
                                                    <td class="left">
                                                        <strong>Total sum insured:</strong>
                                                    </td>
                                                    <td class="right">{{ number_format($order->insured_amount, 2) }} BDT
                                                    </td>
                                                </tr>
                                            @endif

                                            @if ($order->net_premium)
                                                <tr>
                                                    <td class="left">
                                                        <strong>Net Premium:</strong>
                                                    </td>
                                                    <td class="right">{{ number_format($order->net_premium, 2) }} BDT
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ($order->stamp_charge)
                                                <tr>
                                                    <td class="left">
                                                        <strong>Stamp charge:</strong>
                                                    </td>
                                                    <td class="right">{{ number_format($order->stamp_charge, 2) }} BDT
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ($order->vat)
                                                <tr>
                                                    <td class="left">
                                                        <strong>Vat:</strong>
                                                    </td>
                                                    <td class="right">{{ number_format($order->vat, 2) }} BDT</td>
                                                </tr>
                                            @endif
                                            @if ($order->amount)
                                                <tr style="border-top:2px solid;">
                                                    <td class="left">
                                                        <strong>Total Paid:</strong>
                                                    </td>
                                                    <td class="right">{{ number_format($order->amount, 2) }} BDT</td>
                                                </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
