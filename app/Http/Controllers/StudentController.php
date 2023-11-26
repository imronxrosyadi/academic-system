<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index', [
            'title' => 'Student',
            'active' => 'student',
            "students" => Student::latest()->paginate(100)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create', [
            'title' => 'Student',
            'active' => 'student'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_number' => 'required|max:255',
            'nisn' => 'required|max:255',
            'full_name' => 'required|max:255',
            'nickname' => 'required|max:255',
            'gender' => 'required|max:255',
            'birth_place' => 'required|max:255',
            'birth_date' => '',
            'religion' => 'required|max:30',
            'phone_number' => 'required|max:15',
            'address' => 'required|max:255',
        ]);

        Student::create($validatedData);

        return redirect('/student')
            ->with('success', 'Created student success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        return view('student.edit', [ "student" => $student ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::where('id', $id)->first();
        $student->update([
            'id_number' => $request->id_number,
            'nisn' => $request->nisn,
            'full_name' => $request->full_name,
            'nickname' => $request->nickname,
            'gender' => $request->gender,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'phone_number' => $request->phone_number,
            'address' => $request->address
        ]);

        return redirect()
            ->route('student.index')
            ->with('success','Student updated successfully');
    }

    public function delete($code)
    {
        $student = Student::where('id', $code)->first();
        return view('student.delete', [ "student" => $student ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $student = Student::where('id', $code)->firstorfail()->delete();

        $page = 'student.index';
        $success = '';
        $err = '';
        if($student) {
            $success = 'Student deleted successfully';
        } else {
            $err = 'Student deleted failure';
        }

        return redirect()
            ->route($page)
            ->with('success', $success)
            ->with('err', $err);
    }


}
