<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvestEgyptmap;
use App\InvEgytitle;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class InvEgytitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = InvEgytitle::with('egyptmap')->paginate(10);
        return view('admin.egypttitles.index',compact('titles'));
    }

    public function create()
    {
        $title = InvEgytitle::with('egyptmap')->get();

        $maps = InvestEgyptmap::first();

        return view('admin.egypttitles.create',compact('title','maps'));
    }

    public function store(Request $request)
    {
        $map = InvestEgyptmap::first();
        $this->validate($request, [
        ]);
        $data = [

            'en' => ['name'=> $request->input('en_name')],
            'ar' => ['name'=> $request->input('ar_name')],
                ];

                $data['invest_egyptmap_id']=1;
                IF ($request->HASFILE('pdf')) {
                    $pdf = $request->FILE('pdf');
                    $FILENAME = 'title' . '-' . TIME() . '.' . $pdf->GETCLIENTORIGINALEXTENSION();
                    $LOCATION = PUBLIC_PATH('images/invest_egypttitle/');
                    $request->FILE('pdf')->MOVE($LOCATION, $FILENAME);
                    $data['pdf']= $FILENAME;
                  }
        //dd($data);
        InvEgytitle::create($data);
         Session::put('message', 'Data Created Successfully !!');
         return Redirect::to('admin/egypttitle/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $title = InvEgytitle::with('egyptmap')->find($id);


        return view('admin.egypttitles.edit', compact('title'));

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

         $title = InvEgytitle::findOrFail($id);
         $this->validate($request, []);
        $data = [
            'en' => [ 'name'=> $request->input('en_name') ],
            'ar' => [ 'name'=> $request->input('ar_name') ],
                ];

                IF ($request->HASFILE('pdf')) {
                    @unlink(public_path('images/invest_egyptmap/'.$title->pdf));
                    $pdf = $request->FILE('pdf');
                    $FILENAME = 'invest_egyptmap' . '-' . TIME() . '.' . $pdf->GETCLIENTORIGINALEXTENSION();
                    $LOCATION = PUBLIC_PATH('images/invest_egyptmap/');
                    $request->FILE('pdf')->MOVE($LOCATION, $FILENAME);
                    $title->pdf= $FILENAME;
                  }else{
                    $data['pdf']= $title->pdf;
                  }
        $data['invest_egyptmap_id'] =1;
         $title->update($data);
         Session::put('message', 'data Updated Successfully !!');
         // Redirect to the previous page successfully
         return Redirect::to('admin/egypttitle/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = InvEgytitle::find($id);
        $title->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/egypttitle/');

    }
    public function InActive($id)
    {
        $title = InvEgytitle::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/egypttitle');
    }

    public function Active($id)
    {

        $title = InvEgytitle::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/egypttitle');
    }
}
