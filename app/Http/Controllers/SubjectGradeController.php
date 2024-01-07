<?php

namespace App\Http\Controllers;

use App\Models\AlternativeComparison;
use App\Models\Criteria;
use App\Models\CriteriaComparison;
use App\Models\PriorityVectorAlternative;
use App\Models\PriorityVectorCriteria;
use App\Models\Rank;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectGrade;
use App\Service\EncryptService;
use Illuminate\Http\Request;

class SubjectGradeController extends Controller
{
    public $encrpytService;

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
        }

        $subjectGrades = SubjectGrade::latest()->paginate(100)->withQueryString();
        foreach ($subjectGrades as $subjectGrade) {
            $this->decryptSubjectGrade($subjectGrade);
        }
        return view('subject-grade.index', [
            'title' => 'Subject Grade',
            'active' => 'subject-grade',
            "subject-grades" => $subjectGrades,
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {
        $subjectGrades = [];
        $subjects = [];
        $students = [];
        if ($type === 'student') {
            $subjectGrades = SubjectGrade::with(['subjects','students'])->where('student_id', $id)->get();
        } else if ($type === 'subject') {
            $subjectGrades = SubjectGrade::with(['subjects','students'])->where('subject_id', $id)->get();
        }




        return view('subject-grade.create', [
            'title' => 'Subject Grade',
            'active' => 'subject-grade'
        ]);
    }

    public function createByType($type, $id)
    {
//        $subjectGrades = [];
        $subjects = [];
        $students = [];
        $student = new Student();
        $subject = new Subject();
        if ($type === 'student') {
//            $subjectGrades = SubjectGrade::with(['subjects','students'])->where('student_id', $id)
//                ->whereIn('subject_id', Subject::all()->where('id' ,'>' ,0)->pluck('id')->toArray())
//                ->get();
            $subjects = Subject::all()->whereNotIn('id', SubjectGrade::all()->where('student_id', $id)->where('subject_id', '>', 0)->pluck('subject_id')->toArray());
            foreach ($subjects as $subject) {
                $this->decryptSubject($subject);
            }
            $student = Student::all()->where('id', $id)->firstOrFail();
            $student = $this->decryptStudent($student);
        } else if ($type === 'subject') {
//            $subjectGrades = SubjectGrade::with(['subjects','students'])->where('subject_id', $id)->get();
            $students = Student::all()->whereNotIn('id', SubjectGrade::all()->where('subject_id', $id)->where('student_id', '>', 0)->pluck('student_id')->toArray());
            foreach ($students as $student) {
                $this->decryptStudent($student);
            }
            $subject = Subject::all()->where('id', $id)->firstOrFail();
            $subject = $this->decryptSubject($subject);
        }

        return view('subject-grade.create', [
            'title' => 'Subject Grade',
            'active' => 'subject-grade',
            'students' => $students,
            'subjects' => $subjects,
            'student' => $student,
            'subject' => $subject,
            'type' => $type
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
            'grade' => 'required',
            'student_id' => 'required',
            'subject_id' => 'required|max:255'
        ]);

        $grade = $this->getEncryptService()->encrypt($validatedData['grade']);

        $validatedData['grade'] = $grade;
        SubjectGrade::create($validatedData);

        if ($request->type === 'student') {
            return redirect()->route('subject-grade.student', ['id' => $request->student_id])
                ->with('success', 'Created subject grade success!');
        } else {
            return redirect()->route('subject-grade.subject', ['id' => $request->subject_id])
                ->with('success', 'Created subject grade success!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectGrade  $subjectGrade
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectGrade $subjectGrade)
    {
        //
    }

    public function editByType($id, $type)
    {
        $subjectGrade = SubjectGrade::with(['subjects','students'])->where('id', $id)->firstOrFail();
        $this->decryptSubjectGrade($subjectGrade);
        $this->decryptSubject($subjectGrade->subjects);
        $this->decryptStudent($subjectGrade->students);
        return view('subject-grade.edit', [
            'subjectGrade' => $subjectGrade,
            'active' => 'subject-grade',
            'type' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subjectGrade = SubjectGrade::where('id', $id)->first();
        $subjectGrade->update([
            'grade'   => $this->getEncryptService()->encrypt($request->grade)
        ]);

        if ($request->type === 'student') {
            return redirect()->route('subject-grade.student', ['id' => $subjectGrade->student_id])
                ->with('success', 'Subject grade updated successfully');
        } else {
            return redirect()->route('subject-grade.subject', ['id' => $subjectGrade->subject_id])
                ->with('success', 'Subject grade updated successfully');
        }
    }

    public function delete($id, $type, $typeId)
    {
        $subjectGrade = SubjectGrade::where('id', $id)->firstOrFail();
        $subjectGrade = $this->decryptSubjectGrade($subjectGrade);
        return view('subject-grade.delete', [
            "subjectGrade" => $subjectGrade,
            'active' => 'subject-grade',
            'type' => $type,
            'typeId' => $typeId
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectGrade  $subjectGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy($type, $id, $typeId)
    {
        $subjectGrade = SubjectGrade::where('id', $id)->firstorfail()->delete();

        $page = '';
        if ($type === 'student') {
            $page = 'subject-grade.student';
        } else {
            $page = 'subject-grade.subject';
        }
        $success = '';
        $err = '';
        if($subjectGrade) {
            $success = 'Subject grade deleted successfully';
        } else {
            $err = 'Subject grade deleted failure';
        }

        return redirect()
            ->route($page, $typeId)
            ->with('success', $success)
            ->with('err', $err);
    }

    public function subjects()
    {
        $subjects = Subject::latest()->paginate(100)->withQueryString();
        foreach ($subjects as $subject) {
            $this->decryptSubject($subject);
        }
        return view('subject-grade.index-subject', [
            'subjects' => $subjects,
            'active' => 'subject-grade'
        ]);
    }

    public function subject($id)
    {
        $subjectGrades = SubjectGrade::with(['subjects','students'])->where('subject_id', $id)->get();
        foreach ($subjectGrades as $subjectGrade) {
            $this->decryptSubjectGrade($subjectGrade);
            $this->decryptStudent($subjectGrade->students);
        }
        $subject = Subject::where('id', $id)->firstOrFail();
        $subject = $this->decryptSubject($subject);
        return view('subject-grade.subject', [
            "subjectGrades" => $subjectGrades ,
            'active' => 'subject-grade',
            "type" => 'subject',
            "typeId" => $id,
            'subject' => $subject
        ]);
    }

    public function students()
    {
        $students = Student::latest()->paginate(100)->withQueryString();
        foreach ($students as $student) {
            $this->decryptStudent($student);
        }
        return view('subject-grade.index-student', [
            'students' => $students,
            'active' => 'subject-grade'
        ]);
    }

    public function student($id)
    {
        $subjectGrades = SubjectGrade::with(['subjects','students'])->where('student_id', $id)->get();
        foreach ($subjectGrades as $subjectGrade) {
            $this->decryptSubjectGrade($subjectGrade);
            $this->decryptSubject($subjectGrade->subjects);
        }
        $student = Student::where('id', $id)->firstOrFail();
        $student = $this->decryptStudent($student);
        return view('subject-grade.student', [
            "subjectGrades" => $subjectGrades,
            'active' => 'subject-grade',
            "type" => 'student',
            "typeId" => $id,
            'student' => $student
        ]);
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

    public function decryptSubject(Subject $subject) : Subject {
        $subject->code = $this->getEncryptService()->decrypt($subject->code);
        $subject->name = $this->getEncryptService()->decrypt($subject->name);
        $subject->time_allocation_in_week = $this->getEncryptService()->decrypt($subject->time_allocation_in_week);
        $subject->semester = $this->getEncryptService()->decrypt($subject->semester);
        return $subject;
    }

    public function decryptSubjectGrade(SubjectGrade $subjectGrade) : SubjectGrade {
        $subjectGrade->grade = $this->getEncryptService()->decrypt($subjectGrade->grade);
        return $subjectGrade;
    }

}
