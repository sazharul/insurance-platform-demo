@foreach ($branch_list as $list)
    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-5">
        <div class="branch-area">
            <div class="branch-component">
                <div class="img_box">
                    <img src="{{ asset($list->image) }}" alt="">
                </div>

                <div class="mt-3">
                    <h4 class="text-capitalize">{{ $list->{app()->getLocale() . '_employee_name'} }}</h4>
                    <p>{{ $list->{app()->getLocale() . '_employee_designation'} }}</p>

                </div>
                <div class="mt-3 branch-middle-component">
                    <span><img src="{{ asset('images/website/Vector (11).png') }}" alt=""></span>
                    <p>{{ $list->{app()->getLocale() . '_address'} }}</p>

                </div>
                <div class="mt-3 branch-middle-component">
                    <span class="item-1"><img style="margin-bottom: 8px"
                            src="{{ asset('images/website/Vector (12).png') }}" alt=""></span>
                    <p class="item-2"> {{ $list->{app()->getLocale() . '_contact_number'} }},
                        {{ $list->{app()->getLocale() . '_contact_number2'} }}</p>
                </div>

                <div class="maps">
                    <img src="{{ asset('images/website/maps122.png') }}" alt="">
                    <a href="{{ $list->branch_map_url }}"> {{ __('Google Maps') }} </a>
                </div>
                <div class="district"></div>
                <strong class="district_name">{{ $list->{app()->getLocale() . '_name'} }}</strong>
            </div>
        </div>
    </div>
@endforeach
