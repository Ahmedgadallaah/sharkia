<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ads;
use Intervention\Image\ImageadrStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class AdsController extends Controller
{
       /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $ads = Ads::paginate(10);
            return view('admin.ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            IF ($request->HASFILE('image'))
            {
                $image = $request->FILE('image');
                $FILENAME = 'ad' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/ad/');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
            }
        //  dd($data);
        Ads::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/ad/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ad = Ads::find($id);
        return view('admin.ads.edit', compact('ad','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ad = Ads::findOrFail($id);
             $this->validate($request, ['name'=>'max:255,required,string',]);

        IF ($request->HASFILE('image'))
        {
            @unlink(public_path('images/ad/'.$ad->image));
            $image = $request->FILE('image');
            $FILENAME = 'ad' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/ad');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
        }
        else
        {
            $data['image']=$ad->image;
        }


        $ad->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/ad/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $ad = Ads::find($id);
        @unlink(public_path('images/ad/'.$ad->image));

        $ad->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/ad/');

    }
    public function InActive($id)
    {
        $ad = Ads::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/ad');
    }

    public function Active($id)
    {
        $ad = Ads::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/ad');
    }
}
