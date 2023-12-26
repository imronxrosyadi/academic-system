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
use Illuminate\Http\Request;

class SubjectGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subject-grade.index', [
            'title' => 'Subject Grade',
            'active' => 'subject-grade',
            "subject-grades" => SubjectGrade::latest()->paginate(100)->withQueryString(),
            'students' => Student::latest()->paginate(100)->withQueryString()
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
        @dd($subjectGrades);



        return view('subject-grade.create', [
            'title' => 'Subject Grade',
            'active' => 'subject-grade'
        ]);
    }

    public function createByType($type, $id)
    {
        $subjectGrades = [];
        $subjects = [];
        $students = [];
        $student = new Student();
        $subject = new Subject();
        if ($type === 'student') {
            $subjectGrades = SubjectGrade::with(['subjects','students'])->where('student_id', $id)
                ->whereIn('subject_id', Subject::all()->where('id' ,'>' ,0)->pluck('id')->toArray())
                ->get();
            $subjects = Subject::all()->whereNotIn('id', SubjectGrade::all()->where('student_id', $id)->where('subject_id', '>', 0)->pluck('subject_id')->toArray());
            $student = Student::all()->where('id', $id)->firstOrFail();
        } else if ($type === 'subject') {
            $subjectGrades = SubjectGrade::with(['subjects','students'])->where('subject_id', $id)->get();
            $students = Student::all()->whereNotIn('id', SubjectGrade::all()->where('subject_id', $id)->where('student_id', '>', 0)->pluck('student_id')->toArray());
            $subject = Subject::all()->where('id', $id)->firstOrFail();
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
            'grade'   => $request->grade
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
        return view('subject-grade.index-subject', [
            'subjects' => Subject::latest()->paginate(100)->withQueryString(),
            'active' => 'subject-grade'
        ]);
    }

    public function subject($id)
    {
        $subjectGrades = SubjectGrade::with(['subjects','students'])->where('subject_id', $id)->get();
        $subject = Subject::where('id', $id)->firstOrFail();
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
        return view('subject-grade.index-student', [
            'students' => Student::latest()->paginate(100)->withQueryString(),
            'active' => 'subject-grade'
        ]);
    }

    public function student($id)
    {
        $subjectGrades = SubjectGrade::with(['subjects','students'])->where('student_id', $id)->get();
        $student = Student::where('id', $id)->firstOrFail();
        return view('subject-grade.student', [
            "subjectGrades" => $subjectGrades,
            'active' => 'subject-grade',
            "type" => 'student',
            "typeId" => $id,
            'student' => $student
        ]);
    }

}
