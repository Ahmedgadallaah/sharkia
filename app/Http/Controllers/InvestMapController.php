<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvestMap;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class InvestMapController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $maps = InvestMap::paginate(10);
            return view('admin.maps.index',compact('maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        IF ($request->HASFILE('pdf')) {

            $pdf = $request->FILE('pdf');
            $FILENAME = 'invest_map' . '-' . TIME() . '.' . $pdf->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('cv/invest_map');
            $request->FILE('pdf')->MOVE($LOCATION, $FILENAME);
            $data['pdf']= $FILENAME;
         }

        //dd($data);
        InvestMap::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/map/');
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

        $map = InvestMap::find($id);
        return view('admin.mAps.edit', compact('map','id'));
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
        $map = InvestMap::findOrFail($id);

        IF ($request->HASFILE('pdf')) {
            @unlink(public_path('cv/invest_map/'.$map->pdf));
            $pdf = $request->FILE('pdf');
            $FILENAME = 'invest_map' . '-' . TIME() . '.' . $pdf->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('cv/invest_map');
            $request->FILE('pdf')->MOVE($LOCATION, $FILENAME);
            $data['pdf']= $FILENAME;
         }else{
            $data['pdf']=$media->pdf;
         }

        $map->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/map/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $map = InvestMap::find($id);
        @unlink(public_path('cv/invest_map/'.$map->pdf));

        $map->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/map/');

    }
    public function InActive($id)
    {
        $map = InvestMap::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/map');
    }

    public function Active($id)
    {
        $map = InvestMap::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/map');
    }
}
