<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Social;
use Intervention\Image\ImageshaphotorStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::paginate(10);
        return view('admin.socials.index',compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.socials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data['link']= $request->input('link');

        IF ($request->HASFILE('image'))
        {
            $image = $request->FILE('image');
            $FILENAME = 'social' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/social/');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
        }
    //dd($data);
    Social::create($data);
    Session::put('message', 'Data Created Successfully !!');
    return Redirect::to('admin/social/');
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
        $social = Social::find($id);
        return view('admin.socials.edit', compact('social','id'));
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
        $social = Social::findOrFail($id);
        $this->validate($request, ['name'=>'max:255,required,string',]);

   IF ($request->HASFILE('image'))
   {
       @unlink(public_path('images/social/'.$social->image));
       $image = $request->FILE('image');
       $FILENAME = 'social' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
       $LOCATION = PUBLIC_PATH('images/social');
       $request->FILE('image')->MOVE($LOCATION, $FILENAME);
       $data['image']= $FILENAME;
   }
   else
   {
       $data['image']=$social->image;
   }


   $social->update($data);
   Session::put('message', 'Data Updated Successfully !!');
   // Redirect to the previous page successfully
   return Redirect::to('admin/social/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social = Social::find($id);
        @unlink(public_path('images/social/'.$social->image));

        $social->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/social/');
    }
}
