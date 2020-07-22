<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\MediaGallery;
use App\Governer;
use App\Entity;
use App\Media;
use App\InvestEgyptmap;
use App\InvEgytitle;
use App\InvestSection;
use App\InvestChance;
use App\InvestMap;
use App\InvestRole;
use App\InvestDevmap;
use App\InvestArea;
use App\AreaTitle;
use App\InvestGuide;
use App\Conference;
use App\Antique;
use App\Desert;
use App\Museum;
use App\sport;
use App\Relegion;
use App\Relitem;
use App\Countryside;
use App\Cside;
use App\Statistic;
use App\Servguide;
use App\Servgate;
use App\Servurgent;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
////////////////////////////////////////////////////////////////////////
    public function governer()
    {
        $governer = Employee::where('type','governer')->first();
        return view('front.leaders.governer', compact('governer'));
    }


    public function governers()
    {
        $governers = Governer::all();
        return view('front.leaders.governers', compact('governers'));
    }


    public function leaders()
    {
        //$governer = Employee::where('type','governer')->first();
        return view('front.leaders.leaders');
    }
///////////////////////////////////////////////////////////////////////////

    public function directorate()
    {
        $entities = Entity::where('type','directorate')->get();
        return view('front.entities.directorates', compact('entities'));
    }

    public function city()
    {
        $entities = Entity::where('type','city')->get();
        return view('front.entities.cities', compact('entities'));
    }

    public function company()
    {
        $entities = Entity::where('type','company')->get();
        return view('front.entities.companies', compact('entities'));
    }

    public function body()
    {
        $entities = Entity::where('type','body')->get();
        return view('front.entities.bodies', compact('entities'));
    }
////////////////////////////  media  ////////////////////////////////////////////////////

    public function media_governer()
    {
        $medias = Media::where('type','governer')->get();
           return view('front.media.governer',compact('medias'));
    }

    public function media_minister()
    {
        $medias = Media::where('type','minister')->get();
           return view('front.media.minister',compact('medias'));
    }


    public function media_media()
    {
        $medias = Media::where('type','media')->get();
           return view('front.media.media',compact('medias'));
    }

    public function media_person()
    {
        $medias = Media::where('type','person')->get();
           return view('front.media.person',compact('medias'));
    }


    public function media_medias($id)
    {
        $media = Media::where('type','media')->with('gallery')->findOrFail($id);
//dd($media);
        return view('front.media.media-one',compact('media'));
    }

    public function media_governers($id)
    {
        $media = Media::where('type','governer')->with('gallery')->findOrFail($id);
//dd($media);
        return view('front.media.governer-one',compact('media'));
    }

    public function media_ministers($id)
    {
        $media = Media::where('type','minister')->with('gallery')->findOrFail($id);
//dd($media);
        return view('front.media.minister-one',compact('media'));
    }


    public function media_persons($id)
    {
        $media = Media::where('type','person')->with('gallery')->findOrFail($id);
//dd($media);
        return view('front.media.person-one',compact('media'));
    }


