<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $addresses = $user->addresses()->latest()->get();
        return view('customer.address.index', compact('addresses')); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:Home,Office,Other',
            'name' => 'required|string|max:50',
            'phone'  => 'nullable|string|max:20',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:50',
            'state' => 'required|string|max:50',
            'pincode' => 'required|string|max:10',
           
        ]);

            $address = $request->all();
            $address['user_id'] = auth()->id();

            \App\Models\Address::create($address);
        return back()->with('success', 'Address added successfully!');
    }

    public function edit($id)
    {
        $address = Address::findOrFail($id);
        return view('customer.address.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $request->validate([
            'type' => 'required|in:Home,Office,Other',
            'name' => 'required|string|max:50',
            'phone'  => 'nullable|string|max:20',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
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