<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::getNewsContent();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {

        return view('news.edit',[
            "news" => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        
        
        $content = $request->get('news');
        $news->content = $content;
        $result = $news->save();
        if(!$result){
            return redirect()->back()->with('error', 'lỗi không sửa được');
        }
        return redirect()->back()->with('success', 'sửa ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }

    public function post_news()
    {

        try{
            if(request()->get('news')){
                $news = request()->get('news');
                $new = new News;
                $new["content"] = $news;
                $result = $new->save();
                if(!$result){
                    return redirect()->back()->with('error', 'lỗi');
                }
                return redirect()->back()->with('success', 'thành công');
            }
            return redirect()->back()->with('error', 'lỗi');
        }catch(\throwable $e){
            return redirect()->back()->with('error', 'lỗi');
        }
        
    }
}
