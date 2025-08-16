<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariantImage;

class ProductVariantGalleryController extends Controller
{
    public function destroy($id)
    {
        $image = ProductVariantImage::findOrFail($id);

        // Delete the file if exists
        if ($image->image && file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }

        $image->delete();

        return back()->with('success', 'Variant image deleted successfully.');
    }
}
