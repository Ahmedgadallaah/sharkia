<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvestSection;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class InvestSectionController extends Controller
{
  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $sections = InvestSection::paginate(10);
            return view('admin.sections.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.create');
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
                'description'=> $request->input('ar_description'),
            ],
        ];
        //dd($data);
        InvestSection::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/section/');
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

        $section = InvestSection::find($id);
        return view('admin.sections.edit', compact('section','id'));
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
        $section = InvestSection::findOrFail($id);
             $this->validate($request, [


            ]);
            $data = [
                'en' => [
                    'description'=> $request->input('en_description'),
                ],
                'ar' => [
                    'description'=> $request->input('ar_description'),
                ],
            ];



        $section->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/section/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $section = InvestSection::find($id);


        $section->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/section/');

    }
    public function InActive($id)
    {
        $section = InvestSection::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/section');
    }

    public function Active($id)
    {
        $section = InvestSection::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/section');
    }
}
