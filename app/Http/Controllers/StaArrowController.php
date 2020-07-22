<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statistic;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class StaArrowController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $arrows = Statistic::where('type','arrow')->paginate(10);

            return view('admin.sarrows.index',compact('arrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sarrows.create');
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

            $data['type']='arrow';

            IF ($request->HASFILE('image')) {

                $image = $request->FILE('image');
                $FILENAME = 'arrow' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/arrow/');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
                      }

      //  dd($data);
      Statistic::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/arrow/');
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

        $arrow = Statistic::find($id);
        return view('admin.sarrows.edit', compact('arrow','id'));
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
        $arrow = Statistic::findOrFail($id);
             $this->validate($request, [
                'name'=>'max:255,required,string',

            ]);
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



            $data['type']='arrow';

        IF ($request->HASFILE('image')) {
            @unlink(public_path('images/arrow/'.$arrow->image));
            $image = $request->FILE('image');
            $FILENAME = 'arrow' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/arrow');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$arrow->image;
         }


        $arrow->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/arrow/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $arrow = Statistic::find($id);
        @unlink(public_path('images/arrow/'.$arrow->image));

        $arrow->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/arrow/');

    }
    public function InActive($id)
    {
        $arrow = Statistic::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/arrow');
    }

    public function Active($id)
    {
        $arrow = Statistic::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/arrow');
    }
}
