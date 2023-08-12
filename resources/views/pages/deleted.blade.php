<x-app-layout>
    @livewire('navigation-menu')
    <div class="grid grid-cols-12 gap-0 bg-[#11212D]">
        <div class="col-span-2">
            <x-sidebar />
        </div>
        <div class="col-span-10 bg-[#0C0D13] rounded-tl-md">
            <div class="">
                <div class="p-8">
                    @if(!$pages->isEmpty())
                        <div class="grid grid-cols-1 gap-8">
                            <div class="col-span-1 p-8 bg-[#14151F] rounded-md">
                                <div>
                                    <p class="text-white text-2xl font-bold mb-4">All Deleted Pages</p>
                                </div>
                                <div class="overflow-x-auto">
                                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                                        <table class="min-w-full leading-normal">
                                            <thead>
                                            <tr>
                                                <th class="px-5 py-3 bg-[#1AB188] text-left text-xs font-semibold text-white uppercase tracking-wider">Page Title</th>
                                                <th class="px-5 py-3 bg-[#1AB188] text-left text-xs font-semibold text-white uppercase tracking-wider">Url</th>
                                                <th class="px-5 py-3 bg-[#1AB188] text-left text-xs font-semibold text-white uppercase tracking-wider">Deleted At</th>
                                                <th class="px-5 py-3 bg-[#1AB188]"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($pages as $page)
                                                @if($page->is_deleted === "1")
                                                    <tr>
                                                        <td class="px-5 py-5 bg-[#282a36] text-sm">
                                                            <div class="flex">
                                                                <div class="">
                                                                    <p class="text-white whitespace-no-wrap">{{ $page->title }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-5 py-5 bg-[#282a36] text-sm">
                                                            <p class="text-white whitespace-no-wrap">{{ $page->slug }}</p>
                                                        </td>
                                                        <td class="px-5 py-5 bg-[#282a36] text-sm">
                                                            <p class="text-white whitespace-no-wrap">{{ $page->updated_at }}</p>
                                                        </td>
                                                        <td class="px-5 py-5 bg-[#282a36] text-sm text-right flex justify-end items-center">
                                                            <form class="" action="{{ route('pages.restore', $page->id) }}" method="POST">
                                                                @method('POST')
                                                                @csrf
                                                                <input class="rounded-md hover:cursor-pointer inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest bg-[#1AB188] hover:bg-[#179b77] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" value="Restore" type="submit" onclick="clicked()">
                                                            </form>
                                                            <form class="ml-4" action="{{ route('pages.destroy', $page->id) }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <input class="rounded-md hover:cursor-pointer inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest bg-[#1AB188] hover:bg-[#179b77] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" value="Permanently Delete" type="submit" onclick="clicked()">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
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
    </div>
</x-app-layout>
