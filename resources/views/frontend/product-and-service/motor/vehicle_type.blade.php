@if (count($vehicle_type_list) > 0)
    <h2 class="mt-5 mb-3">{{ __('Vehicle Type') }}</h2>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel_type">
                @foreach ($vehicle_type_list as $item)
                    <div class="property_card">
                        <div class="card carried_card" onclick="motorActiveClass(this);getEngineCapacity(this)"
                            data-id="{{ $item->id }}"
                            data-weight="{{ $item->weight }}"
                            data-url="{{ route('get_engine_capacity') }}">
                            <img class="carried_card_img" src="{{ asset($item->color_image) }}" alt="">
                            <img class="carried_card_active_img" src="{{ asset($item->white_image) }}" alt="">
                            <h3 class="">{{ $item->{app()->getLocale() . '_name'} }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
