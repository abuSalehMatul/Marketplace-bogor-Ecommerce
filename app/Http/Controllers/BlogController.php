<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    public function index(){
    	$news=Blog::all();
    	return view('blogs.index',compact('news'));
    }

    public function Detail($slug,$unique_code){
    	$row=Blog::where('unique_code',$unique_code)->first();
    	return view('blogs.blog-detail',compact('row'));
    }
}
