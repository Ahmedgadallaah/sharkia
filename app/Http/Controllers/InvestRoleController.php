<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\InvestRole;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class InvestRoleController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $roles = InvestRole::paginate(10);
            return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
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
                //'description'=> $request->input('en_description'),
            ],
            'ar' => [
                'name'=> $request->input('ar_name'),
                //'description'=> $request->input('ar_description'),
            ],
        ];
        IF ($request->HASFILE('image')) {

            $image = $request->FILE('image');
            $FILENAME = 'role' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/role');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }

        //dd($data);
        InvestRole::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/role/');
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

        $role = InvestRole::find($id);
        return view('admin.roles.edit', compact('role','id'));
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
        $role = InvestRole::findOrFail($id);
             $this->validate($request, [

                ]);
            $data = [
                'en' => [
                    'name'=> $request->input('en_name'),
                //    'description'=> $request->input('en_description'),
                ],
                'ar' => [
                    'name'=> $request->input('ar_name'),
                  //  'description'=> $request->input('ar_description'),
                ],
            ];


            IF ($request->HASFILE('image')) {
                @unlink(public_path('images/role'.$role->image));
                $image = $request->FILE('image');
                $FILENAME = 'role' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/role');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
             }else{
                $data['image']=$role->image;
             }

        $role->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/role/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $role = InvestRole::find($id);
        @unlink(public_path('images/role'.$role->image));
        $section->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/role/');

    }
    public function InActive($id)
    {
        $role = InvestRole::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/role');
    }

    public function Active($id)
    {
        $role = InvestRole::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/role');
    }
}
