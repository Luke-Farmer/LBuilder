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
                        <form class="" action="{{ route('navigation.update', '1') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-white text-2xl font-bold">Edit Navigation</p>
                                <div class="flex items-center">
                                    <p class="text-white font-bolder mr-4">{{ session('message') }}</p>
                                    <input href="{{ route('navigation.update', '1') }}" value="Save" type="submit" class="rounded-md hover:cursor-pointer inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest bg-[#1AB188] hover:bg-[#179b77] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                </div>
                            </div>
                            <div class="">
                                <div class="flex flex-col mb-4">
                                    <label class="text-white text-md mb-1">Main HTML content - <span class="text-xs">(Put specific styles and scripts in the overrides.)</span></label>
                                    <textarea label="content" name="content" class="w-100" id="editor" style="min-height:800px;" label="body" type="text" name="body" spellcheck="false" >{{ $navigation->content }}</textarea>
                                </div>
                                <div class="flex flex-col mb-4">
                                    <label class="text-white text-md mb-1">CSS Overrides - <span class="text-xs">(Navigation specific styles.)</span></label>
                                    <textarea label="page_css" name="css" class="w-100" id="editor_css" style="min-height:800px;" label="body" type="text" name="body" spellcheck="false" >{{ $navigation->css }}</textarea>
                                </div>
                                <div class="flex flex-col">
                                    <label class="text-white text-md mb-1">JavaScript Overrides - <span class="text-xs">(Navigation specific scripts.)</span></label>
                                    <textarea label="page_js" name="js" class="w-100" id="editor_js" style="min-height:800px;" label="body" type="text" name="body" spellcheck="false" >{{ $navigation->js }}</textarea>
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
