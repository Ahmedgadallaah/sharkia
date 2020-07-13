<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Shaflagcat;
use App\shaflag;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ShaFlagController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shaflags = Shaflag::with('shaflagcat')->paginate(10);
        return view('admin.shaflags.index',compact('shaflags'));
    }

    public function create()
    {
        $shaflag = Shaflag::with('Shaflagcat')->get();
        $shaflagcats = Shaflagcat::all();
        return view('admin.shaflags.create',compact('shaflagcats','shaflag'));
    }

    public function store(Request $request)
    {



        $this->validate($request, [
        ]);
        $data = [

            'en' => [
                    'name'=> $request->input('en_name'),
                    ],
            'ar' => [
                    'name'=> $request->input('ar_name'),
                    ],
                ];

                IF ($request->HASFILE('image')) {
                    $image = $request->FILE('image');
                    $FILENAME = 'Shaflag' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                    $LOCATION = PUBLIC_PATH('images/');
                    $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                    $data['image']= $FILENAME;
                  }
        $data['shaflagcat_id'] =$request->input('shaflagcat_id');
        //'shaflagcat_id' => $request->shaflagcat_id;
        //dd($data);
        $p=Shaflag::create($data);

         Session::put('message', 'Data Created Successfully !!');
         return Redirect::to('admin/shaflag/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shaflag = Shaflag::find($id);
        $shaflagcats = Shaflagcat::with('shaflag')->get();
        return view('admin.shaflags.show', compact('shaflag','shaflagcats'));

    }


    public function image($id)
    {
        $shaflag = Shaflag::findOrFail($id);
//dd($Shaflag);
        return view('admin.shaflags.image',compact('shaflag'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $shaflag = Shaflag::find($id);
        //dd($Shaflag);
        $shaflagcats = Shaflagcat::with('shaflag')->get();
        return view('admin.shaflags.edit', compact('shaflag','shaflagcats'));

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

         $shaflag = Shaflag::findOrFail($id);

         $this->validate($request, []);
        $data = [
            'en' => [
                'name'=> $request->input('en_name'),
                ],
        'ar' => [
                'name'=> $request->input('ar_name'),
                ],
                ];

                IF ($request->HASFILE('image')) {
                    @unlink(public_path('images/'.$shaflag->image));
                    $image = $request->FILE('image');
                    $FILENAME = 'shaflag' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                    $LOCATION = PUBLIC_PATH('images/');
                    $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                    $shaflag->image= $FILENAME;
                  }else{
                    $data['image']= $shaflag->image;
                  }
        $data['shaflagcat_id'] =$request->input('shaflagcat_id');


         $shaflag->update($data);





         Session::put('message', 'Data Updated Successfully !!');
         // Redirect to the previous page successfully
         return Redirect::to('admin/shaflag/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shaflag = Shaflag::find($id);
        @unlink(public_path('images/'.$shaflag->image));
        $shaflag->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/shaflag/');

    }
    public function InActive($id)
    {
        $shaflag = Shaflag::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/shaflag');
    }

    public function Active($id)
    {

        $Shaflag = Shaflag::find($id)->update(['online' => 1]);
        Session::put('message', 'Shaflag Activated Successfully !!');
        return Redirect::to('/admin/Shaflag');
    }
}
