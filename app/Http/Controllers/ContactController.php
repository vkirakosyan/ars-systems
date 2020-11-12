<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    /**
     * Show the contact us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'email'      => 'required',
            'subject'    => 'required',
            'text'       => 'required'
        ]);
        $emailData = $request->all();
        $data = array('name'=>$emailData['name'],'subject' => $emailData['subject'],'messagetext'=>$emailData['text']);
        $email = $emailData['email'];
        $name = $emailData['name'];
        $subject = $emailData['subject'];
        Mail::send('mail',$data, function($message) use($name,$email,$subject) {
            $message->to(env('MAIL_USERNAME'),'Ars Systems')->subject($subject);
            $message->from($email,$name);
        });
        $success = 'Your message was sent successfully!';
        return view('contact', compact('success'));
    }
}
