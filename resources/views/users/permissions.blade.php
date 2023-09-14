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
                        <form class="" action="{{ route('users.update', $profile->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-white text-2xl font-bold">Change {{ $profile->name }}'s Permissions</p>
                                <div class="flex items-center">
                                    <p class="text-white font-bolder mr-4">{{ session('message') }}</p>
                                    <input href="{{ route('users.update', $profile->id) }}" value="Update Permissions" type="submit" class="rounded-md hover:cursor-pointer inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest bg-[#1AB188] hover:bg-[#179b77] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-8">
                                <div class="col-span-1 bg-[#14151F] rounded-md">
                                    @foreach($permissions as $permission)
                                        <div class="flex items-center">
                                            @if($profile->hasDirectPermission($permission->name) || $profile->hasRole('admin'))
                                            <x-checkbox name="{{ str_replace(' ', '_', $permission->name) }}" id="{{ str_replace(' ', '_', $permission->name) }}" checked />
                                            @else
                                            <x-checkbox name="{{ str_replace(' ', '_', $permission->name) }}" id="{{ str_replace(' ', '_', $permission->name) }}" />
                                            @endif
                                            <label class="text-white ml-2">{{ ucwords($permission->name) }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