//////////////////////////////////// investment //////////////////////////////////


    public function sector()
    {
        $section = InvestSection::first();
            return view('front.investments.invest-sector',compact('section'));
    }

    public function oportunitiy()
    {
            $chance = InvestChance::first();
            return view('front.investments.invest-oportunities',compact('chance'));
    }

    public function egymap()
    {
        $map = InvestEgyptmap::first();
        $titles = InvEgytitle::with('egyptmap')->get();

        return view('front.investments.invest-egymap',compact('titles','map'));
    }

    public function map()
    {
            $map = InvestMap::first();
            return view('front.investments.invest-map',compact('map'));
    }

    public function role()
    {
        $roles = InvestRole::get();
        return view('front.investments.invest-role',compact('roles'));
    }

    public function devmap()
    {
        $roles = InvestDevmap::get();
        return view('front.investments.invest-devmap',compact('roles'));
    }

    public function area()
    {

        $titles = InvestArea::with('areatitle')->get();
        return view('front.investments.invest-areas',compact('titles'));
    }

    public function areatitle($id)
    {
        $title = AreaTitle::with('gallery')->find($id);

        return view('front.investments.invest-areatitles',compact('title'));
    }

    public function guide()
    {

        $titles = InvestGuide::all();
        return view('front.investments.invest-guide',compact('titles'));
    }
  //////////////////////////////// Tourism  ////////////////////////////////////////////////////

    public function conference()
    {
        $conference = Conference::first();
        return view('front.tour.conference',compact('conference'));
    }

    public function antiques()
    {
        $antiques = Antique::all();
        return view('front.tour.antiques',compact('antiques'));
    }

    public function antique($id)
    {
        $antique = Antique::find($id);
        return view('front.tour.antique',compact('antique'));
    }

    public function deserts()
    {
        $deserts = Desert::all();
        return view('front.tour.deserts',compact('deserts'));
    }

    public function desert($id)
    {
        $desert = Desert::find($id);
        return view('front.tour.desert',compact('desert'));
    }


    public function museums()
    {
        $museums = Museum::all();
        return view('front.tour.museums',compact('museums'));
    }

    public function museum($id)
    {
        $museum = Museum::find($id);
        return view('front.tour.museum',compact('museum'));
    }


    public function sports()
    {
        $sports = Sport::all();
        return view('front.tour.sports',compact('sports'));
    }

    public function sport($id)
    {
        $sport = Sport::find($id);
        return view('front.tour.sport',compact('sport'));
    }


    public function relegions()
    {
        $relegion = Relegion::first();
        $relegions = Relitem::all();
        return view('front.tour.relegions',compact('relegions','relegion'));
    }

    public function relegion($id)
    {
        $relegion = Relitem::find($id);
        return view('front.tour.relegion',compact('relegion'));
    }

    public function csides()
    {
        $cside = Countryside::first();
        $csides = Cside::all();
        return view('front.tour.countrysides',compact('csides','cside'));
    }

    public function cside($id)
    {
        $cside = Cside::find($id);
        return view('front.tour.countryside',compact('cside'));
    }

//////////////////////////////////// statistics ///////////////////////////////////

    public function starrow()
    {

        $arrows = Statistic::where('type','arrow')->get();

        //dd($arrow->id);
        return view('front.statistics.arrow',compact('arrows'));
    }


    public function stmaps()
    {
        $maps = Statistic::where('type','map')->get();
        return view('front.statistics.map',compact('maps'));
    }

    public function stmanage()
    {
        $manages = Statistic::where('type','manage')->get();
        return view('front.statistics.manage',compact('manages'));
    }

    public function stpeople()
    {
        $peoples = Statistic::where('type','people')->get();
        return view('front.statistics.people',compact('peoples'));
    }

    public function stmonth()
    {
        $months = Statistic::where('type','month')->get();
        return view('front.statistics.month',compact('months'));
    }

    public function stdescription()
    {
        $descriptions = Statistic::where('type','description')->get();
        return view('front.statistics.description',compact('descriptions'));
    }

//////////////////////////////////  services  /////////////////////////////////////////////////////////

    public function servguide()
    {
        $guides = Servguide::get();
        return view('front.services.guide',compact('guides'));
    }

    public function servgate()
    {
        $gates = Servgate::get();
        return view('front.services.services',compact('gates'));
    }


    public function servurgent()
    {

        $urgents = Servurgent::where('type','urgent')->get();
        $traffics = Servurgent::where('type','traffic')->get();
        $healths = Servurgent::where('type','health')->get();
        $papers = Servurgent::where('type','paper')->get();
        return view('front.services.urgent',compact('urgents','traffics','healths','papers'));
    }

    ////////////////////////////////////// sharkia ////////////////////////////////////////////////////////

    // public function ()
    // {
    //     $gates = Servgate::get();
    //     return view('front.services.services',compact('gates'));
    // }



}
