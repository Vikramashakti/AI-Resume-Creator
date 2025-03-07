<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;

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
        $resume = Resume::create($request->all());
        return redirect()->route('resumes.index');
    }

    public function edit(Resume $resume)
    {
        return view('resumes.edit', compact('resume'));
    }

    public function update(Request $request, Resume $resume)
    {
        $resume->update($request->all());
        return redirect()->route('resumes.index');
    }

    public function destroy(Resume $resume)
    {
        $resume->delete();
        return redirect()->route('resumes.index');
    }
}

