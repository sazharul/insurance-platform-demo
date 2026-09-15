@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">
                    @include('admin.cms.financial-indicators-menu')
                </div>
                <div class="card-body">
                    @include('admin.financial-list.particular_menu')

                    <form method="GET" action="{{ url('/admin/financial-list') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search"
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
                        <div style="font-size: 12px; font-style: italic; text-align: center;font-weight: bold">[Note: Here will show last five year only]</div>
                        <table class="table" id="editAbleTable">
                            <thead>
                                <tr>
                                    <th> {{__('SL')}} .</th>
                                    <th>{{ $financial_highlight->en_particulars }}</th>
                                    <th>{{ $financial_highlight->bn_particulars }}</th>
                                    @foreach($financial_year as $year)
                                        <th>
                                            English <br>
                                            {{ $year->en_year }}
                                        </th>
                                        <th>
                                            বাংলা <br>
                                            {{ $year->bn_year }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($financial_particular as $item)
                                    <tr style="background: {{ ($loop->even) ? '#d1e7dd' : '#f4f4f4' }};">
                                        <th>{{$loop->iteration}}</th>
                                        <td>
                                            {!! $item->en_particulars !!}
                                        </td>

                                        <td>
                                            {!! $item->bn_particulars !!}
                                        </td>

                                        @foreach($financial_year as $year)
                                            @php
                                                $value_info_list = \App\Models\FinancialList::where('financial_particulars_id', $item->id)->where('financial_years_id', $year->id)->first();
                                            @endphp
                                            @if(isset($value_info_list))
                                                <td>
                                                    <span>{{ $value_info_list->en_value }}</span>
                                                    <input class="form-control edit_click" type="text" style="width: 100px;" data-year="{{ $year->id }}"
                                                           data-particulars="{{ $item->id }}" data-lang="en" data-new="no"
                                                           value="{{ $value_info_list->en_value }}">
                                                </td>

                                                <td>
                                                    <span>{{ $value_info_list->bn_value }}</span>
                                                    <input class="form-control edit_click" type="text" style="width: 100px;" data-year="{{ $year->id }}"
                                                           data-particulars="{{ $item->id }}" data-lang="bn" data-new="no"
                                                           value="{{ $value_info_list->bn_value }}">
                                                </td>
                                            @else
                                                <td>
                                                    <span></span>
                                                    <input class="form-control edit_click" type="text" style="width: 100px;" data-year="{{ $year->id }}"
                                                           data-particulars="{{ $item->id }}" data-lang="en" data-new="yes" value="">
                                                </td>

                                                <td>
                                                    <span></span>
                                                    <input class="form-control edit_click" type="text" style="width: 100px;" data-year="{{ $year->id }}"
                                                           data-particulars="{{ $item->id }}" data-lang="bn" data-new="yes" value="">
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{--                        <div class="pagination-wrapper"> {!! $financiallist->appends(['search' => Request::get('search')])->render() !!} </div>--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
@endsection
@section('js')
    <script>
        $('#editAbleTable td').click(function () {
            $(this).find('span').hide();
            $(this).find('input').show();
            $(this).find('input').focus();
        });

        $('.edit_click').blur(function () {
            $(this).hide();
            $(this).parent().find('span').show();


            var csrf = $('#csrf').val();
            var value = $(this).val();
            var is_english = $(this).data('lang');
            var particulars = $(this).data('particulars');
            var year = $(this).data('year');

            $(this).parent().find('span').html(value);

            $.ajax({
                type: "post",
                url: "{{ route('financial_list_update') }}",
                data: {
                    _token: csrf,
                    value: value,
                    is_english: is_english,
                    particulars: particulars,
                    year: year,
                },
                success: function (response) {
                    $(this).parent().find('span').html(value);
                }
            });

        });
    </script>
@endsection
