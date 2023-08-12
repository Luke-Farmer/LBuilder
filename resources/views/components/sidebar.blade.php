{{--    <span--}}
{{--        class="absolute text-white text-4xl top-5 left-4 cursor-pointer"--}}
{{--        onclick="openSidebar()"--}}
{{--    >--}}
{{--      <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>--}}
{{--    </span>--}}
    <div class="sidebar top-0 bottom-0 lg:left-0 p-2 overflow-y-auto text-center min-h-screen" style="background: #11212d; height: 100%; padding-top: 0;">
        <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" >
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Dashboard</span>
        </x-responsive-nav-link>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:[#1AB188] text-white" onclick="dropdown()">
            <i class="bi bi-file-code-fill"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Pages</span>
                <span class="text-sm rotate-180" id="arrow">
            <i class="bi bi-chevron-down"></i>
          </span>
            </div>
        </div>
        <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu">
            <x-responsive-nav-link href="{{ route('pages.index') }}" :active="request()->routeIs('pages.index')" >
                <i class="bi bi-pencil-fill"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Create / Edit Page</span>
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('pages.deleted') }}" :active="request()->routeIs('pages.deleted')" >
                <i class="bi bi-trash-fill"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Deleted Pages</span>
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('pages.index') }}" :active="request()->routeIs('pages.unset')" >
                <i class="bi bi-stack"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Page Templates</span>
            </x-responsive-nav-link>
        </div>
        <x-responsive-nav-link href="{{ route('logout') }}" >
            <i class="bi bi-box-arrow-in-right"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
        </x-responsive-nav-link>
    </div>

    <script type="text/javascript">
        function dropdown() {
            document.querySelector("#submenu").classList.toggle("hidden");
            document.querySelector("#arrow").classList.toggle("rotate-0");
            document.querySelector("#arrow").classList.toggle("rotate-180");
        }
        dropdown();

        function openSidebar() {
            document.querySelector(".sidebar").classList.toggle("hidden");
        }

        window.onload = function() {
            document.querySelector(".active").closest("#submenu").classList.toggle("hidden");
        }
    </script>
