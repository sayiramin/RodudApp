<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class UserController extends Controller
{
    // Display a listing of the users.
    public function index(Request $request)
    {
        $query = User::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search){
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by admin status
        if ($request->filled('is_admin')) {
            $query->where('is_admin', $request->is_admin);
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('users.index', compact('users'));
    }

    public function sendEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $details = [
            'subject' => $request->subject,
            'body' => $request->message,
        ];

        Mail::to($user->email)->send(new \App\Mail\CustomMail($details));

        return back()->with('success', 'Email sent successfully.');
    }

    /**
     * Send SMS to a user.
     */
    public function sendSms(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'message' => 'required|string|max:160',
        ]);

        $twilioSid = config('services.twilio.sid');
        $twilioToken = config('services.twilio.token');
        $twilioPhoneNumber = config('services.twilio.phone_number');

        $client = new Client($twilioSid, $twilioToken);

        $client->messages->create(
            $user->phone,
            [
                'from' => $twilioPhoneNumber,
                'body' => $request->message,
            ]
        );

        return back()->with('success', 'SMS sent successfully.');
    }

    // Other resource methods (create, store, show, edit, destroy) are excluded as per routes.
}
