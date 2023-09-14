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
                        <p class="text-white text-2xl font-bold mb-4">Change User Settings</p>
                        <div class="grid grid-cols-1 gap-8">
                            <div class="col-span-1 bg-[#14151F] rounded-md">
                                <div class="overflow-x-auto">
                                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                                        <table class="min-w-full leading-normal">
                                            <thead>
                                            <tr>
                                                <th class="px-5 py-3 bg-[#1AB188] text-left text-xs font-semibold text-white uppercase tracking-wider">Name</th>
                                                <th class="px-5 py-3 bg-[#1AB188] text-left text-xs font-semibold text-white uppercase tracking-wider">Email</th>
                                                <th class="px-5 py-3 bg-[#1AB188] text-left text-xs font-semibold text-white uppercase tracking-wider">Created At</th>
                                                <th class="px-5 py-3 bg-[#1AB188]"> </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td class="px-5 py-5 bg-[#282a36] border-0 text-sm">
                                                            <p class="text-white whitespace-no-wrap">{{ $user->name }}</p>
                                                        </td>
                                                        <td class="px-5 py-5 bg-[#282a36] border-0 text-sm">
                                                            <p class="text-white whitespace-no-wrap">{{ $user->email }}</p>
                                                        </td>
                                                        <td class="px-5 py-5 bg-[#282a36] border-0 text-sm">
                                                            <p class="text-white whitespace-no-wrap">{{ $user->created_at }}</p>
                                                        </td>
                                                        <td class="px-5 py-5 bg-[#282a36] border-0 text-sm text-right flex justify-end items-center">
                                                            <a href="{{ route('users.edit', $user->id) }}" class="rounded-md hover:cursor-pointer inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest bg-[#1AB188] hover:bg-[#179b77] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit Permissions</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-8">
                        <div class="col-span-1 bg-[#14151F] rounded-md flex flex-col justify-between relative">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
