@extends('backend.layouts.master')
@section('title', 'Manage Report Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h2 class="text-center">Manage Reports</h2>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <form action="" method="">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Search here.." aria-label="Recipient's username" aria-describedby="button-addon2">
                                                <button class="btn btn-outline-success" type="button" id="button-addon2">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="mb_30 home_page_management_table_area">

                                    <table id="new_data_table" class="table dt-responsive" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Sl. No</th>
                                            <th>Title English</th>
                                            <th>Title Bangla</th>
                                            <th>Icon Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($reports as $report)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{!! $report->en_title !!}</td>
                                                <td>{!! $report->bn_title !!}</td>
                                                <td>
                                                    <img src="{{asset($report->icon_image)}}" style="height: 100px; width: 100px;" alt="">
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.reports_for.reports.edit', $report->id)}}" style="display: inline-block" class="btn btn-secondary fa fa-edit"></a>

                                                    <a href="{{route('admin.reports_for.reports.delete', $report->id)}}" style="display: inline-block;" class="btn btn-danger" onclick="deleteReport({{$report->id}})"><i class="fa fa-trash"></i></a>
                                                    <form action="{{route('admin.reports_for.reports.delete', $report->id)}}" method="post" id="delete{{$report->id}}">
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
        </div>
    </section>

    <script>
        function deleteReport(id) {
            event.preventDefault();
            var report = confirm('Are you sure????');
            if (report)
            {
                document.getElementById('delete'+id).submit();
            }
        }
    </script>
@endsection
