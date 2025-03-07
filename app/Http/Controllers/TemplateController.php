<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

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
        Template::create($request->all());
        return redirect()->route('templates.index');
    }

    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('templates.index');
    }
}

