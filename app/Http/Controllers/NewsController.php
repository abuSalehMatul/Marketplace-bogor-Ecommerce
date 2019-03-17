<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewsController extends Controller
{
    public function News(){
    	$news=News::all();
    	return view('news.index',compact('news'));
    }

    public function NewsDetail($slug,$unique_code){
    	$row=News::where('unique_code',$unique_code)->first();
    	return view('news.news-detail',compact('row'));
    }
}
