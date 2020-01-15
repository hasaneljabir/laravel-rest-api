<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Response;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return Response::json([
            'result' => 'OK',
            'student_list' => $students,
            'message' => 'Success',
            'response_code' => 200
        ]);
    }

    public function create(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->address = $request->address;
        $student->save();

        return Response::json([
            'result' => 'OK',
            'message' => 'Student data inserted',
            'response_code' => 200
        ]);
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $address = $request->address;

        $student = Student::find($id);
        $student->name = $name;
        $student->address = $address;
        $student->save();

        return Response::json([
            'result' => 'OK',
            'message' => 'Student data updated',
            'response_code' => 200
        ]);
    }

    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();

        return Response::json([
            'result' => 'OK',
            'message' => 'Student data deleted',
            'response_code' => 200
        ]);
    }
}
