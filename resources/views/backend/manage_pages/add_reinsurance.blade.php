@extends('backend.layouts.master')
@section('title', 'Add Reinsurance')

@section('content')
        @if (Session::has('message'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif
        {{-- add Reinsurance info start --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Reinsurance Page</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('save_reinsurance') }}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> En Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_title" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> Bn Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_title" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> En Breadcrumb 1 <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_breadcrumb1" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> Bn Breadcrumb 1 <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_breadcrumb1" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> En Breadcrumb 2 <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_breadcrumb2" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> Bn Breadcrumb 2 <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_breadcrumb2" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="basiInput" class="form-label">Reinsurance Hero Image</label>
                                        <input type="file" name="reinsurance_hero_img" placeholder="Claim Page Image"
                                            class="form-control" id="basiInput">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="basiInput" class="form-label">En Reinsurance Description <span
                                        class="text-danger">*</span></label>
                                    <textarea type="text" id="en_details" name="en_reinsurance_description"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="basiInput" class="form-label">Bn Reinsurance Description <span
                                        class="text-danger">*</span></label>
                                    <textarea type="text" id="bn_details" name="bn_reinsurance_description"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> En Reinsurance Type Details <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="en_reinsurance_type_details" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> Bn Reinsurance Type Details <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="bn_reinsurance_type_details" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> En Reinsurance Type Details 2<span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="en_reinsurance_type_details2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> Bn Reinsurance Type Details 2<span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="bn_reinsurance_type_details2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label">En Reinsurance Percentage <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_reinsurance_percentage" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label">Bn Reinsurance Percentage <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_reinsurance_percentage" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="basiInput" class="form-label">En Percentage Description <span
                                        class="text-danger">*</span></label>
                                    <textarea type="text" id="en_company_details" name="en_percentage_description"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="basiInput" class="form-label">Bn Percentage Description <span
                                        class="text-danger">*</span></label>
                                    <textarea type="text" id="bn_company_details" name="bn_percentage_description"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> En Reinsurance Type Details 3<span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="en_reinsurance_type_details3" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label"> Bn Reinsurance Type Details 3<span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="bn_reinsurance_type_details3" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label">En Reinsurance Coverage Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_reinsurance_coverage_title" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label">Bn Reinsurance Coverage Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_reinsurance_coverage_title" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="basiInput" class="form-label">Reinsurance Coverage Image</label>
                                        <input type="file" name="reinsurance_coverage_img" placeholder="Claim Page Image"
                                            class="form-control" id="basiInput">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label">En Reinsurance Broker Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_reinsurance_broker_title" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="">
                                        <label for="basiInput" class="form-label">Bn Reinsurance Broker Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_reinsurance_broker_title" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="basiInput" class="form-label">Reinsurance Broker Image</label>
                                        <input type="file" name="reinsurance_broker_img" placeholder="Claim Page Image"
                                            class="form-control" id="basiInput">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-success" type="submit">Add this Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- add Reinsurance info end --}}

@endsection
