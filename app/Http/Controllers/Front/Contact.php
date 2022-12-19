<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Models;
enum ContactSubject: string {
    case BILGI = 'bilgi';
    case DESTEK = 'destek';
    case DIGER  = 'diger';
}
class Contact extends Controller
{


    public function contactget()
    {
        $contact_subjects = array();
        foreach (ContactSubject::cases() as $key ) {
            $contact_subjects[$key->name] = $key->value;
        }
        return view('front.contact',[ 'contact_subjects' => $contact_subjects]);
    }
    public function contactpost(Request $request)
    {
        $rule = [ 'name'=>'required|min:5',
            'email'=>'required|email',
            'subject'=>'required|min:5',
            'message'=>'required|min:10'
        ];
        //todo enum check

        $result = Validator::make($request->post(),$rule);
        if($result->errors())
        {
            return redirect()->route('contact')->withErrors($result)->withInput();
        }

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->route('contact')->with('success','Mesajınız iletildi');
    }
}
