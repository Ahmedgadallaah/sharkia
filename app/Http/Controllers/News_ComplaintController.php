<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\NewsGallery;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class News_ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where('type','complaint')->paginate(10);
        return view('admin.news_complaints.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news_complaints.create');
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

            $data['type']='complaint';

            IF ($request->HASFILE('image')) {

                $image = $request->FILE('image');
                $FILENAME = 'News_complaint' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/news_complaint/');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
             }

            $news= news::create($data);

             if ($files = $request->file('images')) {
                 // Define upload path
                  $destinationPath = public_path('images/news_complaint'); // upload path
                  foreach($files as $img) {
                      // Upload Orginal Image

                     $name =$img->getClientOriginalName();
                     $img->move($destinationPath, $name);
                      // Save In Database
                      $gallery= new newsGallery();
                      $gallery->images ="$name";
                      $gallery->news_id = $news->id;
                     // dd($gallery);
                      $gallery->save();
                  }

              }

      //  dd($data);

        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/news_complaint/');
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
        $news = News::find($id);
       return view('admin.news_complaints.edit', compact('news','id'));
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
        $news = News::findOrFail($id);
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



       $data['type']='complaint';

   IF ($request->HASFILE('image')) {
       @unlink(public_path('images/news_complaint/'.$news->image));
       $image = $request->FILE('image');
       $FILENAME = 'news_complaint' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
       $LOCATION = PUBLIC_PATH('images/news_complaint');
       $request->FILE('image')->MOVE($LOCATION, $FILENAME);
       $data['image']= $FILENAME;
    }else{
       $data['image']=$news->image;
    }


   $news->update($data);


   if ($files = $request->file('images')) {
    // Define upload path
     $destinationPath = public_path('images/news_complaint'); // upload path
     foreach($files as $img) {
         // Upload Orginal Image
        @unlink(public_path('images/news_complaint/'.$news->images));
        $name =$img->getClientOriginalName();
        $img->move($destinationPath, $name);
         // Save In Database
         $gallery= new NewsGallery();
         $gallery->images ="$name";
         $gallery->news_id = $news->id;
        // dd($gallery);
         $gallery->save();
     }

 }
   Session::put('message', 'Data Updated Successfully !!');
   // Redirect to the previous page successfully
   return Redirect::to('admin/news_complaint/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response

     */

        public function image($id)
   {
       $news = News::with('gallery')->findOrFail($id);
       return view('admin.news_complaints.image',compact('news'));

   }


     public function destroy($id)
    {
        $news = News::find($id);
       @unlink(public_path('images/news_complaint/'.$news->image));

       $news->delete();
       Session::put('message', 'Data Deleted Successfully !!');
       return Redirect::to('/admin/news_complaint/');
    }
}
