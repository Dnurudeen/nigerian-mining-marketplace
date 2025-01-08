<?php

namespace App\Http\Controllers;

use App\Mail\ListedItem;
use App\Models\Click;
use Illuminate\Http\Request;
use App\Models\Item;
use Intervention\Image\Facades\Image;
// use Intervention\Image\ImageManagerStatic as Image;
// use Image;
// use Intervention\Image\Laravel\Facades\Image;
// use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;

// use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Gd\Driver;


class ItemController extends Controller
{
    public function storeItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'condition' => 'required|in:new,foreign_used,nigerian_used',

            'images' => 'required|array|min:2|max:15', // At least 2 and at most 15 images
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:4048', // Each image validation

            'location' => 'required|string|max:255',
            'youtube_link' => 'required|string|max:255',
            'item_type' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'manufaction_year' => 'required|string|max:255',
            'exchange_possible' => 'required|string|max:255',
            'negotiable' => 'numeric',
        ]);

        // Configure Intervention Image driver
        Image::configure(['driver' => 'gd']); // or 'imagick'

        // Prepare an array to store paths of processed images
        $imagePaths = [];

        // Process each uploaded image
        foreach ($request->file('images') as $imageFile) {
            // Load the image
            $image = Image::make($imageFile->getRealPath());

            // Set the watermark text (user's name)
            $watermarkText = auth()->user()->name ?? 'NM Marketplace'; // Fallback in case user is not authenticated

            // Center coordinates
            $centerX = $image->width() / 2;
            $centerY = $image->height() / 2;

            // Apply the watermark text
            $image->text($watermarkText, $centerX, $centerY, function ($font) {
                $font->file(public_path('fonts/Headliner-51J0v.ttf')); // Path to the font file
                $font->size(80); // Font size
                $font->color('rgba(255, 255, 255, 0.5)'); // Font color
                $font->align('center'); // Horizontal alignment
                $font->valign('center'); // Vertical alignment
                $font->angle(0); // Angle
            });

            // Generate a unique filename for the processed image
            $filename = uniqid() . '_' . time() . '.' . $imageFile->getClientOriginalExtension();

            // Save the watermarked image to the 'public/images' folder
            $imagePath = $image->save(storage_path('app/public/images/' . $filename));

            // Store the relative path in the array
            $imagePaths[] = 'images/' . $filename;
        }

        // Create the item with the watermarked images
        $item = Item::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'category_id' => $request->category_id,
            'location' => $request->location,
            'youtube_link' => $request->youtube_link,
            'item_type' => $request->item_type,
            'model' => $request->model,
            'manufaction_year' => $request->manufaction_year,
            'make' => $request->make,
            'condition' => $request->condition,
            'exchange_possible' => $request->exchange_possible ?? false,
            'description' => $request->description,
            'price' => $request->price,
            'negotiable' => $request->negotiable ?? true,
            'images' => $imagePaths, // Store image paths as JSON
        ]);

        $user = Auth::user();
        Mail::to($user->email)->send(new ListedItem($user));

        // Redirect back with a success message
        return redirect()->route('seller.items')->with('success', 'Item listed successfully.');
    }

    public function show($id, Request $request)
    {
        $agent = new Agent();

        $item = Item::findOrFail($id);

        // Count the number of images
        $imageCount = $item->images->count();

        if ($agent->isMobile()) {
            // Handle mobile view logic
            $device = 'mobile';
        } else {
            // Handle desktop view logic
            $device = 'desktop';
        }

        // Track clicks, including device type
        Click::create([
            'item_id' => $item->id,
            'device_type' => $request->isMobile() ? 'mobile' : 'desktop',  // Detect device type
        ]);

        return view('seller.items.show', compact('item', 'imageCount'));
    }

    public function trackClick(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        // Increment the click count
        $item->increment('click_count');

        // Redirect to the item detail page
        return redirect()->route('item.view', $id);
    }

}
