<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Validator;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $documentTypes = DocumentType::all();
        return view('backend.document_types.index', compact('documentTypes'));
    }

    public function create()
    {
        return view('backend.document_types.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:document_types,name',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $documentType = new DocumentType;
        $documentType->name = $request->name;
        $documentType->description = $request->description;
        $documentType->save();

        return redirect()->route('admin.document_types.index')->with('success', 'Document type created successfully!');
    }

    public function edit(DocumentType $documentType)
    {
        return view('backend.document_types.edit', compact('documentType'));
    }

    public function update(Request $request, DocumentType $documentType)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:document_types,name,' . $documentType->id,
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $documentType->name = $request->name;
        $documentType->description = $request->description;
        $documentType->save();

        return redirect()->route('admin.document_types.index')->with('success', 'Document type updated successfully!');
    }
    public function destroy($id)
    {
        $documentType = DocumentType::findOrFail($id);
        $documentType->delete();

        return response()->json(['message' => 'Document type deleted successfully!']);
    }
}
