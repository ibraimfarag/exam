<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use App\Models\SiteSetting;
use App\Models\Card;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;

class HomePage extends Controller
{
    public function index_front()
    {
        $siteSettings = SiteSetting::first();
        $cards = Card::all();

        return view('frontend.pages.home', [
            'siteSettings' => $siteSettings,
            'cards' => $cards, // Add this line to pass the $cards variable to the view
        ]);
    }
    public function loadMoreCards(Request $request)
    {
        $page = $request->input('page');
        $cards = Card::skip(($page - 1) * 3)->take(3)->get(); // Adjust as needed

        // Return the additional cards as a Blade view
        return view('frontend.pages.home', ['cards' => $cards]);
    }
    public function index_backend()
    {
        // Retrieve the data from the database
        $siteSettings = SiteSetting::first(); // Assuming you have only one row in the table
        $cards = Card::all(); // Assuming you have only one row in the table

        // Pass the retrieved data to the view
        return view('admin.homepage', ['siteSettings' => $siteSettings, 'Card' => $cards]);
    }


    public function submitForm(Request $request)
    {
        // Create a new instance of SiteSetting

        $siteSettings = SiteSetting::updateOrCreate([], $request->all());
        // Handle image uploads without validation and move them to the 'public/assets' directory
        if ($request->hasFile('site_logo')) {
            $siteSettings->site_logo = $this->uploadImage($request->file('site_logo'), 'site_logo', public_path('assets'));
        }

        if ($request->hasFile('site_favicon')) {
            $siteSettings->site_favicon = $this->uploadImage($request->file('site_favicon'), 'site_favicon', public_path('assets'));
        }
        if ($request->hasFile('image1')) {
            $siteSettings->image1 = $this->uploadImage($request->file('image1'), 'image1', public_path('assets'));
        }

        // Handle additional image uploads (image1, image2, image3, image4) in a similar way

        // Save the site settings
        $siteSettings->save();

        // Redirect back with a success message or to another page
        return redirect()->route('homepageedit')->with('success', 'Settings updated successfully');
    }

    // Helper method to upload an image and return its path
    private function uploadImage($image, $customName, $directory)
    {
        // Get the file extension
        $extension = $image->getClientOriginalExtension();

        // Generate a unique filename with the custom name and extension
        $filename = $customName . '_' . time() . '.' . $extension;

        // Move the image to the specified directory
        $image->move($directory, $filename);

        // Return the URL to the stored image using the asset() function
        return asset('assets/' . $filename);
    }
}
