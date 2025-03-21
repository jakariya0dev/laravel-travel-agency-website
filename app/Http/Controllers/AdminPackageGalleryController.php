<?php

namespace App\Http\Controllers;

use App\Models\PackagePhoto;
use App\Models\PackageVideo;
use Illuminate\Http\Request;

class AdminPackageGalleryController extends Controller
{
    private $imgPath;

    public function __construct()
    {
        $this->imgPath = public_path("uploads/admin/package/");
    }

    public function photoGalleryIndex($id) 
    {
        $package_id = $id;
        $packagePhotos = PackagePhoto::where("package_id", $id)->get();
        return view("admin.package.photo", compact("packagePhotos", 'package_id'));
    }

    public function storeImage(Request $request)
    {
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $name = time() . "." . strtolower($image->getClientOriginalExtension());
            $image->move($this->imgPath, $name);
            PackagePhoto::create([
                "package_id" => $request->package_id,
                "photo" => $name
            ]);
        }
        return back()->with("success","Image added successfully");
    }

    public function deleteImage($id){

        $packagePhotos = PackagePhoto::where("id", $id)->first();

        if (file_exists($this->imgPath.$packagePhotos->photo)) {
            // dd($this->imgPath . $packagePhotos->photo_name);
            unlink($this->imgPath . $packagePhotos->photo);
        }
        PackagePhoto::where("id", $id)->delete();
        return back()->with("success","Image deleted successfully");
    }

    public function videoGalleryIndex($id) 
    {
        $packageVideos = PackageVideo::where("package_id", $id)->get();

        $package_id = $id;
        return view("admin.package.video", compact("packageVideos", "package_id"));
    }

    public function storeVideo(Request $request)
    {
        
        $request->validate([
            "video_url"=> "required",
        ]);
        $packageVideo = new PackageVideo;
        $packageVideo->package_id = $request->package_id;
        $packageVideo->video_link = $request->video_url;
        $packageVideo->save();

        return back()->with("success","Video added successfully");

    }

    public function deleteVideo($id){

        // dd($id);
        PackageVideo::where("id", $id)->delete();
        return back()->with("success","Video deleted successfully");
    }
}
