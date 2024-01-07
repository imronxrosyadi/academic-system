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
use App\Service\EncryptService;

class SubjectController extends Controller
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
        $subjects = Subject::latest()->paginate(100)->withQueryString();
        foreach ($subjects as $subject) {
            $subject = $this->decryptSubject($subject);
        }
        return view('subject.index', [
            'title' => 'Subject',
            'active' => 'subject',
            "subjects" => $subjects
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

        $code = $this->getEncryptService()->encrypt($validatedData['code']);
        $name = $this->getEncryptService()->encrypt($validatedData['name']);
        $timeAllocationInWeek = $this->getEncryptService()->encrypt($validatedData['time_allocation_in_week']);
        $semeter = $this->getEncryptService()->encrypt($validatedData['semester']);

        $validatedData['code'] = $code;
        $validatedData['name'] = $name;
        $validatedData['time_allocation_in_week'] = $timeAllocationInWeek;
        $validatedData['semester'] = $semeter;

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
        $subject = $this->decryptSubject($subject);
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
            'code'   => $this->getEncryptService()->encrypt($request->code),
            'name'   => $this->getEncryptService()->encrypt($request->name),
            'time_allocation_in_week'   => $this->getEncryptService()->encrypt($request->timeAllocationInWeek),
            'semester'   => $this->getEncryptService()->encrypt($request->semester)
        ]);

        return redirect()
            ->route('subject.index')
            ->with('success','Subject updated successfully');
    }

    public function delete($code)
    {
        $subject = Subject::where('id', $code)->first();
        $subject = $this->decryptSubject($subject);
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

    public function decryptSubject(Subject $subject) : Subject {
        $subject->code = $this->getEncryptService()->decrypt($subject->code);
        $subject->name = $this->getEncryptService()->decrypt($subject->name);
        $subject->time_allocation_in_week = $this->getEncryptService()->decrypt($subject->time_allocation_in_week);
        $subject->semester = $this->getEncryptService()->decrypt($subject->semester);
        return $subject;
    }

    public function encryptSubject(Subject $subject) : Subject {
        $subject->code = $this->getEncryptService()->encrypt($subject->code);
        $subject->name = $this->getEncryptService()->encrypt($subject->name);
        $subject->time_allocation_in_week = $this->getEncryptService()->encrypt($subject->time_allocation_in_week);
        $subject->semester = $this->getEncryptService()->encrypt($subject->semester);
        return $subject;
    }

}
