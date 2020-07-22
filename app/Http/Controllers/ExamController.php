<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exam;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ExamController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::paginate(10);
        return view('admin.exams.index',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exams.create');
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


            IF ($request->HASFILE('image')) {

                $image = $request->FILE('image');
                $FILENAME = 'exam' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/exam/');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
                      }

      //  dd($data);
        Exam::create($data);
        Session::put('message', 'Data Created Successfully !!');
        return Redirect::to('admin/exam/');
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
        $exam = Exam::find($id);
        return view('admin.exams.edit', compact('exam','id'));
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
        $exam = Exam::findOrFail($id);
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

        IF ($request->HASFILE('image')) {
            @unlink(public_path('images/exam/'.$exam->image));
            $image = $request->FILE('image');
            $FILENAME = 'exam' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/exam/');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$exam->image;
         }


        $exam->update($data);
        Session::put('message', 'Data Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/exam/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        @unlink(public_path('images/exam/'.$exam->image));

        $exam->delete();
        Session::put('message', 'Data Deleted Successfully !!');
        return Redirect::to('/admin/exam/');

    }
}
