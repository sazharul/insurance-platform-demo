@foreach ($sort_result as $item)
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-20">
        <div class="notice_card h-100">
            <img class="notice_img" src="{{ asset($item->image) }}" alt="">
            <span><img class="date_img" src="{{ asset('images/website/calender_green.png') }}" alt=""></span>
            <span>{{ $item->{app()->getLocale() . '_date'} }}</span>
            <a href="{{ route('news_event_details', $item->id) }}">
                <h4>{{ $item->{app()->getLocale() . '_title'} }}</h4>
            </a>
            @if (app()->getLocale() == 'bn')
                <p>{!! \Illuminate\Support\Str::words($item->{app()->getLocale() . '_details'}, 8, '...') !!}</p>
            @else
                <p>{!! \Illuminate\Support\Str::words($item->{app()->getLocale() . '_details'}, 10, '...') !!}</p>
            @endif
            <a class="read_more_btn" href="{{ route('news_event_details', $item->id) }}">
                {{ __('Read More') }} </a>
        </div>
    </div>
@endforeach
