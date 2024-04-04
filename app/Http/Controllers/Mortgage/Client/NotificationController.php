<?php

namespace App\Http\Controllers\Mortgage\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\ClientNotification;
use App\Models\client;
use Carbon\Carbon;


class NotificationController extends Controller
{
    public function listClientNotifications(Request $request)
    {
        log::info('List client notifications');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            $client_id              = session()->get('client_id');
            $get_client_data        = client::where('id',$client_id)->first();

            $notifications          = DB::table('client_notifications_data')->where('client_id', $client_id)->get();
            $all_notifications      = [];
            
            foreach ($notifications as $notification) {
                // date_default_timezone_set('Asia/Kolkata');
                date_default_timezone_set('Asia/Dubai');
                $notificationTime   = Carbon::parse($notification->created_at);
    
                $currentTime        = Carbon::now();
                
                if ($notificationTime->diffInSeconds($currentTime) < 60) {
                    // If created within the last minute, display "just now"
                    $formattedTime = "just now";
                } else {
                    if ($notificationTime->isToday()) {
                        $hoursDifference = $notificationTime->diffInHours($currentTime);
                        
                        if ($hoursDifference > 0) {
                            if( $hoursDifference == 1) 
                                $formattedTime = $hoursDifference . " hour";
                            else{
                                $formattedTime = $hoursDifference . " hours";
                            }
                        } else {
                            $minutesDifference = $notificationTime->diffInMinutes($currentTime);
                            $formattedTime = $minutesDifference . " min ago";
                        }
                    } else {
                        $formattedTime  = $notificationTime->diffForHumans();
                    }
                }
                
                $all_notifications[]    = array(
                                            'id'    => $notification->id,
                                            'text'  => $notification->client_notification,
                                            'time'  => $formattedTime,
                                            'view'  => $notification->view,
                                        );
            }
            return view('mortgage/client/notification/list_notification',['get_data' => $all_notifications,'get_client_data' => $get_client_data]);
        }

        return redirect()->route('clientLogin');
    }


    public function updateView(Request $request)
    {
        log::info('update view client notifications');
        log::info($request);

        if(session()->has('client_id'))
        {
            $notificationId     = $request->input('notification_id');

            $notification       = DB::table('client_notifications_data')
                                    ->where('id', $notificationId)
                                    ->update([
                                        'view'          => true,
                                        'updated_at'    => now()
                                ]);
            

            return response()->json(['success' => true, 'message' => 'View status updated successfully']);  
        }

        return redirect()->route('clientLogin');
    }
}
