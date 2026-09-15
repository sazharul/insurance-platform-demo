{{-- <div class="row">
    @foreach ($interest as $i_item)
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <option value="{{ $i_item->id }}" class="select_property_option mt-2"
                onclick="getInterestTypeID('{{ $i_item->id }}','{{ $i_item->{app()->getLocale() . '_name'} }}', this)">
                {{ $i_item->{app()->getLocale() . '_name'} }}</option>
        </div>
    @endforeach

</div> --}}

<select class="form-select filter_card mt-2 mb-2 js-example-basic-single" aria-label="Default select example"
    onchange="getInterestTypeID(this)">
    <option value="" selected>Select Interest type</option>
    @foreach ($interest as $i_item)
        <option value="{{ $i_item->id }}" class=" mt-2">
            {{ $i_item->{app()->getLocale() . '_name'} }}</option>
    @endforeach
</select>
<script>
    $(".js-example-basic-single").select2();

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
</script>
