@extends('backend.layouts.master')
@section('title', 'Fire Additional Subcoverage Type Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Fire Additional Subcoverage Type</h4>
                        </div>
                        <div class="card-body">

                            <form
                                action="{{ route('admin.calculator.updateFireAdditionalSubcoverage.update', $teriff->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3" id="property">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Additional Coverage*</label>
                                    <div class="col-md-12 ">
                                        <select name="additional_coverage_id" id="" class="form-control" required>
                                            <option value="" selected>select a option</option>
                                            @foreach ($additional_coverage as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->additional_coverage_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row mt-3" id="calculation_type">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Calculation Type*</label>
                                    <div class="col-md-12 ">
                                        <select name="type" id="" class="form-control">
                                            <option value="1"
                                                @if ($teriff->type == 1) {{ 'selected' }} @endif>Combine
                                                Calculation</option>
                                            <option value="2"
                                                @if ($teriff->type == 2) {{ 'selected' }} @endif>Single
                                                Calculation</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="sub_en_name">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Subcoverage English Name*</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_name" class="form-control"
                                            value="{{ $teriff->en_name }}">
                                    </div>
                                </div>

                                <div class="row mt-3" id="bn_name">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Subcoverage Bangla Name*</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_name" class="form-control"
                                            value="{{ $teriff->bn_name }}">
                                    </div>
                                </div>

                                {{-- <div class="row mt-3" id="district">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">District</label>
                                    <div class="col-md-12 ">
                                        <select name="district_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($district as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->district_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="row mt-3" id="is_fixed">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Fixed*</label>
                                    <div class="col-md-12 ">
                                        <select name="is_fixed" id="" class="form-control">
                                            <option selected>Select option</option>
                                            <option value="1"
                                                @if ($teriff->is_fixed == 1) {{ 'selected' }} @endif>Yes</option>
                                            <option value="0"
                                                @if ($teriff->is_fixed == 0) {{ 'selected' }} @endif>No</option>
                                        </select>
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
    <script>
        var value_type = {{ $teriff->value_type }};
        if (value_type == 0) {
            $("#calculation_type").hide();
            $("#sub_en_name").hide();
            $("#sub_bn_name").hide();
            $("#district").hide();
            $("#sub_value").hide();
            $("#is_fixed").hide();
            $("#value").show();
        } else {
            $("#calculation_type").show();
            $("#sub_en_name").show();
            $("#sub_bn_name").show();
            $("#district").show();
            $("#sub_value").show();
            $("#is_fixed").show();
            $("#value").hide();
        }


        $("#coverage_value_type").on("click", function() {
            var type = $("#coverage_value_type").val();
            console.log(type);
            if (type == 1) {
                $("#calculation_type").show();
                $("#sub_en_name").show();
                $("#sub_bn_name").show();
                $("#district").show();
                $("#sub_value").show();
                $("#is_fixed").show();
                $("#value").hide();
            } else {
                $("#calculation_type").hide();
                $("#sub_en_name").hide();
                $("#sub_bn_name").hide();
                $("#district").hide();
                $("#sub_value").hide();
                $("#is_fixed").hide();
                $("#value").show();
            }
        });
    </script>
@endsection
