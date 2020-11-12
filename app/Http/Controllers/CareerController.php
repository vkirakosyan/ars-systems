<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;
use Mail;

class CareerController extends Controller
{
    /**
     * Show the career page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$career = $this->getCareer();
        return view('career', compact('career'));
    }

    private function getCareer()
    {
    	return Career::get();
    }

    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'email'      => 'required',
            'subject'    => 'required',
            'attachment' => 'required'
        ]);
        $emailData = $request->all();
        $emailData['attachment'] = $this->attachmentUpload($request);
        $data = array('name'=>$emailData['name'],'subject' => $emailData['subject'],'messagetext'=>$emailData['message']);
        $email = $emailData['email'];
        $name = $emailData['name'];
        $file = $emailData['attachment'];
        $subject = $emailData['subject'];
        Mail::send('mail',$data, function($message) use($name,$email,$file,$subject) {
            $message->to(env('MAIL_USERNAME'),'Ars Systems')->subject($subject);
            $message->attach(public_path('/temp').'/'.$file);
            $message->from($email,$name);
        });
        unlink(public_path('/temp').'/'.$file);
        $career = $this->getCareer();
        $success = 'Your Resume was sent successfully!';
        return view('career', compact('career','success'));
    }

    private function attachmentUpload(Request $request)
    {   
        $this->validate($request, [
            'attachment' => 'max:2048'
        ]);
        $file             = $request->file('attachment');
        $filename         = $file->getClientOriginalName();
        $destinationPath  = public_path('/temp');
        
        $file->move($destinationPath, $filename);

        return $filename;
    }
}
