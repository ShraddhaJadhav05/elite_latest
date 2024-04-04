<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    public function appointmentScheduleDateTime(Request $request)
    {
        log::info('Appointment Schedule Date & Time');
        log::info($request);

        if ($request->isMethod('post')) {
            $date       = $request->date;
            $time_slot  = $request->time_slots;

            $request->session()->put('date', $date);
            $request->session()->put('time_slot', $time_slot);

            return redirect()->route('bookAppointment');
        }

        return view('frontend/templates/appontment_schedule');
    }

    public function bookAppointment(Request $request)
    {
        log::info('Book Appointment');
        log::info($request);

        if ($request->isMethod('post')) {
            $date       = $request->date;
            $time_slot  = $request->time_slot;
            $name       = $request->name;
            $email      = $request->email;
            $phone      = $request->phone;
            $company    = $request->company;
            $message    = $request->message;

            $insert_id  = DB::table('appointments')
                            ->InsertGetId([
                                'date'          => $date,
                                'time_slot'     => $time_slot,
                                'name'          => $name,
                                'email'         => $email,
                                'phone'         => $phone,
                                'company'       => $company,
                                'message'       => $message,
                                'created_at'    => now(),
                                'updated_at'    => now()
                            ]
                        );
            
            Session::flash('success', "You successfully booked your appointment");
            return redirect()->route('appointmentScheduleDateTime');
        }

        $date           = session()->get('date');
        $time_slot      = session()->get('time_slot');

        return view('frontend/templates/book_appointment',
                    [
                        'date'      => $date,
                        'time_slot' => $time_slot
                    ]
                );
    }

    public function getSlot(Request $request)
    {
        log::info('get time slot');
        log::info($request);

        $date           = $request->input('date');

        $convertedDate  = Carbon::createFromFormat('m/d/Y', $date)->format('Y-m-d');

        // Filter time slots by the given date
        $timeSlots  = DB::table('slots')
                        ->whereDate('date', $convertedDate)
                        ->get();

        log::info($timeSlots);
        return response()->json($timeSlots);
    }
}
