<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entity;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class EntityController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entities = Entity::paginate(10);
            return view('admin.entities.index',compact('entities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.entities.create');
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

            $data['type']=$request->input('type');

            IF ($request->HASFILE('image')) {

                $image = $request->FILE('image');
                $FILENAME = 'entity' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/entity');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
                      }

      //  dd($data);
        Entity::create($data);
        Session::put('message', 'Entity Created Successfully !!');
        return Redirect::to('admin/entity/');
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

        $entity = Entity::find($id);
        return view('admin.entities.edit', compact('entity','id'));
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
        $entity = Entity::findOrFail($id);
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



            $data['type']=$request->input('type');

        IF ($request->HASFILE('image')) {
            @unlink(public_path('images/entity'.$entity->image));
            $image = $request->FILE('image');
            $FILENAME = 'entity' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/entity');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$entity->image;
         }


        $entity->update($data);
        Session::put('message', 'entity Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/entity/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $entity = Entity::find($id);
        @unlink(public_path('images/entity/'.$entity->image));

        $entity->delete();
        Session::put('message', 'entity Deleted Successfully !!');
        return Redirect::to('/admin/entity/');

    }
    public function InActive($id)
    {
        $entity = Entity::find($id)->update(['online' => 0]);
        Session::put('message', 'entity Activated Successfully !!');
        return Redirect::to('/admin/entity');
    }

    public function Active($id)
    {
        $entity = Entity::find($id)->update(['online' => 1]);
        Session::put('message', 'entity Activated Successfully !!');
        return Redirect::to('/admin/entity');
    }
}
