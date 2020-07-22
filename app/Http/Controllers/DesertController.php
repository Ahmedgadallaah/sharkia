<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Desert;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class DesertController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deserts = Desert::paginate(10);
        return view('admin.deserts.index',compact('deserts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deserts.create');
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
                $FILENAME = 'desert' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/desert/');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
                      }

      //  dd($data);
        Desert::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/desert/');
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
        $desert = Desert::find($id);
        return view('admin.deserts.edit', compact('desert','id'));
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
        $desert = Desert::findOrFail($id);
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
            @unlink(public_path('images/desert/'.$desert->image));
            $image = $request->FILE('image');
            $FILENAME = 'desert' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/desert/');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$desert->image;
         }


        $desert->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/desert/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desert = Desert::find($id);
        @unlink(public_path('images/desert/'.$desert->image));

        $desert->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/desert/');

    }
}
