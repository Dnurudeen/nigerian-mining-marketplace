<?php

namespace App\Http\Controllers;

use App\Mail\ChangePassword;
use App\Mail\DeleteAccount;
use App\Mail\ProfileUpdate;
use App\Models\Item;
use App\Models\Category;
// use Intervention\Image\Facades\Image;
use Image;
// use Intervention\Image\Laravel\Facades\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SellerController extends Controller
{
    public function index()
    {
        $items = Item::where('user_id', auth()->id())->get();
        return view('seller.index', compact('items'));
    }
    public function faq(){
        return view('seller.faq');
    }
    public function personalInfo(){
        return view('seller.personal-info');
    }
    public function deleteAccount(){
        return view('seller.delete-account');
    }
    public function changePassword(){
        return view('seller.change-password');
    }
    public function updatePassword(Request $request){
        // Validate the request data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Check if the current password matches
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect']);
        }

        // Update the password
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        // Redirect the user with a success message
        return redirect()->back()->with('success', 'Password updated successfully.');
    }
    public function requestChangePassword(){
        return view('seller.request-password-change');
    }
    public function requestUpdatePassword(){
        $user = Auth::user();
        Mail::to($user->email)->send(new ChangePassword($user));

        return redirect()->back()->with('success', 'Check your email for password reset link.');
    }

    public function confirmNumber(){
        $user = Auth::user();
        return view('seller.confirm-phone', compact('user'));
    }
    public function confirmEmail(){
        $user = Auth::user();
        return view('seller.confirm-email', compact('user'));
    }
    // public function postAdSuccess(){

    //     $user_id = auth()->user()->id;
    //     $ad = Item::where('user_id', $user_id)->latest()->first();
    //     if ($ad) {
    //         $ad->update(['is_paid' => 1]);
    //     }

    //     return view('frontend.post-ad-success');
    // }

    public function updateInfo(Request $request){
        $request->validate([
            'seller_phone' => 'required|string',
            'seller_gender' => 'required|string',
            'seller_location' => 'required|string',
        ]);

        // $user = User::findOrFail($id);
        $user = Auth::user();
        // $user = auth()->user();
        $user->phone = $request->input('seller_phone');
        $user->gender = $request->input('seller_gender');
        $user->location = $request->input('seller_location');

        $user->update($request->all());
        
        Mail::to($user->email)->send(new ProfileUpdate($user));

        return redirect()->route('personal.info')->with('success', 'Profile updated successfully.');
    }

    public function createItem()
    {
        $categories = Category::all();
        // $categories = Category::with('subcategories')->get();

        return view('seller.create-item', compact('categories'));
    }

    // public function storeItem(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'price' => 'required|string',
    //         'category_id' => 'required|exists:categories,id',
    //         'condition' => 'required|in:new,foreign_used,nigerian_used',

    //         'images' => 'required|array|min:2|max:15', // Ensure at least 2 and at most 15 images
    //         'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:4048', // Each image validation

    //         'location' => 'required|string|max:255',
    //         'youtube_link' => 'required|string|max:255',
    //         'item_type' => 'required|string|max:255',
    //         'model' => 'required|string|max:255',
    //         // 'manufaction_year' => 'required|string|max:255',
    //         'exchange_possible' => 'required|string|max:255',
    //         'negotiable' => 'numeric',
    //     ]);

    //     // Process image uploads and store paths in an array
    //     // $imagePaths = [];
    //     // if ($request->hasFile('images')) {
    //     //     foreach ($request->file('images') as $imageFile) {
    //     //         // Load the image file into Intervention
    //     //         $img = Image::make($imageFile->getRealPath());

    //     //             // Test if the image is loaded
    //     //         // if ($img) {
    //     //         //     $imagePath = 'storage/images/' . $imageFile->getClientOriginalName();
    //     //         //     $img->save(public_path($imagePath));  // Try saving the image without watermark
    //     //         // }

    //     //         $userName = auth()->user()->name; // Get the name of the user
    //     //         $fontPath = public_path('fonts/arial.ttf'); // Path to your font file

    //     //         // Add the user's name as a watermark to the image
    //     //         $img->text($userName, $img->width() - 20, $img->height() - 20, function($font) use ($fontPath){
    //     //             $font->file($fontPath); // Path to font file
    //     //             $font->size(24);
    //     //             $font->color([255, 255, 255, 0.5]); // White with opacity
    //     //             $font->align('right');
    //     //             $font->valign('bottom');
    //     //         });

    //     //         // Store image in 'public/images' folder
    //     //         $imagePath = 'images/' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
    //     //         $img->save(public_path($imagePath)); // Save the image with watermark

    //     //         // Store the path for saving to the database
    //     //         $imagePaths[] = $imagePath;
    //     //     }
    //     // }

    //     $imagePaths = [];
    //     foreach ($request->file('images') as $imageFile) {
    //         $imagePath = $imageFile->store('images', 'public');  // Store image in 'public/images' folder
    //         $imagePaths[] = $imagePath;
    //     }

    //     // Create the item
    //     $item = Item::create([
    //         'user_id' => auth()->id(),
    //         'name' => $request->name,
    //         'category_id' => $request->category_id,
    //         'location' => $request->location,
    //         'youtube_link' => $request->youtube_link,
    //         'item_type' => $request->item_type,
    //         'model' => $request->model,
    //         'manufacture_year' => $request->manufacture_year,
    //         'make' => $request->make,
    //         'condition' => $request->condition,
    //         'exchange_possible' => $request->exchange_possible ?? false,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'negotiable' => $request->negotiable ?? true,
    //         'images' => json_encode($imagePaths),  // Store image paths as JSON
    //     ]);

    //     // Item::create(array_merge($request->all(), ['user_id' => auth()->id()]));

    //     return redirect()->route('seller.items')->with('success', 'Item listed successfully.');
    // }

    public function editItem($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('seller.edit-item', compact('item', 'categories'));
    }

    public function updateItem(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'condition' => 'required|in:new,foreign_used,nigerian_used',

            'location' => 'required|string|max:255',
            'youtube_link' => 'required|string|max:255',
            'item_type' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            // 'manufaction_year' => 'required|string|max:255',
            'exchange_possible' => 'required|string|max:255',
            'negotiable' => 'numeric',
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('seller.items')->with('success', 'Item updated successfully.');
    }

    public function destroyItem($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('seller.items')->with('success', 'Item deleted successfully.');
    }

    public function destroyAccount(){
        // $user = User::findOrFail($id);
        $user = Auth::user();

        // Delete related items first to avoid foreign key constraint errors
        $user->items()->delete();

        // Now delete the user
        $user->delete();

        // $user = Auth::user();
        Mail::to($user->email)->send(new DeleteAccount($user));

        // return view('logout');
        return redirect()->route('login')->with('success', 'Account deleted successfully.');
    }
}

