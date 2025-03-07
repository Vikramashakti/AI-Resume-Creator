<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::all();
        return view('inquiries.index', compact('inquiries'));
    }

    public function create()
    {
        return view('inquiries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        Inquiry::create($request->all());
        return redirect()->route('inquiries.index')->with('success', 'Inquiry submitted successfully.');
    }

    public function show(Inquiry $inquiry)
    {
        return view('inquiries.show', compact('inquiry'));
    }

    public function edit(Inquiry $inquiry)
    {
        return view('inquiries.edit', compact('inquiry'));
    }

    public function update(Request $request, Inquiry $inquiry)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $inquiry->update($request->all());
        return redirect()->route('inquiries.index')->with('success', 'Inquiry updated successfully.');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('inquiries.index')->with('success', 'Inquiry deleted successfully.');
    }
}


