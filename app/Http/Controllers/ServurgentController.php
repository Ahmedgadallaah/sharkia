<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Servurgent;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ServurgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servurgents = Servurgent::paginate(10);
        return view('admin.servurgents.index',compact('servurgents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servurgents.create');
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
        $data['type'] = $request->input('type');


        Servurgent::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/servurgent/');
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
        $servurgent = Servurgent::find($id);
        return view('admin.servurgents.edit', compact('servurgent','id'));
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
        $servurgent = Servurgent::findOrFail($id);
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
            $data['type'] = $request->input('type');

        $servurgent->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/servurgent/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servurgent = Servurgent::find($id);
        $servurgent->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/servurgent/');

    }
}
