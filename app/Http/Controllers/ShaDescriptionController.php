<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Shadescription;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ShaDescriptionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shadescriptions = Shadescription::paginate(10);
        return view('admin.shadescriptions.index',compact('shadescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shadescriptions.create');
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
            'type'=> $request->input('type'),

        ];
        Shadescription::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/shadescription/');
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
        $shadescription = Shadescription::find($id);
        return view('admin.shadescriptions.edit', compact('shadescription','id'));
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
        $shadescription = Shadescription::findOrFail($id);
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
                'type'=> $request->input('type'),
            ];


        $shadescription->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/shadescription/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shadescription = Shadescription::find($id);
        $shadescription->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/shadescription/');

    }
}
