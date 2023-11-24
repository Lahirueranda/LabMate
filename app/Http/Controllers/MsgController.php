<?php

namespace App\Http\Controllers;
use App\Models\Lab;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MsgController extends Controller
{
    //

    public function index()
    {
        $labs = Lab::all();
        return view('Msg.index', compact('labs'));
    }

    public function getLabUsers(Request $request)
    {
        $labId = $request->input('lab_id');
        $users = Lab::findOrFail($labId)->users;
        return response()->json(['users' => $users]);
    }

    public function createMessage(Request $request)
    {
        $request->validate([
            'lab_id' => 'required|exists:labs,id',
            'content' => 'required',
        ]);

        $message = Message::create([
            'lab_id' => $request->input('lab_id'),
            'content' => $request->input('content'),
        ]);

        $lab = Lab::findOrFail($request->input('lab_id'));
        $users = $lab->users;

     //   Send email to each user
        foreach ($users as $user) {
            Mail::to($user->email)->send(new \App\Mail\MessageNotification($message));
        }

        return redirect()->route('labs.index')->with('success', 'Message sent successfully!');
    }
}
