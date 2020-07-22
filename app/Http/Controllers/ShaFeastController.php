<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shafeast;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ShaFeastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shafeasts = Shafeast::paginate(10);
        return view('admin.shafeasts.index',compact('shafeasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shafeasts.create');
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
        Shafeast::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/shafeast/');
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
        $shafeast = Shafeast::find($id);
        return view('admin.shafeasts.edit', compact('shafeast','id'));
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
        $shafeast = Shafeast::findOrFail($id);
             $this->validate($request, [
                'name'=>'max:255,required,string',
            ]);
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


        $shafeast->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/shafeast/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shafeast = Shafeast::find($id);
        $shafeast->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/shafeast/');

    }
}
