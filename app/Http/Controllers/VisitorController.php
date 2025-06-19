<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display all visitors (web and API)
     */
    public function index()
    {
        $visitors = Visitor::all();
        
        if (request()->expectsJson()) {
            return response()->json([
                'data' => $visitors,
                'message' => 'Visitors retrieved successfully'
            ]);
        }
        
        return view('visitors.index', compact('visitors'));
    }

    /**
     * Show recent visitors (web and API)
     */
    public function recent()
    {
        $visitors = Visitor::orderBy('created_at', 'desc')->take(5)->get();
        
        if (request()->expectsJson()) {
            return response()->json([
                'data' => $visitors,
                'message' => 'Recent visitors retrieved successfully'
            ]);
        }
        
        return view('visitors.recent', compact('visitors'));
    }

    /**
     * Show the create form (web only)
     */
    public function create()
    {
        return view('visitors.create');
    }

    /**
     * Store a new visitor (web and API)
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'dob' => 'nullable|date',
            'gender' => 'required|string|in:male,female,other',
            'address' => 'nullable|string',
            'want_to_be_member' => 'required|boolean',
            'would_like_visit' => 'required|boolean'
        ]);

        $visitor = Visitor::create($validatedData);

        if ($request->expectsJson()) {
            return response()->json([
                'data' => $visitor,
                'message' => 'Visitor created successfully'
            ], 201);
        }

        return redirect()->route('visitors.index')->with('success', 'Visitor added successfully');
    }

    /**
     * Show the edit form (web only)
     */
    public function edit($id)
    {
        $visitor = Visitor::findOrFail($id);
        return view('visitors.edit', compact('visitor'));
    }

    /**
     * Update a visitor (web and API)
     */
    public function update(Request $request, $id)
    {
        $visitor = Visitor::findOrFail($id);

        $validatedData = $request->validate([
            'firstname' => 'sometimes|string|max:255',
            'lastname' => 'sometimes|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'sometimes|string|max:20',
            'dob' => 'nullable|date',
            'gender' => 'sometimes|string|in:male,female,other',
            'address' => 'nullable|string',
            'want_to_be_member' => 'sometimes|boolean',
            'would_like_visit' => 'sometimes|boolean',
        ]);

        $visitor->update($validatedData);

        if ($request->expectsJson()) {
            return response()->json([
                'data' => $visitor,
                'message' => 'Visitor updated successfully'
            ]);
        }

        return redirect()->route('visitors.index')->with('success', 'Visitor updated successfully');
    }

    /**
     * Delete a visitor (web and API)
     */
    public function destroy($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'message' => 'Visitor deleted successfully'
            ]);
        }

        return redirect()->route('visitors.index')->with('success', 'Visitor deleted successfully');
    }
}