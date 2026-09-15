@extends('backend.layouts.master')
@section('title', 'Calculator Menu Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="white_card_body">
                <div class="card-body">
                    <form action="{{route('update_calculator_feature')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="calculator_feature_id" value="{{$calculator_feature->id}}">
                        <div class="card text-center text-white bg-success mb-3">
                            Premium Calculator Features
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Menu Icon</label>
                                <img src="{{asset($calculator_feature->pcf_icon)}}" alt="" style="height=60px; width: auto;">
                                <input type="file" name="pcf_icon" class="form-control" id="inputEmail4"
                                    placeholder="Menu Icon">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Menu Name (English)</label>
                                <input type="text" name="en_pcf_menu" value="{{$calculator_feature->en_pcf_menu}}" class="form-control" id="inputEmail4"
                                    placeholder="Menu Item">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Menu Name (Bangla)</label>
                                <input type="text" name="bn_pcf_menu" value="{{$calculator_feature->bn_pcf_menu}}" class="form-control" id="inputEmail4"
                                    placeholder="Menu Item">
                            </div>
                        </div>
                        <input class="form-control btn btn-success" type="submit" value="Update this Menu">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
