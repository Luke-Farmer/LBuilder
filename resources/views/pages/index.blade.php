<x-app-layout>
    <div class="grid grid-cols-12 gap-0">
        <div class="col-span-2">
            <x-sidebar />
        </div>
        <div class="col-span-10 bg-[#0C0D13]">
            @livewire('navigation-menu')
            <div class="p-8">
                <div class="grid grid-cols-1 gap-8 mb-8">
                    <div class="col-span-1 p-8 bg-[#14151F] rounded-md">
                        <form class="p-3 ps-0 mb-0" action="{{ route('pages.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <p class="text-white text-2xl font-bold mb-4">Create a New Page</p>
                            <div class="">
                                <div class="flex flex-col mb-4">
                                    <label class="text-white text-md">Title - <span class="text-xs">(Page Identifier)</span></label>
                                    <input class="rounded-md" type="text" label="title" name="title" value="">
                                </div>
                                <div class="flex flex-col">
                                    <label class="text-white text-md">URL - <span class="text-xs">(Don't include "/" at the start or end)</span></label>
                                    <input class="rounded-md" type="text" label="slug" name="slug" value="">
                                </div>
                            </div>
                            <input href="{{ route('pages.store') }}" value="Create" type="submit" class="rounded-md hover:cursor-pointer mt-4 inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest bg-[#1AB188] hover:bg-[#179b77] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        </form>
                    </div>
                </div>
                @if(!$pages->isEmpty())
                    <div class="grid grid-cols-1 gap-8">
                        <div class="col-span-1 p-8 bg-[#14151F] rounded-md">
                            <div>
                                <p class="text-white text-2xl font-bold mb-4">All Existing Pages</p>
                            </div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                                    <table class="min-w-full leading-normal">
                                        <thead>
                                        <tr>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-[#1AB188] text-left text-xs font-semibold text-white uppercase tracking-wider">Page Title</th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-[#1AB188] text-left text-xs font-semibold text-white uppercase tracking-wider">Url</th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-[#1AB188] text-left text-xs font-semibold text-white uppercase tracking-wider">Last Modified</th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-[#1AB188] text-left text-xs font-semibold text-white uppercase tracking-wider">Draft/Published</th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-[#1AB188]"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pages as $page)
                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex">
                                                        <div class="ml-3">
                                                            <p class="text-gray-900 whitespace-no-wrap">{{ $page->title }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{ $page->slug }}</p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{ $page->updated_at }}</p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    @if($page->is_draft == "1")
                                                        <span class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                                          <span aria-hidden class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                                          <span class="relative">Draft</span>
                                                        </span>
                                                    @elseif($page->is_draft == "0")
                                                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                          <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                          <span class="relative">Published</span>
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                                                    <a href="{{ route('pages.edit', $page->id) }}" class="rounded-md hover:cursor-pointer mt-4 inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest bg-[#1AB188] hover:bg-[#179b77] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
