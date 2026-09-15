@extends('backend.layouts.master')
@section('title', 'Fire Interest Tariff Type Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Fire Interest Tariff Type</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.updateFireInterestTeriff.update', $teriff->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mt-3" id="property">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Property Location</label>
                                    <div class="col-md-12 ">
                                        <select name="location_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($property_location as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->location_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="occupation_type">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Type of Property / Occupation</label>
                                    <div class="col-md-12 ">
                                        <select name="occupation_id" id="occupation_id" class="form-control" required
                                            onchange="getPropertyTypeItem(this)">
                                            @foreach ($occupation_type as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($item->id == $type->interest->occupation->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="property">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Member of association (if "<i>Interest
                                            Type</i>" keep it empty )</label>
                                    <div class="col-md-12 ">
                                        <select name="member_association_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($member_association as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->member_association_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3" id="building">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Building Construction</label>
                                    <div class="col-md-12 ">
                                        <select name="building_construction_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($building as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->building_construction_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_class_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Interest type (if "<i>Member of
                                            association</i>" keep it empty )</label>
                                    <div class="col-md-12 ">
                                        <select name="interest_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($interest as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->interest_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Value</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="value" class="form-control"
                                            value="{{ $teriff->value }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-success text-center" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

@endsection
