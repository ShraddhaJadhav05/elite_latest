<?php

namespace App\Http\Controllers\Mortgage\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\ClientDocument;

class DocumentsController extends Controller
{
    public function listClientDocuments(Request $request)
    {
        log::info('List client documents');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            $client_id          = session()->get('client_id');

            $loan_documents     = ClientDocument::where('client_id', $client_id)
                                    ->where('is_loan_document',True)
                                    ->orderByDesc('created_at')
                                    ->get();

            $documents          = ClientDocument::where('client_id', $client_id)->orderByDesc('created_at')->get();

            return view('mortgage/client/documents/list_all_document',['get_data' => $documents,'loan_documents' => $loan_documents]);
        }

        return redirect()->route('clientLogin');
    }

    public function addClientDocument(Request $request)
    {
        log::info('Client add document');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            if ($request->isMethod('post')) {
                
                $client_id              = session()->get('client_id');

                $document_name          = $request->document_name;
                $shown_to_agent         = $request->shown_to_agent == 'Yes' ? true : false;
                $is_loan_document       = $request->document_type == 'loan' ? true : false;

                $contents               = $request->file('document')->get();
                $encryptedContents      = Crypt::encryptString($contents);
                $filename               = uniqid() . '.enc';
                Storage::disk('documents')->put($filename, $encryptedContents);

                $document                       = new ClientDocument();
                $document->client_id            = $client_id;
                $document->document_name        = $document_name;
                $document->shown_to_agent       = $shown_to_agent;
                $document->is_loan_document     = $is_loan_document;
                $document->filename             = $filename;
                $document->encrypted_file_path  = "mortgage/client/documents/{$filename}";
                $document->file_path            = $request->file('document')->store('mortgage/client/documents', 'public');
                $document->save();
                
                Session::flash('success', "Your ducument added successfully");
                return redirect()->route('document.list');
            }
            
            $document_type  = $request->type;
            return view('mortgage/client/documents/add_document',['document_type'   => $document_type]);
        }
        return redirect()->route('clientLogin');
    }


    public function editClientDocument(Request $request)
    {
        Log::info('Client edit document');
        Log::info($request);

        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if (session()->has('client_id')) {
            if ($request->isMethod('post')) {
                $client_id  = session()->get('client_id');
                $id         = $request->id;

                // Check if the document exists
                $document   = ClientDocument::find($id);

                if (!$document) {
                    Session::flash('error', "Document not found");
                    return redirect()->route('document.list');
                }

                // Upload new document
                if ($request->hasFile('document')) {
                    // Delete the old document
                    Storage::disk('documents')->delete($document->filename);

                    // Upload the new document
                    $contents           = $request->file('document')->get();
                    $encryptedContents  = Crypt::encryptString($contents);
                    $filename           = uniqid() . '.enc';
                    Storage::disk('documents')->put($filename, $encryptedContents);
                    // Update document metadata
                    $document->document_name        = $request->document_name;
                    $document->shown_to_agent       = $request->shown_to_agent == 'Yes' ? true : false;
                    $document->filename             = $filename;
                    $document->encrypted_file_path  = "mortgage/client/documents/{$filename}";
                    $document->file_path            = $request->file('document')->store('mortgage/client/documents', 'public');
                } else {
                    // Update document metadata only
                    $document->document_name    = $request->document_name;
                    $document->shown_to_agent   = $request->shown_to_agent == 'Yes' ? true : false;
                }

                $document->save();
                Session::flash('success', "Your document updated successfully");
                return redirect()->route('document.list');
            }
            $id                 = $request->id;
            $document           = ClientDocument::find($id);

            $encryptedContents  = Storage::disk('documents')->get($document->filename);
            $decryptedContents  = Crypt::decryptString($encryptedContents);

            $document_type      = $request->type;
            
            return view('mortgage/client/documents/edit_document',
                        [
                            'document'          => $document,
                            'documentContent'   => $decryptedContents,
                            'document_type'     => $document_type
                        ]);
        }
        return redirect()->route('clientLogin');
    }


    public function viewClientDocument(Request $request)
    {
        Log::info('Client edit document');
        Log::info($request);

        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if (session()->has('client_id')) {
            $id                 = $request->id;
            $document           = ClientDocument::find($id);

            $encryptedContents  = Storage::disk('documents')->get($document->filename);
            $decryptedContents  = Crypt::decryptString($encryptedContents);

            $document_type      = $request->type;
            
            return view('mortgage/client/documents/view_document',
                        [
                            'document'          => $document,
                            'documentContent'   => $decryptedContents,
                            'document_type'     => $document_type
                        ]);
        }
        return redirect()->route('clientLogin');
    }

    public function deleteClientDocument(Request $request)
    {
        Log::info('Delete client document');
        Log::info($request);
    
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        
        if (session()->has('client_id')) {
            if ($request->isMethod('post')) {
                $id         = $request->id;
                $document   = ClientDocument::find($id);

                // Delete the document from storage
                Storage::disk('documents')->delete($document->filename);

                // Delete the document entry from the database
                $document->delete();

                Session::flash('success', "Your document deleted successfully");
                return redirect()->route('document.list');
            }

            // Redirect to the document list if the request method is not POST
            return redirect()->route('document.list');
        }
        return redirect()->route('clientLogin');
    }


    // public function addClientDocument(Request $request)
    // {
    //     $contents           = $request->file('document')->get();
    //     $encryptedContents  = Crypt::encryptString($contents);
    //     $filename           = uniqid() . '.enc';
    //     Storage::disk('documents')->put($filename, $encryptedContents);

    //     $document = new ClientDocument();
    //     $document->filename = $filename;
    //     $document->path = "mortgages/client/documents/{$filename}";
    //     $document->file_path = $request->file('document')->store('mortgages/client/documents', 'public');
    //     $document->save();

    //     return response()->json(['message' => 'Document stored successfully']);
    // }

    // public function show($filename)
    // {
    //     $encryptedContents = Storage::disk('documents')->get($filename);
    //     $decryptedContents = Crypt::decryptString($encryptedContents);
    //     return response($decryptedContents)->header('Content-Type', 'application/octet-stream');
    // }

}
