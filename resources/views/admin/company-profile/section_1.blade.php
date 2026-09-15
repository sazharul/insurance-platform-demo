@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit CompanyProfile #{{ $companyprofile->id }}</div>
                <div class="card-body">
                    <a href="{{ url('/admin/company-profile') }}" title="Back">
                        <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                    </a>
                    <br/>
                    <br/>

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <img src="{{ asset($companyprofile->company_image) }}" alt="">
                    <form method="POST" action="{{ url('/admin/company-profile/' . $companyprofile->id) }}" accept-charset="UTF-8" class="form-horizontal"
                          enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('company_image') ? 'has-error' : ''}}">
                            <label for="company_image" class="control-label">{{ 'Company Image' }}</label>
                            <input class="form-control" name="company_image" type="file" id="company_image"
                                   value="{{ isset($companyprofile->company_image) ? $companyprofile->company_image : ''}}">
                            {!! $errors->first('company_image', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_company_details') ? 'has-error' : ''}}">
                            <label for="en_company_details" class="control-label">{{ 'En Company Details' }}</label>
                            <textarea class="form-control" rows="5" name="en_company_details" type="textarea"
                                      id="en_company_details">{{ isset($companyprofile->en_company_details) ? $companyprofile->en_company_details : ''}}</textarea>
                            {!! $errors->first('en_company_details', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_company_details') ? 'has-error' : ''}}">
                            <label for="bn_company_details" class="control-label">{{ 'Bn Company Details' }}</label>
                            <textarea class="form-control" rows="5" name="bn_company_details" type="textarea"
                                      id="bn_company_details">{{ isset($companyprofile->bn_company_details) ? $companyprofile->bn_company_details : ''}}</textarea>
                            {!! $errors->first('bn_company_details', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_maintain_title') ? 'has-error' : ''}}">
                            <label for="en_maintain_title" class="control-label">{{ 'En Maintain Title' }}</label>
                            <input class="form-control" name="en_maintain_title" type="text" id="en_maintain_title"
                                   value="{{ isset($companyprofile->en_maintain_title) ? $companyprofile->en_maintain_title : ''}}">
                            {!! $errors->first('en_maintain_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_maintain_title') ? 'has-error' : ''}}">
                            <label for="bn_maintain_title" class="control-label">{{ 'Bn Maintain Title' }}</label>
                            <input class="form-control" name="bn_maintain_title" type="text" id="bn_maintain_title"
                                   value="{{ isset($companyprofile->bn_maintain_title) ? $companyprofile->bn_maintain_title : ''}}">
                            {!! $errors->first('bn_maintain_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="maintain_list">
                            @if(isset($companyprofile->en_maintaining_list))
                                @foreach($companyprofile->en_maintaining_list as $items)
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label class="control-label">{{ 'En Maintain List' }}</label>
                                            <input class="form-control" name="en_maintain_list[]" type="text" value="{{ $items }}">
                                        </div>
                                        <div class="{{ ($loop->iteration > 1) ? 'col-5' : 'col-6' }} form-group">
                                            <label class="control-label">{{ 'Bn Maintain List' }}</label>
                                            <input class="form-control" name="bn_maintain_list[]" type="text"
                                                   value="{{ $companyprofile->bn_maintaining_list[$loop->iteration-1] }}">
                                        </div>
                                        @if($loop->iteration > 1)
                                            <div class="col-1">
                                                <button class="btn btn-danger btn-sm" onclick="remove_maintain_list(this)" type="button" style="margin-top: 24px">Remove
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label class="control-label">{{ 'En Maintain List' }}</label>
                                        <input class="form-control" name="en_maintain_list[]" type="text">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label class="control-label">{{ 'Bn Maintain List' }}</label>
                                        <input class="form-control" name="bn_maintain_list[]" type="text">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <button class="btn btn-primary" onclick="add_more_maintain_list()" type="button">Add New +</button>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Update">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="maintain_list_hide" style="display: none">
        <div class="row">
            <div class="col-6 form-group">
                <label class="control-label">{{ 'En Maintain List' }}</label>
                <input class="form-control" name="en_maintain_list[]" type="text" value="">
            </div>
            <div class="col-5 form-group">
                <label class="control-label">{{ 'Bn Maintain List' }}</label>
                <input class="form-control" name="bn_maintain_list[]" type="text">
            </div>
            <div class="col-1">
                <button class="btn btn-danger btn-sm" onclick="remove_maintain_list(this)" type="button" style="margin-top: 24px">Remove</button>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function add_more_maintain_list() {
            let maintain_list = $('.maintain_list_hide').html()
            $('.maintain_list').append(maintain_list);
        }

        function remove_maintain_list(e) {
            $(e).parent().parent().remove();
        }
    </script>
@endsection
