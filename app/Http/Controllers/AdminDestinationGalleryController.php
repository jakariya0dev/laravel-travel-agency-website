<?php

namespace App\Http\Controllers;

use App\Models\DestinationPhoto;
use App\Models\DestinationPhotoGallery;
use App\Models\DestinationVideo;
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

    public function videoGalleryIndex($id) 
    {
        $destinationVideos = DestinationVideo::where("destination_id", $id)->get();

        // dd($destinationVideos);
        return view("admin.destination.video", compact("destinationVideos"));
    }

    public function storeVideo(Request $request)
    {
        
        $request->validate([
            "video_url"=> "required",
        ]);
        $destinationVideo = new DestinationVideo;
        $destinationVideo->destination_id = $request->destination_id;
        $destinationVideo->video_url = $request->video_url;
        $destinationVideo->save();

        return back()->with("success","Video added successfully");

    }

    public function deleteVideo($id){
        destinationVideo::where("id", $id)->delete();
        return back()->with("success","Video deleted successfully");
    }

}
