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
    public function create()
    {
        return view('subject-grade.create', [
            'title' => 'Subject Grade',
            'active' => 'subject-grade'
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

//        @dd($request);
        SubjectGrade::create($validatedData);

        return redirect('/subject-grade')
            ->with('success', 'Created subject grade success!');
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

    public function edit($id)
    {
        $subjectGrade = SubjectGrade::where('id', $id)->first();
        return view('subject-grade.edit', [
            "subject-grade" => $subjectGrade,
            'active' => 'subject-grade'
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

        return redirect()
            ->route('subject-grade.index')
            ->with('success','Subject grade updated successfully');
    }

    public function delete($code)
    {
        $subjectGrade = SubjectGrade::where('id', $code)->first();
        return view('subject-grade.delete', [
            "subject-grade" => $subjectGrade,
            'active' => 'subject-grade'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectGrade  $subjectGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $subjectGrade = SubjectGrade::where('id', $code)->firstorfail()->delete();

        $page = 'subject-grade.index';
        $success = '';
        $err = '';
        if($subjectGrade) {
            $success = 'Subject grade deleted successfully';
        } else {
            $err = 'Subject grade deleted failure';
        }

        return redirect()
            ->route($page)
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
        return view('subject-grade.subject', [
            "subject-grade" => $subjectGrades ,
            'active' => 'subject-grade'
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
        return view('subject-grade.student', [
            "subjectGrades" => $subjectGrades,
            'active' => 'subject-grade'
        ]);
    }

}
