@extends('backend.layouts.master')
@section('title', 'Card Menu Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="white_card_body">
                <div class="card-body">
                    <form action="{{route('update_card_menu')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="card_menu_id" value="{{$card_menu->id}}">
                        <div class="card text-center text-white bg-success mb-3">
                            Premium Calculator Features
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Menu Icon</label>
                                <img src="{{asset($card_menu->hhcm_icon)}}" alt="" style="height=60px; width: auto;">
                                <input type="file" name="hhcm_icon" class="form-control" id="inputEmail4"
                                    placeholder="Menu Item">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Menu Name (English)</label>
                                <input type="text" name="en_hhcm_menu" value="{{$card_menu->en_hhcm_menu}}" class="form-control" id="inputEmail4"
                                    placeholder="Menu Item">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Menu Name (Bangla)</label>
                                <input type="text" name="bn_hhcm_menu" value="{{$card_menu->bn_hhcm_menu}}" class="form-control" id="inputEmail4"
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
