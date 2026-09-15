<h2 class="mt-5 mb-3">{{ __('Interest') }}</h2>
{{-- <div class="wrap" onclick="spd4()">
    <input class="filter_card form-control" type="text" id="interestType" placeholder="Select interest type"
        onclick="selectPropertyFunction()">
    <span class="filter_arrow_box arrow_img4"><img src="{{ asset('images/website/arrow_down.png') }}"
            alt=""></span>
</div>
<div class="selectPropertyDIV4">
    <div class="row">
        @foreach ($data as $item)
            <div class="col-lg-6">
                <option class="select_property_option mt-2"
                    onclick="getMarineInterestType('{{ $item->id }}','{{ $item->{app()->getLocale() . '_name'} }}', this, '{{ $item->risk_coverage_id }}')">
                    {{ $item->{app()->getLocale() . '_name'} }}</option>
            </div>
        @endforeach
    </div>
</div> --}}


<select class="form-select filter_card mt-2 mb-2 js-example-basic-single" id="interestType"
    aria-label="Default select example" onchange="getMarineInterestType(this)">
    <option value="" selected>Select Interest Type</option>
    @foreach ($data as $item)
        <option class="select_property_option mt-2"
            value="{{ $item->id }},{{ 'name' }}, {{ $item->risk_coverage_id }}">
            {{ $item->{app()->getLocale() . '_name'} }}</option>
    @endforeach
</select>

<script>
    $(".js-example-basic-single").select2();

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
</script>
