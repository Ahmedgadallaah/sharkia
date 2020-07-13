<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvestGuide;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class InvestGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = InvestGuide::paginate(10);
            return view('admin.guides.index',compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [


        ]);
        $data = [
            'en' => [
                'city'=> $request->input('en_city'),
                'company'=>$request->input('en_company'),
                'address'=>$request->input('en_address'),
            ],
            'ar' => [
                'city'=> $request->input('ar_city'),
                'company'=>$request->input('ar_company'),
                'address'=>$request->input('ar_address'),
            ],
            'member_num'=> $request->input('member_num'),
            'mobile'=>$request->input('mobile'),
            'fax'=>$request->input('fax'),
        ];
        //dd($data);
        InvestGuide::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/guide/');
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
        $guide = InvestGuide::find($id);
        return view('admin.guides.edit', compact('guide','id'));
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
        $guide = InvestGuide::findOrFail($id);

        $this->validate($request, [
            ]);
            $data = [
                'en' => [
                    'city'=> $request->input('en_city'),
                    'company'=>$request->input('en_company'),
                    'address'=>$request->input('en_address'),
                ],
                'ar' => [
                    'city'=> $request->input('ar_city'),
                    'company'=>$request->input('ar_company'),
                    'address'=>$request->input('ar_address'),
                ],

                'member_num'=> $request->input('member_num'),
                'mobile'=>$request->input('mobile'),
                'fax'=>$request->input('fax'),
            ];
            //dd($data);
        $guide->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/guide/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $guide = InvestGuide::find($id);

        $guide->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/guide/');
    }
    public function InActive($id)
    {
        $guide = InvestGuide::find($id)->update(['online' => 0]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/guide');
    }

    public function Active($id)
    {
        $guide = InvestGuide::find($id)->update(['online' => 1]);
        Session::put('message', 'Data Activated Successfully !!');
        return Redirect::to('/admin/guide');
    }

}
