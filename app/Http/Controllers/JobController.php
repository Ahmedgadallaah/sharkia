<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Job;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::paginate(10);
        return view('admin.jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobs.create');
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
        $data['link']=$request->input('link');
        Job::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/job/');
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
        $job = Job::find($id);
        return view('admin.jobs.edit', compact('job','id'));
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
        $job = Job::findOrFail($id);
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
        $data['link']=$request->input('link');

   $job->update($data);
   Session::put('message', 'Data Updated Successfully !!');
   // Redirect to the previous page successfully
   return Redirect::to('admin/job/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/job/');
    }
}
