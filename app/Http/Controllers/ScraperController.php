<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ScraperService;

class ScraperController extends Controller
{
    protected $scraperService;

    public function __construct(ScraperService $scraperService)
    {
        $this->scraperService = $scraperService;
    }

    public function scrape(Request $request)
    {
        $lang = $request->lang == '' ? 'en' : $request->lang;
        $lang = translatedUrlEndPoint($lang);
        $baseUrl = 'https://www.swiss-medtech.ch/'.$lang;
        $data = $this->scraperService->scrapePage($baseUrl);
        return view('medical-news.latestNews',compact('data'));
    }

    public function detailsScrape(Request $request) {
        $baseUrl = 'https://www.swiss-medtech.ch';
        $language = ($request->lang == '' || $request->lang == 'de') ? 'de' : $request->lang;
        
        $lang = translatedUrlEndPoint($language);
        $encryptedlink = $request->link;
        $link = decrypt($encryptedlink);
        $data = $this->scraperService->scrapeAllPages($link);
        $latest = $this->scraperService->scrapePage($baseUrl.'/'.$lang);
        return view('medical-news.details',compact('data','latest'));
    }

}
