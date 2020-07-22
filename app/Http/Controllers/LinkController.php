<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Link;
use Intervention\Image\ImageshaphotorStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::paginate(10);
        return view('admin.links.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.links.create');
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
            $FILENAME = 'link' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/link/');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
        }
   // dd($data);
    Link::create($data);
    Session::put('message', 'Data Created Successfully !!');
    return Redirect::to('admin/link/');
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
        $link = Link::find($id);
        return view('admin.links.edit', compact('link','id'));
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
        $link = Link::findOrFail($id);
        $this->validate($request, ['name'=>'max:255,required,string',]);

   IF ($request->HASFILE('image'))
   {
       @unlink(public_path('images/link/'.$link->image));
       $image = $request->FILE('image');
       $FILENAME = 'link' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
       $LOCATION = PUBLIC_PATH('images/link');
       $request->FILE('image')->MOVE($LOCATION, $FILENAME);
       $data['image']= $FILENAME;
   }
   else
   {
       $data['image']=$link->image;
   }


   $link->update($data);
   Session::put('message', 'Data Updated Successfully !!');
   // Redirect to the previous page successfully
   return Redirect::to('admin/link/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = Link::find($id);
        @unlink(public_path('images/link/'.$link->image));

        $link->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/link/');
    }
}
