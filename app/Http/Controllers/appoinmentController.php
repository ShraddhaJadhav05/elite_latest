<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\staff;
use App\Models\slot;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class appoinmentController extends Controller
{
    public function show_appoinment(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='appoinment';
        $staff=staff::all();

        
        return view('appoinment.add_appoinment', compact('staff','data','adminData'));
    }

    // public function add_appoinment(Request $request){
      
    //     $appoinment = Appointment::create($request->all());
       
    //     return redirect()->route('all.appoinments')->withSuccess("Data Inserted Successfully");

    // }

    public function add_appoinment(Request $request){
        // Retrieve date and time slot from the request
        $date = $request->input('date');
        $timeSlot = $request->input('time_slot');
    
        // Check if the slot is already booked
        $existingAppointment = Appointment::where('date', $date)
                                          ->where('time_slot', $timeSlot)
                                          ->first();
        
        if ($existingAppointment) {
            return response()->json(['error' => 'The selected slot is already booked.'], 422);
            

        } else {
            
            // Slot is available, proceed with inserting the appointment
            $appointment = Appointment::create($request->all());
            // return redirect()->route('all.appoinments')->withSuccess("Appointment booked successfully.");
            return response()->json(['success' => 'Appointment booked successfully.']);

        }
    }
    

    public function all_appoinments(Request $request){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
    
        $data['pageTitle']='appoinment';
        $searchQuery = $request->input('search');
        
        $appointments = Appointment::select('appointments.*', 'slots.status')
            ->leftJoin('slots', function($join) {
                $join->on('appointments.date', '=', 'slots.date')
                     ->whereColumn('appointments.time_slot', '=', 'slots.time_slot');
            })
            ->when($searchQuery, function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%')
                      ->orWhere('phone', 'like', '%' . $searchQuery . '%')
                      ->orWhere('email', 'like', '%' . $searchQuery . '%');
            })
            ->paginate(10);

            
        return view('appoinment.all_appoinment', compact('appointments','data','adminData'));
    }

    public function view_appoinment($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='appoinment';

        $appoinment=Appointment::find($id);
        if(is_null($appoinment)){
            return response()->json(['message'=> 'not found'],404);
        }

        // return response()->json($lead::find($id),200);
        return view('appoinment.view_appoinment', ['appoinment' => $appoinment,'data' => $data,'adminData' => $adminData]);
    }

    public function edit_appoinment($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='appoinment';

        $appoinment=Appointment::find($id);
        if(is_null($appoinment)){
            return response()->json(['message'=> 'not found'],404);
        }

        // Define your time slots array
        $time_slots = [
            "09:00AM - 10:00AM",
            "10:00AM - 11:00AM",
            "11:00AM - 12:00AM",
            "12:00AM - 01:00PM",
            "01:00PM - 02:00PM",
            "02:00PM - 03:00PM",
            "03:00PM - 04:00PM",
            "04:00PM - 05:00PM",
            "05:00PM - 06:00PM"
        ];
        // return response()->json($lead::find($id),200);
        return view('appoinment.edit_appoinment', ['appoinment' => $appoinment,'time_slots' => $time_slots,'data' => $data,'adminData' => $adminData]);
    }

    public function update_appoinment(Request $request,$id){
        $appoinment=Appointment::find($id);
        if(is_null($appoinment)){
            return response()->json(['message'=> 'not found'],404);
        }
        $appoinment->update($request->all());
        // return response($lead,200);
        return redirect()->route('all.appoinments')->withSuccess("Data Updated Successfully");
    }

    public function delete_appoinment(Request $request,$id){
        $appoinment=Appointment::find($id);
        if(is_null($appoinment)){
            return response()->json(['message'=> 'not found'],404);
        }

        
        $appoinment->delete();
        // return response()->json(null,204);
        return redirect()->route('all.appoinments')->withSuccess("Data Deleted Successfully");

    }

    public function all_slots(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='appoinment';

        $staff=staff::all();
        $timeSlots = [
            '09:00AM - 10:00AM',
            '10:00AM - 11:00AM',
            '11:00AM - 12:00AM',
            '12:00PM - 01:00PM',
            '01:00PM - 02:00PM',
            '02:00PM - 03:00PM',
            '03:00PM - 04:00PM',
            '04:00PM - 05:00PM',
            '05:00PM - 06:00PM'
        ];
        

        return view('appoinment.slots',compact('staff','timeSlots','data','adminData'));
    }

    // public function add_slots(Request $request){
    //     $staffId = $request->input('staff_id');
    //     $date = $request->input('date');
    //     $slot = $request->input('slot');
    //     $slot1 = $request->input('slot1');
    
    //     $timeSlots = [
    //         '09:00AM - 10:00AM',
    //         '10:00AM - 11:00AM',
    //         '11:00AM - 12:00AM',
    //         '12:00PM - 01:00PM',
    //         '01:00PM - 02:00PM',
    //         '02:00PM - 03:00PM',
    //         '03:00PM - 04:00PM',
    //         '04:00PM - 05:00PM',
    //         '05:00PM - 06:00PM'
    //     ];
    
    //     $slots = [];
    //     foreach ($timeSlots as $slot) {
    //         $slots[] = [
    //             'staff_id' => $staffId,
    //             'date' => $date,
    //             'time_slot' => $slot
    //         ];
    //     }
    
    //     Slot::insert($slots);
    
    //     return redirect()->route('all.slots')->withSuccess("Data Inserted Successfully");
    // }

    public function add_slots(Request $request){
        $action = $request->input('action');
        
       // $staffId = $request->input('staff_id');

        $date = $request->input('date');
        $slot = $request->input('slot');
        $slot1 = $request->input('slot1');
       // dd($_POST);
        $timeSlots = [
            '09:00AM - 10:00AM',
            '10:00AM - 11:00AM',
            '11:00AM - 12:00AM',
            '12:00PM - 01:00PM',
            '01:00PM - 02:00PM',
            '02:00PM - 03:00PM',
            '03:00PM - 04:00PM',
            '04:00PM - 05:00PM',
            '05:00PM - 06:00PM'
        ];
    
        $slots = [];
        foreach ($timeSlots as $key=>$value) {
            //echo $key."".$value."<br>";
            $slots[] = [
                'date' => $date,
                'time_slot' => $value,
                'status' => $slot1[$key],
            ];
        }
        if($action=='update'){
            slot::where('date', $date)->delete();
           slot::insert($slots); 
        }else{
            slot::insert($slots);
        }
        
    
        return redirect()->route('all.slots')->withSuccess("Data Inserted Successfully");
    }

    public function checkStaffDate(Request $request) {

        $date = $request->input('date');
    
        $timeSlots  = slot::whereDate('date', $date)
                        ->get(['time_slot', 'status']);
        if ($request->ajax()) {
            
            if ($timeSlots->isNotEmpty()) {

                $array = json_decode($timeSlots, true);
                 //dd($array);
                $slot_available=1;
                $view = view('appoinment.time-slots-table', ['timeSlots' => $array,'slot_available'=>$slot_available])->render();
                return response()->json(['html' => $view]);
            } else {
                //dd('rahul');
                
                $timeSlots = [
            '09:00AM - 10:00AM',
            '10:00AM - 11:00AM',
            '11:00AM - 12:00AM',
            '12:00PM - 01:00PM',
            '01:00PM - 02:00PM',
            '02:00PM - 03:00PM',
            '03:00PM - 04:00PM',
            '04:00PM - 05:00PM',
            '05:00PM - 06:00PM'
        ];
            $slot_available=0;
                $view = view('appoinment.default_table', ['timeSlots' => $timeSlots,'slot_available'=>$slot_available])->render();
               return response()->json(['html' => $view]);
            }

        }

    }
    public function fetchTimeSlots(Request $request)
    {
        $staffId = $request->input('staff_id');
        $date = $request->input('date');

        // Assuming your Slot model has a 'time' and 'status' attribute
        $timeSlots = slot::where('staff_id', $staffId)
            ->whereDate('date', $date)
            ->select('time_slot', 'status')
            ->get();

        return response()->json(['slots' => $timeSlots]);
    }
    
    
    public function updateSlotStatus(Request $request, $slotId)
{
    $status = $request->input('status');

    // Update slot status in the database
    slot::where('id', $slotId)->update(['status' => $status]);

    return response()->json(['message' => 'Slot status updated successfully']);
}

}
