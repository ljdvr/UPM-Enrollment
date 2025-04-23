<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('enrollments')->get();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'available_slots' => 'required|integer',
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    public function enroll(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        if ($subject->available_slots > 0) {
            Enrollment::create([
                'user_id' => Auth::id(),
                'subject_id' => $id,
            ]);

            $subject->available_slots -= 1;
            $subject->save();
        }
        return redirect()->route('subjects.index')->with('success', 'Enrolled successfully.');
    }

    public function show($id)
    {
        $subject = Subject::with('enrollments.user')->findOrFail($id);
        return view('subjects.show', compact('subject'));
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $subjects = Subject::where('name', 'LIKE', "%{$query}%")->get();
        return view('subjects.index', compact('subjects'));
    }

    public function addToCart($id)
    {
        $subject = Subject::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            return redirect()->route('subjects.index')->with('error', 'Subject is already in your cart.');
        }

        if (Enrollment::where('user_id', Auth::id())->where('subject_id', $id)->exists()) {
            return redirect()->route('subjects.index')->with('error', 'You are already enrolled in this subject.');
        }

        $cart[$id] = [
            "name" => $subject->name,
            "available_slots" => $subject->available_slots
        ];

        session()->put('cart', $cart);

        return redirect()->route('subjects.index')->with('success', 'Subject added to cart successfully.');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Subject removed from cart successfully.');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        foreach ($cart as $id => $details) {
            $subject = Subject::findOrFail($id);
            if ($subject->available_slots > 0) {
                Enrollment::create([
                    'user_id' => Auth::id(),
                    'subject_id' => $id,
                ]);

                $subject->available_slots -= 1;
                $subject->save();
            }
        }

        session()->forget('cart');

        return redirect()->route('subjects.index')->with('success', 'You have successfully enrolled in the selected subjects.');
    }

    public function removeStudent(Request $request, $subject_id, $enrollment_id)
{
    $subject = Subject::findOrFail($subject_id);
    $enrollment = Enrollment::findOrFail($enrollment_id);

    // Ensure the enrollment belongs to the subject
    if ($enrollment->subject_id !== $subject->id) {
        return redirect()->route('subjects.show', $subject->id)->with('error', 'Invalid operation.');
    }

    // Remove the enrollment
    $enrollment->delete();

    // Increment the available slots
    $subject->available_slots += 1;
    $subject->save();

    return redirect()->route('subjects.show', $subject->id)->with('success', 'Student removed successfully.');
}

}
