@extends('backend.layouts.master')
@section('title', 'Premium Calculator Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Update order details</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.invoiceCalculatorInsuraneEditUpdate', $order->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Certificate Number</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="code" class="form-control"
                                            value="{{ $order->code }}" placeholder="Enter certificate number" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Insurance Policy</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="file1" class="form-control">
                                    </div>
                                    @if ($order->file1)
                                        <iframe src="{{ asset($order->file1) }}" frameborder="0"
                                            style="height:200px;width:300px;"></iframe>
                                    @endif
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Money Receipt</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="file2" class="form-control">
                                    </div>
                                    @if ($order->file2)
                                        <iframe src="{{ asset($order->file2) }}" frameborder="0"
                                            style="height:200px;width:300px;"></iframe>
                                    @endif
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Others</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="file3" class="form-control">
                                    </div>
                                    @if ($order->file3)
                                        <iframe src="{{ asset($order->file3) }}" frameborder="0"
                                            style="height:200px;width:300px;"></iframe>
                                    @endif
                                </div>
                                {{-- <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">File 4</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="file4" class="form-control">
                                    </div>
                                    @if ($order->file4)
                                        <iframe src="{{ asset($order->file4) }}" frameborder="0"
                                            style="height:200px;width:300px;"></iframe>
                                    @endif
                                </div> --}}

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-success text-center" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
