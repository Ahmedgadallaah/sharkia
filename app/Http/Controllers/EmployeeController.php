<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
            return view('admin.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'name'=>'max:255,required,string',
                "cv" => "required|mimes:pdf|max:10000",

        ]);
        $data = [
            'en' => [
                'name'=> $request->input('en_name'),
            ],
            'ar' => [
                'name'=> $request->input('ar_name'),
            ],
        ];

            $data['type']=$request->input('type');

            IF ($request->HASFILE('image')) {

                $image = $request->FILE('image');
                $FILENAME = 'Employee' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('images/employee');
                $request->FILE('image')->MOVE($LOCATION, $FILENAME);
                $data['image']= $FILENAME;
                      }

            IF ($request->HASFILE('cv')) {
                $cv = $request->FILE('cv');
                $FILENAME = 'Employee' . '-' . TIME() . '.' . $cv->GETCLIENTORIGINALEXTENSION();
                $LOCATION = PUBLIC_PATH('cv/employee');
                $request->FILE('cv')->MOVE($LOCATION, $FILENAME);
                $data['cv']= $FILENAME;
                }

        //dd($data);
        Employee::create($data);
        Session::put('message', 'Employee Created Successfully !!');
        return Redirect::to('admin/employee/');
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

        $employee = Employee::find($id);
        return view('admin.employees.edit', compact('employee','id'));
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
        $employee = Employee::findOrFail($id);
             $this->validate($request, [
                'name'=>'max:255,required,string',
                "cv" => "required|mimes:pdf|max:10000",
            ]);
            $data = [
                'en' => [
                    'name'=> $request->input('en_name'),
                ],
                'ar' => [
                    'name'=> $request->input('ar_name'),
                ],
            ];



            $data['type']=$request->input('type');

        IF ($request->HASFILE('image')) {
            @unlink(public_path('images/employee'.$employee->image));
            $image = $request->FILE('image');
            $FILENAME = 'Employee' . '-' . TIME() . '.' . $image->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('images/employee');
            $request->FILE('image')->MOVE($LOCATION, $FILENAME);
            $data['image']= $FILENAME;
         }else{
            $data['image']=$employee->image;
         }

        IF ($request->HASFILE('cv')) {
            @unlink(public_path('cv/employee'.$employee->cv));
            $cv = $request->FILE('cv');
            $FILENAME = 'Employee' . '-' . TIME() . '.' . $cv->GETCLIENTORIGINALEXTENSION();
            $LOCATION = PUBLIC_PATH('cv/employee');
            $request->FILE('cv')->MOVE($LOCATION, $FILENAME);
            $data['cv']= $FILENAME;
            }else{
                $data['cv']=$employee->cv;
            }

        $employee->update($data);
        Session::put('message', 'Employee Updated Successfully !!');
        // Redirect to the previous page successfully
        return Redirect::to('admin/employee/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $employee = Employee::find($id);
        @unlink(public_path('images/employee/'.$employee->image));
        @unlink(public_path('cv/employee/'.$employee->cv));
        $employee->delete();
        Session::put('message', 'Employee Deleted Successfully !!');
        return Redirect::to('/admin/employee/');

    }
    public function InActive($id)
    {
        $employee = Employee::find($id)->update(['online' => 0]);
        Session::put('message', 'employee Activated Successfully !!');
        return Redirect::to('/admin/employee');
    }

    public function Active($id)
    {
        $employee = Employee::find($id)->update(['online' => 1]);
        Session::put('message', 'employee Activated Successfully !!');
        return Redirect::to('/admin/employee');
    }
}
