<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shaflagcat;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ShaFlagCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shaflagcats = Shaflagcat::paginate(10);


        return view('admin.shaflagcats.index',compact('shaflagcats'));
    }

    public function create()
    {
        return view('admin.shaflagcats.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
        ]);
        $data = [

            'en' => [
                'name'=> $request->input('en_name'),
                    ],
            'ar' => [
                    'name'=> $request->input('ar_name'),
                    ],
                ];

        //dd($data);
         Shaflagcat::create($data);
         Session::put('message', 'Data Created Successfully !!');
         return Redirect::to('admin/shaflagcat/');

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

            $shaflagcat = Shaflagcat::find($id);
            return view('admin.shaflagcats.edit', compact('shaflagcat','id'));

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

         $shaflagcat = Shaflagcat::findOrFail($id);

         $this->validate($request, [

        ]);
        $data = [
            'en' => [
                'name'=> $request->input('en_name'),
                    ],
            'ar' => [
                    'name'=> $request->input('ar_name'),
                    ],
                ];


         $shaflagcat->update($data);
         Session::put('message', 'Data Updated Successfully !!');
         // Redirect to the previous page successfully
         return Redirect::to('admin/shaflagcat/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shaflagcat = Shaflagcat::find($id);
        $shaflagcat->delete();
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('/admin/shaflagcat/');

    }
    public function InActive($id)
    {
        $shaflagcat = Shaflagcat::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/shaflagcat');
    }

    public function Active($id)
    {

        $shaflagcat = Shaflagcat::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/shaflagcat');
    }
}
