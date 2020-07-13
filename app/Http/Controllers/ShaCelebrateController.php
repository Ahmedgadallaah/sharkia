<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shacelebrate;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ShaCelebrateController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shacelebrates = Shacelebrate::paginate(10);
        return view('admin.shacelebrates.index',compact('shacelebrates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shacelebrates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

                $image = $request->FILE('image');
                $FILENAME = 'shacelebrate' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/shacelebrate/');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;


      //  dd($data);
        Shacelebrate::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/shacelebrate/');
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
        $shacelebrate = Shacelebrate::find($id);
        return view('admin.shacelebrates.edit', compact('shacelebrate','id'));
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
        $shacelebrate = Shacelebrate::findOrFail($id);

        IF ($request->HASFILE('image')) {
            @unlink(public_path('images/shacelebrate/'.$shacelebrate->image));
            $image = $request->FILE('image');
            $FILENAME = 'shacelebrate' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/shacelebrate/');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$shacelebrate->image;
         }


        $shacelebrate->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/shacelebrate/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shacelebrate = Shacelebrate::find($id);
        @unlink(public_path('images/shacelebrate/'.$shacelebrate->image));

        $shacelebrate->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/shacelebrate/');

    }
}
