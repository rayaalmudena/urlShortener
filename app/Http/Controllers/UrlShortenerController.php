<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\UrlShortener;
use App\models\UrlShortenerAnalytics;
use Redirect;
use Carbon\Carbon;

class UrlShortenerController extends Controller
{

    public function dashboard()
    {
        $urls = UrlShortener::query()
        ->where('user_id', '=',  \Auth::user()->id)
        ->orderByDesc('created_at')
        ->paginate(10);

        return view('url.dashboard', ['urls' => $urls]);

    }

    public function edit(Request $request, $urlShortenerId)
    {
        $url = UrlShortener::query()
        ->where('id', '=', $urlShortenerId)
        ->where('user_id', '=',  \Auth::user()->id)        
        ->first();

        return view('url.edit', ['url' => $url]);
    }

    public function store(Request $request)
    {

        if($request->id == null){
            UrlShortener::create([
                'user_id' => \Auth::user()->id,
                'url' => $request->url,
                'string' =>  \Str::random(15),
                'custom_alias' => $request->custom_alias ?? null
            ]);
        }else{
            UrlShortener::query()
                ->where('id', $request->id)
                ->where('user_id', \Auth::user()->id)
                ->update(                
                [
                    'url' => $request->url,
                    'custom_alias' => $request->custom_alias ?? null
                ]
            );   
        }       
        
        return redirect('dashboard');
    }

    public function analytics(Request $request, $urlShortenerId)
    {
        $url = UrlShortener::query()
        ->where('id', '=', $urlShortenerId)
        ->where('user_id', '=',  \Auth::user()->id)        
        ->first();
    
        $data = [
            'today' => UrlShortenerAnalytics::query()
                        ->where('url_shortener_id', '=', $urlShortenerId)
                        ->where('created_at', '>=', Carbon::now()->subDays(1))
                        ->count(),
            'last_week' => UrlShortenerAnalytics::query()
                        ->where('url_shortener_id', '=', $urlShortenerId)
                        ->where('created_at', '>=', Carbon::now()->subDays(7))
                        ->count(),
            'last_month' => UrlShortenerAnalytics::query()
                        ->where('url_shortener_id', '=', $urlShortenerId)
                        ->where('created_at', '>=', Carbon::now()->subMonths(1))
                        ->count(),
            'last_year' =>  UrlShortenerAnalytics::query()
                        ->where('url_shortener_id', '=', $urlShortenerId)
                        ->where('created_at', '>=', Carbon::now()->subYears(1))
                        ->count(),
        ];
        return view('url.analytics', ['url' => $url, 'data' => $data]);
    }

    public function redirect(Request $request, $userId, $string)
    {
        
       $urlShortener = UrlShortener::query()
            ->where('user_id', '=',  $userId)
            ->where('string', '=',  $string)
            ->orwhere('custom_alias', '=',  $string)
            ->first();    
            
        if($urlShortener){
            UrlShortenerAnalytics::create([
                'url_shortener_id' => $urlShortener->id
            ]);
            
            return Redirect::to($urlShortener->url);
        }
        
        return view('error', ['message' => "The URL is not valid"]);
    }   
}
