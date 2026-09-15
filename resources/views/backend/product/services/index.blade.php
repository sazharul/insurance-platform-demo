@extends('backend.layouts.master')
@section('title', 'Product Service Manage Page')


@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Product Service Manage</h3>
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
                                <div class="add_button ms-2">
                                    <a href="{{ route('admin.product_service.services.create') }}" data-toggle="modal"
                                        data-target="#addcategory" class="btn_1" style="margin-left: 350px">Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">

                            <table class="table lms_table_active3 ">
                                <thead>
                                    <tr>
                                        <th>Sl. No</th>
                                        <th>Service English and Bangla</th>
                                        <th>Title English and Bangla</th>
                                        <th>Short Description English and Bangla</th>
                                        <th>Hero Image</th>
                                        <th class="bg-dark">White Icon</th>
                                        <th>Color Icon</th>
                                        <th>Image</th>
                                        <th>Insurance Process Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $service->en_service_name }}<br>
                                                {{ $service->bn_service_name }}
                                            </td>
                                            <td>
                                                {!! $service->en_title !!} <br>
                                                {!! $service->bn_title !!}
                                            </td>
                                            <td>
                                                {!! $service->en_short_description !!} <br>

                                                {!! $service->bn_short_description !!}
                                            </td>
                                            <td>
                                                <img src="{{ asset($service->hero_image) }}"
                                                    style="height: 100px; width: 100px;" alt="">
                                            </td>

                                            <td>
                                                <img src="{{ asset($service->white_icon) }}"
                                                    style="height: 100px; width: 100px; background: black;" alt="">
                                            </td>
                                            <td>
                                                <img src="{{ asset($service->color_icon) }}"
                                                    style="height: 100px; width: 100px;" alt="">
                                            </td>
                                            <td>
                                                <img src="{{ asset($service->image) }}" style="height: 100px; width: 100px;"
                                                    alt="">
                                            </td>
                                            <td>
                                                <img src="{{ asset($service->insurance_process_image) }}"
                                                    style="height: 100px; width: 100px;" alt="">
                                            </td>
                                            <td>{{ $service->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{ route('admin.product_service.services.edit', $service->id) }}"
                                                    class="btn btn-secondary fa fa-edit" style="display: inline-block"></a>

                                                <a href="{{ route('admin.product_service.services.delete', $service->id) }}"
                                                    class="btn btn-danger" style="display: inline-block"
                                                    onclick="deleteService({{ $service->id }})"><i
                                                        class="fa fa-trash"></i></a>
                                                <form
                                                    action="{{ route('admin.product_service.services.delete', $service->id) }}"
                                                    method="post" id="delete{{ $service->id }}">
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
        function deleteService(id) {
            event.preventDefault();
            var service = confirm('Are you sure????');
            if (service) {
                document.getElementById('delete' + id).submit();
            }
        }
    </script>
@endsection
