<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conference;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ConferenceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferences = Conference::paginate(10);
        return view('admin.conferences.index',compact('conferences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conferences.create');
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
        Conference::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/conference/');
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
        $conference = Conference::find($id);
        return view('admin.conferences.edit', compact('conference','id'));
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
        $conference = Conference::findOrFail($id);
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



        $conference->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/conference/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conference = Conference::find($id);
        @unlink(public_path('images/conference/'.$conference->image));

        $conference->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/conference/');

    }
}
