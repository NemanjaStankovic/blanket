<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SubjectController extends Controller
{
    public function index(Request $request): View
    {
        $subjects = Subject::all();
        return view('subjects.subjects', compact('subjects'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'subjectID' => 'bail|required|unique:subjects,subjectID|max:255',
            'name' => 'required',
        ]);

        $subject = new Subject();
        $subject->subjectID = $validated['subjectID'];
        $subject->name = $validated['name'];
        $subject->creatorID = Auth::id();

        $subject->save();
        return Redirect::route('subject.index')->with('flash_type', 'success')->with('flash_msg', 'Podatak uspesno dodat!');

    }

    public function  getAll(Request $request)
    {
        if(request('subjectID')!=null && request('name')==null)
            $subjects = Subject::where('subjectID', 'LIKE', '%'.request('subjectID').'%')->get();
        if(request('subjectID')==null && request('name')!=null)
            $subjects = Subject::where('name', 'LIKE', '%'.request('name').'%')->get();
        if(request('subjectID')!=null && request('name')!=null)
            $subjects = Subject::where('subjectID', 'LIKE', '%'.request('subjectID').'%')->Where('name', 'LIKE', '%'.request('name').'%')->get();
        if(request('subjectID')==null && request('name')==null)
            $subjects = Subject::all();
        return view('subjects.subjects', compact('subjects'));
    }

    public function update(Request $request, $oldID):RedirectResponse
    {
        if($oldID!=$request->subjectID)
            $request = $request->validate([
                'subjectID' => 'bail|required|unique:subjects,subjectID|max:255',
                'name' => 'required',
            ]);
        $subjectForChange=Subject::where('subjectID', $oldID)->first();
        $subjectForChange->subjectID= request('subjectID');
        $subjectForChange->name = request('name');
        $subjectForChange->updated_at = now();
        $subjectForChange->editorID = Auth::id();
        $subjectForChange->save();
        return Redirect::route('subject.index')->with('flash_type', 'success')->with('flash_msg', 'Predmet uspesno azuriran!');
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $subject = Subject::where('subjectID', $id)->first();
        $subject->delete();
        $request->session()->flash('flash_type', 'success');
        $request->session()->flash('flash_msg', 'Podatak uspesno obrisan');
        return Redirect::to('/subjects');
    }
}
