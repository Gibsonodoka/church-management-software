<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Exception;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:members,email',
                'phone' => 'required|string|max:15',
                'gender' => 'required|string',
                'dob' => 'required|date',
                'address' => 'nullable|string|max:255',
                'marital_status' => 'nullable|string|max:255',
                'baptized' => ['required', Rule::in(['Yes', 'No'])],
                'membership_class' => ['required', Rule::in(['Yes', 'No'])],
                'house_fellowship' => ['required', Rule::in(['Rumibekwe', 'Woji', 'Rumudara', 'None'])],
                'organization_belonged_to' => ['nullable', Rule::in(['Men', 'Women', 'Youth', 'Teens', 'Children'])],
                'current_team' => 'nullable|array',
                'current_team.*' => Rule::in(['Drama', 'Media', 'Technical', 'Visitation', 'Leadership', 'Pastoral', 'Sunday school', 'None']),
            ]);

            if (isset($validatedData['current_team'])) {
                $validatedData['current_team'] = json_encode($validatedData['current_team']);
            }

            $member = Member::create($validatedData);

            return redirect()->route('members.index')->with('success', 'Member added successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        try {
            $member = Member::findOrFail($id);

            $validatedData = $request->validate([
                'first_name' => 'sometimes|required|string|max:255',
                'last_name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email|unique:members,email,' . $id,
                'phone' => 'sometimes|required|string|max:15',
                'gender' => 'sometimes|required|string',
                'dob' => 'sometimes|required|date',
                'address' => 'nullable|string|max:255',
                'marital_status' => 'nullable|string|max:255',
                'baptized' => ['sometimes', Rule::in(['Yes', 'No'])],
                'membership_class' => ['sometimes', Rule::in(['Yes', 'No'])],
                'house_fellowship' => ['sometimes', Rule::in(['Rumibekwe', 'Woji', 'Rumudara', 'None'])],
                'organization_belonged_to' => ['nullable', Rule::in(['Men', 'Women', 'Youth', 'Teens', 'Children'])],
                'current_team' => 'nullable|array',
                'current_team.*' => Rule::in(['Drama', 'Media', 'Technical', 'Visitation', 'Leadership', 'Pastoral', 'Sunday', 'school', 'None']),
            ]);

            if (isset($validatedData['current_team'])) {
                $validatedData['current_team'] = json_encode($validatedData['current_team']);
            }

            $member->update($validatedData);

            return redirect()->route('members.index')->with('success', 'Member updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $member = Member::findOrFail($id);
            $member->delete();

            return redirect()->route('members.index')->with('success', 'Member deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Member not found');
        }
    }

    public function getBirthdays()
    {
        $birthdays = Member::select('id', 'first_name', 'last_name', 'dob')
            ->whereNotNull('dob')
            ->get()
            ->map(function ($member) {
                $dob = Carbon::parse($member->dob);
                return [
                    'id' => $member->id,
                    'name' => $member->first_name . ' ' . $member->last_name,
                    'day' => $dob->day,
                    'month' => $dob->month,
                ];
            });

        return view('members.birthdays', compact('birthdays'));
    }
}