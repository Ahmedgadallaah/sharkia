<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvestEgyptmap;
use App\InvestEgypttitle;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class InvestEgyptmapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = InvestEgyptmap::paginate(10);


        return view('admin.egyptmaps.index',compact('maps'));
    }

    public function create()
    {


        return view('admin.egyptmaps.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        ]);
        $data = [

            'en' => [
                    'description'=> $request->input('en_description'),
                    ],
            'ar' => [
                    'description'=> $request->input('ar_description'),
                    ],
                ];
        InvestEgyptmap::create($data);
         Session::put('message', 'Data Created Successfully !!');
         return Redirect::to('admin/egyptmap/');
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
        $map = InvestEgyptmap::find($id);
        return view('admin.egyptmaps.edit',compact('map'));
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

        $map = InvestEgyptmap::find($id);

         $this->validate($request, [
        ]);
        $data = [

            'en' => [
                    'description'=> $request->input('en_description'),
                    ],
            'ar' => [
                    'description'=> $request->input('ar_description'),
                    ],
                ];
         $map->update($data);
         Session::put('message', 'Data Updated Successfully !!');
         // Redirect to the previous page successfully
         return Redirect::to('admin/egyptmap/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $map = InvestEgyptmap::find($id);
        $map->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/egyptmap/');

    }
    public function InActive($id)
    {
        $map = InvestEgyptmap::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/egyptmap');
    }

    public function Active($id)
    {

        $map = InvestEgyptmap::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/egyptmap');
    }
}
