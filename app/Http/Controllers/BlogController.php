<?php

namespace App\Http\Controllers;

use App\Jobs\BlogIndexData;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Post;
use App\Tag;
use App\Services\RssFeed;
use App\Services\SiteMap;

class BlogController extends Controller
{
    //
    public function index(request $request)
    {
        $tag = $request->get('tag');
        $data = $this->dispatch(new BlogIndexData($tag));
        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';
        return view($layout,$data);


//        $posts = Post::where('published_at', '<=', Carbon::now())
//            ->orderBy('published_at', 'desc')
//            ->paginate(config('blog.posts_per_page'));
//        return view('blog.index', compact('posts'));
    }

    public function showPost($slug,request $request)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');
        if($tag){
            $tag = Tag::whereTag($tag)->firstOrFail();
        }
        return view($post->layout,compact('post','tag','slug'));
    }
    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();

        return response($rss)
            ->header('Content-type', 'application/rss+xml');
    }
    public function siteMap(SiteMap $siteMap)
    {
        $map = $siteMap->getSiteMap();

        return response($map)
            ->header('Content-type', 'text/xml');
    }
}
