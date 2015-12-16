<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ContactMeRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * 显示表单
     *
     * @return View
     */
    public function showForm()
    {
        return view('blog.contact');
    }

    /**
     * Email the contact request
     *
     * @param ContactMeRequest $request
     * @return Redirect
     */
    public function sendContactInfo(ContactMeRequest $request)
    {
        $data = $request->only('name', 'email', 'phone','attach','imgPath');
        $data['messageLines'] = explode("\n", $request->get('message'));
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->subject('Blog Contact Form: '.$data['name'])
                ->to(config('blog.contact_email'))
                ->attach(storage_path('app/files/设备虚拟化.docx'),['as'=>'设备虚拟化.docx'])
//                如果中文乱码，则用这个attach($attachment,['as'=>"=?UTF-8?B?".base64_encode('设备虚拟化')."?=.docx"]);
                ->replyTo($data['email']);
        });
        return back()
            ->withSuccess("Thank you for your message. It has been sent.");
    }
}