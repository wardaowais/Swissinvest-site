<?php

namespace App\Services;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ScraperService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'verify' => false,
        ]);
    }

    /**
     * Scrape data from a single page.
     */

    public function htmlResponse($url) {
        $response = $this->client->get($url,[
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            ],
            'allow_redirects' => true,
            'max_redirects' => 10,
        ]);
        
        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to retrieve content, status code: ' . $response->getStatusCode());
        }
        
        $html = (string) $response->getBody();

        return $html;
    }

    public function scrapePage($url)
    {
        $urlPath = parse_url($url);

        $html = $this->htmlResponse($url);
        
        $crawler = new Crawler($html);
        
        $items = [];
        
        // Adjust the selectors based on the actual HTML structure
        if($url) {

            $crawler->filter('.news')->each(function (Crawler $node) use (&$items) {

                $taxanomy = $node->filter('.news__wrapper .news__content .news--taxonomy')->text();
                $link = $node->filter('.news__wrapper')->attr('href');
                $newsKey = ['aktuelles','actualites','attualita','attualità','news','actualité'];
                $pressRealeaseKey = ['medienmitteilung','communiqué de presse','comunicato stampa','press release']; 

                if(in_array(strtolower($taxanomy),$newsKey) || in_array(strtolower($taxanomy),$pressRealeaseKey)) {
                    
                    $title = $node->filter('.news__wrapper .news__content .news__content-information h5')->text();
                    $summary = $node->filter('.news__wrapper .news__content .news__content-information p')->text();
                    $date = $node->filter('.news__wrapper .news__content .news--created-date')->text();
                    $items[] = [
                        'taxanomy' => $taxanomy,
                        'date' => $date,
                        'title' => $title,
                        'summary' => $summary,
                        'link' => $link
                    ];
                }
                
            });

            $all = [];

            
            
            foreach($items as $key => $item) {
                $linkUrlPath = parse_url($item['link']);
            
                if(!array_key_exists('host',$linkUrlPath)) {
                    $link = $urlPath['host'].$linkUrlPath['path'];
                    $all[] = [
                        'taxanomy' => $item['taxanomy'],
                        'date' => $item['date'],
                        'title' => $item['title'],
                        'summary' => $item['summary'],
                        'link' => $item['link']
                    ];
                } else {
                    
                    if(($linkUrlPath['host'] == $urlPath['host']) && str_contains($linkUrlPath['path'],'/news')) {
                        $all[] = [
                            'taxanomy' => $item['taxanomy'],
                            'date' => $item['date'],
                            'title' => $item['title'],
                            'summary' => $item['summary'],
                            'link' => $item['link']
                        ];
                    }
                }
            }

            return $all;

        }

    }

    /**
     * Scrape all pages.
     */
    public function scrapeAllPages($baseUrl)
    {
        $urlPath = parse_url($baseUrl);
        
        if(!array_key_exists('host',$urlPath)) {
            $baseUrl = 'https://www.swiss-medtech.ch'.$baseUrl;
        }
        
        $html = $this->htmlResponse($baseUrl);
        
        $crawler = new Crawler($html);
        
        $items = [];
        
        $crawler->filter('.news-full')->each(function (Crawler $node) use (&$items) {
            $heading = $node->filter('.news-full h1')->text();
            $details = $node->filter('.news-full article')->text();
            $items[] = [
                'heading' => $heading,
                'details' => $details,
            ];
        });

        return $items;
    }

}
