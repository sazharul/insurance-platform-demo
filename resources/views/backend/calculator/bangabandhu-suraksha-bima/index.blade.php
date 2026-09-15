@extends('backend.layouts.master')
@section('title', 'Bangabandhu Suraksha Bima Manage Page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Bangabandhu Suraksha Bima Edit</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form Active="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search content here...">
                                            </div>
                                            <button type="submit">
                                                <i class="ti-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="add_button ms-2">
                                    <a href="{{ route('admin.calculator.bangabandhu-suraksha-bima.create') }}"
                                        data-toggle="modal" data-target="#addcategory" class="btn_1">Add
                                        New</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">

                            <table class="table lms_table_active3 ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Calculator Name</th>
                                        <th scope="col">Title English</th>
                                        <th scope="col">Title Bangla</th>
                                        <th scope="col">SubTitle English</th>
                                        <th scope="col">SubTitle Bangla</th>
                                        <th scope="col">Hero Title1 English</th>
                                        <th scope="col">Hero Title1 Bangla</th>
                                        <th scope="col">Hero SubTitle1 English</th>
                                        <th scope="col">Hero SubTitle1 Bangla</th>
                                        <th scope="col">Hero Title2 English</th>
                                        <th scope="col">Hero Title2 Bangla</th>
                                        <th scope="col">Hero SubTitle2 English</th>
                                        <th scope="col">Hero SubTitle2 Bangla</th>
                                        <th scope="col">Hero Title3 English</th>
                                        <th scope="col">Hero Title3 Bangla</th>
                                        <th scope="col">Hero SubTitle3 English</th>
                                        <th scope="col">Hero SubTitle3 Bangla</th>
                                        <th scope="col">Hero Title4 English</th>
                                        <th scope="col">Hero Title4 Bangla</th>
                                        <th scope="col">Hero SubTitle4 English</th>
                                        <th scope="col">Hero SubTitle4 Bangla</th>
                                        <th scope="col">Capital Sum Insured</th>
                                        <th scope="col">Net Premium</th>
                                        <th scope="col">vat</th>
                                        <th scope="col">Teriff Code</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suraksha_bima as $suraksha)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $suraksha->calculator->en_name !!}</td>
                                            <td>{!! $suraksha->en_title !!}</td>
                                            <td>{!! $suraksha->bn_title !!}</td>
                                            <td>{!! $suraksha->en_subtitle !!}</td>
                                            <td>{!! $suraksha->bn_subtitle !!}</td>
                                            <td>{!! $suraksha->en_hero_title1 !!}</td>
                                            <td>{!! $suraksha->bn_hero_title1 !!}</td>
                                            <td>{!! $suraksha->en_hero_subtitle1 !!}</td>
                                            <td>{!! $suraksha->bn_hero_subtitle1 !!}</td>
                                            <td>{!! $suraksha->en_hero_title2 !!}</td>
                                            <td>{!! $suraksha->bn_hero_title2 !!}</td>
                                            <td>{!! $suraksha->en_hero_subtitle2 !!}</td>
                                            <td>{!! $suraksha->bn_hero_subtitle2 !!}</td>
                                            <td>{!! $suraksha->en_hero_title3 !!}</td>
                                            <td>{!! $suraksha->bn_hero_title3 !!}</td>
                                            <td>{!! $suraksha->en_hero_subtitle3 !!}</td>
                                            <td>{!! $suraksha->bn_hero_subtitle3 !!}</td>
                                            <td>{!! $suraksha->en_hero_title4 !!}</td>
                                            <td>{!! $suraksha->bn_hero_title4 !!}</td>
                                            <td>{!! $suraksha->en_hero_subtitle4 !!}</td>
                                            <td>{!! $suraksha->bn_hero_subtitle4 !!}</td>
                                            <td>{!! $suraksha->capital_sum_insured !!}</td>
                                            <td>{!! $suraksha->net_premium !!}</td>
                                            <td>{!! $suraksha->vat !!}</td>
                                            <td>{!! $suraksha->teriff_code !!}</td>
                                            <td><a href="{{ route('admin.calculator.bangabandhu-suraksha-bima.edit', $suraksha->id) }}"
                                                    class="btn btn-secondary">Edit</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
