@extends('backend.layouts.master')
@section('title', 'Manage Coverage Page')


@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Coverage Page Manage</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <div class="box_right d-flex lms_block">
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form Active="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search content here...">
                                            </div>
                                            <button type="submit"> <i class="ti-search"></i> </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="add_button ms-2" >
                                    <a href="{{route('admin.product_service.coverage.create')}}" data-toggle="modal" data-target="#addcategory" class="btn_1" style="margin-left: 350px" >Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">

                            <table class="table lms_table_active3 ">
                                <thead>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Product Service Title English</th>
                                    <th>Title English</th>
                                    <th>Title Bangla</th>
                                    <th>Short Description English</th>
                                    <th>Short Description Bangla</th>
                                    <th>White Image</th>
                                    <th>Color Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coverages as $coverage)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{!! $coverage->en_title !!}</td>
                                        <td>{!! $coverage->en_title !!}</td>
                                        <td>{!! $coverage->bn_title !!}</td>
                                        <td>{!! $coverage->en_short_description !!}</td>
                                        <td>{!! $coverage->bn_short_description !!}</td>
                                        <td>
                                            <img src="{{asset($coverage->white_image)}}" style="height: 100px; width: 100px; background: black;" alt="">
                                        </td>

                                        <td>
                                            <img src="{{asset($coverage->color_image)}}" style="height: 100px; width: 100px;" alt="">
                                        </td>
                                        <td>
                                            <a href="{{route('admin.product_service.coverage.edit', $coverage->id)}}" style="display: inline-block" class="btn btn-secondary fa fa-edit"></a>

                                            <a href="{{route('admin.product_service.coverage.delete', $coverage->id)}}" style="display: inline-block;" class="btn btn-danger" onclick="deleteCoverage({{$coverage->id}})"><i class="fa fa-trash"></i></a>
                                            <form action="{{route('admin.product_service.coverage.delete', $coverage->id)}}" method="post" id="delete{{$coverage->id}}">
                                                @csrf
                                            </form>

                                        </td>
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



    <script>
        function deleteCoverage(id) {
            event.preventDefault();
            var coverage = confirm('Are you sure????');
            if (coverage)
            {
                document.getElementById('delete'+id).submit();
            }
        }
    </script>
@endsection
