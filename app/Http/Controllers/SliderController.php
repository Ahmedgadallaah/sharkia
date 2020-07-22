<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Intervention\Image\ImageshaphotorStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(10);
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
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
                'name1'=> $request->input('en_name1'),
                'name2'=> $request->input('en_name2'),
                'name3'=> $request->input('en_name3'),
            ],
            'ar' => [
                'name1'=> $request->input('ar_name1'),
                'name2'=> $request->input('ar_name2'),
                'name3'=> $request->input('ar_name3'),

            ],

        ];

        IF ($request->HASFILE('image'))
        {
            $image = $request->FILE('image');
            $FILENAME = 'slider' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/slider/');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
        }
    // dd($data);
    Slider::create($data);
    Session::put('message', 'Data Created Successfully !!');
    return Redirect::to('admin/slider/');
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
        $slider = Slider::find($id);
        return view('admin.sliders.edit', compact('slider','id'));
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
        $slider = Slider::findOrFail($id);
        $this->validate($request, ['name'=>'max:255,required,string',]);


        $data = [
            'en' => [
                'name1'=> $request->input('en_name1'),
                'name2'=> $request->input('en_name2'),
                'name3'=> $request->input('en_name3'),
            ],
            'ar' => [
                'name1'=> $request->input('ar_name1'),
                'name2'=> $request->input('ar_name2'),
                'name3'=> $request->input('ar_name3'),

            ],

        ];
   IF ($request->HASFILE('image'))
   {
       @unlink(public_path('images/slider/'.$slider->image));
       $image = $request->FILE('image');
       $FILENAME = 'slider' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
       $LOCATION = PUBLIC_PATH('images/slider');
       $request->FILE('image')->MOVE($LOCATION, $FILENAME);
       $data['image']= $FILENAME;
   }
   else
   {
       $data['image']=$slider->image;
   }


   $slider->update($data);
   Session::put('message', 'Data Updated Successfully !!');
   // Redirect to the previous page successfully
   return Redirect::to('admin/slider/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        @unlink(public_path('images/slider/'.$slider->image));

        $slider->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/slider/');
    }
}
