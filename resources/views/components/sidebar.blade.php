{{--    <span--}}
{{--        class="absolute text-white text-4xl top-5 left-4 cursor-pointer"--}}
{{--        onclick="openSidebar()"--}}
{{--    >--}}
{{--      <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>--}}
{{--    </span>--}}
    <div
        class="sidebar top-0 bottom-0 lg:left-0 p-2 overflow-y-auto text-center min-h-screen"
        style="background: #11212d; height: 100%; padding-top: 0;"
    >
        <div class="flex items-center">
            <x-authentication-card-logo class="w-16 h-16" />
            <h1 class="font-bold text-gray-200 text-[1.25rem] ml-3">LBuilder</h1>
            <i
                class="bi bi-x cursor-pointer ml-28 lg:hidden"
                onclick="openSidebar()"
            ></i>
        </div>
        <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" >
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Dashboard</span>
        </x-responsive-nav-link>
        <x-responsive-nav-link href="{{ route('pages.index') }}" :active="request()->routeIs('pages.index')" >
            <i class="bi bi-file-code-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Pages</span>
        </x-responsive-nav-link>
        <div
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:[#1AB188] text-white"
            onclick="dropdown()"
        >
            <i class="bi bi-chat-left-text-fill"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Chatbox</span>
                <span class="text-sm rotate-180" id="arrow">
            <i class="bi bi-chevron-down"></i>
          </span>
            </div>
        </div>
        <div
            class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold"
            id="submenu"
        >
            <h1 class="cursor-pointer p-2 hover:bg-[#1AB188] rounded-md mt-1">
                Social
            </h1>
            <h1 class="cursor-pointer p-2 hover:bg-[#1AB188] rounded-md mt-1">
                Personal
            </h1>
            <h1 class="cursor-pointer p-2 hover:bg-[#1AB188] rounded-md mt-1">
                Friends
            </h1>
        </div>
        <div
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:[#1AB188] text-white"
        >
            <i class="bi bi-box-arrow-in-right"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
        </div>
    </div>

    <script type="text/javascript">
        function dropdown() {
            document.querySelector("#submenu").classList.toggle("hidden");
            document.querySelector("#arrow").classList.toggle("rotate-0");
        }
        dropdown();

        function openSidebar() {
            document.querySelector(".sidebar").classList.toggle("hidden");
        }
    </script>
