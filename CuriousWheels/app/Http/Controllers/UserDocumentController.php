<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDocument;
use App\Models\DocumentType;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserDocumentController extends Controller
{
    public function index()
    {
        $userDocuments = UserDocument::all();
        return view('backend.user_documents.index', compact('userDocuments'));
    }

    public function create()
    {
        $documentTypes = DocumentType::all();
        $users = User::where('role', 'user')->get();
        return view('backend.user_documents.create', compact('documentTypes', 'users'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'document_type_id' => 'required|exists:document_types,id',
            'file_path' => 'required|file', // Validate uploaded file
            'description' => 'nullable|string',
            'is_approved' => 'nullable|numeric',
        ]);

        // Check if the user has already created a document of the same type
        $existingDocument = UserDocument::where('user_id', $request->user_id)
            ->where('document_type_id', $request->document_type_id)
            ->exists();

        if ($existingDocument) {
            return back()->withErrors(['document_type_id' => 'You have already created a document of this type.'])->withInput();
        }

        // Handle file upload if present in the request
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('user_documents', 'my_storage');
            $validatedData['file_path'] = url(Storage::disk('my_storage')->url($filePath));
        }

        // Create a new user document record with the validated data
        $userDocument = UserDocument::create($validatedData);

        // Redirect to a relevant page, for example, the user document details page
        return redirect()->route('admin.user_documents.index')->with('success', 'User document created successfully!');
    }

    public function edit(UserDocument $userDocument)
    {
        $documentTypes = DocumentType::all();
        $users = User::where('role', 'user')->get();

        return view('backend.user_documents.edit', compact('userDocument', 'documentTypes','users'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'document_type_id' => 'required|exists:document_types,id',
            'file_path' => 'nullable|file', // Validate uploaded file
            'description' => 'nullable|string',
            'is_approved' => 'nullable|numeric',
        ]);

        // Retrieve the user document by its ID
        $userDocument = UserDocument::findOrFail($id);

        // Check if the user has already created a document of the same type
        $existingDocument = UserDocument::where('user_id', $request->user_id)
            ->where('document_type_id', $request->document_type_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($existingDocument) {
            return back()->withErrors(['document_type_id' => 'You have already created a document of this type.'])->withInput();
        }

        // Handle file upload if present in the request
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('user_documents', 'my_storage');
            $validatedData['file_path'] = url(Storage::disk('my_storage')->url($filePath));
        }

        // Update the user document with the new data
        $userDocument->update($validatedData);

        // Redirect to the user document index page with a success message
        return redirect()->route('admin.user_documents.index')->with('success', 'User document updated successfully.');
    }


    public function destroy(UserDocument $userDocument)
    {
        $userDocument->delete();

        return response()->json(['message' => 'User document deleted successfully!']);
    }

    public function user_index()
    {
        // Retrieve the authenticated user's documents
        $userDocuments = UserDocument::where('user_id', auth()->id())->get();

        // Pass the user's documents to the view
        return view('backend.my_documents.index', compact('userDocuments'));
    }



    public function user_create()
    {
        $documentTypes = DocumentType::all();
        $user = auth()->user();
        return view('backend.my_documents.create', compact('documentTypes', 'user'));
    }

    public function user_store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'document_type_id' => 'required|exists:document_types,id',
            'file_path' => 'required|file', // Validate uploaded file
            'description' => 'nullable|string',
        ]);

        $existingDocument = UserDocument::where('user_id', auth()->id())
        ->where('document_type_id', $request->document_type_id)
        ->exists();

        // print_r($existingDocument);
        // exit;
        if ($existingDocument) {
            return back()->withErrors(['document_type_id' => 'You have already created a document of this type.'])->withInput();
        }
        // Handle file upload if present in the request
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('user_documents', 'my_storage');
            $validatedData['file_path'] = url(Storage::disk('my_storage')->url($filePath));
        }

        // Assign the authenticated user as the owner of the document
        $validatedData['user_id'] = auth()->id();

        // Create a new user document record with the validated data
        $userDocument = UserDocument::create($validatedData);

        // Redirect to a relevant page, for example, the user document details page
        return redirect()->route('user.documents.index')->with('success', 'Document created successfully!');
    }

    public function user_edit(UserDocument $userDocument)
    {
        $documentTypes = DocumentType::all();

        return view('backend.my_documents.edit', compact('userDocument', 'documentTypes'));
    }


    public function user_update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'document_type_id' => 'required|exists:document_types,id',
            'file_path' => 'nullable|file', // Validate uploaded file
            'description' => 'nullable|string',
        ]);

        // Retrieve the user document by its ID
        $userDocument = UserDocument::findOrFail($id);

        // Check if the user has already created a document of the same type
        $existingDocument = UserDocument::where('user_id', $userDocument->user_id)
            ->where('document_type_id', $request->document_type_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($existingDocument) {
            return back()->withErrors(['document_type_id' => 'You have already created a document of this type.'])->withInput();
        }

        // Handle file upload if present in the request
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('user_documents', 'my_storage');
            $validatedData['file_path'] = url(Storage::disk('my_storage')->url($filePath));
        }

        // Update the user document with the new data
        $userDocument->update($validatedData);

        // Redirect to the user document index page with a success message
        return redirect()->route('user.documents.index')->with('success', 'User document updated successfully.');
    }


    public function user_destroy(UserDocument $userDocument)
    {
        $userDocument->delete();

        return response()->json(['message' => 'User document deleted successfully!']);
    }
}
