<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Notifications\NewContact;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{

    public function index()
    {
        return view('site.contact.index');
    }

   public function form (Request $request){
        $contact = Contact::create($request->all());
        Notification::route('mail', config('mail.from.address'))
            ->notify(new newContact($contact));
        ddd($contact);
   }
}
