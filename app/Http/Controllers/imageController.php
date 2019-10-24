<?php

namespace App\Http\Controllers;

use App\Image;
use App\Http\Requests\StoreImage;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    private $image;
    public function __construct(Image $image)
    {
        $this->image = $image;
    }
    public function getImages()
    {
        return view('images')->with('images', auth()->user()->images);
    }
    public function postUpload(StoreImage $request)
    {
        $path = Storage::disk('s3')->put('images/registry', $request->file, 'public');
        $request->merge([
            'size' => $request->file->getClientSize(),
            'path' => $path,
            'auth_by' => $request->patient
        ]);
        $this->image->create($request->only('path', 'title', 'size', 'auth_by'));
        return back()->with('success', 'Image Successfully Saved');
    }
    public function imageDelete($id)
    {
        $img = \DB::select('select * from images where id = ?', [$id]);
        $path =  $img[0]->path;
        $path = $path;
        if (Storage::disk('s3')->exists($path)) {
            Storage::disk('s3')->delete($path);
            \DB::delete('delete from images where id = ?', [$id]);
            return redirect('/patient');
        } else {
            return "Imagen no encontrada";
        }
    }
}
