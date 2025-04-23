<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::where('user_id', Auth::id())->with('subject')->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }

    public function checkout()
    {
        $enrollments = Enrollment::where('user_id', Auth::id())->get();
        foreach ($enrollments as $enrollment) {
            $enrollment->finalize();
        }
        return redirect()->route('enrollments.index')->with('success', 'Checked out successfully.');
    }
}