<x-app-layout>
    @livewire('navigation-menu')
    <div class="grid grid-cols-12 gap-0 bg-[#11212D]">
        <div class="col-span-2">
            <x-sidebar />
        </div>
        <div class="col-span-10 bg-[#0C0D13] rounded-tl-md">
            <div class="p-8">
                <div class="grid grid-cols-1 gap-8 mb-8">
                    <div class="col-span-1 p-8 bg-[#14151F] rounded-md">
                        <form class="" action="{{ route('pages.update', $page->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-white text-2xl font-bold">Edit Page</p>
                                <div class="flex items-center">
                                    <p class="text-white font-bolder mr-4">{{ session('message') }}</p>
                                    <input href="{{ route('pages.update', $page->id) }}" value="Save" type="submit" class="rounded-md hover:cursor-pointer inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest bg-[#1AB188] hover:bg-[#179b77] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                </div>
                            </div>
                            <div class="">
                                @if($page->slug === "/")
                                    <input type="hidden" class="rounded-md" type="text" label="title" name="title" value="/">
                                    <input type="hidden" class="rounded-md" type="text" label="slug" name="slug" value="Homepage">
                                @else
                                    <div class="flex flex-col mb-4">
                                        <label class="text-white text-md mb-1">Title - <span class="text-xs">(Page Identifier)</span></label>
                                        <input class="rounded-md text-white bg-[#282a36] border-0" type="text" label="title" name="title" value="{{ $page->title }}">
                                    </div>
                                    <div class="flex flex-col mb-4">
                                        <label class="text-white text-md mb-1">URL - <span class="text-xs">(Don't include "/" at the start or end)</span></label>
                                        <input class="rounded-md text-white bg-[#282a36] border-0" type="text" label="slug" name="slug" value="{{ $page->slug }}">
                                    </div>
                                @endif
                                <div class="flex flex-col mb-4">
                                    <label class="text-white text-md mb-1">SEO Title - <span class="text-xs">(Recommended 50 - 60 characters long)</span></label>
                                    <input class="rounded-md text-white bg-[#282a36] border-0" type="text" label="seo_title" name="seo_title" value="{{ $page->seo_title }}">
                                </div>
                                <div class="flex flex-col mb-4">
                                    <label class="text-white text-md mb-1">SEO Description - <span class="text-xs">(Recommended 150 - 160 characters long)</span></label>
                                    <input class="rounded-md text-white bg-[#282a36] border-0" type="text" label="seo_description" name="seo_description" value="{{ $page->seo_description }}">
                                </div>
                                <div class="flex flex-col mb-4">
                                    <label class="text-white text-md mb-1">SEO Image - <span class="text-xs">(Recommended dimensions of at least 1,200 x 630 pixels)</span></label>
                                    <input class="rounded-md text-white bg-[#282a36] border-0" type="text" label="seo_image" name="seo_image" value="{{ $page->seo_image }}">
                                </div>
                                <div class="flex flex-col mb-4">
                                    <label class="text-white text-md mb-1">Page Status - <span class="text-xs">(Published / Draft)</span></label>
                                    <select name="is_draft" class="rounded-md text-white bg-[#282a36] border-0">
                                        <option value="{{ $page->is_draft }}">
                                            @if($page->is_draft == 1)
                                                Draft
                                            @else
                                                Published
                                            @endif
                                        </option>
                                        @if($page->is_draft == 0)
                                            <option value="1">
                                                Draft
                                            </option>
                                        @else
                                            <option value="0">
                                                Published
                                            </option>
                                        @endif
                                    </select>
                                </div>
                                <div class="flex flex-col mb-4">
                                    <label class="text-white text-md mb-1">Main HTML content - <span class="text-xs">(Put page / element specific styles and scripts in the overrides.)</span></label>
                                    <textarea label="content" name="content" class="w-100" id="editor" style="min-height:800px;" label="body" type="text" name="body" spellcheck="false" >{{ $page->content }}</textarea>
                                </div>
                                <div class="flex flex-col mb-4">
                                    <label class="text-white text-md mb-1">CSS Overrides - <span class="text-xs">(Page / element specific styles.)</span></label>
                                    <textarea label="page_css" name="page_css" class="w-100" id="editor_css" style="min-height:800px;" label="body" type="text" name="body" spellcheck="false" >{{ $page->page_css }}</textarea>
                                </div>
                                <div class="flex flex-col">
                                    <label class="text-white text-md mb-1">JavaScript Overrides - <span class="text-xs">(Page / element specific scripts.)</span></label>
                                    <textarea label="page_js" name="page_js" class="w-100" id="editor_js" style="min-height:800px;" label="body" type="text" name="body" spellcheck="false" >{{ $page->page_js }}</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let editor = CodeMirror.fromTextArea
        (document.getElementById('editor'), {
            mode: "xml",
            theme: "dracula",
            lineNumbers: "true",
            lineWrapping: "true"
        });
        let editor_css = CodeMirror.fromTextArea
        (document.getElementById('editor_css'), {
            mode: "xml",
            theme: "dracula",
            lineNumbers: "true",
            lineWrapping: "true"
        });
        let editor_js = CodeMirror.fromTextArea
        (document.getElementById('editor_js'), {
            mode: "xml",
            theme: "dracula",
            lineNumbers: "true",
            lineWrapping: "true"
        });
    </script>
</x-app-layout>
