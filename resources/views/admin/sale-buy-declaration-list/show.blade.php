@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">SaleBuyDeclarationList {{ $salebuydeclarationlist->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/sale-buy-declaration-list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/sale-buy-declaration-list/' . $salebuydeclarationlist->id . '/edit') }}" title="Edit SaleBuyDeclarationList"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/salebuydeclarationlist' . '/' . $salebuydeclarationlist->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete SaleBuyDeclarationList" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $salebuydeclarationlist->id }}</td>
                                </tr>
                                <tr><th> Icon </th><td> {{ $salebuydeclarationlist->icon }} </td></tr><tr><th> En Name </th><td> {{ $salebuydeclarationlist->en_name }} </td></tr><tr><th> Bn Name </th><td> {{ $salebuydeclarationlist->bn_name }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
