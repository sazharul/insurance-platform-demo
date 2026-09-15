<nav class="sidebar">
    @php
        $header_content = App\Models\HomePage::first();
    @endphp
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="{{ route('admin_home') }}"><img src="{{ asset($header_content->main_logo) }}"
                alt=""></a>
        <a class="small_logo" href="{{ route('admin_home') }}"><img src="{{ asset($header_content->main_logo) }}"
                alt="" style="width: 100px;"></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="">
            <a href="{{ route('admin_home') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend') }}/img/menu-icon/3.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Dashboard</span>
                </div>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend') }}/img/menu-icon/3.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>CMS</span>
                </div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.home') }}">Home</a>
                    <a href="{{ route('admin.cms.who_we_are') }}">Who We Are</a>
                    <a href="{{ route('admin.cms.product_services') }}">Products & Services</a>
                    <a href="{{ route('admin.cms.financial_indicators') }}">Financial Indicators</a>
                    <a href="{{ route('admin.cms.investors_relation') }}">Investors Relation</a>
                    <a href="{{ route('admin.cms.contact') }}">Contact & Report</a>
                    <a href="{{ route('admin.cms.more') }}">More</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend') }}/img/menu-icon/3.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Admin Info</span>
                </div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.auth.createAdmin') }}">Create Admin</a>
                </li>
                <li>
                    <a href="{{ route('admin.auth.adminList') }}">Admin List</a>
                </li>
            </ul>
        </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend') }}/img/menu-icon/12.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Product & Services</span>
                </div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.product_service.services.create') }}">Create Service</a>
                </li>
                <li>
                    <a href="{{ route('admin.product_service.services.manage') }}">Manage Service</a>
                </li>
            </ul>
        </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend') }}/img/menu-icon/3.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Coverage Section</span>
                </div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.product_service.coverage.create') }}">Create Coverage</a>
                </li>
                <li>
                    <a href="{{ route('admin.product_service.coverage.manage') }}">Manage Coverage</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend') }}/img/menu-icon/3.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Pages</span>
                </div>
            </a>
            <ul>
                @foreach ($pages as $page)
                    <li>
                        <a href="{{ route('admin.pages', $page->slug) }}">{{ $page->en_name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>


        <li class="">
            <a class="has-arrow bg-primary" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend') }}/img/menu-icon/12.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Premium Calculator Section</span>
                </div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.calculator.index') }}">Premium Calculator</a>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Fire</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.interest-type.index') }}">Interest Type</a>
                            <a href="{{ route('admin.calculator.indexFireInterestTeriff.index') }}">Fire Interest
                                Teriff</a>
                            <a href="{{ route('admin.calculator.indexFireAdditionalSubcoverage.index') }}">Fire
                                Additional Subcoveragerrr</a>
                            <a href="{{ route('admin.calculator.indexFireAdditionalCoverage.index') }}">Fire Additional
                                Coverage Teriff</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Motor</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.motor-insurance.index') }}">Motor Insurance</a>
                        </li>

                        <li>
                            <a href="{{ route('passenger-price.index') }}">Passenger & Driver Price</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.calculator.vehicle-category.index') }}">Vehicle Category</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.calculator.vehicle-types.index') }}">Vehicle Type</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('admin.calculator.engine-capacity.index') }}">Engine Capacity</a>
                        </li> --}}

                        <li>
                            <a href="{{ route('calculator-motor-tariff-price.index') }}">Motor Tariff</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Marin Cargo Insurance</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.cargo-products.index') }}">Cargo Products</a>
                            <a href="{{ route('admin.calculator.tariff-types.index') }}">Tariff Type</a>
                            <a href="{{ route('admin.calculator.carried-bies.index') }}">Carried By</a>
                            <a href="{{ route('admin.calculator.indexMarineInterest.index') }}">Marine Interest</a>
                            <a href="{{ route('admin.calculator.indexMarineTeriff.index') }}">Marine Teriff</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Overseas Mediclaim Insurance</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.insurance-sub-type.index') }}">Insurance Sub Type</a>
                            <a href="{{ route('admin.calculator.country.index') }}">Country</a>
                            <a href="{{ route('admin.calculator.country-visits.index') }}">Countries to be Visited</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Personal Accident</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.indexPersonalAccidentTeriff.index') }}">Personal
                                Accident Teriff</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.personal_info') }}">Personal
                                Accident Validation</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>People Personal Accident</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.peoples-personal-accident.index') }}">Peoples Personal
                                Accident Insurance</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Bangobandhu</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.bangabandhu-suraksha-bima.index') }}">Bangabandhu
                                Suraksha Bima</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Flat/Apartment</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.indexFlatTeriff.index') }}">Flat Teriff</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Cash-in-safe</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.indexCashInSafeTeriff.index') }}">Cash in Safe
                                Teriff</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Cash-in-Transit</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.indexCashInTransitTeriff.index') }}">Cash in Transit
                                Teriff</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Cash on counter</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.indexCashInCounterTeriff.index') }}">Cash in Counter
                                Teriff</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Boiler and Pressure</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.boilerTeriff.index') }}">Boiler Teriff</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_title">
                            <span>Common</span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.calculator.property.index') }}">Property Location</a>
                            <a href="{{ route('admin.calculator.occupation.index') }}">Property / Occupation</a>
                            <a href="{{ route('admin.calculator.associations.index') }}">Member of Association</a>
                            <a href="{{ route('admin.calculator.building-constructions.index') }}">Building
                                Constructions</a>
                            <a href="{{ route('admin.calculator.construction-roofs.index') }}">Building Construction
                                roof</a>
                            <a href="{{ route('admin.calculator.additional-coverage.index') }}">Additional
                                Coverage</a>
                            <a href="{{ route('admin.calculator.risk-cover.index') }}">Risk Cover</a>
                            <a href="{{ route('admin.calculator.strike-riot-civil-commotions.index') }}">Strike Riot
                                Civil Commotion (SRCC) Type</a>
                            <a href="{{ route('admin.calculator.institution-types.index') }}">Type of Institution</a>

                            <a href="{{ route('admin.calculator.insurance-districts.index') }}">Insurance District</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="{{ route('admin.calculator.insured-city.index') }}">Incured City</a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
