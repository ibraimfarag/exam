<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactFormSubmission;

class ContactController extends Controller
{

    public function inbox()
    {
        $submissions = ContactFormSubmission::orderBy('created_at', 'desc')->get();

        return view('admin.inbox.index', compact('submissions'));
    }
    public function store(Request $request)
    {
        // Get all form inputs
        $name = $request->input('name');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');
        $investment_amount = $request->input('investment_amount');
        $message = $request->input('message');

        // Create a new ContactFormSubmission record
        $submission = new ContactFormSubmission();
        $submission->name = $name;
        $submission->email = $email;
        $submission->phone_number = $phone_number;
        $submission->investment_amount = $investment_amount;
        $submission->message = $message;

        // Save the record to the database
        $submission->save();

        // Optionally, you can flash a success message or return a response
        return redirect()->route('home')->with('success', 'Your message has been submitted successfully!');
    }
}
