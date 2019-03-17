<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JoinCommunity;
class JoinCommunityController extends Controller
{	
	public function index()
	{   
		$row = JoinCommunity::first();
		return view('seller.community',compact('row'));
	}

}
