<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vision;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();


class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visions = Vision::paginate(10);
        return view('admin.visions.index',compact('visions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.visions.create');
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
                'vision'=> $request->input('en_vision'),
                'goal'=> $request->input('en_goal'),
                'hope'=> $request->input('en_hope'),
            ],
            'ar' => [
                'vision'=> $request->input('ar_vision'),
                'goal'=> $request->input('ar_goal'),
                'hope'=> $request->input('ar_hope'),
            ],
        ];
      //  dd($data);
        Vision::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/vision/');
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
        $vision = Vision::find($id);
        return view('admin.visions.edit', compact('vision','id'));
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
        $vision = Vision::findOrFail($id);
        $this->validate($request, [
           'name'=>'max:255,required,string',
       ]);
       $data = [
        'en' => [
            'vision'=> $request->input('en_vision'),
            'goal'=> $request->input('en_goal'),
            'hope'=> $request->input('en_hope'),
        ],
        'ar' => [
            'vision'=> $request->input('ar_vision'),
            'goal'=> $request->input('ar_goal'),
            'hope'=> $request->input('ar_hope'),
        ],
    ];

   $vision->update($data);
   Session::put('message', 'Data Updated Successfully !!');
   // Redirect to the previous page successfully
   return Redirect::to('admin/vision/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vision = Vision::find($id);
        $vision->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/vision/');
    }
}
