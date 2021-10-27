<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\MainController as MainController;
use App\Models\Student;
use Validator;
use App\Http\Resources\Student as StudentResource;
// use App\Http\Controllers\API\StudentResponse;

class StudentController extends MainController
{
   public function index()
   {
       $students = Student::all();
       return $this->sendResponse(StudentResource::collection($students), 'Students retrieved successfully');
   } 

   public function store(Request $request)
   {
      $input = $request->all(); 
     
      $validator = Validator::make($input, [
          'name' => 'required',
          'class'=> 'required',
          'section'=>'required',
          'address'=>'required',
          'country'=>'required',
          'pincode'=>'required',
          'gender'=>'required',
          'fathers_name'=>'required',
          'mothers_name'=>'required',
          'phonenumber'=>'required|max:10|min:10',
      ]);

      if($validator->fails()){
          return $this->sendError('validator Error.',$validator->errors());
      }
    //   dd($input['class']);
      $student = Student::create($input);
      return $this->sendResponse(new StudentResource($student), 'student created successfully.');
   }

   public function show($id)
   {
       $student = Student::find($id);
        if (is_null($student)) {
        return $this->sendError('student not found.');
      }
     return $this->sendResponse(new StudentResource($student), 'student retrieved successfully.');
   }

   public function update(Request $request, Student $student)
   {
       $input=$request->all();

       $validator = Validator::make ($input, [
        'name' => 'required',
        'class'=> 'required',
        'section'=>'required',
        'address'=>'required',
        'country'=>'required',
        'pincode'=>'required',
        'gender'=>'required',
        'fathers_name'=>'required',
        'mothers_name'=>'required',
        'phonenumber'=>'required|max:10|min:10',
       ]);

       if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
       }
        $student->name = $input['name'];
        $student->class = $input['class'];
        $student->section = $input['section'];
        $student->address = $input['address'];
        $student->country = $input['country'];
        $student->pincode = $input['pincode'];
        $student->gender = $input['gender'];
        $student->fathers_name = $input['fathers_name'];
        $student->mothers_name = $input['mothers_name'];
        $student->phonenumber = $input['phonenumber'];
       
        $student->save();
   
        return $this->sendResponse(new StudentResource($student), 'student updated successfully.');
   }

   public function destroy(Student $student)
    {
        $student->delete();
   
        return $this->sendResponse([], 'student deleted successfully.');
    }
}



 




   
















