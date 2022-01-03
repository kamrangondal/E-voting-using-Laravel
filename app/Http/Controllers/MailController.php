<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;



class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'content1' => 'required',
            'attachment' => 'mimes: jpeg,png,jpg,gif,svg,txt,pdf,ppt,docx,doc,xls',
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'content1' => $request->content1,
            //'attachment' => $request->attachment,
            'attachment' => $request->attachment,
        ];

        // $files = [
        //     public_path('myFile'),
        // ];
       
        //Mail::to('maazrehan@ciitwah.edu.pk')->send(new \App\Mail\TestGmail($details));
        //Mail::to('kamran.gondal.747@gmail.com')->send(new \App\Mail\TestGmail($details));
        //Mail::to('usamaamir3997@gmail.com')->send(new \App\Mail\TestGmail($details));

        Mail::send('temp', $data, function($message) use ($data) {
            $message->to($data['email'])
            ->subject($data['subject'])
            //->attachFromStorage($data['attachment']);
            ->attach($data['attachment']->getRealPath(), [
                'as' => 'attachment' . $data['attachment']->getClientOriginalName(),
                'mime' => $data['attachment'] ->getMimeType()]);
        });
        return back()->with(['message' => 'Email has been sent successfully!']);    
    }

    public function index(){
        return view ("mailer");
    }

}
