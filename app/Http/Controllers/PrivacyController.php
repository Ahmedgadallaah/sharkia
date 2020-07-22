<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Privacy;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class PrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privacies = Privacy::paginate(10);
        return view('admin.privacies.index',compact('privacies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.privacies.create');
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
        Privacy::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/privacy/');
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
        $privacy = Privacy::find($id);
        return view('admin.privacies.edit', compact('privacy','id'));
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
        $privacy = Privacy::findOrFail($id);
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



   $privacy->update($data);
   Session::put('message', 'Data Updated Successfully !!');
   // Redirect to the previous page successfully
   return Redirect::to('admin/privacy/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $privacy = Privacy::find($id);
        @unlink(public_path('images/privacy/'.$privacy->image));

        $privacy->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/privacy/');

    }
}
