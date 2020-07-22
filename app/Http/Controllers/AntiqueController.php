<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antique;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class AntiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antiques = Antique::paginate(10);
        return view('admin.antiques.index',compact('antiques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.antiques.create');
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
                'description'=> $request->input('en_description'),
            ],
            'ar' => [
                'name'=> $request->input('ar_name'),
                'description'=> $request->input('ar_description'),
            ],
        ];


            IF ($request->HASFILE('image')) {

                $image = $request->FILE('image');
                $FILENAME = 'Antique' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/antique/');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
                      }

      //  dd($data);
        Antique::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/antique/');
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
        $antique = Antique::find($id);
        return view('admin.antiques.edit', compact('antique','id'));
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
        $antique = Antique::findOrFail($id);
             $this->validate($request, [
                'name'=>'max:255,required,string',

            ]);
            $data = [
                'en' => [
                    'name'=> $request->input('en_name'),
                    'description'=>$request->input('en_description')
                ],
                'ar' => [
                    'name'=> $request->input('ar_name'),
                    'description'=>$request->input('ar_description')
                ],
            ];

        IF ($request->HASFILE('image')) {
            @unlink(public_path('images/antique/'.$antique->image));
            $image = $request->FILE('image');
            $FILENAME = 'antique' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/antique/');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$antique->image;
         }


        $antique->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/antique/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $antique = Antique::find($id);
        @unlink(public_path('images/antique/'.$antique->image));

        $antique->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/antique/');

    }
}
