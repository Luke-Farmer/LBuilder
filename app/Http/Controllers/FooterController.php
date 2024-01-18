<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('manage_footer')) {
            return redirect(route('dashboard'));
        }
        return view('footer.index')
            ->withFooter($footer = Footer::find(1));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Footer $footer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage_footer')) {
            return redirect(route('dashboard'));
        }
        $footer = Footer::where('id', $id)->first();
        $footer->content = $request->input('content');
        $footer->css = $request->input('css');
        $footer->js = $request->input('js');
        $footer->save();
        return redirect()
            ->back()
            ->with('message', 'Navigation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Footer $footer)
    {
        //
    }
}
