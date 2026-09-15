@extends('backend.layouts.master')
@section('title', 'Fire Additional Coverate Tariff Type Create Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Add Fire Additional Coverage Tariff Type</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.StoreFireAdditionalCoverage.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="row mt-3" id="property">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Additional Coverage*</label>
                                    <div class="col-md-12 ">
                                        <select name="additional_coverage_id" id="additional_coverage_id"
                                            class="form-control" required onchange="getCovarageItem(this)">
                                            <option value="" selected>select a option</option>
                                            @foreach ($additional_coverage as $item)
                                                <option value="{{ $item->id }}">{{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3" id="property">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Property Location*</label>
                                    <div class="col-md-12 ">
                                        <select name="location_id" id="" class="form-control" required>
                                            <option value="" selected>select a option</option>
                                            @foreach ($property_location as $item)
                                                <option value="{{ $item->id }}">{{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Member Association</label>
                                    <div class="col-md-12 ">
                                        <select name="member_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($member as $item)
                                                <option value="{{ $item->id }}">{{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="building">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Building Construction*</label>
                                    <div class="col-md-12 ">
                                        <select name="building_construction_id" id="" class="form-control"
                                            required>
                                            <option value="" selected>select a option</option>
                                            @foreach ($building as $item)
                                                <option value="{{ $item->id }}">{{ $item->en_class_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="building">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Additinal Subcoverage</label>
                                    <div class="col-md-12 ">
                                        <select name="additional_subcoverage_id" id="additional_subcoverage_id"
                                            class="form-control">
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="district">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">District</label>
                                    <div class="col-md-12 ">
                                        <select name="district_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($district as $item)
                                                <option value="{{ $item->id }}">{{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row mt-3" id="value">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Value*</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="value" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-success text-center" value="Create">
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

    <script type="text/javascript">
        function getCovarageItem(e) {
            var additional_coverage_id = $(e).val();

            //console.log(additional_coverage_id);

            $.ajax({
                type: "get",
                url: "{{ url('admin/calculator/fire-additional-subcoverage/') }}/" + additional_coverage_id,
                success: function(response) {
                    $('#additional_subcoverage_id').html(response);
                }
            });
        }
    </script>
@endsection
