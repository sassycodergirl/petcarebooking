namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Example data
        $recentBookings = Booking::where('user_id', $user->id)
            ->latest()->take(5)->get();

        $recentOrders = Order::where('user_id', $user->id)
            ->latest()->take(5)->get();

        return view('customer.dashboard', compact('user', 'recentBookings', 'recentOrders'));
    }
}
