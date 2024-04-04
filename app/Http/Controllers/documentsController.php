<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientDocument;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\client;
use App\Models\notification_message;
use App\Models\staff;
use Illuminate\Support\Facades\Crypt;
use DB;

class documentsController extends Controller
{
     public function all_client_documents(Request $request){
        $profileid = Auth::user()->id;
        $adminData = User::with('staff')
        ->where('id',$profileid)
        ->first();
        $data['pageTitle'] = 'documents';
        $searchQuery = $request->input('search');
        $clientId = $request->input('client_id');
        $email = $request->input('email');
    
        $client_document = client::where('staff_id',$adminData->staff->id)
        ->when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('document_name', 'like', '%' . $searchQuery . '%');
        })
            ->when($clientId, function ($query) use ($clientId) {
                $query->where('id', $clientId);
            })
            ->when($email, function ($query) use ($email) {
                                    $query->where('email', $email);
                
            })
            
            ->paginate(10);
        $client = client::where('staff_id',$adminData->staff->id ?? '')->get();
        return view('staff_portal_file.client_documents.all_documents', compact('client_document','data','adminData','client'));
    }
    
    public function view_customer($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='documents';

        $clientDocument = ClientDocument::where('client_id',$id)->get();
        $client = Client::find($id);
        if(is_null($client)){
            return response()->json(['message'=> 'not found'],404);
        }
        
        

        return view('staff_portal_file.client_documents.view_customer', ['clientDocument' => $clientDocument,'data' => $data,'adminData' => $adminData,'client' => $client]);

    }

    public function show_uploaddocument($clientId){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='documents';

        $clientDocument = ClientDocument::find($clientId);
        // $clientId = $clientDocument->client->id;
        

        $clientDocuments = ClientDocument::where('client_id', $clientId)->get();
        // $clientDocuments = ClientDocument::where('client_id', $id)->get();
        
        return view('staff_portal_file.client_documents.add_document',compact('data','adminData','clientDocuments','clientId'));
    }

    public function add_document(Request $request,$clientId){
$profileid = Auth::user()->id;
        $profileid = Auth::user()->id;
        $adminData = User::with('staff')
        ->where('id',$profileid)
        ->first();
       
        $imageName = null; // Initialize imageName variable
        $filePath = null;
        if($request->hasFile("filename")) {
            $file = $request->file("filename");
            $imageName = time() . '_' . $file->getClientOriginalName(); // Generate unique file name
            $file->move(public_path("cleint_documents/"), $imageName);

            $filePath = 'cleint_documents/' . $imageName;

        }

        // Ensure $imageName is included in the data being saved to the database
        $docData = $request->all();
        
        $docData['filename'] = $imageName; // Assuming 'logo' is the column name for the image in the database
        $docData['file_path'] = $filePath;

        if ($filePath) {
            
            $encryptedFilePath = substr(Crypt::encrypt($filePath), 0, 255); 
            
            $docData['encrypted_file_path'] = $encryptedFilePath;
        }
        
        $docData['client_id'] = $clientId;
//dd($adminData->staff->id);
        $docData['staff_id'] = $adminData->staff-> id ??''; 
// dd($docData);
        $clientDocuments = ClientDocument::create($docData);

        return redirect()->route('view.customer', ['id' => $clientId])->withSuccess("Data Inserted Successfully");
    }

    public function edit_document($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='documents';

        $clientDocument = ClientDocument::find($id);
        
        if(is_null($clientDocument)){
            return response()->json(['message'=> 'not found'],404);
        }
        
        return view('staff_portal_file.client_documents.edit_document', ['clientDocument' => $clientDocument,'data' => $data,'adminData' => $adminData]);
    }

    public function update_document(Request $request,$id){
        $clientDocument=ClientDocument::find($id);
        if(is_null($clientDocument)){
            return response()->json(['message'=> 'not found'],404);
        }


        $imageName = null;
        $oldImagePath = $clientDocument->filename; // Assume $bank->logo holds the current image name

        if($request->hasFile("filename")) {
            // Delete the old image if it exists
            if (!is_null($oldImagePath)) {
                $oldImagePath = public_path("cleint_documents/") . $oldImagePath;
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }

            // Upload and save the new image
            $file = $request->file("filename");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("cleint_documents/"), $imageName);
        }

        // Prepare data for updating (excluding the file from the request)
        $docData = $request->except(['filename']);
        if($imageName !=null){
            $docData['filename'] = $imageName; // Update the image name in the array
        }

        // Update file_path and encrypted_file_path if filename is updated
        if (isset($docData['filename'])) {
            $filePath = 'cleint_documents/' . $docData['filename'];
            $docData['file_path'] = $filePath;
            $encryptedFilePath = substr(Crypt::encrypt($filePath), 0, 255);
            $docData['encrypted_file_path'] = $encryptedFilePath;
        }


        $clientDocument->update($docData);
        // return response($lead,200);
        return redirect()->route('view.customer', ['id' => $clientDocument->client_id]);
    }

    public function delete_document(Request $request,$id){
        $clientDocument=clientDocument::find($id);
        
        if(is_null($clientDocument)){
            return response()->json(['message'=> 'not found'],404);
        }
        
        $clientDocument->delete();
        // return response()->json(null,204);

        return redirect()->route('all.client.documments')->withSuccess("Data Deleted Successfully");
}

