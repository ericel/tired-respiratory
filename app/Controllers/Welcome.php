<?php
/**
 * Welcome controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Controllers;

use App\Core\Controller;

use App\Models\Contact;
use App\Models\Videos;
use View;
use Input;
use Validator;
use Request;

/**
 * Sample controller showing 2 methods and their typical usage.
 */
class Welcome extends Controller
{

    /**
     * Create and return a View instance.
     */
  public function index()
    {
        $videos = Videos::paginate(25);
        //video rated
        $videosrated = Videos::where('fileViews', '>', 100)->take(1)->orderBy('rating')->get();
        return View::make('Welcome/Welcome')
            ->shares('title', __('Afro Social Media Site'))
            ->shares('type', __('Website'))
            ->shares('url', __('https://weytindey.com'))
            ->shares('audio', __(''))
            ->shares('video', __(''))
            ->shares('description', __('Watch social videos, listen to Afro music all for free.'))
            ->shares('image', __(''))
            ->with('videosrated', $videosrated)
            ->with('videos', $videos);
    }
  
   public function contact()
    {
        $message = __('Hello, welcome from the welcome controller and subpage method! <br/>
This content can be changed in <code>/app/Views/Welcome/SubPage.php</code>');

       return View::make('Welcome/Contact')
            ->shares('title', __('Add Content to Weytindey'))
            ->withWelcomeMessage($message);
    }

    public function about()
    {
        $message = __('Hello, welcome from the welcome controller and subpage method! <br/>
This content can be changed in <code>/app/Views/Welcome/SubPage.php</code>');

       return View::make('Welcome/About')
            ->shares('title', __('Add Content to Weytindey'))
            ->withWelcomeMessage($message);
    }

   public function search()
    {       
            $status = '';
           
            $search = Input::only('search_term');
              $search_term = $search['search_term'];
               if($search_term == ''){
		   // Prepare the flash message.
                  $status = '<div class="search-status red lighten-5">ERROR: Define a search term.</div>';
		} else {
                  $status = '<div class="search-status cyan lighten-5">Search Term: <em class="orange-text">'.$search_term.'</em></div>';
                  $searchresults = Videos::where('filename', 'LIKE', '%' .$search_term .'%')
                  ->orWhere('fileDesc', 'LIKE', '%' .$search_term .'%')
                  ->paginate(25);
              }
       
       return View::make('Welcome/Search')
            ->shares('title', __('Add Content to Weytindey'))
            ->with('search_term', $search_term)
            ->with('status', $status)
            ->with('searchresults', $searchresults);

    }


    /**
     * Create and return a View instance.
     */
    public function subPage()
    {
        $message = __('Hello, welcome from the welcome controller and subpage method! <br/>
This content can be changed in <code>/app/Views/Welcome/SubPage.php</code>');

        return $this->getView()
            ->shares('title', __('Subpage'))
            ->withWelcomeMessage($message);
    }

}
