@extends('backend.layouts.master')
@section('title', 'Award Page')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Award Page</div>
            <div class="card-body">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ route('update_award') }}" class="form-horizontal"
                    enctype="multipart/form-data"">
                    {{ csrf_field() }}
                    <input type="hidden" name="award_id" value="{{$award->id}}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="mt-4">
                                <label for="basiInput" class="form-label">Award Name (English) <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="en_award_name" value="{{$award->en_award_name}}" class="form-control" id="basiInput" required
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="mt-4">
                                <label for="basiInput" class="form-label">Award Name (Bangla)<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="bn_award_name" value="{{$award->bn_award_name}}" class="form-control" id="basiInput" required
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-4">
                                <label for="basiInput" class="form-label">Award Icon</label>
                                <img src="{{asset($award->award_icon)}}" alt="" style="max-height:60px; width:auto;">
                                <input type="file" name="award_icon" placeholder="" class="form-control"
                                    id="basiInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-4">
                                <label for="basiInput" class="form-label">Award Image</label>
                                <img src="{{asset($award->award_img)}}" alt="" style="max-height:200px; width:auto;">
                                <input type="file" name="award_img" placeholder="" class="form-control"
                                    id="basiInput">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <button class="btn btn-success" type="submit">Update this Info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
