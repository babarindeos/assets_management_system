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
                            <div class="text-white font-semibold font-serif opacity-80">Assets Management System (AMS)</div>
                                
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
                <div class="hidden lg:flex space-x-1">
                    @auth
                        @if (Auth::user()->role==='admin')

                            <a href='{{ route('admin.dashboard.index') }}' class="flex font-semibold items-center text-white 
                                                                                  hover:border-b-yellow-100 hover:border-b-4 mx-2 
                                                                                  hover:bg-green-600 px-2 hover:rounded-t">Dashboard</a>

                            <div class="relative group">
                                <button class="text-white px-1 py-2 rounded-md font-semibold hover:bg-green-600 px-2 hover:rounded-t">
                                    Assets
                                </button>
                                <!-- Sub-menu -->
                                <div class="absolute hidden group-hover:block bg-white text-gray-800 mt-0 py-2 shadow-lg w-[300%]">
                                    <a href="{{ route('admin.assets.index') }} " class="flex flex-row px-4 py-2 hover:bg-gray-200 
                                                                                            hover:border-l-yellow-500 hover:border-l-4 pr-8 
                                                                                            border-b border-gray-300">All Assets</a>
                                    <a href="{{ route('admin.assets.find_asset') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200 
                                                                                            hover:border-l-yellow-500 hover:border-l-4 
                                                                                            border-b border-gray-300 ">Find Asset</a>
                                    <a href="{{ route('admin.assets.categories') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200  hover:border-l-yellow-500 hover:border-l-4 pr-8">Categories</a>
                                </div>
                            </div>

                           
                            <div class="relative group">
                                <button class="text-white px-1 py-2 rounded-md font-semibold hover:bg-green-600 px-2 hover:rounded-t">
                                    Maintenance
                                </button>
                                <!-- Sub-menu -->
                                <div class="absolute hidden group-hover:block bg-white text-gray-800 mt-0 py-2 shadow-lg w-[200%]">
                                    <a href="{{ route('admin.maintenance.maintenance_schedule.index') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200 
                                                                                            hover:border-l-yellow-500 hover:border-l-4 pr-8 
                                                                                            border-b border-gray-300">Maintenance Schedule</a>
                                    <a href="{{ route('admin.maintenance.workorders.index') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200 
                                                                                            hover:border-l-yellow-500 hover:border-l-4 
                                                                                            border-b border-gray-300">Work Order</a>
                                    <a href="" class="flex flex-row px-4 py-2 hover:bg-gray-200  hover:border-l-yellow-500 hover:border-l-4 pr-8">Maintenance History</a>
  
                                </div>
                            </div>


                            <div class="relative group">
                                <button class="text-white px-1 py-2 rounded-md font-semibold hover:bg-green-600 px-2 hover:rounded-t">
                                    Procurement
                                </button>
                                <!-- Sub-menu -->
                                <div class="absolute hidden group-hover:block bg-white text-gray-800 mt-0 py-2 shadow-lg w-[200%]">
                                    <a href="" class="flex flex-row px-4 py-2 
                                                                                            hover:bg-gray-200 hover:border-l-yellow-500 hover:border-l-4 pr-8 
                                                                                            border-b border-gray-300">Purchase Requests</a>
                                    <a href="" class="flex flex-row px-4 py-2 hover:bg-gray-200  
                                                                                            hover:border-l-yellow-500 hover:border-l-4 
                                                                                            border-b border-gray-300">Vendors</a>
                                    <a href="" class="flex flex-row px-4 py-2 
                                                                                          hover:bg-gray-200  hover:border-l-yellow-500 hover:border-l-4 pr-8">Procurement History</a>
                                </div>
                            </div>


                            <a  href="{{ route('admin.asset_categories.index') }}" class="flex font-semibold items-center text-white hover:border-b-yellow-100 
                                                                               hover:border-b-4 mx-3 hover:bg-green-600 px-2 hover:rounded-t ">Categories</a>

                            <a  href="{{ route('admin.locations.index') }}" class="flex font-semibold items-center text-white hover:border-b-yellow-100 
                                                                               hover:border-b-4 mx-3 hover:bg-green-600 px-2 hover:rounded-t ">Locations</a>
                            <a  href="{{ route('admin.staff.index') }}" class="flex font-semibold items-center text-white 
                                                                               hover:border-b-yellow-100 hover:border-b-4 mx-3 hover:bg-green-600 px-2 hover:rounded-t">Users</a>
                           
                           
                            <form action="{{ route('admin.auth.logout') }}" method="POST" class="flex items-center justify-center border-0">
                                @csrf
                                
                                <button type="submit" class="flex font-semibold items-center hover:border-b-yellow-100 text-white hover:border-b-4 mx-3 ">Sign Out</button>
                            </form>  
                        @endif
                    @endauth     
                </div>
                
            </div>
            
            <!-- Mobile Menu -->
            <div class="lg:hidden hidden" id="mobile-menu">
                <a href="#" class="block text-white px-4 py-2 hover:bg-gray-700 rounded-md">Dashboard</a>
                <div class="relative">
                    <button class="block w-full text-left text-white px-4 py-2 hover:bg-gray-700 rounded-md focus:outline-none" id="assets-mobile">
                        Assets
                    </button>
                    <!-- Sub-menu for Mobile -->
                    <div class="hidden bg-slate-50 rounded-md" id="assets-sub-menu-mobile">
                        <a href="{{ route('admin.assets.index') }}" class="block px-4 py-2 hover:bg-gray-200">All Assets</a>
                        <a href="{{ route('admin.assets.find_asset') }}" class="block px-4 py-2 hover:bg-gray-200">Find Asset</a>
                        <a href="{{ route('admin.assets.categories') }}" class="flex flex-row px-4 py-2 hover:bg-gray-200">Categories</a>
                    </div>
                </div>
                <div class="relative">
                    <button class="block w-full text-left text-white px-4 py-2 hover:bg-gray-700 rounded-md focus:outline-none" id="maintenance-mobile">
                        Maintenance
                    </button>
                    <!-- Sub-menu for Mobile -->
                    <div class="hidden bg-slate-50 rounded-md" id="maintenance-sub-menu-mobile">
                        <a href="{{ route('admin.maintenance.maintenance_schedule.index') }}" class="block px-4 py-2 hover:bg-gray-200">Maintenance Schedule</a>
                        <a href="{{ route('admin.maintenance.workorders.index') }}" class="block px-4 py-2 hover:bg-gray-200">Work Order</a>
                        <a href="" class="flex flex-row px-4 py-2 hover:bg-gray-200">Maintenance History</a>
                    </div>
                </div>

                <div class="relative">
                    <button class="block w-full text-left text-white px-4 py-2 hover:bg-gray-700 rounded-md focus:outline-none" id="procurement-mobile">
                        Procurement
                    </button>
                    <!-- Sub-menu for Mobile -->
                    <div class="hidden bg-slate-50 rounded-md" id="procurement-sub-menu-mobile">
                        <a href="" class="block px-4 py-2 hover:bg-gray-200">Purchase Requests</a>
                        <a href="" class="block px-4 py-2 hover:bg-gray-200">Vendors</a>
                        <a href="" class="flex flex-row px-4 py-2 hover:bg-gray-200">Procurement History</a>
                    </div>
                </div>
                <a href="{{ route('admin.asset_categories.index') }}" class="block text-white px-4 py-2 hover:bg-gray-700 rounded-md">Categories</a>
                
                <a href="{{ route('admin.locations.index') }}" class="block text-white px-4 py-2 hover:bg-gray-700 rounded-md">Locations</a>
                <a href="{{ route('admin.staff.index') }}" class="block text-white px-4 py-2 hover:bg-gray-700 rounded-md">Users</a>

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

        // Toggle Mobile Sub-menu
        document.getElementById('contracts-mobile').addEventListener('click', function () {
            document.getElementById('contracts-sub-menu-mobile').classList.toggle('hidden');
        });
    </script>

    
</header>
