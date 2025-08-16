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

            if ($image->image && file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
            }

            $image->delete();

            return response()->json([
                'success' => true,
                'message' => 'Variant image deleted successfully.'
            ]);
        }

        public function destroyMainImage($id)
        {
            $variant = \App\Models\ProductVariant::findOrFail($id);

            if ($variant->image && file_exists(public_path($variant->image))) {
                unlink(public_path($variant->image));
            }

            $variant->image = null;
            $variant->save();

            return response()->json([
                'success' => true,
                'message' => 'Main variant image deleted successfully.'
            ]);
        }
}
