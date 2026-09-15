@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-header">Create New CalculatorMotorTariffPrice</div>
                <div class="card-body">
                    <a href="{{ url('/admin/calculator-motor-tariff-price') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/admin/calculator-motor-tariff-price') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('admin.calculator-motor-tariff-price.form', ['formMode' => 'create'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#vehicle_category_id').change(function () {
            var calculator_cat = $(this).val();

            $.ajax({
                type: "get",
                url: '/admin/get_vehicle_type/'+calculator_cat,
                success: function(response){
                    $('#vehicle_type_id').html(response);
                }
            });
        });

        $('#vehicle_type_id').change(function () {
            var vehicle_type = $(this).val();
            $.ajax({
                type: "get",
                url: '/admin/get_engine_capacity/'+vehicle_type,
                success: function(response){
                    $('#engine_capacity_id').html(response);
                }
            });
        });
    </script>
@endsection
