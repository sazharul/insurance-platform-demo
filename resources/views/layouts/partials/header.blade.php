@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    
    $numto = new NumberToBangla();
@endphp
<section class="top_header_info_section">
    <div class="container">
        @php
            $header_content = App\Models\HomePage::first();
        @endphp
        <div class="row">
            <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-12">
                <div class="header_info_left">
                    <div class="info_list">
                        <img src="{{ asset('images/icon/email_icon_white.png') }}" alt="">
                        <a href="mailto:info@coversure.demo">{{ $header_content->email }}</a>
                    </div>
                    <div class="info_list">
                        <img src="{{ asset('images/icon/phone_icon_white.png') }}" alt="">
                        <a href="tel:02223384600">{{ eng_to_bng($header_content->phone) }}</a>
                    </div>
                    <div class="info_list">
                        <img src="{{ asset('images/icon/mobile_icon_white.png') }}" alt="">
                        <a href="tel:09610001234">{{ eng_to_bng($header_content->mobile) }}</a>
                    </div>
                    <div class="info_list">
                        <img src="{{ asset('images/icon/hotline_icon_white.png') }}" alt="">
                        <a href="tel:16130"> {{ $header_content->{app()->getLocale() . '_hot_line'} }}</a>
                    </div>
                </div>
            </div>
            @php
                
            @endphp
            <div class="col-xxl-5 col-xl-4 col-lg-3 col-md-12">
                <div class="header_info_right">
                    <div class="info_list">
                        <span> {{ __('Follow Us') }} :</span>
                        <a target="_blank" href="{{ $header_content->facebook_link }}"><img
                                src="{{ asset('images/icon/facebook_icon_white.png') }}" alt=""></a>
                        <a target="_blank" href="{{ $header_content->youtube_link }}"><img
                                src="{{ asset('images/icon/youtube_icon_white.png') }}" alt=""></a>
                        <span class="no_wrap language_change_section">
                            <img class="mri-5" src="{{ asset('images/icon/earth_icon_white.png') }}" alt="">
                            <span>{{ app()->getLocale() == 'en' ? 'English' : 'বাংলা' }}</span>
                            <img src="{{ asset('images/icon/arrow_icon_white.png') }}" alt="">
                        </span>
                        @if (Route::currentRouteName() == 'calculation.buyMotor' ||
                                Route::currentRouteName() == 'calculation.buyMediclaim' ||
                                Route::currentRouteName() == 'calculation.buyPersonalAccident' ||
                                Route::currentRouteName() == 'calculation.buyPeoplePersonalAccident' ||
                                Route::currentRouteName() == 'calculation.buyBongoBunduSurokhaBima' ||
                                Route::currentRouteName() == 'calculation.buyFlat')
                        @else
                            <div class="language_select_option">
                                <a
                                    href="{{ app()->getLocale() == 'en' ? url()->current() : str_replace('/bn', '', url()->current()) }}">English</a>
                                <a
                                    href="{{ app()->getLocale() == 'en' ? (request()->path() == '/' ? '/bn' : '/bn/' . request()->path()) : url()->current() }}">বাংলা</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="top_header_logo_section">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-1 col-md-6 col-sm-6 col-6">
                <a href="{{ route('home') }}" class="others_logo_section">
                    <img src="{{ asset($header_content->year_log) }}" alt="">
                </a>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="head_address_section">
                    <img src="{{ asset($header_content->location_icon) }}" alt="">
                    <address>{{ $header_content->{app()->getLocale() . '_location'} }}</address>
                </div>
                {{-- <div class="head_address">
                </div> --}}
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                <a href="{{ route('home') }}" class="main_logo">
                    <img src="{{ asset($header_content->main_logo) }}" alt="">
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6">
                <div class="motto_section">
                    <h2>{{ $header_content->{app()->getLocale() . '_motto'} }}</h2>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Mobile section Start --}}
<section class="mobile_logo">
    <div class="container">
        <div class="row">
            <div class="col-2">
                {{--   Start Mobile Menu Section   --}}
                <div class="mobile_menu">
                    <div class="hamburger">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </div>
                {{--   End Mobile Menu Section   --}}
            </div>


            <div class="col-8">
                <a href="/" class="main_logo">
                    <img src="{{ asset($header_content->main_logo) }}" alt="">
                </a>
            </div>

            <div class="col-2">
                <a href="/" class="others_logo_section">
                    <img src="{{ asset($header_content->year_log) }}" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

