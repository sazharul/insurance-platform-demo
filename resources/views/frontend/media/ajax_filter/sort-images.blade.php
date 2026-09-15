@foreach ($sort_result as $item)
    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-3">
        <div class="media_card" data-bs-toggle="modal" data-bs-target="#imagegallerymodal{{ $item->id }}"
            onclick="show_gallery_slider('{{ $item->id }}')">


            <div class="row p-0">
                @if (isset($item->groupImage))
                    @foreach ($item->groupImage as $index => $single_image)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-0">
                            <img class="gallery_grid_img" src="{{ asset($single_image->name) }}" alt="">
                        </div>
                        @if ($index == 3)
                        @break
                    @endif
                @endforeach
            @endif
        </div>

        <div class="media_title_panel">
            <h6>{{ $item->{app()->getLocale() . '_title'} }}</h6>
            <span class="media_date">{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
            <span class="media_count"><img src="{{ asset('images/website/img_gallery.png') }}"
                    alt=""></span>
        </div>
    </div>
</div>
<div class="modal fade" id="imagegallerymodal{{ $item->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal_custom_content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $item->{app()->getLocale() . '_title'} }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="image-gallery-slider slider_name{{ $item->id }}">
                    @if (isset($item->groupImage))
                        @foreach ($item->groupImage as $single_image)
                            <img src="{{ asset($single_image->name) }}" alt="">
                        @endforeach
                    @endif
                </div>

                <div class="image-gallery-slider-thumbnail slider_thumbnail_name{{ $item->id }}">
                    @if (isset($item->groupImage))
                        @foreach ($item->groupImage as $single_image)
                            <img src="{{ asset($single_image->name) }}" alt="">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
