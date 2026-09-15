@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">CompanyProfile {{ $companyprofile->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/company-profile') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/company-profile/' . $companyprofile->id . '/edit') }}" title="Edit CompanyProfile"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/companyprofile' . '/' . $companyprofile->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete CompanyProfile" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $companyprofile->id }}</td>
                                </tr>
                                <tr><th> Company Image </th><td> {{ $companyprofile->company_image }} </td></tr><tr><th> En Company Details </th><td> {{ $companyprofile->en_company_details }} </td></tr><tr><th> Bn Company Details </th><td> {{ $companyprofile->bn_company_details }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
