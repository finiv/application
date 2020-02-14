<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function storeEmails (Request $request)
    {
        $getRecord = Notification::first();
        
        if($getRecord){
            $getRecord->notification_email = $request->get('notification_email');
            $getRecord->save();
        }else{
            Notification::create([
                'notification_email' => $request->get('notification_email')
            ]);
        }
        
        return redirect()->back()->with('success', 'Email for notifications was successfuly added');
    }
}
