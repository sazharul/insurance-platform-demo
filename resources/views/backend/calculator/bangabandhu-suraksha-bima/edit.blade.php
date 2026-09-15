@extends('backend.layouts.master')
@section('title', 'Bangabandhu Suraksha Bima Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Bangabandhu Suraksha Bima</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{route('admin.calculator.bangabandhu-suraksha-bima.update', $suraksha->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Calculator Name</label>
                                    <div class="col-md-12 ">
                                        <select name="calculator_id" id="" class="form-control" required>
                                            <option value="" selected disabled>select a option</option>
                                            @foreach($calculators as $calculator)
                                                <option value="{{$calculator->id}}" {{$calculator->id == $suraksha->calculator_id ? 'selected': ''}}>{{$calculator->en_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Title English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_title" class="form-control" required value="{{$suraksha->en_title}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Title Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_title" class="form-control" required value="{{$suraksha->bn_title}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">SubTitle English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_subtitle" class="form-control" required value="{{$suraksha->en_subtitle}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">SubTitle Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_subtitle" class="form-control" required value="{{$suraksha->bn_subtitle}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Title1 English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_hero_title1" class="form-control" required value="{{$suraksha->en_hero_title1}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Title1 Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_hero_title1" class="form-control" required value="{{$suraksha->bn_hero_title1}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero SubTitle1 English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_hero_subtitle1" class="form-control" required value="{{$suraksha->en_hero_subtitle1}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero SubTitle1 Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_hero_subtitle1" class="form-control" required value="{{$suraksha->bn_hero_subtitle1}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Title2 English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_hero_title2" class="form-control" required value="{{$suraksha->en_hero_title2}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Title2 Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_hero_title2" class="form-control" required value="{{$suraksha->en_hero_title2}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero SubTitle2 English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_hero_subtitle2" class="form-control" required value="{{$suraksha->en_hero_subtitle2}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero SubTitle2 Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_hero_subtitle2" class="form-control" required value="{{$suraksha->en_hero_subtitle2}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Title3 English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_hero_title3" class="form-control" required value="{{$suraksha->en_hero_title3}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Title3 Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_hero_title3" class="form-control" required value="{{$suraksha->en_hero_title3}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero SubTitle3 English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_hero_subtitle3" class="form-control" required value="{{$suraksha->en_hero_subtitle3}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero SubTitle3 Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_hero_subtitle3" class="form-control" required value="{{$suraksha->en_hero_subtitle3}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Title4 English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_hero_title4" class="form-control" required value="{{$suraksha->en_hero_title4}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Title4 Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_hero_title4" class="form-control" required value="{{$suraksha->en_hero_title4}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero SubTitle4 English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_hero_subtitle4" class="form-control" required value="{{$suraksha->en_hero_subtitle4}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero SubTitle4 Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_hero_subtitle4" class="form-control" required value="{{$suraksha->en_hero_subtitle4}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Capital Sum Insured :</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="capital_sum_insured" class="form-control" required value="{{$suraksha->capital_sum_insured}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Net Premium :</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="net_premium" class="form-control" required value="{{$suraksha->net_premium}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Vat</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="vat" class="form-control" required value="{{$suraksha->vat}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Teriff Code</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="teriff_code" class="form-control" required value="{{$suraksha->teriff_code}}">
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




