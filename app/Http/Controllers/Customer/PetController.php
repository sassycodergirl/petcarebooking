<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $pets = Auth::user()->pets; // relationship from User model
        return view('customer.profile.pets', compact('pets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'type'  => 'required|string|max:50', // dog, cat, etc.
            'breed' => 'nullable|string|max:100',
            'age'   => 'nullable|integer',
        ]);

        Auth::user()->pets()->create($request->all());

        return back()->with('success', 'Pet added successfully!');
    }

    public function destroy($id)
    {
        $pet = Auth::user()->pets()->findOrFail($id);
        $pet->delete();

        return back()->with('success', 'Pet deleted successfully!');
    }
}
?>