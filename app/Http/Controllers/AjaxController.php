<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statistic;
use App\Servurgent;
use App\InvEgytitle;
use App\InvestGuide;
class AjaxController extends Controller
{
    public function stmap(Request $request){
        $value =request()->get('value');

        $maps = Statistic::where('type','map')->where('id',$value)->get();

        $result='';
        foreach($maps as $map){
            $result.='<img style="width:50%; " src="'. asset("images/smap/".$map->image) .'">';
        };

        echo $result;
    }

    public function traffic(Request $request){
        $value =request()->get('value');

        //dd($value);
        $traffics = Servurgent::where('type','traffic')->where('id',$value)->get();

        $result='';
        foreach($traffics as $traffic){
            // $result.='<img style="width:50%; " src="'. asset("images/smap/".$map->image) .'">';
            $result.='<div class="col-md-3"></div>
                        <div class="col-md-6">
                            <h5>'.$traffic->name.'</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>'.$traffic->description.'</h5>
                        </div>';
        };

        echo $result;
    }


    public function health(Request $request){
        $value =request()->get('value');

        //dd($value);
        $healths = Servurgent::where('type','health')->where('id',$value)->get();

        $result='';
        foreach($healths as $health){
            // $result.='<img style="width:50%; " src="'. asset("images/smap/".$map->image) .'">';
            $result.='<div class="col-md-3"></div>
                        <div class="col-md-6">
                            <h5>'.$health->name.'</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>'.$health->description.'</h5>
                        </div>';
        };

        echo $result;
    }

    public function paper(Request $request){
        $value =request()->get('value');

        //dd($value);
        $papers = Servurgent::where('type','paper')->where('id',$value)->get();

        $result='';
        foreach($papers as $paper){
            // $result.='<img style="width:50%; " src="'. asset("images/smap/".$map->image) .'">';
            $result.= $paper->description;
        };

        echo $result;
    }

    public function arrow(Request $request){
        $value =request()->get('value');

        //dd($value);
        $arrows = Statistic::where('type','arrow')->where('id',$value)->get();

        $result='';
        foreach($arrows as $arrow){
            // $result.='<img style="width:50%; " src="'. asset("images/smap/".$map->image) .'">';
            $result.='<div class="col-md-3"></div>
            <div class="col-md-12 text-center">
            <p>'.$arrow->description.'</p>
            <img style="width:100%; " src="'. asset("images/arrow/".$arrow->image) .'">
            </div>';
        };

        echo $result;
    }


    public function manage(Request $request){
        $value =request()->get('value');

        //dd($value);
        $manages = Statistic::where('type','manage')->where('id',$value)->get();

        $result='';
        foreach($manages as $manage){
            // $result.='<img style="width:50%; " src="'. asset("images/smap/".$map->image) .'">';
            $result.='<div class="col-md-3"></div>
            <div class="col-md-12 text-center">
            <p>'.$manage->description.'</p>
            <img width="70%"; " src="'. asset("images/manage/".$manage->image) .'">
            </div>';
        };

        echo $result;
    }


    public function month(Request $request){
        $value =request()->get('value');

        //dd($value);
        $months = Statistic::where('type','month')->where('id',$value)->get();

        $result='';
        foreach($months as $month){
            // $result.='<img style="width:50%; " src="'. asset("images/smap/".$map->image) .'">';
            $result.='<div class="col-md-3"></div>
            <div class="col-md-12 text-center">
            <p>'.$month->description.'</p>
            <img width="70%"; " src="'. asset("images/month/".$month->image) .'">
            </div>';
        };

        echo $result;
    }


    public function people(Request $request){
        $value =request()->get('value');

        //dd($value);
        $peoples = Statistic::where('type','people')->where('id',$value)->get();

        $result='';
        foreach($peoples as $people){
            // $result.='<img style="width:50%; " src="'. asset("images/smap/".$map->image) .'">';
            $result.='<div class="col-md-3"></div>
            <div class="col-md-12 text-center">
            <p>'.$people->description.'</p>
            <img width="70%"; " src="'. asset("images/people/".$people->image) .'">
            </div>';
        };

        echo $result;
    }

    public function egymap(Request $request){
        $value =request()->get('value');

        //dd($value);
        $titles = InvEgytitle::where('id',$value)->get();

        $result='';
        foreach($titles as $title){
            // $result.='<img style="width:50%; " src="'. asset("images/smap/".$map->image) .'">';
            $result.='<div class="col-md-2"></div>

            <h6>'.$title->description.'</h6>
            </div>

            <div class="col-md-12 text-center">
            <iframe src="'.asset('cv/invest_egypttitle/'.$title->pdf).'" width="80%" height="700px" frameborder="0"></iframe>
            </div>
            ';

        };

        echo $result;
    }

    public function invguide(Request $request){
        $value =request()->get('value');
        //dd($value);
        $titles = InvestGuide::where('id',$value)->get();
        $result='';
        foreach($titles as $title){
            // $result.='<img style="width:50%; " src="'. asset("images/smap/".$map->image) .'">';
            $result.='<div class="col-md-2"></div>

            <h6>'.$title->city.'</h6>
            <h6>'.$title->company.'</h6>
            <h6>'.$title->address.'</h6>
            <h6>'.$title->mobile.'</h6>
            <h6>'.$title->fax.'</h6>
            <h6>'.$title->member_num.'</h6>

            ';

        };

        echo $result;
    }




}
