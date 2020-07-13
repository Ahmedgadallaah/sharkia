<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servguide;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ServguideController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servguides = Servguide::paginate(10);
        return view('admin.servguides.index',compact('servguides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servguides.create');
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
            ],
            'ar' => [
                'name'=> $request->input('ar_name'),
            ],
        ];



        Servguide::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/servguide/');
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
        $servguide = Servguide::find($id);
        return view('admin.servguides.edit', compact('servguide','id'));
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
        $servguide = Servguide::findOrFail($id);
             $this->validate($request, [
                'name'=>'max:255,required,string',
            ]);
            $data = [
                'en' => [
                    'name'=> $request->input('en_name'),
                ],
                'ar' => [
                    'name'=> $request->input('ar_name'),
                ],
            ];

        $servguide->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/servguide/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servguide = Servguide::find($id);
        $servguide->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/servguide/');

    }
}
