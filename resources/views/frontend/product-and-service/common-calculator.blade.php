<div class="row cus_mt_30">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 cus_mb_30">
        <div class="fire_header">
            <div class="card">
                <h2>{{ __('Premium Calculator') }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.fire_insurance') }}">
            <div
                class="product_list {{ Route::currentRouteName() == 'ps.fire_insurance' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.fire_insurance')
                        <img src="{{ asset($premium_calculator[0]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[0]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[0]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.marine_cargo_insurance') }}">
            <div class="product_list {{ Route::currentRouteName() == 'ps.marine_cargo_insurance' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.marine_cargo_insurance')
                        <img src="{{ asset($premium_calculator[1]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[1]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[1]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.motor_insurance') }}">
            <div class="product_list {{ Route::currentRouteName() == 'ps.motor_insurance' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.motor_insurance')
                        <img src="{{ asset($premium_calculator[2]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[2]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[2]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.overseas_mediclaim_insurance') }}">
            <div class="product_list {{ Route::currentRouteName() == 'ps.overseas_mediclaim_insurance' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.overseas_mediclaim_insurance')
                        <img src="{{ asset($premium_calculator[3]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[3]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[3]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>

    </div>
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.personal_accident_insurance') }}">
            <div class="product_list {{ Route::currentRouteName() == 'ps.personal_accident_insurance' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.personal_accident_insurance')
                        <img src="{{ asset($premium_calculator[4]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[4]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[4]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.people_personal_accident_insurance') }}">
            <div class="product_list {{ Route::currentRouteName() == 'ps.people_personal_accident_insurance' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.people_personal_accident_insurance')
                        <img src="{{ asset($premium_calculator[5]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[5]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[5]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.bangabandhu_surokkha_bima') }}">
            <div class="product_list {{ Route::currentRouteName() == 'ps.bangabandhu_surokkha_bima' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.bangabandhu_surokkha_bima')
                        <img src="{{ asset($premium_calculator[6]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[6]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[6]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.flat_apartment_owner_insurance') }}">
            <div class="product_list {{ Route::currentRouteName() == 'ps.flat_apartment_owner_insurance' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.flat_apartment_owner_insurance')
                        <img src="{{ asset($premium_calculator[7]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[7]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[7]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.cash_in_safe_insurance') }}">
            <div class="product_list {{ Route::currentRouteName() == 'ps.cash_in_safe_insurance' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.cash_in_safe_insurance')
                        <img src="{{ asset($premium_calculator[8]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[8]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[8]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.cash_in_transit_insurance') }}">
            <div class="product_list {{ Route::currentRouteName() == 'ps.cash_in_transit_insurance' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.cash_in_transit_insurance')
                        <img src="{{ asset($premium_calculator[9]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[9]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[9]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.cash_on_counter_insurance') }}">
            <div class="product_list {{ Route::currentRouteName() == 'ps.cash_on_counter_insurance' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.cash_on_counter_insurance')
                        <img src="{{ asset($premium_calculator[10]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[10]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[10]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-12 mb-15 insurance_item">
        <a href="{{ route('ps.boiler_insurance') }}">
            <div class="product_list {{ Route::currentRouteName() == 'ps.boiler_insurance' ? 'product_list_active' : '' }}">
                <div class="production_icon">
                    @if (Route::currentRouteName() == 'ps.boiler_insurance')
                        <img src="{{ asset($premium_calculator[11]->white_image) }}" alt="">
                    @else
                        <img src="{{ asset($premium_calculator[11]->color_image) }}" alt="">
                    @endif
                </div>
                <div class="production_content">
                    <h4>{{ $premium_calculator[11]->{app()->getLocale() . '_name'} }}</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12">
        <button class="show_all_insurance_btn"> {{__('Show All')}} </button>
    </div>
</div>
