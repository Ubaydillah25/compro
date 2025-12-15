<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'phone'    => 'nullable',
            'company'  => 'nullable',
            'interest' => 'nullable',
            'message'  => 'required',
        ]);

        $data['ip_address'] = $request->ip();

        ContactMessage::create($data);

        return redirect()
            ->route('contact.show')
            ->with('success', 'Thank you for contacting us. We will respond shortly.');
    }
}
