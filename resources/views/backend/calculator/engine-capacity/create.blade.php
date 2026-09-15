@extends('backend.layouts.master')
@section('title', 'Engine Capacity Create Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Add Engine Capacity</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.engine-capacity.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12"
                                        style="font-weight: bold; font-size: 20px;">Vehicle Category Name</label>
                                    <div class="col-md-12">
                                        <select name="calculator_vehicle_category_id" id="calculator_vehicle_category_id"
                                            class="form-control" required>
                                            <option value="" selected disabled>select a option</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Vehicle Type Name</label>
                                    <div class="col-md-12">
                                        <select name="calculator_vehicle_type_id" id="calculator_vehicle_type_id"
                                            class="form-control">
                                            <option value="" selected disabled>select a option</option>
                                        </select>
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
    <script>
        $('#calculator_vehicle_category_id').change(function() {
            var calculator_cat = $(this).val();

            $.ajax({
                type: "get",
                url: '/admin/get_vehicle_type/' + calculator_cat,
                success: function(response) {
                    $('#calculator_vehicle_type_id').html(response);
                }
            });
        });
    </script>
@endsection
