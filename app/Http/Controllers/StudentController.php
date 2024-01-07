<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Service\EncryptService;

class StudentController extends Controller
{
    public $encrpytService;
//    public $key;
//
//    public function getKey() {
//        return $this->key = config('aes.key');
//    }

    public function getEncryptService() {
        return $this->encrpytService = new EncryptService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(100)->withQueryString();
        foreach ($students as $student) {
            $this->decryptStudent($student);

//            $student->id_number = $this->getEncryptService()->decrypt($student->id_number, $this->getKey());
//            $student->nisn = $this->getEncryptService()->decrypt($student->nisn, $this->getKey());
//            $student->full_name = $this->getEncryptService()->decrypt($student->full_name, $this->getKey());
//            $student->gender = $this->getEncryptService()->decrypt($student->gender, $this->getKey());
//            $student->birth_place = $this->getEncryptService()->decrypt($student->birth_place, $this->getKey());
//            $student->birth_date = $this->getEncryptService()->decrypt($student->birth_date, $this->getKey());
//            $student->religion = $this->getEncryptService()->decrypt($student->religion, $this->getKey());
//            $student->phone_number = $this->getEncryptService()->decrypt($student->phone_number, $this->getKey());
//            $student->address = $this->getEncryptService()->decrypt($student->address, $this->getKey());
        }
        return view('student.index', [
            'title' => 'Student',
            'active' => 'student',
            "students" => $students
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

        $id_number = $this->getEncryptService()->encrypt($validatedData['id_number']);
        $nisn = $this->getEncryptService()->encrypt($validatedData['nisn']);
        $full_name = $this->getEncryptService()->encrypt($validatedData['full_name']);
        $nickname = $this->getEncryptService()->encrypt($validatedData['nickname']);
        $gender = $this->getEncryptService()->encrypt($validatedData['gender']);
        $birth_place = $this->getEncryptService()->encrypt($validatedData['birth_place']);
        $birth_date = $this->getEncryptService()->encrypt($validatedData['birth_date']);
        $religion = $this->getEncryptService()->encrypt($validatedData['religion']);
        $phone_number = $this->getEncryptService()->encrypt($validatedData['phone_number']);
        $address = $this->getEncryptService()->encrypt($validatedData['address']);

//        $id_number = $this->getEncryptService()->encrypt($validatedData['id_number'], $this->getKey());
//        $nisn = $this->getEncryptService()->encrypt($validatedData['nisn'], $this->getKey());
//        $full_name = $this->getEncryptService()->encrypt($validatedData['full_name'], $this->getKey());
//        $nickname = $this->getEncryptService()->encrypt($validatedData['nickname'], $this->getKey());
//        $gender = $this->getEncryptService()->encrypt($validatedData['gender'], $this->getKey());
//        $birth_place = $this->getEncryptService()->encrypt($validatedData['birth_place'], $this->getKey());
//        $birth_date = $this->getEncryptService()->encrypt($validatedData['birth_date'], $this->getKey());
//        $religion = $this->getEncryptService()->encrypt($validatedData['religion'], $this->getKey());
//        $phone_number = $this->getEncryptService()->encrypt($validatedData['phone_number'], $this->getKey());
//        $address = $this->getEncryptService()->encrypt($validatedData['address'], $this->getKey());

        $validatedData['id_number'] = $id_number;
        $validatedData['nisn'] = $nisn;
        $validatedData['full_name'] = $full_name;
        $validatedData['nickname'] = $nickname;
        $validatedData['gender'] = $gender;
        $validatedData['birth_place'] = $birth_place;
        $validatedData['birth_date'] = $birth_date;
        $validatedData['religion'] = $religion;
        $validatedData['phone_number'] = $phone_number;
        $validatedData['address'] = $address;

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

        $student = $this->decryptStudent($student);

//        $student->id_number = $this->getEncryptService()->decrypt($student->id_number, $this->getKey());
//        $student->nisn = $this->getEncryptService()->decrypt($student->nisn, $this->getKey());
//        $student->full_name = $this->getEncryptService()->decrypt($student->full_name, $this->getKey());
//        $student->gender = $this->getEncryptService()->decrypt($student->gender, $this->getKey());
//        $student->birth_place = $this->getEncryptService()->decrypt($student->birth_place, $this->getKey());
//        $student->birth_date = $this->getEncryptService()->decrypt($student->birth_date, $this->getKey());
//        $student->religion = $this->getEncryptService()->decrypt($student->religion, $this->getKey());
//        $student->phone_number = $this->getEncryptService()->decrypt($student->phone_number, $this->getKey());
//        $student->address = $this->getEncryptService()->decrypt($student->address, $this->getKey());
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
//            'id_number' => $request->id_number,
//            'nisn' => $request->nisn,
//            'full_name' => $request->full_name,
//            'nickname' => $request->nickname,
//            'gender' => $request->gender,
//            'birth_place' => $request->birth_place,
//            'birth_date' => $request->birth_date,
//            'religion' => $request->religion,
//            'phone_number' => $request->phone_number,
//            'address' => $request->address

            'id_number' => $this->getEncryptService()->encrypt($request->id_number),
            'nisn' => $this->getEncryptService()->encrypt($request->nisn),
            'full_name' => $this->getEncryptService()->encrypt($request->full_name),
            'nickname' => $this->getEncryptService()->encrypt($request->nickname),
            'gender' => $this->getEncryptService()->encrypt($request->gender),
            'birth_place' => $this->getEncryptService()->encrypt($request->birth_place),
            'birth_date' => $this->getEncryptService()->encrypt($request->birth_date),
            'religion' => $this->getEncryptService()->encrypt($request->religion),
            'phone_number' => $this->getEncryptService()->encrypt($request->phone_number),
            'address' => $this->getEncryptService()->encrypt($request->address)
        ]);

        return redirect()
            ->route('student.index')
            ->with('success','Student updated successfully');
    }

    public function delete($code)
    {
        $student = Student::where('id', $code)->first();
        $student = $this->decryptStudent($student);
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

    public function decryptStudent(Student $student): Student
    {
        $student->id_number = $this->getEncryptService()->decrypt($student->id_number);
        $student->nisn = $this->getEncryptService()->decrypt($student->nisn);
        $student->full_name = $this->getEncryptService()->decrypt($student->full_name);
        $student->nickname = $this->getEncryptService()->decrypt($student->nickname);
        $student->gender = $this->getEncryptService()->decrypt($student->gender);
        $student->birth_place = $this->getEncryptService()->decrypt($student->birth_place);
        $student->birth_date = $this->getEncryptService()->decrypt($student->birth_date);
        $student->religion = $this->getEncryptService()->decrypt($student->religion);
        $student->phone_number = $this->getEncryptService()->decrypt($student->phone_number);
        $student->address = $this->getEncryptService()->decrypt($student->address);
        return $student;
    }

    public function encryptStudent(Student $student): Student
    {
        $student->id_number = $this->getEncryptService()->encrypt($student->id_number);
        $student->nisn = $this->getEncryptService()->encrypt($student->nisn);
        $student->full_name = $this->getEncryptService()->encrypt($student->full_name);
        $student->gender = $this->getEncryptService()->encrypt($student->gender);
        $student->birth_place = $this->getEncryptService()->encrypt($student->birth_place);
        $student->birth_date = $this->getEncryptService()->encrypt($student->birth_date);
        $student->religion = $this->getEncryptService()->encrypt($student->religion);
        $student->phone_number = $this->getEncryptService()->encrypt($student->phone_number);
        $student->address = $this->getEncryptService()->encrypt($student->address);
        return $student;
    }


}
