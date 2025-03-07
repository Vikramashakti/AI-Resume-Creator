<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::all();
        return view('templates.index', compact('templates'));
    }

    public function create()
    {
        return view('templates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'file_path' => 'required',
        ]);

        Template::create($request->all());
        return redirect()->route('templates.index')->with('success', 'Template added successfully.');
    }

    public function show(Template $template)
    {
        return view('templates.show', compact('template'));
    }

    public function edit(Template $template)
    {
        return view('templates.edit', compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $template->update($request->all());
        return redirect()->route('templates.index')->with('success', 'Template updated successfully.');
    }

    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('templates.index')->with('success', 'Template deleted successfully.');
    }
}


