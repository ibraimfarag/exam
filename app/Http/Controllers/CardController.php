<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return view('admin.cards.index', compact('cards'));
    }

    public function create()
    {
        return view('admin.cards.create');
    }
    public function store(Request $request)
    {
        // Other data handling and validation

        // Handle image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Generate a unique filename for each image
                $imageName = 'card_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Move the image to the public/images/cards directory
                $image->move(public_path('images/cards'), $imageName);

                // Store the image path in the array
                $imagePaths[] = 'images/cards/' . $imageName;
            }
        }

        // Save the card with image paths
        $card = new Card();
        $card->title = $request->input('title');
        $card->description = $request->input('description');
        $card->price = $request->input('price');
        $card->images = $imagePaths; // Store image paths

        $card->save();

        // Redirect or return response
        return redirect()->route('cards.index')->with('success', 'Card created successfully');
    }
    public function edit($id)
    {
        $card = Card::find($id);
        return view('admin.cards.edit', compact('card'));
    }

    public function update(Request $request, Card $card)
    {
        // Validate the request data (title, description, price, and images)
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Handle image uploads
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $this->uploadImage($image, 'cards', 'images/cards');
            }
        }

        // Update the card's properties
        $card->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        // Attach the new image paths to the card
        $card->images()->createMany($imagePaths);

        // Redirect or return response
        return redirect()->route('cards.index')->with('success', 'Card updated successfully');
    }



    public function destroy($id)
    {
        $card = Card::find($id);
        $card->delete();

        return redirect()->route('cards.index')->with('success', 'Card deleted successfully');
    }

    private function uploadImage($image, $folder, $directory)
    {   // Get the file extension
        $extension = $image->getClientOriginalExtension();

        // Generate a unique filename with the custom name and extension
        $filename = $folder . '_' . time() . '.' . $extension;

        // Move the image to the specified directory
        $image->move($directory, $filename);

        // Return the URL to the stored image using the asset() function
        return asset('assets/' . $filename);
    }
}
