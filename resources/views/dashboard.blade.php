<x-app-layout>
   <div class="grid grid-cols-12 gap-0">
       <div class="col-span-2">
           <x-sidebar />
       </div>
       <div class="col-span-10 bg-[#0C0D13]">
           @livewire('navigation-menu')
           <div class="p-8">
               <div class="grid grid-cols-3 gap-8">
                   <div class="col-span-1 p-8 bg-[#14151F] rounded-md">
                       <p class="text-white text-2xl font-bold"><i class="bi bi-cup-hot-fill text-[#1AB188]"></i> Welcome Back, {{ Auth::user()->name }}!</p>
                       <p class="text-white text-md mt-4">Full Name: {{ Auth::user()->name }}</p>
                       <p class="text-white text-md">Email Address: {{ Auth::user()->email }}</p>
                       <a href="" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest bg-[#1AB188] hover:bg-[#179b77] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit Profile</a>
                   </div>
                   <div class="col-span-2 p-8 bg-[#14151F] rounded-md">
                       <p class="text-white text-2xl font-bold">Statistics Card</p>
                       <p class="text-white text-md mt-4"><strong>Total 43.8% Growth</strong> This Month</p>
                       <div class="grid grid-cols-4 mt-6">
                           <div class="col-span-1">
                               <div class="flex items-center">
                                   <span class="bg-[#1AB188] w-[64px] h-[64px] flex items-center justify-center rounded-md mr-4">
                                       <i class="bi bi-graph-up-arrow text-2xl font-bold text-white"></i>
                                   </span>
                                   <div class="flex flex-col">
                                       <p class="text-white">Sales</p>
                                       <p class="text-2xl text-white">254K</p>
                                   </div>
                               </div>
                           </div>
                           <div class="col-span-1">
                               <div class="flex items-center">
                                   <span class="bg-[#1AB188] w-[64px] h-[64px] flex items-center justify-center rounded-md mr-4">
                                       <i class="bi bi-graph-up-arrow text-2xl font-bold text-white"></i>
                                   </span>
                                   <div class="flex flex-col">
                                       <p class="text-white">Sales</p>
                                       <p class="text-2xl text-white">254K</p>
                                   </div>
                               </div>
                           </div>
                           <div class="col-span-1">
                               <div class="flex items-center">
                                   <span class="bg-[#1AB188] w-[64px] h-[64px] flex items-center justify-center rounded-md mr-4">
                                       <i class="bi bi-graph-up-arrow text-2xl font-bold text-white"></i>
                                   </span>
                                   <div class="flex flex-col">
                                       <p class="text-white">Sales</p>
                                       <p class="text-2xl text-white">254K</p>
                                   </div>
                               </div>
                           </div>
                           <div class="col-span-1">
                               <div class="flex items-center">
                                   <span class="bg-[#1AB188] w-[64px] h-[64px] flex items-center justify-center rounded-md mr-4">
                                       <i class="bi bi-graph-up-arrow text-2xl font-bold text-white"></i>
                                   </span>
                                   <div class="flex flex-col">
                                       <p class="text-white">Sales</p>
                                       <p class="text-2xl text-white">254K</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </div>
</x-app-layout>
