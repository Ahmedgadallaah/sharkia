<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\InvestChance;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class InvestChanceController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $chances = InvestChance::paginate(10);
            return view('admin.chances.index',compact('chances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        IF ($request->HASFILE('pdf')) {

            $pdf = $request->FILE('pdf');
            $FILENAME = 'invest_chance' . '-' . TIME() . '.' . $pdf->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/invest_chance');
            $request->FILE('pdf')->MOVE($LOCATION, $FILENAME);
            $data['pdf']= $FILENAME;
         }

        //dd($data);
        InvestChance::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/chance/');
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

        $chance = InvestChance::find($id);
        return view('admin.chances.edit', compact('chance','id'));
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
        $chance = InvestChance::findOrFail($id);

        IF ($request->HASFILE('pdf')) {
            @unlink(public_path('images/invest_chance/'.$chance->pdf));
            $pdf = $request->FILE('pdf');
            $FILENAME = 'invest_chance' . '-' . TIME() . '.' . $pdf->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/invest_chance');
            $request->FILE('pdf')->MOVE($LOCATION, $FILENAME);
            $data['pdf']= $FILENAME;
         }else{
            $data['pdf']=$media->pdf;
         }


//dd($chance);
        $chance->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/chance/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $chance = InvestChance::find($id);

        @unlink(public_path('images/invest_chance/'.$chance->pdf));
        $chance->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/chance/');

    }
    public function InActive($id)
    {
        $chance = InvestChance::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/chance');
    }

    public function Active($id)
    {
        $chance = InvestChance::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/chance');
    }
}
