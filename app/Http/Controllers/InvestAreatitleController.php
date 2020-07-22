<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvestArea;
use App\Areatitle;
use App\AreaGallery;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class InvestAreatitleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = Areatitle::with('area')->paginate(10);
        return view('admin.areatitles.index',compact('titles'));
    }

    public function create()
    {
        $title = Areatitle::with('area')->get();
        $areas = InvestArea::all();
        return view('admin.areatitles.create',compact('areas','title'));
    }

    public function store(Request $request)
    {



        $this->validate($request, []);
        $data = [
            'en' => ['name'=> $request->input('en_name'),
                     'description'=>$request->input('en_description')],
            'ar' => [
                    'name'=> $request->input('ar_name'),
                    'description'=>$request->input('ar_description'),
                    ],
                ];


        $data['invest_area_id'] =$request->input('invest_area_id');

        IF ($request->HASFILE('image')) {

            $image = $request->FILE('image');
            $FILENAME = 'areatitle' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/areatitle');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }
        //'category_id' => $request->category_id;
        //dd($data);

        $p=Areatitle::create($data);


        if ($files = $request->file('images')) {
            // Define upload path
             $destinationPath = public_path('images/'); // upload path
             foreach($files as $img) {
                 // Upload Orginal Image
                $name =$img->getClientOriginalName();
                $img->move($destinationPath, $name);
                 // Save In Database
                 $gallery = new AreaGallery();
                 $gallery->image="$name";
                 $gallery->areatitle_id = $p->id;
                 $gallery->save();
             }

         }

         Session::put('message', 'Data Created Successfully !!');
         return Redirect::to('admin/areatitle/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = AreaTitle::find($id);
        $areas = InvestArea::with('area')->get();
        return view('admin.areatitless.show', compact('title','areas'));

    }


    public function image($id)
    {
        $title = AreaTitle::with('gallery')->findOrFail($id);
//dd($title);
        return view('admin.areatitles.image',compact('title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $title = AreaTitle::with('gallery')->find($id);
        //dd($title);
        $areas = InvestArea::with('areatitle')->get();
        return view('admin.areatitles.edit', compact('title','areas'));

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

         $title = AreaTitle::findOrFail($id);

         $this->validate($request, []);
         $data = [
             'en' => ['name'=> $request->input('en_name'),
                      'description'=>$request->input('en_description')],
             'ar' => [
                     'name'=> $request->input('ar_name'),
                     'description'=>$request->input('ar_description'),
                     ],
                 ];
        $data['invest_area_id'] =$request->input('invest_area_id');
        //  $p=Areatitle::create($data);

        IF ($request->HASFILE('image')) {
            @unlink(public_path('images/areatitle'.$title->image));
            $image = $request->FILE('image');
            $FILENAME = 'areatitle' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/areatitle');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$title->image;
         }

        $title->update($data);

        if ($files = $request->file('images')) {
            // Define upload path
             $destinationPath = public_path('images/'); // upload path
             foreach($files as $img) {
                 // Upload Orginal Image
                @unlink(public_path('images/'.$title->images));
                $name =$img->getClientOriginalName();
                $img->move($destinationPath, $name);
                 // Save In Database
                 $gallery= new AreaGallery();
                 $gallery->image="$name";
                 $gallery->areatitle_id = $title->id;
                 $gallery->save();
             }
         }
         Session::put('message', 'Data Updated Successfully !!');
         // Redirect to the previous page successfully
         return Redirect::to('admin/areatitle/');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = AreaTitle::find($id);
        foreach($title->gallery as $image){
            @unlink(public_path('images/'.$image->images));
            $image->delete();
            }
        $title->delete();
        Session::put('message', 'data Deleted Successfully !!');
        return Redirect::to('/admin/areatitle/');

    }
    public function InActive($id)
    {
        $title = AreaTitle::find($id)->update(['online' => 0]);
        Session::put('message', 'data Activated Successfully !!');
        return Redirect::to('/admin/areatitle');
    }

    public function Active($id)
    {

        $title = AreaTitle::find($id)->update(['online' => 1]);
        Session::put('message', 'data Activated Successfully !!');
        return Redirect::to('/admin/areatitle');
    }
}
