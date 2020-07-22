<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Museum;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class MuseumController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $museums = Museum::paginate(10);
        return view('admin.museums.index',compact('museums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.museums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = [
            'en' => [
                'name'=> $request->input('en_name'),
                'description'=> $request->input('en_description'),
            ],
            'ar' => [
                'name'=> $request->input('ar_name'),
                'description'=> $request->input('ar_description'),
            ],
        ];


            IF ($request->HASFILE('image')) {

                $image = $request->FILE('image');
                $FILENAME = 'Museum' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/museum/');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
                      }

      //  dd($data);
        Museum::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/museum/');
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
        $museum = Museum::find($id);
        return view('admin.museums.edit', compact('museum','id'));
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
        $museum = Museum::findOrFail($id);
             $this->validate($request, [
                'name'=>'max:255,required,string',
            ]);
            $data = [
                'en' => [
                    'name'=> $request->input('en_name'),
                    'description'=>$request->input('en_description')
                ],
                'ar' => [
                    'name'=> $request->input('ar_name'),
                    'description'=>$request->input('ar_description')
                ],
            ];

        IF ($request->HASFILE('image')) {
            @unlink(public_path('images/museum/'.$museum->image));
            $image = $request->FILE('image');
            $FILENAME = 'museum' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/museum/');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$museum->image;
         }


        $museum->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/museum/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $museum = Museum::find($id);
        @unlink(public_path('images/museum/'.$museum->image));

        $museum->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/museum/');

    }
}
