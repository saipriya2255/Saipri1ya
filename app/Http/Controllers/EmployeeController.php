<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = employee::latest()->paginate(5);
       
        return view('employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'firstname' => 'required|min:5|max:25|unique:employee',
        'lastname' => 'required|min:5|max:25',
        'age' => 'required|integer',
        'salary' => 'required|numeric'
        
    ]);
         employee::create($request->all());
 
          return redirect()->route('employee.index')
                ->with('success','Product created  successfully.');
}
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {

        $request->validate([
            'firstname' => 'required|min:5|max:25',
            'lastname' => 'required|min:5|max:25',
            'age' => 'required|integer',
            'salary' => 'required|numeric',
            
        ]);
             $employee->update($request->all());
     
              return redirect()->route('employee.index')
                    ->with('success','employee updated  successfully.');
}

       
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          employee::where('id',$id)->delete();
    
        return redirect()->route('employee.index')
                        ->with('success','employee deleted successfully');
    }

    public function designation(Request $request)
    {
        $employee = employee::get();
        return view('designation.show',compact('employee'));
    }

    public function designationsave(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        employee::where('id',$data['user_id'])->update([
            'designation' => $data['designation']
        ]);
        // $employee->update($request->all());
        return redirect()->route('employee.index')
        ->with('success','Employee designation updated successfully');
            
    }
}
