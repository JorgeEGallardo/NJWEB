<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\document;
use App\Http\Requests\StoreDocument;
use Illuminate\Support\Facades\Storage;
class documentController extends Controller
{
    private $document;
    public function __construct(document $document)
    {
        $this->document = $document;
    }
    public function getdocuments()
    {
        return view('documents')->with('documents', auth()->user()->documents);
    }
    public function postUpload(StoreDocument $request)
    {
        $path = Storage::disk('s3')->put('documents/registry', $request->file, 'public');
        $request->merge([
            'size' => $request->file->getClientSize(),
            'path' => $path,
            'auth_by' => $request->patient
        ]);
        $this->document->create($request->only('path', 'title', 'size', 'auth_by'));
        return back()->with('success', 'document Successfully Saved');
    }
}