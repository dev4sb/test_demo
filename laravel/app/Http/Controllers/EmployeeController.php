<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\File;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id','desc')->get();

        // Return a view with the fetched employee data
       return view('index', ["employees" => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->hobbies = implode(',',$request->hobbies);
        $employee->address = $request->address;
        $employee->country = $request->country;
        $employee->save();

      if($request->image){
        $extension = $request->image->getClientOriginalExtension();
        $newImageName = time() . '.' . $extension;
        $request->image->move(public_path() . '/uploads/imgs/' , $newImageName);
        $employee->image = $newImageName;
        $employee->save();
      }

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $employees = Employee::find($id);
    //   dd($employees);
       return view('edit',['editEmps' => $employees]);
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
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->hobbies = implode(',',$request->hobbies);
        $employee->address = $request->address;
        $employee->country = $request->country;
        $employee->save();

        // upload image
        if ($request->image) {
            $oldImage = $employee->image;

            $extension = $request->image->getClientOriginalExtension();
            $newFileName = time() . '.' . $extension;
            $request->image->move(public_path() . '/uploads/imgs/', $newFileName);
            $employee->image = $newFileName;
            $employee->save();

            File::delete(public_path() . '/uploads/imgs/' . $oldImage);
        }

        return redirect(url('/employees'));
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
        File::delete(public_path().'/uploads/imgs/'.$employee->image);
        $employee->delete();
        return redirect()->route('index');
    }

    // public function destroy(Request $request, $id)
    // {
    //     $emp = Employee::find($id);
    //     File::delete(public_path() . '/uploads/imgs/' . $emp->image);
    //     $emp->delete();
    //     return redirect()->route('index');
    // }
}
