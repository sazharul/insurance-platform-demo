@extends('frontend.layouts.master')
@section('title', 'Home')

@section('style')
    <style>
        .custom_class {
            height: 55px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <br>
                <br>
                <br>
                <br>

                <label for="cars">Choose a car:</label>

                <select name="cars" id="cars" class="js-example-basic-single form-control custom_class">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>

                <br>
                <br>
                <br>
                <br>
            </div>


        </div>
    </div>

@endsection

