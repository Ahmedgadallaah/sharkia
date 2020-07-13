<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\MediaGallery;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class Media_MinisterController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $medias = Media::where('type','minister')->paginate(10);
            return view('admin.media_ministers.index',compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media_ministers.create');
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
                'date'=> $request->input('en_date'),
                'description'=> $request->input('en_description'),
             ],
            'ar' => [
                'name'=> $request->input('ar_name'),
                'date'=> $request->input('ar_date'),
                'description'=> $request->input('ar_description'),
            ],
        ];

            $data['type']='minister';

            IF ($request->HASFILE('image')) {

                $image = $request->FILE('image');
                $FILENAME = 'media_minister' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/media_ministers/');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
             }

            $media= Media::create($data);

             if ($files = $request->file('images')) {
                 // Define upload path
                  $destinationPath = public_path('images/media_ministers'); // upload path
                  foreach($files as $img) {
                      // Upload Orginal Image

                     $name =$img->getClientOriginalName();
                     $img->move($destinationPath, $name);
                      // Save In Database
                      $gallery= new MediaGallery();
                      $gallery->images ="$name";
                      $gallery->media_id = $media->id;
                     // dd($gallery);
                      $gallery->save();
                  }

              }

      //  dd($data);

        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/media_minister/');
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

        $media = Media::find($id);
        return view('admin.media_ministers.edit', compact('media','id'));
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
        $media = Media::findOrFail($id);
             $this->validate($request, [
                'name'=>'max:255,required,string',

            ]);
            $data = [
                'en' => [
                    'name'=> $request->input('en_name'),
                    'date'=> $request->input('en_date'),
                    'description'=> $request->input('en_description'),
                ],
                'ar' => [
                    'name'=> $request->input('ar_name'),
                    'date'=> $request->input('ar_date'),
                    'description'=> $request->input('ar_description'),
                ],
            ];
            $data['type']='minister';

        IF ($request->HASFILE('image')) {
            @unlink(public_path('images/media_minister/'.$media->image));
            $image = $request->FILE('image');
            $FILENAME = 'media_minister' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/media_minister');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$media->image;
         }


        $media->update($data);


        if ($files = $request->file('images')) {
         // Define upload path
          $destinationPath = public_path('images/media_minister'); // upload path
          foreach($files as $img) {
              // Upload Orginal Image
             @unlink(public_path('images/media_minister/'.$media->images));
             $name =$img->getClientOriginalName();
             $img->move($destinationPath, $name);
              // Save In Database
              $gallery= new MediaGallery();
              $gallery->images ="$name";
              $gallery->media_id = $media->id;
             // dd($gallery);
              $gallery->save();
          }

      }
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/media_minister/');
    }



    public function image($id)
    {
        $media = Media::with('gallery')->findOrFail($id);
 //dd($product);
        return view('admin.media_ministers.image',compact('media'));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $media = Media::find($id);
        @unlink(public_path('images/media_minister/'.$media->image));

        $media->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/media_minister/');

    }
    public function InActive($id)
    {
        $media = Media::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/media_minister');
    }

    public function Active($id)
    {
        $media = Media::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/media_minister');
    }
}
