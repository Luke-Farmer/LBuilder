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
                        <form class="" action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <p class="text-white text-2xl font-bold mb-4">Upload New Image</p>
                            <div class="">
                                <div class="flex flex-col mb-4">
                                    <label class="text-white text-md">File - <span class="text-xs">(info to go here)</span></label>
                                    <input class="rounded-md text-white bg-[#282a36] border-0 block w-full cursor-pointer" type="file" label="file" name="file" value="">
                                </div>
                            </div>
                            <div class="flex items-center mt-4">
                                <input href="{{ route('media.store') }}" value="upload" type="submit" class="rounded-md hover:cursor-pointer inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest bg-[#1AB188] hover:bg-[#179b77] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <p class="text-white font-bolder ml-4">{{ session('message') }}</p>
                            </div>
                        </form>
                    </div>
                </div>
                @if(!$medias->isEmpty())
                    <div class="grid grid-cols-6 gap-8">
                        @foreach($medias as $media)
                            <div class="col-span-1 bg-[#14151F] rounded-md flex flex-col justify-between">
                                <img class="p-8 h-full object-cover" src="{{ $media->getUrl() }}" />
                                <div class="relative">
                                    <input class="bg-[#282a36] rounded-b-md p-2 text-white w-full pr-12 border-0 focus:border-0 focus:ring-0" readonly type="text" value="{{ str_replace(config('app.url'), '', $media->getUrl()) }}" id="{{ $media->id }}">
                                    <button class="absolute bottom-0 right-0 py-2 px-3" onclick="copyText({{ $media->id }})"><i class="bi bi-clipboard-fill text-[#1AB188]"></i></button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        function copyText(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices
            navigator.clipboard.writeText(copyText.value);
        }
    </script>
</x-app-layout>
