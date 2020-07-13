<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class CompanyController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $entities = Entity::where('type','company')->paginate(10);
           return view('admin.companies.index',compact('entities'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('admin.companies.create');
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

           $data['type']='company';

           IF ($request->HASFILE('image')) {

               $image = $request->FILE('image');
               $FILENAME = 'company' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
               $LOCATION = PUBLIC_PATH('images/company/');
               $request->FILE('image')->MOVE($LOCATION, $FILENAME);
               $data['image']= $FILENAME;
                     }

     //  dd($data);
       Entity::create($data);
       Session::put('message', 'Data Created Successfully !!');
       return Redirect::to('admin/company/');
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
       return view('admin.companies.edit', compact('entity','id'));
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



           $data['type']='company';

       IF ($request->HASFILE('image')) {
           @unlink(public_path('images/company/'.$entity->image));
           $image = $request->FILE('image');
           $FILENAME = 'entity' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
           $LOCATION = PUBLIC_PATH('images/company');
           $request->FILE('image')->MOVE($LOCATION, $FILENAME);
           $data['image']= $FILENAME;
        }else{
           $data['image']=$entity->image;
        }


       $entity->update($data);
       Session::put('message', 'Data Updated Successfully !!');
       // Redirect to the previous page successfully
       return Redirect::to('admin/company/');
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
       @unlink(public_path('images/company/'.$entity->image));

       $entity->delete();
       Session::put('message', 'Data Deleted Successfully !!');
       return Redirect::to('/admin/company/');

   }
   public function InActive($id)
   {
       $entity = Entity::find($id)->update(['online' => 0]);
       Session::put('message', 'Data Activated Successfully !!');
       return Redirect::to('/admin/company');
   }

   public function Active($id)
   {
       $entity = Entity::find($id)->update(['online' => 1]);
       Session::put('message', 'Data Activated Successfully !!');
       return Redirect::to('/admin/company');
   }
}
