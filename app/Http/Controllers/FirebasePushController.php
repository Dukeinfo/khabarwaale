<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;    
use Kreait\Firebase\Messaging\CloudMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FirebasePushController extends Controller
{
    //

    // Return an instance of the Auth component for the default Firebase project
    public function updateDeviceToken(Request $request)
    {
        // Auth::user()->device_token =  $request->token;

        // Auth::user()->save();
        $user = Auth::user();
        $user->device_token = $request->token;
        $user->save();

        return response()->json(['Token successfully stored.']);
    }

    public function sendNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();
            
        $serverKey = 'AAAAkWIc2hY:APA91bH7dl0ZNaS7dDZo-4SvqQHtu3WPGxnj0xrWHFINf9m1km-7-fUYzii1ge9sqL_L0SqeDZwLEnOicjaSGA9mzmoDIZYty6nhlsLEPjOVOGFBrxhhCISGMuWhXwivoakc_EE86gC3'; // ADD SERVER KEY HERE PROVIDED BY FCM
    
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        
        // Close connection
        curl_close($ch);
        // FCM response
        dd($result);
    }

        // protected $notification;
        // public function __construct()
        // {
        //     $this->notification = Firebase::messaging();
        // }

        // public function setToken(Request $request)
        // {
        //     $token = $request->input('fcm_token');
        //     $request->user()->update([
        //         'fcm_token' => $token
        //     ]); //Get the currrently logged in user and set their token
        //     return response()->json([
        //         'message' => 'Successfully Updated FCM Token'
        //     ]);
        // }

        //     public function notification(Request $request)
        //     {
        //         $FcmToken = auth()->user()->fcm_token;
        //         $title = $request->input('title');
        //         $body = $request->input('body');
        //         $message = CloudMessage::fromArray([
        //         'token' => $FcmToken,
        //         'notification' => [
        //             'title' => $title,
        //             'body' => $body
        //             ],
        //         ]);

        //     $this->notification->send($message);
        //     }
}
