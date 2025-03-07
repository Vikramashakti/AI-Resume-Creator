<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::all();
        return view('resumes.index', compact('resumes'));
    }

    public function create()
    {
        return view('resumes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Resume::create($request->all());
        return redirect()->route('resumes.index')->with('success', 'Resume created successfully.');
    }

    public function show(Resume $resume)
    {
        return view('resumes.show', compact('resume'));
    }

    public function edit(Resume $resume)
    {
        return view('resumes.edit', compact('resume'));
    }

    public function update(Request $request, Resume $resume)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $resume->update($request->all());
        return redirect()->route('resumes.index')->with('success', 'Resume updated successfully.');
    }

    public function destroy(Resume $resume)
    {
        $resume->delete();
        return redirect()->route('resumes.index')->with('success', 'Resume deleted successfully.');
    }
}

