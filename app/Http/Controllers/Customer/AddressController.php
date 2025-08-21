<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:50',
            'state' => 'required|string|max:50',
            'pincode' => 'required|string|max:10',
        ]);

        Auth::user()->addresses()->create($request->all());
        return back()->with('success', 'Address added successfully!');
    }

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $request->validate([
            'label' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:50',
            'state' => 'required|string|max:50',
            'pincode' => 'required|string|max:10',
        ]);

        $address->update($request->all());
        return back()->with('success', 'Address updated successfully!');
    }

    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return back()->with('success', 'Address deleted successfully!');
    }
}
?>