<?php
use App\Models\Country;
use App\Models\Language;
use App\Models\Translation;
use App\Models\BannerImage;
use App\Models\City;
use App\Models\NecessaryCategory;
use App\Models\PageContent;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\App;

if (!function_exists('googleTranslate')) {
    function googleTranslate($key)
    {
        $locale = App::getLocale();
        if ($locale === 'en') {
            return $key;
        }

        $translator = new GoogleTranslate();
        $translator->setTarget($locale);

        try {
            return $translator->translate($key);
        } catch (Exception $e) {
            return $key;
        }
    }
}

function limitHtmlContent($html, $limit = 100, $end = '...') {
    $text = strip_tags($html);
    if (strlen($text) <= $limit) return $html;
    
    $text = substr($text, 0, strpos(wordwrap($text, $limit), "\n")) . $end;
    
    return $text;
}
if (!function_exists('userLogin')) {
    function userLogin() {
        $admin = auth()->user();
        $user = $admin->user;
        return $user->id;
    }
}

// if (!function_exists('userLogin')) {
//     function userLogin() {
//         $admin = auth()->user();
//         $user = $admin->user;
//         return auth()->user()->id;
//     }
// }

if (!function_exists('translate')) {
    function translate($key)
    {
        $locale = App::getLocale();
        
        if ($locale === 'en') {
            return $key;
        }

        $translation = Translation::where('key_text', $key)->where('lang', $locale)->first();
        
        // Return the translation if found, otherwise return the key_text
        return $translation ? $translation->translate : $key;
    }
}
if (!function_exists('getCountries')) {
    function getCountries()
    {
        return Country::all();
    }
}

if (!function_exists('getLanguages')) {
    function getLanguages()
    {
        return Language::all();
    }
    if (!function_exists('getNecCategories')) {
        function getNecCategories()
        {
            return NecessaryCategory::all();
        }
    }
    if (!function_exists('getCities')) {
        function getCities()
        {
            return City::all();
        }
    }
    if (!function_exists('getBannerByPosition')) {
        function getBannerByPosition($position)
        {
            $banner = BannerImage::where('image_postion', $position)
                                 ->where('status', 1) // Assuming 'status' field indicates active banners
                                 ->latest() // Get the latest banner based on created_at or another timestamp field
                                 ->first();
    
            if ($banner) {
                return [
                    'image_url' => asset('images/apps/' . $banner->image),
                    'site_url' => $banner->site_url
                ];
            }
    
            return null;
        }
    }
    
    if (!function_exists('getPageContent')) {
        function getPageContent($key)
        {
            $content = PageContent::where('content_key', $key)->first();
            return $content ? $content->content_value : null;
        }
    }
}


// Medical news Functions


if (!function_exists('encrypt')) {
    function encrypt($data, $key) {
        // Define a method and an initialization vector
        $method = 'AES-256-CBC';
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));

        // Encrypt the data
        $encrypted = openssl_encrypt($data, $method, $key, 0, $iv);

        // Combine the IV and the encrypted data
        return base64_encode($iv . $encrypted);
    }
}

if (!function_exists('decrypt')) {
    function decrypt($data, $key) {
        // Define a method
        $method = 'AES-256-CBC';

        // Decode the base64-encoded string
        $data = base64_decode($data);

        // Extract the IV and the encrypted data
        $iv_length = openssl_cipher_iv_length($method);
        $iv = substr($data, 0, $iv_length);
        $encrypted = substr($data, $iv_length);

        // Decrypt the data
        return openssl_decrypt($encrypted, $method, $key, 0, $iv);
    }
}

if (!function_exists('public function translatedUrlEndPoint')) {
    function translatedUrlEndPoint($lang) {
        switch ($lang) {
            case 'de':
                return 'aktuelles';
                break;
            
            case 'fr':
                return 'fr/actualites';
                break;
            
            case 'it':
                return 'it/attualita';
                break;
            
            case 'en':
                return 'en/news';
                break;
        }
        
    }
    if (!function_exists('getRandomImage')) {
        function getRandomImage($images)
        {
            if (!empty($images)) {
                return asset($images[array_rand($images)]);
            }
            return null; // Fallback in case there are no images
        }
    }
    
}

