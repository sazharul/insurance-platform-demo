@foreach ($videos_search as $item)
<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-3">
    <div class="media_card" data-bs-toggle="modal" data-bs-target="#videoplayermodal{{$item->id}}"
        onclick="show_video(this,'{{ $item->video }}')">
        <img class="thumnail_img" src="{{ asset($item->image) }}" alt="">
        <div class="media_title_panel">
            <h6>{{ $item->{app()->getLocale() . '_title'} }}</h6>
            <span class="media_date">{{ $item->{app()->getLocale() . '_date'} }}</span>
        </div>
    </div>
    <!--Video Popup Modal -->
    <div class="modal fade" id="videoplayermodal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal_custom_content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $item->{app()->getLocale() . '_title'} }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <video id="my-video" class="video-js vjs-default-skin" controls preload="auto"
                        data-setup='{"fluid": true}' style="width: 100%;">
                        <source src="{{ asset($item->video) }}" type="video/mp4" />
                        <source src="{{ asset($item->video) }}" type="video/webm" />
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                HTML5 video</a>
                        </p>
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
