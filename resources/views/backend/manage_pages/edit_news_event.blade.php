@extends('backend.layouts.master')
@section('title', 'News & Events')

@section('content')
        {{-- edit News & Events info start --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">News & Events Update Page</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('update_news_event') }}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="news_event_id" value="{{$news_event->id}}">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">News & Events Titile (English) <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_news_title" value="{{$news_event->en_news_title}}" class="form-control" id="basiInput"
                                            required placeholder="News & Events Titile (English)">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">News & Events Titile (Bangla) <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_news_title" value="{{$news_event->bn_news_title}}" class="form-control" id="basiInput"
                                            required placeholder="News & Events Titile (Bangla)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="basiInput" class="form-label">News & Events Image</label>
                                        <img class="mb-3" src="{{asset($news_event->news_event_img)}}" alt="" style="max-height: 200px; width:auto;">
                                        <input type="file" name="news_event_img" placeholder="Claim Page Image"
                                            class="form-control" id="basiInput">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="basiInput" class="form-label">News & Events Description (English) <span
                                        class="text-danger">*</span></label>
                                    <textarea type="text" class="summernote" name="en_news_des">{{$news_event->en_news_des}}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="basiInput" class="form-label">News & Events Description (Bangla) <span
                                        class="text-danger">*</span></label>
                                    <textarea type="text" class="summernote" name="bn_news_des">{{$news_event->bn_news_des}}</textarea>
                                </div>
                                <div class="col-md-3 mt-3">
                                    News & Event Status
                                </div>
                                <div class="col-md-9 mt-3">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">Publish</label>
                                        <input class="form-check-input" type="radio" name="news_status" {{$notice->notice_status == 1 ? 'checked': ''}} id="inlineRadio1" value="1">
                                      </div>
                                      <div class="form-check form-check-inline">
                                          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
                                        <input class="form-check-input" type="radio" name="news_status" {{$notice->notice_status == 0 ? 'checked': ''}} id="inlineRadio2" value="0">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-success" type="submit">Update this Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- edit News & Events info end --}}

@endsection
