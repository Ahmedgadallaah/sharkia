<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvestArea;


use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class InvestAreaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = InvestArea::paginate(10);


        return view('admin.areas.index',compact('areas'));
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, []);
        $data = [
            'en' => ['name'=> $request->input('en_name')],
            'ar' => ['name'=> $request->input('ar_name')],
                ];

                IF ($request->HASFILE('image')) {

                    $image = $request->FILE('image');
                    $FILENAME = 'area' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                    $LOCATION = PUBLIC_PATH('images/area');
                    $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                    $data['image']= $FILENAME;
                 }
                //dd($data);
        InvestArea::create($data);
         Session::put('message', 'Data Created Successfully !!');
         return Redirect::to('admin/area/');
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

            $area = InvestArea::find($id);
            return view('admin.areas.edit', compact('area','id'));

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

         $area = InvestArea::findOrFail($id);

         $this->validate($request, [
        ]);
        $data = [
            'en' => [
                'name'=> $request->input('en_name'),
                    ],
            'ar' => [
                    'name'=> $request->input('ar_name'),
                    ],
                ];



            IF ($request->HASFILE('image')) {
                @unlink(public_path('images/area'.$area->image));
                $image = $request->FILE('image');
                $FILENAME = 'area' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/area');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
             }else{
                $data['image']=$area->image;
             }

         $area->update($data);
         Session::put('message', 'Data Updated Successfully !!');
         // Redirect to the previous page successfully
         return Redirect::to('admin/area/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = InvestArea::find($id);
        @unlink(public_path('images/area'.$area->image));
        $area->delete();
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('/admin/area/');

    }
    public function InActive($id)
    {
        $area = InvestArea::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/area');
    }

    public function Active($id)
    {

        $area = InvestArea::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/area');
    }
}
