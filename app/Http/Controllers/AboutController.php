<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\About;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::paginate(10);
        return view('admin.abouts.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.abouts.create');
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

                'description'=> $request->input('en_description'),
            ],
            'ar' => [

                'description'=> $request->input('ar_description'),
            ],
        ];




      //  dd($data);
        About::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/about/');
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
        $about = About::find($id);
        return view('admin.abouts.edit', compact('about','id'));
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
        $about = About::findOrFail($id);
        $this->validate($request, [
           'name'=>'max:255,required,string',

       ]);
       $data = [
           'en' => [
               'description'=> $request->input('en_description'),

           ],
           'ar' => [
               'description'=> $request->input('ar_description'),

           ],
       ];



   $about->update($data);
   Session::put('message', 'Data Updated Successfully !!');
   // Redirect to the previous page successfully
   return Redirect::to('admin/about/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        @unlink(public_path('images/about/'.$about->image));

        $about->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/about/');

    }
}
