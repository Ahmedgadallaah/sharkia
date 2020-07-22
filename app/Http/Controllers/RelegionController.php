<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relegion;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class RelegionController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relegions = Relegion::paginate(10);
        return view('admin.relegions.index',compact('relegions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.relegions.create');
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
        Relegion::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/relegion/');
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
        $relegion = Relegion::find($id);
        return view('admin.relegions.edit', compact('relegion','id'));
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
        $relegion = Relegion::findOrFail($id);
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



        $relegion->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/relegion/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relegion = Relegion::find($id);


        $relegion->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/relegion/');

    }
}
