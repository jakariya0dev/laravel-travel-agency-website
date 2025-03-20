<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use League\CommonMark\Extension\DescriptionList\Node\Description;
use Str;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = TourPackage::all();
        return view("admin.package.index", compact("packages"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destinations = Destination::all();
        return view("admin.package.create", compact("destinations"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $package = new TourPackage();

        $request->validate([
            'title'           => 'required|string|max:255',
            'description'     => 'required|string',
            'destination_id'  => 'required|integer|exists:destinations,id',
            'price'           => 'required|numeric|min:0',
            'original_price'  => 'nullable|numeric|min:0',
            'map_link'        => 'nullable|url',
            'featured_photo'  => 'required|image|mimes:jpg,jpeg,png,gif|max:4040',
        ]);

        if ($request->hasFile('featured_photo')) {

            $imgPath = public_path('uploads/admin/package/');
            $image = $request->file('featured_photo');
            $imgName = time().'.'.strtolower($image->getClientOriginalExtension());
            $image->move($imgPath, $imgName);

            $package->featured_photo = $imgName;
        }

        $package->title = $request->title;
        $package->slug = Str::slug($request->title);
        $package->description = $request->description;
        $package->destination_id = $request->destination_id;
        $package->price = $request->price;
        $package->original_price = $request->original_price;
        $package->map_link = $request->map_link;

        // dd($package);
        $package->save();

        return redirect()->route('package.index')->with('success','Successfully Updated');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = TourPackage::find($id);
        $destinations = Destination::all();
        return view("admin.package.edit", compact("package", "destinations"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $package = TourPackage::find($id);

        $request->validate([
            'title'           => 'required|string|max:255',
            'description'     => 'required|string',
            'destination_id'  => 'required|integer|exists:destinations,id',
            'price'           => 'required|numeric|min:0',
            'original_price'  => 'nullable|numeric|min:0',
            'map_link'        => 'nullable|url',
            'featured_photo'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4040',
        ]);

        if ($request->hasFile('featured_photo')) {

            $imgPath = public_path('uploads/admin/package/');
            $image = $request->file('featured_photo');
            $imgName = time().'.'.strtolower($image->getClientOriginalExtension());
            $image->move($imgPath, $imgName);

            if(file_exists($imgPath.$package->featured_photo)) {
                unlink($imgPath.$package->featured_photo);
            }

            $package->featured_photo = $imgName;
        }

        $package->title = $request->title;
        $package->slug = Str::slug($request->title);
        $package->description = $request->description;
        $package->destination_id = $request->destination_id;
        $package->price = $request->price;
        $package->original_price = $request->original_price;
        $package->map_link = $request->map_link;

        // dd($package);
        $package->update();

        return redirect()->route('package.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imgPath = public_path('uploads/admin/package/');
        
        $package = TourPackage::find($id);

        if(file_exists($imgPath.$package->featured_photo)) {
            unlink($imgPath.$package->featured_photo);
        }

        $package->delete();

        return back()->with('success','Successfully Deleted');

    }
}
