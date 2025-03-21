<?php

namespace App\Http\Controllers;

use App\Models\PackageExclude;
use App\Models\PackageInclude;
use Illuminate\Http\Request;

class AdminPackageServiceController extends Controller
{
    public function packageIncludeIndex($id) 
    {
        $package_includes = PackageInclude::where("package_id", $id)->get();
        $package_id = $id;
        return view("admin.package.include", compact("package_includes", "package_id"));
    }


    public function packageIncludeStore(Request $request)
    {
        
        $request->validate([
            "title"=> "required|string",
        ]);

        $package_include = new PackageInclude();
        $package_include->package_id = $request->package_id;
        $package_include->title = $request->title;
        $package_include->save();

        return back()->with("success","Added successfully");

    }


    public function packageIncludeDelete($id){

        // dd($id);
        PackageInclude::where("id", $id)->delete();
        return back()->with("success","Deleted successfully");
    }

    
    public function packageExcludeIndex($id) 
    {
        $package_includes = PackageInclude::where("package_id", $id)->get();
        $package_id = $id;
        return view("admin.package.include", compact("package_includes", "package_id"));
    }

    public function packageExcludeStore(Request $request)
    {
        
        $request->validate([
            "title"=> "required|string",
        ]);

        $package_exclude = new PackageInclude();
        $package_exclude->package_id = $request->package_id;
        $package_exclude->title = $request->title;
        $package_exclude->save();

        return back()->with("success","Added successfully");

    }

    public function packageExcludeDelete($id){

        // dd($id);
        PackageExclude::where("id", $id)->delete();
        return back()->with("success","Deleted successfully");
    }


    //     public function packageIncludeIndex($id) 
    // {
    //     $package_includes = PackageInclude::where("package_id", $id)->get();
    //     $package_id = $id;
    //     return view("admin.package.include", compact("package_includes", "package_id"));
    // }


    // public function packageIncludeStore(Request $request)
    // {
        
    //     $request->validate([
    //         "title"=> "required|string",
    //     ]);

    //     $package_include = new PackageInclude();
    //     $package_include->package_id = $request->package_id;
    //     $package_include->title = $request->title;
    //     $package_include->save();

    //     return back()->with("success","Added successfully");

    // }


    // public function packageIncludeDelete($id){

    //     // dd($id);
    //     PackageInclude::where("id", $id)->delete();
    //     return back()->with("success","Deleted successfully");
    // }
}
