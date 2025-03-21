<?php

namespace App\Http\Controllers;
use App\Models\PackageFaq;
use Illuminate\Http\Request;

class AdminPackageFaqController extends Controller
{
     public function index($id)
    {
        $package_faqs = PackageFaq::where("package_id", $id)->get();
        return view("admin.package.faq-index", ['package_faqs' => $package_faqs, 'package_id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view("admin.package.faq-create", ['package_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $package_faq = new PackageFaq();
        $package_faq->question = $request->question;
        $package_faq->answer = $request->answer;
        $package_faq->package_id = $request->package_id;
        $package_faq->save();
        return redirect()->route("package-faq.index", ['id' => $request->package_id])->with("success","Added successfully");
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
        $package_faq = PackageFaq::find($id);
        return view("admin.package.faq-edit", compact("package_faq"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            "question"=> "required",
            "answer"=> "required",
        ]);

        $package_faq = PackageFaq::find($id);
        $package_faq->question = $request->question;
        $package_faq->answer = $request->answer;
        $package_faq->save();
        return redirect()->route("package-faq.index" , ['id' => $package_faq->package_id])->with("success","Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package_faq = PackageFaq::find($id);
        $package_faq->delete();
        return redirect()->route("package-faq.index", ['id' => $package_faq->package_id])->with("success","Deleted successfully");
    }
}
