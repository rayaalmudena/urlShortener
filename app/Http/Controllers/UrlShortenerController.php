<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\UrlShortener;

class UrlShortenerController extends Controller
{

    public function dashboard()
    {
        $urls = UrlShortener::query()
        ->where('user_id', '=',  \Auth::user()->id)
        ->paginate();

        return view('url.dashboard', ['urls' => $urls]);

    }

    public function redirect(Request $request, $userId, $string){
     
        if($customUrl){
            return Redirect::to($url);
        }
        elseif ($simpleUrl) {
            return Redirect::to($url);            
        }
        
        else{
            
        }

        return Redirect::to($url);
    }
}
