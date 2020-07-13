<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Countryside;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class CountrysideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countrysides = Countryside::paginate(10);
        return view('admin.countrysides.index',compact('countrysides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countrysides.create');
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

                'description'=> $request->input('en_description'),
            ],
        ];




      //  dd($data);
        Countryside::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/countryside/');
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
        $countryside = Countryside::find($id);
        return view('admin.countrysides.edit', compact('countryside','id'));
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
        $countryside = Countryside::findOrFail($id);
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



        $countryside->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/countryside/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryside = Countryside::find($id);
        $countryside->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/countryside/');

    }
}
