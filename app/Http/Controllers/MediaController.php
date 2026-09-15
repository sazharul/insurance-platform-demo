<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\PublicationList;
use App\Models\MediaImage;
use App\Models\MediaImageList;
use App\Models\MediaVideo;
use App\Models\MediaVideoList;
use App\Models\NewsEventList;

class MediaController extends Controller
{
    public function publications()
    {
        $data['publications'] = Publication::first();
        $data['publication_list'] = PublicationList::where('status',1)->orderBy('id','desc')->get();

        return view('frontend.media.publications', $data);
    }
    public function publicationsDetails($id){
        $data['publications_details'] = PublicationList::find($id);

        return view('frontend.media.publications_details', $data);
    }

    public function sortPublicaitons(Request $request)
    {
        if($request->publication_sort == 'newest_publications'){
            $sort_result = PublicationList::where('status',1)->orderBy('id','desc')->get();
        }
        if($request->publication_sort == 'oldest_publications'){
            $sort_result = PublicationList::where('status',1)->orderBy('id','asc')->get();
        }

        return view('frontend.media.ajax_filter.sort-publications', compact('sort_result'))->render();
    }

    public function searchPublicaitons(Request $request){
        $data['publications_search'] = PublicationList::where('status',1)->where('en_title','like', '%'.$request->search_string.'%')
        ->orWhere('bn_title','like', '%'.$request->search_string.'%')
        ->orderBy('id', 'desc')
        ->where('status',1)
        ->get();

        if($data['publications_search']->count() >= 1){
            return view('frontend.media.ajax_filter.search-publications', $data)->render();
        }
        else{
            return response()->json([
                'status' => 'nothing found',
            ]);
        }
    }
    public function sortVideos(Request $request)
    {
        if($request->video_sort == 'newest_videos'){
            $sort_result = MediaVideoList::where('status',1)->orderBy('id','desc')->get();
        }
        if($request->video_sort == 'oldest_videos'){
            $sort_result = MediaVideoList::where('status',1)->orderBy('id','asc')->get();
        }

        return view('frontend.media.ajax_filter.sort-videos', compact('sort_result'))->render();
    }

    public function searchVideos(Request $request){
        $data['videos_search'] = MediaVideoList::where('status',1)->where('en_title','like', '%'.$request->search_string.'%')
        ->orWhere('bn_title','like', '%'.$request->search_string.'%')
        ->orderBy('id', 'desc')
        ->where('status',1)
        ->get();

        if($data['videos_search']->count() >= 1){
            return view('frontend.media.ajax_filter.search-videos', $data)->render();
        }
        else{
            return response()->json([
                'status' => 'nothing found',
            ]);
        }
    }
    public function sortImages(Request $request)
    {
        if($request->image_sort == 'newest_images'){
            $sort_result = MediaImageList::where('status',1)->orderBy('id','desc')->get();
        }
        if($request->image_sort == 'oldest_images'){
            $sort_result = MediaImageList::where('status',1)->orderBy('id','asc')->get();
        }

        return view('frontend.media.ajax_filter.sort-images', compact('sort_result'))->render();
    }
    public function searchImages(Request $request){
        $data['images_search'] = MediaImageList::where('status',1)->where('en_title','like', '%'.$request->search_string.'%')
        ->orWhere('bn_title','like', '%'.$request->search_string.'%')
        ->orderBy('id', 'desc')
        ->where('status',1)
        ->get();

        if($data['images_search']->count() >= 1){
            return view('frontend.media.ajax_filter.search-images', $data)->render();
        }
        else{
            return response()->json([
                'status' => 'nothing found',
            ]);
        }
    }

    public function sortNewsEvents(Request $request)
    {
        if($request->news_event_sort == 'newest_news_events'){
            $sort_result = NewsEventList::where('status',1)->orderBy('id','desc')->get();
        }
        if($request->news_event_sort == 'oldest_news_events'){
            $sort_result = NewsEventList::where('status',1)->orderBy('id','asc')->get();
        }

        return view('frontend.media.ajax_filter.sort-news-event', compact('sort_result'))->render();
    }

    public function searchNewsEvents(Request $request){
        $data['news_event_search'] = NewsEventList::where('status',1)->where('en_title','like', '%'.$request->search_string.'%')
        ->orWhere('bn_title','like', '%'.$request->search_string.'%')
        ->orderBy('id', 'desc')
        ->where('status',1)
        ->get();

        if($data['news_event_search']->count() >= 1){
            return view('frontend.media.ajax_filter.search-news-event', $data)->render();
        }
        else{
            return response()->json([
                'status' => 'nothing found',
            ]);
        }
    }

    public function images()
    {
        $data['images'] = MediaImage::first();
        $data['images_list'] = MediaImageList::with('groupImage')->where('status',1)->orderBy('id','desc')->get();
        return view('frontend.media.images', $data);
    }
    public function videos()
    {
        $data['videos'] = MediaVideo::first();
        $data['video_list'] = MediaVideoList::where('status',1)->orderBy('id','desc')->get();

        return view('frontend.media.videos', $data);
    }
}
