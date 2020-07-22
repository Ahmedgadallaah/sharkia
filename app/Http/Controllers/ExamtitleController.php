<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Examtitle;
use App\Exam;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ExamtitleController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = Examtitle::with('exam')->paginate(10);
        return view('admin.examtitles.index',compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = Examtitle::with('exam')->get();
        $exams = Exam::all();
        return view('admin.examtitles.create',compact('exams','title'));
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
        $data['exam_id'] =$request->input('exam_id');
      //  dd($data);
        Exam::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/examtitle/');
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

        $title = Examtitle::with('exam')->find($id);
        $exams = Exam::all();
        return view('admin.examtitles.edit', compact('title','exams'));
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
        $title = Examtitle::findOrFail($id);
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

        $data['exam_id'] =$request->input('exam_id');
        $title->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/examtitle/');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = Examtitle::find($id);
        $title->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/examtitle/');
    }
}
