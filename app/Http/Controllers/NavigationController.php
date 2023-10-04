<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('manage_navigation')) {
            return redirect(route('dashboard'));
        }
        return view('navigation.index')
            ->withNavigation($navigation = Navigation::find(1));
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
    public function show(Navigation $navigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage_navigation')) {
            return redirect(route('dashboard'));
        }
        $navigation = Navigation::where('id', $id)->first();
        $navigation->content = $request->input('content');
        $navigation->css = $request->input('css');
        $navigation->js = $request->input('js');
        $navigation->save();
        return redirect()
            ->back()
            ->with('message', 'Navigation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Navigation $navigation)
    {
        //
    }
}
