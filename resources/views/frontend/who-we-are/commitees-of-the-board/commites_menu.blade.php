<div class="row board_commitee text-center cus_mt_20 cus_mb_20">
    @php
        $activeType = request('type', $commiittee_name->first()->en_name);
    @endphp

    @foreach ($commiittee_name as $index => $item)
        <div
                class="col-lg-3 col-md-3 col-sm-6 col-12 mt-2 commitee_btn {{ (request('type', $commiittee_name->first()->en_name) == $item->en_name) ? 'commitee_btn_active' : '' }}">
            <a href="{{  app()->getLocale() === 'bn' ?  '/bn/commitees-of-the-board/' : 'commitees-of-the-board' }}?type={{ urlencode($item->en_name) }}">
                <img class="board_default_image" src="{{ asset('images/website/commitee.png') }}" alt="">
                <img class="board_active_image" src="{{ asset('images/website/commitee_active.png') }}" alt="">
                {{ $item->{app()->getLocale() . '_name'} }}
            </a>
        </div>
    @endforeach

</div>
