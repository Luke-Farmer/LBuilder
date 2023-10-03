<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('create_edit_components')) {
            return redirect(route('dashboard'));
        }
        $components = Component::orderBy('title')->get();
        return view('components.index')
            ->withComponents($components);
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
    public function store(Request $request) : RedirectResponse
    {
        if (! Gate::allows('create_edit_components')) {
            return redirect(route('dashboard'));
        }
        $component = new Component;
        $validator =  Validator::make($request->all(), [
            'title' => 'required|min:1|max:255|unique:components,title'
        ]);
        if ($validator->fails() || is_null($request->title)) {
            return redirect()
                ->back()
                ->with('message', 'Component Title must be valid.');
        }
        $component->title = $request->title;
        $component->save();
        return redirect()
            ->route('components.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Component $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (! Gate::allows('create_edit_components')) {
            return redirect(route('dashboard'));
        }
        return view('components.edit')
            ->withComponentData($component = Component::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('create_edit_components')) {
            return redirect(route('dashboard'));
        }
        $component = Component::find($id);
        $validator =  Validator::make($request->all(), [
            'title' => 'required|alpha_dash|min:1|max:255|unique:components,title'
        ]);
        if ($request->input('title') !== $component->title && $validator->fails() || is_null($request->title)) {
            return redirect()
                ->back()
                ->with('message', 'Component Title must be valid.');
        }
        $component->title = $request->input('title');
        $component->content = $request->input('content');
        $component->css = $request->input('css');
        $component->js = $request->input('js');
        $component->save();
        return redirect()
            ->back()
            ->with('message', 'Component updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (! Gate::allows('delete_components')) {
            return redirect(route('dashboard'));
        }
        $component = Component::find($id);
        if ($component->is_deleted === '1') {
            if (! Gate::allows('wipe_components')) {
                return redirect(route('dashboard'));
            }
            $component->delete();
        } else {
            $component->is_deleted = '1';
            $component->save();
        }
        return redirect()
            ->back()
            ->with('message', 'Component deleted successfully.');
    }

    public function deleted()
    {
        return view('components.deleted')
            ->withComponentData($componentData = Component::all());
    }

    public function restore($id) {
        $component = Component::find($id);
        $component->is_deleted = '0';
        $component->save();
        return redirect()
            ->back();
    }
}
