                                     @extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">Passengerprice</div>
                <div class="card-body">

                    <form method="GET" action="{{ url('/admin/passenger-price') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search"
                          style="width: 25%;float: right;">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Passenger Price</th>
                                <th>Self Driver Price</th>
                                <th>Paid Driver Price</th>
                                <th>Taco Meter</th>
                                <th>VTS Meter</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($passengerprice as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->passenger_price }} TK</td>
                                        <td>{{ $item->self_driver_price }} TK</td>
                                        <td>{{ $item->paid_driver_price }} TK</td>
                                        <td>{{ $item->tacometer }}%</td>
                                        <td>{{ $item->vts_meter }}%</td>
                                        <td>
                                            <a href="{{ url('/admin/passenger-price/' . $item->id) }}" title="View PassengerPrice"> </a>
                                            <a href="{{ url('/admin/passenger-price/' . $item->id . '/edit') }}" title="Edit PassengerPrice">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $passengerprice->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
