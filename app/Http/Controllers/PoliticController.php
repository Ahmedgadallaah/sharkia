<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Politic;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class PoliticController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $politics = Politic::paginate(10);
        return view('admin.politics.index',compact('politics'));
    }

    public function create()
    {

        return view('admin.politics.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
        ]);
        $data = [

            'en' => ['name'=> $request->input('en_name')],
            'ar' => ['name'=> $request->input('ar_name')],
                ];

                IF ($request->HASFILE('pdf')) {
                    $pdf = $request->FILE('pdf');
                    $FILENAME = 'politic' . '-' . TIME() . '.' . $pdf->GETCLIENTORIGINALEXTENSION();
                    $LOCATION = PUBLIC_PATH('images/politic/');
                    $request->FILE('pdf')->MOVE($LOCATION, $FILENAME);
                    $data['pdf']= $FILENAME;
                  }
        //dd($data);
        Politic::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/politic/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $politic = Politic::find($id);


        return view('admin.politics.edit', compact('politic'));

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

         $politic = Politic::findOrFail($id);
         $this->validate($request, []);
        $data = [
            'en' => [
                'name'=> $request->input('en_name'),
                ],
        'ar' => [
                'name'=> $request->input('ar_name'),
                ],
                ];

                IF ($request->HASFILE('pdf')) {
                    @unlink(public_path('images/politic/'.$politic->pdf));
                    $pdf = $request->FILE('pdf');
                    $FILENAME = 'politic' . '-' . TIME() . '.' . $pdf->GETCLIENTORIGINALEXTENSION();
                    $LOCATION = PUBLIC_PATH('images/politic/');
                    $request->FILE('pdf')->MOVE($LOCATION, $FILENAME);
                    $politic->pdf= $FILENAME;
                  }else{
                    $data['pdf']= $politic->pdf;
                  }


         $politic->update($data);

         Session::put('message', 'data Updated Successfully !!');
         // Redirect to the previous page successfully
         return Redirect::to('admin/politic/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $politic = Politic::find($id);
        $politic->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/politic/');

    }
    public function InActive($id)
    {
        $politic = Politic::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/politic');
    }

    public function Active($id)
    {

        $politic = Politic::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/politic');
    }
}
