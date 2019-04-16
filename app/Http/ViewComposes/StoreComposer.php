<?php 

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Traits\CartTrait;
use App\Settings;

class StoreComposer
{
    use CartTrait;

	public function compose(View $view)
	{   
        //$this->InstagramFeed();
        $settings = Settings::findOrFail(1);
        $google_analytics = $settings->google_analytics;
        $favs = $this->getCustomerFavs();
        $activeCart = $this->activeCart();
        $view
            ->with('activeCart', $activeCart)
            ->with('favs', $favs)
            ->with('settings', $settings)
            ->with('google_analytics', $google_analytics);
    }
    
    public function InstagramFeed()
    {
        // $client_id = '1cdec271dcfc4b288b9079464a27d3da';
        // $user_id = '1138178064';

        // $url = "https://api.instagram.com/1cdec271dcfc4b288b9079464a27d3da/?__a=1";
        // $instaResult = file_get_contents($url);
        // dd($instaResult);

        $username = 'YourUserName';
        $json = file_get_contents('https://www.instagram.com/somosklekas/media/');
        $instagram_feed_data = json_decode($json, true);
        dd($instagram_feed_data);

        
        
    }
}