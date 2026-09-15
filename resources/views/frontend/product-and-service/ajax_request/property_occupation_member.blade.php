<h2 class="mt-5 mb-3">{{ __('Type of Property / Occupation') }}</h2>
<div class="row construction_type_panel">
    @foreach ($occupation as $poo_item)
        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-2" onclick="getConstructionType(this)"
            data-calculator_id="{{ $poo_item->calculator_id }}" data-property_occupation_id="{{ $poo_item->id }}"
            data-url="{{ route('ps.constructionType') }}" data-interest_url="{{ route('ps.getInterestType') }}">
            <div class="card carried_card">
                <img src="{{ asset($poo_item->white_image) }}" alt="" class="white_image">
                <img src="{{ asset($poo_item->color_image) }}" alt="" class="black_image">
                <h3 class="">{{ $poo_item->{app()->getLocale() . '_name'} }}</h3>
            </div>
        </div>
    @endforeach
</div>

<h2 class="mt-5 mb-3">{{ __('Member of Association (If any)') }}</h2>
<div>
    <div class="wrap" onclick="spd2()">
        <input class="filter_card form-control" type="text" id="member_association_name"
            placeholder="Select exporters association : e.g. BGMEA/BKMEA/BTMEA">
        <span class="filter_arrow_box arrow_img2"><img src="{{ asset('images/website/arrow_down.png') }}"
                alt=""></span>
    </div>
    <div class="selectPropertyDIV2">
        <div class="row">
            @foreach ($member as $moa_item)
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <option value="{{ $moa_item->id }}" class="select_property_option mt-2"
                        onclick="getMemberAssociationID('{{ $moa_item->id }}','{{ $moa_item->{app()->getLocale() . '_name'} }}', this)">
                        {{ $moa_item->{app()->getLocale() . '_name'} }}</option>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div id="constructionandcoverage"></div>
