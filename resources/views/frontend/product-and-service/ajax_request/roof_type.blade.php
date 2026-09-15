{{-- @foreach ($construction as $cbcr)
    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <option value="{{ $cbcr->id }}" class="select_property_option mt-2"
            onclick="getConstructionRoofID('{{ $cbcr->id }}','{{ $cbcr->{app()->getLocale() . '_name'} }}', this)">
            {{ $cbcr->{app()->getLocale() . '_name'} }}</option>
    </div>
@endforeach --}}

<select class="form-select js-example-basic-single" aria-label="Default select example">
    <option value="" selected>Select Roof check</option>
    @foreach ($construction as $cbcr)
        <option value="{{ $cbcr->id }}"
            onclick="getConstructionRoofID('{{ $cbcr->id }}','{{ $cbcr->{app()->getLocale() . '_name'} }}', this)">
            {{ $cbcr->{app()->getLocale() . '_name'} }}
    @endforeach
</select>

<script>
    $(".js-example-basic-single").select2();

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
</script>
