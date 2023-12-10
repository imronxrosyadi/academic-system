<?php

namespace App\Http\Controllers;

use App\Models\AlternativeComparison;
use App\Models\Criteria;
use App\Models\CriteriaComparison;
use App\Models\PriorityVectorAlternative;
use App\Models\PriorityVectorCriteria;
use App\Models\Rank;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subject.index', [
            'title' => 'Subject',
            'active' => 'subject',
            "subjects" => Subject::latest()->paginate(100)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create', [
            'title' => 'Subject',
            'active' => 'subject'
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
            'code' => 'required|max:255',
            'name' => 'required|max:255',
            'time_allocation_in_week' => 'required|max:255',
            'semester' => 'required|max:255'
        ]);

//        @dd($request);
        Subject::create($validatedData);

        return redirect('/subject')
            ->with('success', 'Created subject success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    public function edit($id)
    {
        $subject = Subject::where('id', $id)->first();
        return view('subject.edit', [ "subject" => $subject ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subject = Subject::where('id', $id)->first();
        $subject->update([
            'code'   => $request->code,
            'name'   => $request->name,
            'time_allocation_in_week'   => $request->timeAllocationInWeek,
            'semester'   => $request->semester
        ]);

        return redirect()
            ->route('subject.index')
            ->with('success','Subject updated successfully');
    }

    public function delete($code)
    {
        $subject = Subject::where('id', $code)->first();
        return view('subject.delete', [ "subject" => $subject ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $subject = Subject::where('id', $code)->firstorfail()->delete();

        $page = 'subject.index';
        $success = '';
        $err = '';
        if($subject) {
            $success = 'Subject deleted successfully';
        } else {
            $err = 'Subject deleted failure';
        }

        return redirect()
            ->route($page)
            ->with('success', $success)
            ->with('err', $err);
    }

}
