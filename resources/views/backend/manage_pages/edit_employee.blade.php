@extends('backend.layouts.master')
@section('title', 'Employee Update')

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
    {{-- Update employee start --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employee Page</div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('update_employee') }}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="employee_id" value="{{$employee->id}}">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Employee Name (English) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_employee_name" value="{{$employee->en_employee_name}}" class="form-control" id="basiInput"
                                        required placeholder="Employee Name (English)">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Employee Name (Bangla) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_employee_name" value="{{$employee->bn_employee_name}}" class="form-control" id="basiInput"
                                        required placeholder="Employee Name (Bangla)">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Employee Degination (English) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_employee_desig" value="{{$employee->en_employee_desig}}" class="form-control" id="basiInput"
                                        required placeholder="Employee Degination (English)">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Employee Degination (Bangla) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_employee_desig" value="{{$employee->bn_employee_desig}}" class="form-control" id="basiInput"
                                        required placeholder="Employee Degination (Bangla)">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Employee Department (English) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_employee_dept" value="{{$employee->en_employee_dept}}" class="form-control" id="basiInput"
                                         placeholder="Employee Department (English)">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Employee Department (Bangla) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_employee_dept" value="{{$employee->bn_employee_dept}}" class="form-control" id="basiInput"
                                         placeholder="Employee Department (Bangla)">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="basiInput" class="form-label">Working History (English) <span
                                    class="text-danger">*</span></label>
                                <textarea type="text" class="summernote" name="en_employee_history">{{$employee->en_employee_history}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="basiInput" class="form-label">Working History  (Bangla) <span
                                    class="text-danger">*</span></label>
                                <textarea type="text" class="summernote" name="bn_employee_history">{{$employee->bn_employee_history}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="">
                                    <label for="basiInput" class="form-label">Employee Image</label>
                                    <img class="mb-3" src="{{asset($employee->employee_img)}}" alt="" style="max-height: 200px; width:auto;">
                                    <input type="file" name="employee_img" placeholder=""
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-3 mt-3">
                                Employee Status
                            </div>
                            <div class="col-md-9 mt-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio1">Publish</label>
                                    <input class="form-check-input" type="radio" name="employee_status" {{$employee->employee_status == 1 ? 'checked': ''}} id="inlineRadio1" value="1">
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio2">Unpublish</label>
                                    <input class="form-check-input" type="radio" name="employee_status" {{$employee->employee_status == 0 ? 'checked': ''}} id="inlineRadio2" value="0">
                                </div>
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
    {{-- Update employee end --}}
@endsection
