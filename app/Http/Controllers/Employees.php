<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Resources\EmployeeResource;
use Validator;
class Employees extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmployeeResource::collection(Employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $valid=Validator::make($input,[
            'name'=>'required'
        ]);
        if($valid->fails()){
            return $this->sendError('Validation Error',$valid->errors());
        }
        $employee=Employee::create($input);
        return response()->json([
            'status'=>'200',
            'message'=>'Data inserted successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $empl)
    {
        //return $empl;
        /*return response()->json([
            'data'=>[
                'id'=>$empl->id,
                'empl_type'=>'contractual',
                'attrib'=>[
                    'name'=>$empl->name,
                    'joining_date'=>$empl->created_at,
                ]
            ]
        ]);*/
        return new EmployeeResource($empl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $input=$request->all();
        $employee->name=$request->input('name');//$input['name'];
        $employee->save();
        /*return response()->json([
            'status'=>'200',
            'message'=>'Data Updated successfully',
        ]);*/
        return new EmployeeResource($employee);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employee::destroy($id);
        return response()->json([
            'status'=>'200',
            'message'=>'Data Deleted',
        ]);//new EmployeeResource($employee);
    }
}
