<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view("admin.faq.index", compact("faqs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.faq.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=> "required",
            "description"=> "required",
        ]);

        Faq::create($request->all());

        return redirect()->route("faq.index")->with("success","Added successfully");
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
        $faq = Faq::find($id);
        return view("admin.faq.edit", compact("faq"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title"=> "required",
            "description"=> "required",
        ]);
        Faq::find($id)->update($request->all());
        return redirect()->route("faq.index")->with("success","Successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Faq::find($id)->delete();
        return redirect()->route("faq.index")->with("success","Successfully deleted");
    }
}
