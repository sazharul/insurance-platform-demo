<input type="hidden" name="building_construction_id" id="building_construction_id" value="{{ $construction[0]->id }}">
<input type="hidden" name="building_construction_roof_id" id="building_construction_roof_id">
<h2 class="mt-5 mb-3">{{ __('Construction Type') }}</h2>
<div class="row mt-5 mb-3">
    @foreach ($construction as $c_item)
        <div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-2"
            onclick="getConstructionID(this, '{{ $c_item->calculator_id }}','{{ $c_item->id }}')"
            data-url="{{ route('ps.constructionRoofType') }}">
            <div class="card construction_card">
                <p class="up_p">{{ $c_item->{app()->getLocale() . '_class_title'} }}</p>
                <p class="down_p">{{ $c_item->{app()->getLocale() . '_hero_title'} }}</p>
            </div>
            <div class="polygon_icon"><img src="{{ asset('images/website/polygon.png') }}" alt=""></div>
        </div>
    @endforeach
</div>
<div class="row">
    <div class="col-lg-12 mb-45 select_roof_area">
        <div class="row g-3 align-items-center">
            <div class="col-lg-2 col-12 col-auto">
                <label for="inputPassword6" class="col-form-label text-center select_roof_text">Select Roof</label>
            </div>
            <div class="col-lg-10 col-12 col-auto">
                <div class="wrap" onclick="spd3()">
                    <input type="text" id="building_construction_roof_name" class="form-control"
                        aria-describedby="passwordHelpInline"
                        placeholder="Select roof e.g. metal sheet / concrete / brick tile">
                    <span class="filter_arrow_box_small arrow_img3"><img
                            src="{{ asset('images/website/arrow_down.png') }}" alt=""></span>
                </div>

                <div class="selectPropertyDIV3">
                    <div class="row" id="add_roof">
                        {{-- @foreach ($construction[0]->calculatorBuildingConstructionRoof as $cbcr)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <option value="{{ $cbcr->id }}" class="select_property_option mt-2"
                                    onclick="getConstructionRoofID('{{ $cbcr->id }}','{{ $cbcr->{app()->getLocale() . '_name'} }}')">
                                    {{ $cbcr->{app()->getLocale() . '_name'} }}</option>
                            </div>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<h2 class="mt-5 mb-3">{{ __('Interest') }}</h2>
<div class="wrap" onclick="spd4()">
    <input class="filter_card form-control" type="text" id="interest_type_name" placeholder="Select Interest type">
    <span class="filter_arrow_box arrow_img4"><img
            src="{{ asset('images/website/arrow_down.png') }}" alt=""></span>
</div>
<div class="selectPropertyDIV4" id="interest_type">
    {{-- <div class="row" >
        @foreach ($interest as $i_item)
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <option value="{{ $i_item->id }}" class="select_property_option mt-2"
                    onclick="getInterestTypeID('{{ $i_item->id }}','{{ $i_item->{app()->getLocale() . '_name'} }}', this)">
                    {{ $i_item->{app()->getLocale() . '_name'} }}</option>
            </div>
        @endforeach
    </div> --}}
</div>


<h2 class="mt-5 mb-3">{{ __('Total Sum Insured') }}</h2>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <input class="filter_card form-control" type="text" placeholder="Type total sum insured: e,g, 1,00,000">
    </div>
</div>


<h2 class="mt-5 mb-3">{{ __('Additional Coverage') }}</h2>
<div class="row">
    @foreach ($coverage as $c_item)
        <div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-2"
            onclick="getAdditionalCoverageID(this,'{{ $c_item->id }}')">
            <div class="card additional_coverage_card risk_covered">
                <div class="additional_coverage_card_round mb-1"></div>
                <div class="additional_coverage_card_line"></div>
                <img class="round_inside_img white_image" src="{{ asset($c_item->color_image) }}" alt="">
                <img class="round_inside_img black_image" src="{{ asset($c_item->white_image) }}" alt="">
                <p class="">{{ $c_item->{app()->getLocale() . '_name'} }}</p>
            </div>
        </div>
    @endforeach
</div>


<div class="row mt-5 mb-5 additional_coverage_content text-center">
    <div class="col-lg-12 col-sm-12 col-12">
        <div class="form-check form-check-inline">
            <label class="form-check-label vat_exampled" for="inlineCheckbox1">{{ __('Vat Exampled') }} :</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">{{ __('Yes') }}</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">{{ __('No') }}</label>
        </div>
    </div>
</div>
