@php
$work_processes = App\Models\WorkProcess::first();
@endphp
<div class="col-lg-12">
    <div class="">
        <div class="row table-info plr-0 mx-auto">
            <div class="col-lg-2 col-md-6 col-sm-6 col-12 pl-0 mx-auto" style="width: 200px;">
                <div class="work_flow_item1">
                    <div class="head_circle1">
                        <img class="work_flow_img" src="{{ asset($work_processes->wp_first_icon) }}" alt="">
                        <img class="work_flow_hover_img" src="{{ asset('images/website/t1_hover.png') }}"
                             alt="">
                        <div class="num_count">
                            {{__('01')}}
                        </div>
                    </div>
                    <h5>{{ $work_processes->{app()->getLocale() . '_wp_first_title'} }}</h5>
                    <p>{{ $work_processes->{app()->getLocale() . '_wp_first_description'} }}</p>
                </div>
            </div>
            <div class="col-lg-1 col-sm-1 col-1 pr-0 mobile_none" style="width: 100px;">
                <div class="dotted_line1">
                    <img class="dotted_line_img" src="{{ asset('images/website/wf_line1.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-12 pr-0 mx-auto" style="width: 200px;">
                <div class="work_flow_item2">
                    <div class="head_circle2">
                        <img class="work_flow_img" src="{{ asset($work_processes->wp_sec_icon) }}" alt="">
                        <img class="work_flow_hover_img" src="{{ asset('images/website/t2_hover.png') }}"
                             alt="">
                        <div class="num_count2">
                            {{__('02')}}
                        </div>
                    </div>
                    <h5>{{ $work_processes->{app()->getLocale() . '_wp_sec_title'} }}</h5>
                    <p>{{ $work_processes->{app()->getLocale() . '_wp_sec_description'} }}</p>
                </div>
            </div>
            <div class="col-lg-1 col-sm-1 col-1 pr-0 mobile_none" style="width: 100px;">
                <div class="dotted_line2">
                    <img class="dotted_line_img" src="{{ asset('images/website/wf_line2.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-12 pr-0 mx-auto" style="width: 200px;">
                <div class="work_flow_item3">
                    <div class="head_circle3">
                        <img class="work_flow_img" src="{{ asset($work_processes->wp_third_icon) }}" alt="">
                        <img class="work_flow_hover_img" src="{{ asset('images/website/t3_hover.png') }}"
                             alt="">
                        <div class="num_count">
                            {{__('03')}}
                        </div>
                    </div>
                    <h5>{{ $work_processes->{app()->getLocale() . '_wp_third_title'} }}</h5>
                    <p>{{ $work_processes->{app()->getLocale() . '_wp_third_description'} }}</p>
                </div>
            </div>
            <div class="col-lg-1 col-sm-1 col-1 pr-0 mobile_none" style="width: 100px;">
                <div class="dotted_line3">
                    <img class="dotted_line_img" src="{{ asset('images/website/wf_line3.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-12 pr-0 mx-auto" style="width: 200px;">
                <div class="work_flow_item4">
                    <div class="head_circle4">
                        <img class="work_flow_img" src="{{ asset($work_processes->wp_forth_icon) }}" alt="">
                        <img class="work_flow_hover_img" src="{{ asset('images/website/t4_hover.png') }}"
                             alt="">
                        <div class="num_count2">
                            {{__('04')}}
                        </div>
                    </div>
                    <h5>{{ $work_processes->{app()->getLocale() . '_wp_forth_title'} }}</h5>
                    <p>{{ $work_processes->{app()->getLocale() . '_wp_forth_description'} }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
