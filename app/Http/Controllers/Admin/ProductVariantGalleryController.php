<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariantImage;

class ProductVariantGalleryController extends Controller
{
    public function destroy($id)
    {
        $image = ProductVariantImage::findOrFail($id);
        $variant = $image->variant;

        // Delete the physical image file if it exists
        if ($image->image && file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }

        // Delete the database record
        $image->delete();

        // Variant and Product remain intact, even if this was the last image

        return back()->with('success', 'Variant image deleted successfully.');
    }
}
