<header class="flex flex-col shadow-md bg-gradient-to-b from-green-700 to-green-500">

    
    
    <nav class="py-3 border-0">
        <div class="max-w-8xl mx-auto px-2 sm:px-8 lg:px-4">
            <div class="flex items-center justify-between h-16">

                <!-- Logo -->
                <div class="flex flex-shrink-0">
                    <!-- logo //-->
                    <div class="flex flex-row px-2 md:px-4 py-2">
                        <img src="{{ asset('images/logo.png')}}" />
                    </div>
                    <!-- end of logo //-->
                    <!-- Name //-->
                    <div class="flex flex-col item-center justify-center">
                            <div class="text-white font-bold text-2xl font-serif">O-ORBDA</div>
                            <div class="text-white font-semibold font-serif opacity-70">Assets Management System (AMS)</div>
                                
                    </div>
                    <!-- end of name //-->
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden px-4">
                    <button class="text-white focus:outline-none" id="mobile-menu-button">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <!-- Main Menu -->
                <div class="hidden lg:flex space-x-2 border-0">
                    @auth
                        @if (Auth::user()->role==='staff')

                            <a href="{{ route('staff.dashboard.index') }}" class="flex font-semibold items-center text-white 
                                                                                  hover:border-b-yellow-100 hover:border-b-4 mx-2 
                                                                                  hover:bg-green-600 px-2 hover:rounded-t">Dashboard</a>

                            <div class="relative group flex item-center border-0">
                                <button class="text-white px-1 py-2 rounded-md font-semibold hover:bg-green-600 px-2 hover:rounded-t">
                                    Assets
                                </button>
                                <!-- Sub-menu -->
                                <div class="absolute hidden group-hover:block bg-white text-gray-800 mt-0 top-14 py-2 shadow-lg w-[300%]">
                                    <a href="{{ route('staff.assets.index') }} " class="flex flex-row px-4 py-2 hover:bg-gray-200 
                                                                                            hover:border-l-yellow-500 hover:border-l-4 pr-8 
                                                                                            border-b border-gray-300">Manage Assets</a>
                                    <a href="{{ route('staff.assets.create') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200 
                                                                                            hover:border-l-yellow-500 hover:border-l-4 
                                                                                            border-b border-gray-300 ">New Asset</a>
                                   
                                </div>
                            </div>

                           
                            <div class="relative group flex item-center border-0">
                                <button class="text-white px-1 py-2 rounded-md font-semibold hover:bg-green-600 px-2 hover:rounded-t">
                                    Maintenance
                                </button>
                                <!-- Sub-menu -->
                                <div class="absolute hidden group-hover:block bg-white text-gray-800 mt-0 top-14 py-2 shadow-lg w-[200%]">
                                    <a href="{{ route('staff.maintenance.maintenance_schedules.index') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200 
                                                                                            hover:border-l-yellow-500 hover:border-l-4 pr-8 
                                                                                            border-b border-gray-300">Maintenance Schedule</a>
                                    <a href="{{ route('staff.maintenance.workorders.index') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200 
                                                                                            hover:border-l-yellow-500 hover:border-l-4 
                                                                                            border-b border-gray-300">Work Order</a>
                                    <a href="{{ route('staff.maintenance.service_providers.index') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200 hover:border-l-yellow-500 hover:border-l-4 
                                                                                            border-b border-gray-300">Service Providers</a>
                                    <a href="{{ route('staff.maintenance.history') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200  hover:border-l-yellow-500 hover:border-l-4 pr-8">Maintenance History</a>
  
                                </div>
                            </div>


                            <div class="relative group flex item-center border-0">
                                <button class="text-white px-1 py-2 rounded-md font-semibold hover:bg-green-600 px-2 hover:rounded-t">
                                    Procurement
                                </button>
                                <!-- Sub-menu -->
                                <div class="absolute hidden group-hover:block bg-white text-gray-800 mt-0 top-14 py-2 shadow-lg w-[180%]">
                                    <a href="{{ route('staff.procurements.purchase_requests.index') }}" class="flex flex-row px-4 py-2 
                                                                                            hover:bg-gray-200 hover:border-l-yellow-500 hover:border-l-4 pr-8 
                                                                                            border-b border-gray-300">Purchase Requests</a>
                                    <a href="{{ route('staff.procurements.vendors.index') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200  
                                                                                            hover:border-l-yellow-500 hover:border-l-4 
                                                                                            border-b border-gray-300">Vendors</a>
                                    <a href="{{ route('staff.procurements.purchase_requests.index') }} " class="flex flex-row px-4 py-2 
                                                                                          hover:bg-gray-200  hover:border-l-yellow-500 hover:border-l-4 pr-8">Procurement History</a>
                                </div>
                            </div>


                           

                            
                            <div class="relative group flex item-center border-0">
                                <button class="text-white px-6 py-2 rounded-md font-semibold flex items-center">
                                    @if (Auth::user()->profile->avatar != null || Auth::user()->profile->avatar != '')
                                        <img class='w-10 h-11 rounded-full' src="{{ asset('storage/'.Auth::user()->profile->avatar )}}" alt="User Avatar" />
                                    @else
                                        <img class='w-12 h-11 rounded-full' src="{{ asset('images/avatar_64.jpg') }}" alt="Default Avatar" />
                                    @endif
                                    
                                </button>
                            
                                <!-- Dropdown Menu -->
                                <div class="absolute right-0 hidden group-hover:block top-12 bg-white text-gray-800 mt-2 py-2 shadow-lg z-10">
                                    <a href="{{ route('staff.profile.myprofile') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200 hover:border-l-yellow-500 hover:border-l-4 pr-8">Profile</a>
                                    <form action="{{ route('staff.auth.logout') }}" method="POST" class="flex flex-row w-full border-0 border-blue-900">
                                        @csrf
                                        <button type="submit" class="flex flex-row border-0 w-full text-left px-1 py-2 text-md text-gray-700
                                                                  hover:bg-gray-200 hover:border-l-yellow-500 hover:border-l-4 pl-4 ">Log Out</button>
                                    </form>

                                </div>
                            </div>



                        @endif
                    @endauth     
                </div>
                
            </div>


            
            <!-- Mobile Menu -->
            <div class="lg:hidden hidden" id="mobile-menu">
                <a href="{{ route('staff.dashboard.index') }}" class="block text-white px-4 py-2 hover:bg-gray-700 rounded-md">Dashboard</a>
                <div class="relative">
                    <button class="block w-full text-left text-white px-4 py-2 hover:bg-gray-700 rounded-md focus:outline-none" id="assets-mobile">
                        Assets
                    </button>
                    <!-- Sub-menu for Mobile -->
                    <div class="hidden bg-slate-50 rounded-md" id="assets-sub-menu-mobile">
                        <a href="{{ route('staff.assets.index') }}" class="block px-4 py-2 hover:bg-gray-200">Manage Assets</a>
                        <a href="{{ route('staff.assets.create') }}" class="block px-4 py-2 hover:bg-gray-200">New Asset</a>
                    </div>
                </div>
                <div class="relative">
                    <button class="block w-full text-left text-white px-4 py-2 hover:bg-gray-700 rounded-md focus:outline-none" id="maintenance-mobile">
                        Maintenance
                    </button>
                    <!-- Sub-menu for Mobile -->
                    <div class="hidden bg-slate-50 rounded-md" id="maintenance-sub-menu-mobile">
                        <a href="{{ route('staff.maintenance.maintenance_schedules.index') }}" class="block px-4 py-2 hover:bg-gray-200">Maintenance Schedule</a>
                        <a href="{{ route('staff.maintenance.workorders.create') }}" class="block px-4 py-2 hover:bg-gray-200">Work Order</a>
                        <a href="{{ route('staff.maintenance.service_providers.index') }}" class="block px-4 py-2 hover:bg-gray-200">Service Providers</a>
                        <a href="{{ route('staff.maintenance.history') }}" class="block px-4 py-2 hover:bg-gray-200">Maintenance History</a>
                    </div>
                </div>
                <div class="relative">
                    <button class="block w-full text-left text-white px-4 py-2 hover:bg-gray-700 rounded-md focus:outline-none" id="procurement-mobile">
                        Procurement
                    </button>
                    <!-- Sub-menu for Mobile -->
                    <div class="hidden bg-slate-50 rounded-md" id="procurement-sub-menu-mobile">
                        <a href="{{ route('staff.procurements.purchase_requests.index') }}" class="block px-4 py-2 hover:bg-gray-200">Purchase Requests</a>
                        <a href="{{ route('staff.procurements.vendors.index') }}" class="block px-4 py-2 hover:bg-gray-200">Vendors</a>
                        <a href="" class="block px-4 py-2 hover:bg-gray-200">Procurement History</a>
                    </div>
                </div>
                
                <form action="{{ route('admin.auth.logout') }}" method="POST" class="block w-full">
                    @csrf
                    
                    <button type="submit" class="block w-full text-white px-4 py-2 hover:bg-gray-700 rounded-md">Sign Out</button>
                </form> 
            </div>
        </div>
    </nav>
    
    <script>
        // Toggle Mobile Menu
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    
        // Toggle Mobile Sub-menu
        document.getElementById('assets-mobile').addEventListener('click', function () {
            document.getElementById('assets-sub-menu-mobile').classList.toggle('hidden');
        });

         // Toggle Mobile Sub-menu
         document.getElementById('maintenance-mobile').addEventListener('click', function () {
            document.getElementById('maintenance-sub-menu-mobile').classList.toggle('hidden');
        });


         // Toggle Mobile Sub-menu
         document.getElementById('procurement-mobile').addEventListener('click', function () {
            document.getElementById('procurement-sub-menu-mobile').classList.toggle('hidden');
        });
    </script>

    
</header>
