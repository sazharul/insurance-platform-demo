<div class="show_or_hide_menu">
    <h2 class="mt-5 mb-3">Tariff Type</h2>
    <input class="filter_card form-control" type="text"
        placeholder="Select tariff type : e.g. Import/Export/Inland By Road" onclick="selectPropertyFunction()">
    <span class="filter_arrow_box"><img src="{{ asset('images/website/arrow_down.png') }}" alt=""></span>
    <div id="selectPropertyDIV">
        <div class="row">
            <div class="col-lg-6">
                <button class="select_property_option mt-2">Dhaka</button>
            </div>
            <div class="col-lg-6">
                <button class="select_property_option mt-2">Moforshal (Outside of
                    Dhaka)</button>
            </div>
        </div>
    </div>
</div>
<h2 class="mt-5 mb-3">Total Sum Insured</h2>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <input class="filter_card form-control" type="text" placeholder="Type total sum insured : e.g. 1,00,000">
    </div>
</div>
<h2 class="mt-5 mb-3">Carried By</h2>
<div class="row construction_type_panel">
    <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-12 mt-2">
        <div class="carried_by">
            <div class="card carried_card">
                <img src="{{ asset('images/website/steamer.png') }}" alt="" class="black_image">
                <img src="{{ asset('images/website/steamer_active.png') }}" alt="" class="white_image">
                <h3 class="">By Steamer</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-12 mt-2">
        <div class="carried_by">
            <div class="card carried_card">
                <img src="{{ asset('images/website/helicopter.png') }}" class="black_image" alt="">
                <img src="{{ asset('images/website/air_active.png') }}" alt="" class="white_image">
                <h3 class="">By Air</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-12 mt-2">
        <div class="carried_by">
            <div class="card carried_card">
                <img src="{{ asset('images/website/train.png') }}" class="black_image" alt="">
                <img src="{{ asset('images/website/train.png') }}" alt="" class="white_image">
                <h3 class="">By Road</h3>
            </div>
        </div>
    </div>
</div>
<h2 class="mt-5 mb-3">Risk Covered</h2>
<div class="row">
    <div class="col-lg-4 col-sm-4 col-6 mb-2 risk_covered_btn risk_covered_btn_active">
        <div class="risk_covered">
            <button type="button">ICCA</button>
        </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-6 mb-2 risk_covered_btn">
        <div class="risk_covered">
            <button type="button">ICCB</button>
        </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-6 mb-2 risk_covered_btn">
        <div class="risk_covered">
            <button type="button">ICCC</button>
        </div>
    </div>
</div>
<h2 class="mt-5 mb-3">Addiitonal Coverage</h2>
<div class="row">
    <div class="col-lg-4 col-sm-3">
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="card additional_coverage_card">
            <div class="additional_coverage_card_round mb-1"></div>
            <div class="additional_coverage_card_line"></div>
            <img class="round_inside_img" src="{{ asset('images/website/riot.png') }}" alt="">
            <p class="">Riot and Strike (R&SD) Damage</p>
        </div>
    </div>
    <div class="col-lg-4 col-sm-3">
    </div>
</div>
<div class="row mt-5 mb-5 additional_coverage_content text-center">
    <div class="col-lg-12 col-sm-12 col-12">
        <div class="form-check form-check-inline">
            <label class="form-check-label vat_exampled" for="inlineCheckbox1">Vat Exampled
                :</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
    </div>
