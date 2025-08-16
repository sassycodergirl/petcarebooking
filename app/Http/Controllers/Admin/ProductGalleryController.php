<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    public function destroy($id)
    {
        $image = ProductGallery::findOrFail($id);

        // Delete the file if exists
        if ($image->image && file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }

        $image->delete();

        return response()->json(['success' => true]);
    }
}
?>