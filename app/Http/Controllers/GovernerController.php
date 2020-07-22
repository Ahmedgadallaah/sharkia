<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Governer;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class GovernerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governers = Governer::paginate(10);
            return view('admin.governers.index',compact('governers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.governers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"=>"max:255,string",
            "date"=>"max:255",
        ]);
        $data = [
            'en' => [
                'name'=> $request->input('en_name'),
                'date'=>$request->input('en_date'),
            ],
            'ar' => [
                'name'=> $request->input('ar_name'),
                'date'=> $request->input('ar_date'),
            ],
        ];

            IF ($request->HASFILE('image')) {

                $image = $request->FILE('image');
                $FILENAME = 'governer' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/governer');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
              }

        //dd($data);
        Governer::create($data);
        Session::put('message', 'Governer Created Successfully !!');
        return Redirect::to('admin/governer/');
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

        $governer = Governer::find($id);
        return view('admin.governers.edit', compact('governer','id'));
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
        $governer = Governer::findOrFail($id);
             $this->validate($request, [
                "name"=>"max:255,string",
                "date"=>"max:255,",
            ]);
            $data = [
                'en' => [
                    'name'=> $request->input('en_name'),
                    'date'=>$request->input('en_date'),
                ],
                'ar' => [
                    'name'=> $request->input('ar_name'),
                    'date'=>$request->input('ar_date'),
                ],
            ];





        IF ($request->HASFILE('image')) {
            @unlink(public_path('images/governer'.$governer->image));
            $image = $request->FILE('image');
            $FILENAME = 'Governer' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/governer');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$governer->image;
         }

        $governer->update($data);
        Session::put('message', 'Governer Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/governer/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $governer = Governer::find($id);
        @unlink(public_path('images/governer/'.$governer->image));
        $governer->delete();
        Session::put('message', 'Governer Deleted Successfully !!');
        return Redirect::to('/admin/governer/');

    }
    public function InActive($id)
    {
        $governer = Governer::find($id)->update(['online' => 0]);
        Session::put('message', 'governer Activated Successfully !!');
        return Redirect::to('/admin/governer');
    }

    public function Active($id)
    {
        $governer = Governer::find($id)->update(['online' => 1]);
        Session::put('message', 'governer Activated Successfully !!');
        return Redirect::to('/admin/governer');
    }
}
