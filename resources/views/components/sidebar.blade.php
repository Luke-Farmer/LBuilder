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
        <x-sidebar-dropdown align="right" width="60" :links="[['pages.index', 'Create / Edit Page', 'pencil-fill'], ['pages.deleted', 'Deleted Pages', 'trash-fill']]">
            <x-slot name="trigger">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:[#1AB188] text-white" id="toggleComponents" onclick="dropdown()">
                    <i class="bi bi-file-earmark-fill"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Pages</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
            </x-slot>
        </x-sidebar-dropdown>
        <x-sidebar-dropdown align="right" width="60" :links="[['components.index', 'Create / Edit Component', 'pencil-fill'], ['components.deleted', 'Deleted Components', 'trash-fill']]">
            <x-slot name="trigger">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:[#1AB188] text-white" id="toggleComponents" onclick="dropdown()">
                    <i class="bi bi-box-fill"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Components</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
            </x-slot>
        </x-sidebar-dropdown>
        <x-sidebar-dropdown align="right" width="60" :links="[['media.index', 'Images', 'images']]">
            <x-slot name="trigger">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:[#1AB188] text-white" id="toggleComponents" onclick="dropdown()">
                    <i class="bi bi-collection-fill"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Media</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
            </x-slot>
        </x-sidebar-dropdown>
        <x-sidebar-dropdown align="right" width="60">
            <x-slot name="trigger">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:[#1AB188] text-white" id="toggleComponents" onclick="dropdown()">
                    <i class="bi bi-basket2-fill"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">eCommerce</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
            </x-slot>
        </x-sidebar-dropdown>
        <x-sidebar-dropdown align="right" width="60">
            <x-slot name="trigger">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:[#1AB188] text-white" id="toggleComponents" onclick="dropdown()">
                    <i class="bi bi-gear-fill"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Settings</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
            </x-slot>
        </x-sidebar-dropdown>
        <x-responsive-nav-link href="{{ route('logout') }}" :active="false" >
            <i class="bi bi-box-arrow-in-right"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
        </x-responsive-nav-link>
    </div>

{{--    <script type="text/javascript">--}}
{{--        function dropdown() {--}}
{{--            document.querySelector(".submenu").classList.toggle("hidden");--}}
{{--            document.querySelector("#arrow").classList.toggle("rotate-0");--}}
{{--            document.querySelector("#arrow").classList.toggle("rotate-180");--}}
{{--        }--}}
{{--        dropdown();--}}

{{--        function openSidebar() {--}}
{{--            document.querySelector(".sidebar").classList.toggle("hidden");--}}
{{--        }--}}

{{--        window.onload = function() {--}}
{{--            document.querySelector(".active").closest("#submenu").classList.toggle("hidden");--}}
{{--        }--}}
{{--    </script>--}}
