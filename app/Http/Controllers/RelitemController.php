<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Relitem;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class RelitemController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relitems = Relitem::paginate(10);
        return view('admin.relitems.index',compact('relitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.relitems.create');
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
                $FILENAME = 'relitem' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/relitem/');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
                      }

      //  dd($data);
      Relitem::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/relitem/');
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
        $relitem = Relitem::find($id);
        return view('admin.relitems.edit', compact('relitem','id'));
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
        $relitem = Relitem::findOrFail($id);
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
            @unlink(public_path('images/relitem/'.$relitem->image));
            $image = $request->FILE('image');
            $FILENAME = 'relitem' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/relitem/');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$relitem->image;
         }


        $relitem->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/relitem/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relitem = Relitem::find($id);
        @unlink(public_path('images/relitem/'.$relitem->image));

        $relitem->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/relitem/');

    }
}
