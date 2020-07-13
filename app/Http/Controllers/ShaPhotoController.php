<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shaphoto;
use Intervention\Image\ImageshaphotorStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ShaPhotoController extends Controller
{
       /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $shaphotos = Shaphoto::paginate(10);
            return view('admin.shaphotos.index',compact('shaphotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shaphotos.create');
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
                $FILENAME = 'shaphoto' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/shaphoto/');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
            }
        //  dd($data);
        Shaphoto::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/shaphoto/');
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

        $shaphoto = Shaphoto::find($id);
        return view('admin.shaphotos.edit', compact('shaphoto','id'));
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
        $shaphoto = Shaphoto::findOrFail($id);
             $this->validate($request, ['name'=>'max:255,required,string',]);

        IF ($request->HASFILE('image'))
        {
            @unlink(public_path('images/shaphoto/'.$shaphoto->image));
            $image = $request->FILE('image');
            $FILENAME = 'shaphoto' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/shaphoto');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
        }
        else
        {
            $data['image']=$shaphoto->image;
        }


        $shaphoto->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/shaphoto/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $shaphoto = Shaphoto::find($id);
        @unlink(public_path('images/shaphoto/'.$shaphoto->image));

        $shaphoto->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/shaphoto/');

    }
    public function InActive($id)
    {
        $shaphoto = Shaphoto::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/shaphoto');
    }

    public function Active($id)
    {
        $shaphoto = Shaphoto::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/shaphoto');
    }
}
