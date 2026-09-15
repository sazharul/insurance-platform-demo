@foreach ($publications_search as $item)
    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-3">
        <div class="publication_card h-100">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-3 col-12 text-center">
                    <a href="{{ route('media.publications_details', $item->id) }}" class="pb_content_left">
                        <img src="{{ asset($item->image) }}" alt="">
                    </a>
                </div>

                <div class="col-xl-9 col-lg-8 col-md-9 col-sm-9 col-12">
                    <a href="{{ route('media.publications_details', $item->id) }}" class="pb_content_right">
                        <img src="{{ asset('images/website/calender_green.png') }}" alt="">
                        <span>{{ $item->{app()->getLocale() . '_date'} }}</span>
                        <h4>{{ $item->{app()->getLocale() . '_title'} }}</h4>
                        <p>- {{ $item->{app()->getLocale() . '_newspaper_name'} }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