</div>
-------------------------------------------------------------------------------------------------
<div class="row">
                        <div class="col-lg-12">
                            <h2>Sub Page 01</h2>
                        </div>
                    </div>
                    <form action="">
                        <h2 class="mt-5 mb-3">Cargo Products</h2>
                        <input class="filter_card form-control" type="text"
                            placeholder="Cargo products : General/Garments" onclick="selectPropertyFunction()">
                        <span class="filter_arrow_box"><img src="{{ asset('images/website/arrow_down.png') }}"
                                alt=""></span>
                        <div id="selectPropertyDIV">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Dhaka</button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Moforshal (Outside of Dhaka)</button>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Member of Association (If any)</h2>
                        <input class="filter_card form-control" type="text"
                            placeholder="Select exporters association : e.g. BGMEA/BKMEA/BTMEA"
                            onclick="selectPropertyFunction()">
                        <span class="filter_arrow_box"><img src="{{ asset('images/website/arrow_down.png') }}"
                                alt=""></span>
                        <div id="selectPropertyDIV">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Dhaka</button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Moforshal (Outside of Dhaka)</button>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Tariff Type</h2>
                        <input class="filter_card form-control" type="text"
                            placeholder="Select tariff type : e.g. Import/Export/Inland By Road"
                            onclick="selectPropertyFunction()">
                        <span class="filter_arrow_box"><img src="{{ asset('images/website/arrow_down.png') }}"
                                alt=""></span>
                        <div id="selectPropertyDIV">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Dhaka</button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Moforshal (Outside of Dhaka)</button>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Total Sum Insured</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <input class="filter_card form-control" type="text"
                                    placeholder="Type total sum insured : e.g. 1,00,000">
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Carried By</h2>
                        <div class="row construction_type_panel">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-12 mt-2">
                                <div class="card carried_card carried_card_active">
                                    <img src="{{ asset('images/website/steamer_active.png') }}" alt="">
                                    <h3 class="">By Steamer</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-12 mt-2">
                                <div class="card carried_card">
                                    <img src="{{ asset('images/website/helicopter.png') }}" alt="">
                                    <h3 class="">By Air</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-12 mt-2">
                                <div class="card carried_card">
                                    <img src="{{ asset('images/website/train.png') }}" alt="">
                                    <h3 class="">By Road</h3>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Risk Covered</h2>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-6 mb-2 risk_covered_btn_active">
                                <button>ICCA</button>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-6 mb-2 risk_covered_btn">
                                <button>ICCB</button>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-6 mb-2 risk_covered_btn">
                                <button>ICCC</button>
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Addiitonal Coverage</h2>
                        <div class="row">
                            <div class="col-lg-4 col-sm-3">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="card additional_coverage_card">
                                    <div class="additional_coverage_card_round mb-1"></div>
                                    <div class="additional_coverage_card_line"></div>
                                    <img class="round_inside_img" src="{{ asset('images/website/riot.png') }}"
                                        alt="">
                                    <p class="">Riot and Strike (R&SD) Damage</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-3">
                            </div>
                        </div>
                        <div class="row mt-5 mb-5 additional_coverage_content text-center">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label vat_exampled" for="inlineCheckbox1">Vat Exampled
                                        :</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                        value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 new_btn_setup">
                                <a class="btn fire_btn fire_btn_reset mb-2" href="">Reset</a>
                                <a class="btn fire_btn fire_btn_calculate mb-2" href="">Calculate</a>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Sub Page 02</h2>
                        </div>
                    </div>
                    <form action="">
                        <h2 class="mt-5 mb-3">Cargo Products</h2>
                        <input class="filter_card form-control" type="text"
                            placeholder="Cargo products : General/Garments" onclick="selectPropertyFunction()">
                        <span class="filter_arrow_box"><img src="{{ asset('images/website/arrow_down.png') }}"
                                alt=""></span>
                        <div id="selectPropertyDIV">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Dhaka</button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Moforshal (Outside of Dhaka)</button>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Member of Association (If any)</h2>
                        <input class="filter_card form-control" type="text"
                            placeholder="Select exporters association : e.g. BGMEA/BKMEA/BTMEA"
                            onclick="selectPropertyFunction()">
                        <span class="filter_arrow_box"><img src="{{ asset('images/website/arrow_down.png') }}"
                                alt=""></span>
                        <div id="selectPropertyDIV">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Dhaka</button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Moforshal (Outside of Dhaka)</button>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Tariff Type</h2>
                        <input class="filter_card form-control" type="text"
                            placeholder="Select tariff type : e.g. Import/Export/Inland By Road"
                            onclick="selectPropertyFunction()">
                        <span class="filter_arrow_box"><img src="{{ asset('images/website/arrow_down.png') }}"
                                alt=""></span>
                        <div id="selectPropertyDIV">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Dhaka</button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="select_property_option mt-2">Moforshal (Outside of Dhaka)</button>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Total Sum Insured</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <input class="filter_card form-control" type="text"
                                    placeholder="Type total sum insured : e.g. 1,00,000">
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Carried By</h2>
                        <div class="row construction_type_panel">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-12 mt-2">
                                <div class="card carried_card">
                                    <img src="{{ asset('images/website/steamer.png') }}" alt="">
                                    <h3 class="">By Steamer</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-12 mt-2">
                                <div class="card carried_card carried_card_active">
                                    <img src="{{ asset('images/website/air_active.png') }}" alt="">
                                    <h3 class="">By Air</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-12 mt-2">
                                <div class="card carried_card">
                                    <img src="{{ asset('images/website/train.png') }}" alt="">
                                    <h3 class="">By Road</h3>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Risk Covered</h2>
                        <div class="row">
                            <div class="col-lg-2 col-sm-12 risk_covered_btn">

                            </div>
                            <div class="col-lg-4 col-sm-6 col-12 mb-2 risk_covered_btn_active">
                                <button>Air All Risk</button>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12 mb-2 risk_covered_btn">
                                <button>Air Risk Only</button>
                            </div>
                            <div class="col-lg-2 col-sm-12 risk_covered_btn">

                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">Addiitonal Coverage</h2>
                        <div class="row">
                            <div class="col-lg-4 col-sm-3">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="card additional_coverage_card">
                                    <div class="additional_coverage_card_round mb-1"></div>
                                    <div class="additional_coverage_card_line"></div>
                                    <img class="round_inside_img" src="{{ asset('images/website/riot.png') }}"
                                        alt="">
                                    <p class="">Riot and Strike (R&SD) Damage</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-3">
                            </div>
                        </div>
                        <div class="row mt-5 mb-5 additional_coverage_content text-center">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label vat_exampled" for="inlineCheckbox1">Vat Exampled
                                        :</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                        value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 new_btn_setup">
                                <a class="btn fire_btn fire_btn_reset mb-2" href="">Reset</a>
                                <a class="btn fire_btn fire_btn_calculate mb-2" href="">Calculate</a>
                            </div>
                        </div>
                    </form>