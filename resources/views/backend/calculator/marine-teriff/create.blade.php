@extends('backend.layouts.master')
@section('title', 'Marine Teriff Create Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Add Marine Teriff</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.StoreMarineTeriff.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="calculator_id" value="2">

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Cargo Product</label>
                                    <div class="col-md-12 ">
                                        <select name="cargo_product_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($cargo_product as $item)
                                                <option value="{{ $item->id }}">{{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Member Association(optional)</label>
                                    <div class="col-md-12 ">
                                        <select name="member_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($member_association as $item)
                                                <option value="{{ $item->id }}">{{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Teriff Types</label>
                                    <div class="col-md-12 ">
                                        <select name="teriff_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($teriff_type as $item)
                                                <option value="{{ $item->id }}">{{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Carried By</label>
                                    <div class="col-md-12 ">
                                        <select name="carried_by_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($carried_by as $item)
                                                <option value="{{ $item->id }}">{{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Risk Cover</label>
                                    <div class="col-md-12 ">
                                        <select name="risk_cover_id" id="" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Interest</label>
                                    <div class="col-md-12 ">
                                        <select name="interest_type_id" id="" class="form-control">

                                        </select>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Value</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="value" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="status" value="1" checked
                                                required>Active</label>
                                        <label for=""><input type="radio" name="status" value="0"
                                                required>Inactive</label>
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
        $(document).ready(function() {
            $('select[name="carried_by_id"]').on('change', function() {
                var carried_by_id = $(this).val();
                if (carried_by_id) {
                    $.ajax({
                        url: "{{ url('admin/calculator/risk_cover/') }}/" +
                            carried_by_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="risk_cover_id"]')
                                .empty();
                            $('select[name="risk_cover_id"]')
                                .append('<option value="">Select</option>');
                            $.each(data, function(key, value) {
                                $('select[name="risk_cover_id"]')
                                    .append(
                                        '<option value="' +
                                        value.id + '">' + value
                                        .en_name + '(' + value.en_name +
                                        ')</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="risk_cover_id"]').on('change', function() {
                var risk_cover_id = $(this).val();
                if (risk_cover_id) {
                    $.ajax({
                        url: "{{ url('admin/calculator/interest_type/') }}/" +
                            risk_cover_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="interest_type_id"]')
                                .empty();
                            $.each(data, function(key, value) {
                                $('select[name="interest_type_id"]')
                                    .append(
                                        '<option value="' +
                                        value.id + '">' + value
                                        .en_name + '(' + value.en_name +
                                        ')</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
