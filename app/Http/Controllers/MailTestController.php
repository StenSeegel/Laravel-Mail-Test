<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailTestController extends Controller
{
    public function showForm()
    {
        return view('mail-test');
    }

    public function sendTest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        try {
            Mail::to($request->email)->send(new TestMail(
                name: $request->name,
                message: $request->message
            ));

            return back()->with('success', 'E-Mail wurde erfolgreich versendet!');
        } catch (\Exception $e) {
            return back()->with('error', 'Fehler beim Versenden: ' . $e->getMessage());
        }
    }
}
