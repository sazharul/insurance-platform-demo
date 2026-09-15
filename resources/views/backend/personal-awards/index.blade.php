@extends('backend.layouts.master')
@section('title', 'Personal Awards Page')


@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Personal Awards Manage</h3>
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
                                    <a href="{{route('admin.awards.create')}}" data-toggle="modal" data-target="#addcategory" class="btn_1" style="margin-left: 350px" >Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">

                            <table class="table lms_table_active3 ">
                                <thead>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Employee Name</th>
                                    <th>Name English</th>
                                    <th>Name Bangla</th>
                                    <th>Year English</th>
                                    <th>Year Bangla</th>
                                    <th>Recognition English</th>
                                    <th>Recognition Bangla</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($awards as $award)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{!! $award->employee->en_name !!}</td>
                                        <td>{!! $award->en_name !!}</td>
                                        <td>{!! $award->bn_name !!}</td>
                                        <td>{!! $award->en_year !!}</td>
                                        <td>{!! $award->bn_year !!}</td>
                                        <td>{!! $award->en_recognition !!}</td>
                                        <td>{!! $award->bn_recognition !!}</td>
                                        <td>
                                            <img src="{{asset($award->image)}}" style="height: 100px; width: 100px" alt="">
                                        </td>
                                        <td>
                                            <a href="{{route('admin.awards.edit', $award->id)}}" style="display: inline-block" class="btn btn-secondary fa fa-edit"></a>

                                            <a href="{{route('admin.awards.delete', $award->id)}}" style="display: inline-block;" class="btn btn-danger" onclick="deleteAward({{$award->id}})"><i class="fa fa-trash"></i></a>
                                            <form action="{{route('admin.awards.delete', $award->id)}}" method="post" id="delete{{$award->id}}">
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
        function deleteAward(id) {
            event.preventDefault();
            var award = confirm('Are you sure????');
            if (award)
            {
                document.getElementById('delete'+id).submit();
            }
        }
    </script>
@endsection
