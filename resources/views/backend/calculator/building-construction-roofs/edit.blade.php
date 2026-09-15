@extends('backend.layouts.master')
@section('title', 'Building Construction Roofs Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Building Construction Roofs</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.construction-roofs.update', $roof->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Calculator Name</label>
                                    <div class="col-md-12 ">
                                        <select name="calculator_id" id="" class="form-control" required>
                                            <option value="" selected disabled>select a option</option>
                                            @foreach ($calculators as $calculator)
                                                <option value="{{ $calculator->id }}"
                                                    {{ $calculator->id == $roof->calculator_id ? 'selected' : '' }}>
                                                    {{ $calculator->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Select building type</label>
                                    <div class="col-md-12 ">
                                        <select name="calculator_building_construction_id" id=""
                                            class="form-control" required>
                                            @foreach ($constructions as $item)
                                                <option value="{{ $item->id }}" @if($item->id == $roof->calculator_building_construction_id) {{ 'selected' }} @endif>{{ $item->en_class_title }}({{ $item->en_hero_title }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Name English</label>
                                    <div class="col-md-12">
                                        <input type="text" name="en_name" class="form-control"
                                            value="{{ $roof->en_name }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Name Bangla</label>
                                    <div class="col-md-12">
                                        <input type="text" name="bn_name" class="form-control"
                                            value="{{ $roof->bn_name }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12">
                                        <label for=""><input type="radio" name="status" value="1"
                                                {{ $roof->status == 1 ? 'checked' : '' }} required>Active</label>
                                        <label for=""><input type="radio" name="status" value="0"
                                                {{ $roof->status == 0 ? 'checked' : '' }} required>Inactive</label>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="calculator_id"]').on('change', function() {
                var calculator_id = $(this).val();
                if (calculator_id) {
                    $.ajax({
                        url: "{{ url('admin/calculator/building-construction-type/') }}/" + calculator_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="calculator_building_construction_id"]')
                                .empty();
                            $.each(data, function(key, value) {
                                $('select[name="calculator_building_construction_id"]')
                                    .append(
                                        '<option value="' +
                                        value.id + '">' + value
                                        .en_class_title + '('+value.en_hero_title+')</option>');
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