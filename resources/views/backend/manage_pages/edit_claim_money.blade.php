@extends('backend.layouts.master')
@section('title', 'Claim Money Edit')

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
        {{-- add Claim Money start --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Claim Money</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <a href="{{ url('/admin/manage-claim-money') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <form method="POST" action="{{ route('update_claim_money') }}" class="form-horizontal" enctype="multipart/form-data"">
                            {{ csrf_field() }}
                            <input type="hidden" name="claim_money_id" value="{{$claim_money->id}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Claim Year (English) <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_claim_year" value="{{$claim_money->en_claim_year}}" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Claim Year (Bangla)<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_claim_year" value="{{$claim_money->bn_claim_year}}" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Claim Money (English) <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_claim_money" value="{{$claim_money->en_claim_money}}" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Claim Money (Bangla)<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_claim_money" value="{{$claim_money->bn_claim_money}}" class="form-control" id="basiInput"
                                            required placeholder="">
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
        {{-- add Claim Money end --}}

@endsection
