@extends('backend.layouts.master')
@section('title', 'Empolyee Involvement update')

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
    {{-- edit employee involveement start --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employee Involvement Page</div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('update_employee_involvement') }}" class="form-horizontal">
                        {{ csrf_field() }}

                        <input type="hidden" name="employee_involvement_id" value="{{$employee_info->id}}">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Choose Employee Name <span
                                            class="text-danger">*</span></label>
                                            <select name="employee_id" id="" class="form-control">
                                                <option>Select a option</option>
                                                @foreach($employeer as $employeer_info)
                                                <option value="{{$employeer_info->id}}" @if($employeer_info->id == $employee_info->employee_id) selected @endif>{!! $employeer_info->en_employee_name !!}</option>
                                                @endforeach
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company Name (English) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_company_name" value="{{$employee_info->en_company_name}}" class="form-control" id="basiInput"
                                        placeholder="Company Name (English)">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company Name (Bangla) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_company_name" value="{{$employee_info->bn_company_name}}" class="form-control" id="basiInput"
                                        placeholder="Company Name (Bangla)">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Employee Division (English) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_employee_division" value="{{$employee_info->en_employee_division}}" class="form-control" id="basiInput"
                                        required placeholder="Employee Division (English)">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Employee Division (Bangla) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_employee_division" value="{{$employee_info->bn_employee_division}}" class="form-control" id="basiInput"
                                        required placeholder="Employee Division (Bangla)">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="basiInput" class="form-label">Working History (English) <span
                                        class="text-danger">*</span></label>
                                <textarea type="text" class="summernote" name="en_em_invol_history">{{$employee_info->en_em_invol_history}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="basiInput" class="form-label">Working History (Bangla) <span
                                        class="text-danger">*</span></label>
                                <textarea type="text" class="summernote" name="bn_em_invol_history">{{$employee_info->bn_em_invol_history}}</textarea>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button class="btn btn-success" type="submit">Update this Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- edit employee involveement end --}}

@endsection