public function show_documents(Request $request){
    $profileid = Auth::user()->id;
    $adminData = User::with('staff')
    ->where('id',$profileid)
    ->first();

    $data['pageTitle']='documents';

    $document_name = $request->input('document_name');
    $client_name = $request->input('client_name');

    $client_document = ClientDocument::where('staff_id',$adminData->staff->id ?? '')
    ->when($document_name, function ($query) use ($document_name) {
            $query->where('document_name', $document_name);
        })
        ->when($client_name, function ($query) use ($client_name) {
            // Assuming ClientDocument has a relationship with Client model
            $query->whereHas('client', function ($query) use ($client_name) {
                $query->where('first_name', $client_name);
            });
        })
        ->get();

    $client = Client::all();

    return view('staff_portal_file.client_documents.documents', compact('data','adminData','client_document','client'));
}


public function documents_verfication($id){
    
    $profileid = Auth::user()->id;
    $clientDocument = ClientDocument::find($id);
    $client = client::find($clientDocument->client_id);
    $data['pageTitle']='documents';

    return view('staff_portal_file.client_documents.documents_verify',compact('data','clientDocument','client'));
}

public function update_documents_status(Request $request){
    $status = $request->input('status');
    $client_id =  $request->input('client_id');
    $document_id = $request->input('document_id');
    $document_name = $request->input('document_name');
    $clientDocument=ClientDocument::find($document_id);
    $clientDocument->document_status = $status;
    $update_success = $clientDocument->save();
    // Create a new notification message to client about its status
     $message2 = new notification_message();
     $message2->from = Auth::user()->role;
     $message2->staff_id = Auth::user()->staff->id;
     if($status == 'rejected'){
        $message2->message =  "Your " . $document_name ."was not verified. Please contact your account manager to know more.";
     }elseif($status == 'varified'){
        $message2->message =  "Your " . $document_name ."has been successfully verified. On Verification. ";
     }
     $message2->save();
     $message2->clients()->sync([$client_id], 'notification_message_clients');

     if($update_success){
        return response()->json(['status'=> 1]);
     }else{
        return response()->json(['status'=> 0]);
     }
    
}

public function delete_documents(Request $request,$id){
    $clientDocument=clientDocument::find($id);
    
    if(is_null($clientDocument)){
        return response()->json(['message'=> 'not found'],404);
    }
    
    $clientDocument->delete();
    // return response()->json(null,204);

    return redirect()->route('show.documments')->withSuccess("Data Deleted Successfully");
}
}
