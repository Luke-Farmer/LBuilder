<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Navigation;
use App\Models\Page;
use Illuminate\Http\Request;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('create_edit_pages')) {
            return redirect(route('dashboard'));
        }
        return view('pages.index')
            ->withPages($pages = Page::orderBy('title')->get());
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
    public function store(Request $request): RedirectResponse
    {
        if (! Gate::allows('create_edit_pages')) {
            return redirect(route('dashboard'));
        }
        $page = new Page;
        $validator =  Validator::make($request->all(), [
            'slug' => 'required|min:1|max:255|unique:pages,slug'
        ]);
        if ($validator->fails() || is_null($request->title)) {
            return redirect()
                ->back()
                ->with('message', 'Page Title and URL must be valid.');
        }
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->save();
        return redirect()
            ->route('pages.edit', $page->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($page)
    {
        $pageData = Page::where('slug', '=', $page)->first();
        $navigation = Navigation::where('id', '1')->first();
        $footer = Footer::where('id', '1')->first();
        if (!isset($pageData)){
            return redirect()->to('/');
        } elseif($pageData->is_draft == '1' && !Auth::check() || $pageData->is_deleted == '1') {
            return redirect()->to('/');
        }
        return view('pages.template')
            ->withPage($pageData)
            ->withNavigation($navigation)
            ->withFooter($footer);
    }

    public function home()
    {
        $pageData = Page::where('slug', '=', '/')->first();
        $navigation = Navigation::where('id', '1')->first();
        $footer = Footer::where('id', '1')->first();
        if(is_null($pageData) || $pageData->is_draft === "1" && !Auth::check() || $pageData->is_deleted === "1" ) {
            return redirect()
                ->route('dashboard');
        }
        return view('pages.template')
            ->withPage($pageData)
            ->withNavigation($navigation)
            ->withFooter($footer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (! Gate::allows('create_edit_pages')) {
            return redirect(route('dashboard'));
        }
        return view('pages.edit')
            ->withPage($page = Page::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('create_edit_pages')) {
            return redirect(route('dashboard'));
        }
        $page = Page::find($id);
        $validator =  Validator::make($request->all(), [
            'slug' => 'required|alpha_dash|min:1|max:255|unique:pages,slug'
        ]);
        if ($request->input('slug') !== $page->slug && $validator->fails() || is_null($request->title)) {
            return redirect()
                ->back()
                ->with('message', 'Page Title and URL must be valid.');
        }
        if ($page->slug !== '/') {
            $page->title = $request->input('title');
                    $page->slug = $request->input('slug');
        }
        $page->seo_title = $request->input('seo_title');
        $page->seo_description = $request->input('seo_description');
        $page->seo_image = $request->input('seo_image');
        $page->is_draft = $request->input('is_draft');
        $page->content = $request->input('content');
        $page->page_css = $request->input('page_css');
        $page->page_js = $request->input('page_js');
        $page->save();
        return redirect()
            ->back()
            ->with('message', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (! Gate::allows('delete_pages')) {
            return redirect()->back();
        }
        $page = Page::find($id);
        if ($page->is_deleted === '1') {
            if (! Gate::allows('wipe_pages')) {
                return redirect()->back();
            }
            $page->delete();
        } else {
           $page->is_draft = '1';
           $page->is_deleted = '1';
           $page->save();
        }
        return redirect()
            ->back()
            ->with('message', 'Page deleted successfully.');
    }

    public function deleted()
    {
        return view('pages.deleted')
            ->withPages($pages = Page::all());
    }

    public function restore($id) {
        $page = Page::find($id);
        $page->is_deleted = '0';
        $page->save();
        return redirect()
            ->back();
    }

    public function dashboard() {
        return view('dashboard');
    }
}
