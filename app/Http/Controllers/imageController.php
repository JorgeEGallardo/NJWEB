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
    }
    public function postUpload(StoreImage $request)
    {
        return 1;
        $path = Storage::disk('s3')->put('images/originals', $request->file);
        $request->merge([
            'size' => $request->file->getClientSize(),
            'path' => $path,
            'auth_by'=>1
        ]);
        $this->image->create($request->only('path', 'title', 'size','auth_by'));
        return back()->with('success', 'Image Successfully Saved');
    }
}
