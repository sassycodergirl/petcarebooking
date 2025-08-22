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
        $pets = Auth::user()->pets; // existing pets
        return view('customer.profile.pets', compact('pets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'type'   => 'required|string|max:50',
            'breed'  => 'nullable|string|max:100',
            'age'    => 'nullable|integer',
            'gender' => 'nullable|in:Male,Female',
            'weight' => 'nullable|numeric',
            'notes'  => 'nullable|string',
            'image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Only get validated fields
        $data = $request->only(['name','type','breed','age','gender','weight','notes']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            // if ($pet->image && file_exists(public_path($pet->image))) {
            //     unlink(public_path($pet->image));
            // }
           
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('user'), $filename); 
            $data['image'] = 'user/'.$filename; 
        }

        // Ensure user_id is set
        $data['user_id'] = Auth::id();

        // Create pet
        Pet::create($data);

        return back()->with('success', 'Pet added successfully!');
    }



    public function edit($id)
    {
        $pet = Auth::user()->pets()->findOrFail($id);
        return view('customer.profile.edit_pet', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        // Get the pet for the authenticated user
        $pet = Auth::user()->pets()->findOrFail($id);

        // Validate the request
        $request->validate([
            'name'   => 'required|string|max:100',
            'type'   => 'required|string|max:50',
            'breed'  => 'nullable|string|max:100',
            'age'    => 'nullable|integer',
            'gender' => 'nullable|in:Male,Female',
            'weight' => 'nullable|numeric',
            'notes'  => 'nullable|string',
            'image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Only take validated fields
        $data = $request->only(['name','type','breed','age','gender','weight','notes']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($pet->image && file_exists(public_path($pet->image))) {
                unlink(public_path($pet->image));
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('user'), $filename); 
            $data['image'] = 'user/'.$filename; 
        }

        // Update the pet
        $pet->update($data);

        return redirect()->route('cutomer.pets.index')->with('success', 'Pet updated successfully!');
    }



    public function destroy($id)
    {
        $pet = Auth::user()->pets()->findOrFail($id);
        $pet->delete();

        return back()->with('success', 'Pet deleted successfully!');
    }
}
?>