@extends('backend.layouts.master')
@section('title', 'Engine Capacity Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-info" href="{{ route('admin.calculator.engine-capacity.index') }}">Back</a>
                            <h4 class="text-center text-capitalize">Edit Engine Capacity</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.engine-capacity.update', $capacity->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                           style="font-weight: bold; font-size: 20px;">Vehicle Category Name</label>
                                    <div class="col-md-12">
                                        <select name="calculator_vehicle_category_id" id="calculator_vehicle_category_id" class="form-control" required>
                                            <option value="" selected disabled>select a option</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $capacity->calculator_vehicle_category_id ? 'selected' : '' }}>
                                                    {{ $category->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                           style="font-weight: bold; font-size: 20px;">Vehicle Type Name</label>
                                    <div class="col-md-12">
                                        <select name="calculator_vehicle_type_id" id="calculator_vehicle_type_id" class="form-control">
                                            <option value="" disabled>select a option</option>
                                            <option value="{{ $capacity->calculator_vehicle_type_id }}" selected>{{ (isset($capacity->calculatorVehicleType)) ? $capacity->calculatorVehicleType->en_name : '' }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="status" value="1"
                                                {{ $capacity->status == 1 ? 'checked' : '' }} required>Active</label>
                                        <label for=""><input type="radio" name="status" value="0"
                                                {{ $capacity->status == 0 ? 'checked' : '' }} required>Inactive</label>
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
        $('#calculator_vehicle_category_id').change(function () {
            var calculator_cat = $(this).val();

            $.ajax({
                type: "get",
                url: '/admin/get_vehicle_type/'+calculator_cat,
                success: function(response){
                    $('#calculator_vehicle_type_id').html(response);
                }
            });
        });
    </script>
@endsection