<section class="mobile_side_menu">
    <div class="mobile_side_menu_header">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-12">
                    <div class="header_info_left">
                        <div class="info_list">
                            <img src="{{ asset('images/icon/email_icon_white.png') }}" alt="">
                            <a href="mailto:info@coversure.demo">{{ $header_content->email }}</a>
                        </div>
                        <div class="info_list">
                            <img src="{{ asset('images/icon/phone_icon_white.png') }}" alt="">
                            <a href="tel:02223384600">{{ $header_content->phone }}</a>
                        </div>
                        <div class="info_list">
                            <img src="{{ asset('images/icon/mobile_icon_white.png') }}" alt="">
                            <a href="tel:09610001234">{{ $header_content->mobile }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-5 col-md-12">
                    <div class="header_info_right">
                        <div class="info_list">
                            <span>{{ __('Follow Us') }} :</span>
                            <a href="{{ $header_content->facebook_link }}"><img
                                    src="{{ asset('images/icon/facebook_icon_white.png') }}" alt=""></a>
                            <a href="{{ $header_content->youtube_link }}"><img
                                    src="{{ asset('images/icon/youtube_icon_white.png') }}" alt=""></a>
                            <span class="no_wrap language_change_section">
                                <img class="mri-5" src="{{ asset('images/icon/earth_icon_white.png') }}"
                                    alt="">
                                <span>{{ app()->getLocale() == 'en' ? 'English' : 'বাংলা' }}</span>
                                <img src="{{ asset('images/icon/arrow_icon_white.png') }}" alt="">
                            </span>
                            @if (Route::currentRouteName() == 'calculation.buyMotor' ||
                                    Route::currentRouteName() == 'calculation.buyMediclaim' ||
                                    Route::currentRouteName() == 'calculation.buyPersonalAccident' ||
                                    Route::currentRouteName() == 'calculation.buyPeoplePersonalAccident' ||
                                    Route::currentRouteName() == 'calculation.buyBongoBunduSurokhaBima' ||
                                    Route::currentRouteName() == 'calculation.buyFlat')
                            @else
                                <div class="language_select_option">
                                    <a
                                        href="{{ app()->getLocale() == 'en' ? url()->current() : str_replace('/bn', '', url()->current()) }}">English</a>
                                    <a
                                        href="{{ app()->getLocale() == 'en' ? (request()->path() == '/' ? '/bn' : '/bn/' . request()->path()) : url()->current() }}">বাংলা</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $menus = \App\Models\Menu::where('parent_id', null)->get();
    @endphp
    <nav>
        <ul class="side_menu_section">
            @foreach ($menus as $item)
                @php
                    $url = '';
                    if (isset($item->url)) {
                        if (app()->getLocale() == 'en') {
                            $url = $item->url;
                        } else {
                            if ($item->url == '/') {
                                $url = '/bn';
                            } else {
                                $url = '/bn' . $item->url;
                            }
                        }
                    } else {
                        $url = 'javascript:void(0)';
                    }
                @endphp
                <li>
                    <a href="{{ $url }}"> {{ $item->{app()->getLocale() . '_name'} }} @if (count($item->subMenu) > 0)
                            <img src="{{ asset('images/icon/arrow_bottom_white.png') }}" alt="">
                        @endif
                    </a>

                    @if (count($item->subMenu) > 0)
                        <ul class="side_sub_menu_section">
                            @foreach ($item->subMenu as $sub_menu_items)
                                <li>
                                    <a
                                        href="{{ isset($sub_menu_items->url) ? (app()->getLocale() == 'bn' ? '/bn' . $sub_menu_items->url : $sub_menu_items->url) : 'javascript:void(0)' }}">{{ $sub_menu_items->{app()->getLocale() . '_name'} }}</a>
                                </li>
                            @endforeach

                        </ul>
                    @endif

                </li>
            @endforeach
            @auth
                <li>
                    <a href="javascript:;">{{ strtok(auth()->user()->name, ' ') }}<img src="{{ asset('images/icon/arrow_bottom_white.png') }}" alt=""></a>
                    <ul class="side_sub_menu_section">
                        <li>
                            <a href="{{ route('user.dashboard') }}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('user.logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{ route('user.login', ['ref' => 'self']) }}">Login</a>
                </li>

            @endauth
        </ul>
    </nav>
</section>

{{-- Mobile section End --}}


{{-- Web section Start --}}
<section class="top_header_menu_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_menu_list">
                    <ul class="desktop_menu">
                        @foreach ($menus as $item)
                            @php
                                $url = '';
                                if (isset($item->url)) {
                                    if (app()->getLocale() == 'en') {
                                        $url = $item->url;
                                    } else {
                                        if ($item->url == '/') {
                                            $url = '/bn';
                                        } else {
                                            $url = '/bn' . $item->url;
                                        }
                                    }
                                } else {
                                    $url = 'javascript:void(0)';
                                }
                            @endphp
                            <li class="show_sub_menu">
                                <a class="main_menu pl-0 empty_sub"
                                    href="{{ $url }}">{{ $item->{app()->getLocale() . '_name'} }}
                                    @if (count($item->subLeftMenu) > 0 || count($item->subRightMenu) > 0)
                                        <span><img src="{{ asset('images/icon/arrow_bottom_white.png') }}"
                                                alt=""></span>
                                    @endif
                                </a>

                                @if (count($item->subLeftMenu) > 0)
                                    <ul class="desktop_sub_menu1 {{ $loop->last ? 'desktop_sub_menu1_last' : '' }}">
                                        @foreach ($item->subLeftMenu as $sub_left_items)
                                            <li>
                                                <a
                                                    href="{{ isset($sub_left_items->url) ? (app()->getLocale() == 'bn' ? '/bn' . $sub_left_items->url : $sub_left_items->url) : 'javascript:void(0)' }}">{{ $sub_left_items->{app()->getLocale() . '_name'} }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if (count($item->subRightMenu) > 0)
                                    <ul class="desktop_sub_menu2 {{ $loop->last ? 'desktop_sub_menu2_last' : '' }}">
                                        @foreach ($item->subRightMenu as $sub_right_items)
                                            <li>
                                                <a
                                                    href="{{ isset($sub_right_items->url) ? (app()->getLocale() == 'bn' ? '/bn' . $sub_right_items->url : $sub_right_items->url) : 'javascript:void(0)' }}">{{ $sub_right_items->{app()->getLocale() . '_name'} }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        @auth
                            <li class="show_sub_menu">
                                <a href="javascript:;">{{ strtok(auth()->user()->name, ' ') }}</a>
                                <ul class="desktop_sub_menu1">
                                    <li>
                                        <a href="{{ route('user.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.logout') }}">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="show_sub_menu">
                                <a class="main_menu pl-0 empty_sub"
                                    href="{{ route('user.login', ['ref' => 'self']) }}">Login</a>
                            </li>

                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Web section End --}}
