<?php

namespace App\Http\Controllers;

use App\Models\DestinationPhoto;
use App\Models\DestinationPhotoGallery;
use Illuminate\Http\Request;

class AdminDestinationGalleryController extends Controller
{

    public function photoGalleryIndex($id) 
    {
        $destinationPhotos = DestinationPhoto::where("destination_id", $id)->get();
        return view("admin.destination.photo", compact("destinationPhotos"));
    }

    public function storeImage(Request $request)
    {
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $name = time() . "." . strtolower($image->getClientOriginalExtension());
            $path = public_path("uploads/admin/destination/gallery");
            $image->move($path, $name);
            DestinationPhoto::create([
                "destination_id" => $request->destination_id,
                "photo_name" => $name
            ]);
        }
        return back()->with("success","Image added successfully");
    }

    public function deleteImage($id){
        
        $destinationPhotos = DestinationPhoto::where("id", $id)->first();
        if (file_exists(public_path("uploads/admin/destination/gallery/" . $destinationPhotos->photo_name))) {
            unlink(public_path("uploads/admin/destination/gallery/" . $destinationPhotos->photo_name));
        }
        DestinationPhoto::where("id", $id)->delete();
        return back()->with("success","Image deleted successfully");
    }
}
