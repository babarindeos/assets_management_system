<header class="flex flex-col shadow-md bg-gradient-to-b from-green-700 to-green-500">
    

    <!-- header bar //-->
    <div class="flex flex-row justify-between py-2">
        <div class="flex">
            <!-- logo //-->
            <div class="flex flex-row px-2 md:px-4 py-2">
                <img src="{{ asset('images/logo.png')}}" />
            </div>
            <!-- end of logo //-->
            <!-- Name //-->
            <div class="flex flex-col item-center justify-center">
                    <div class="text-white font-bold text-3xl font-serif">GoviFlow</div>
                    <div class="text-white font-semibold font-serif text-xl">Complete Work Flow</div>
            </div>
            <!-- end of name //-->
        </div>
        

        @auth
            @if (Auth::user() && Auth::user()->role==='staff')
                
                <div class="hidden md:flex flex-row items-center px-1"> 
                        <a  href="{{ route('staff.dashboard.index') }}" class="flex font-semibold items-center text-white hover:border-b-yellow-100 hover:border-b-4 mx-3 ">Dashboard</a>
                        <a  href='{{ route('staff.document.index') }}' class="flex font-semibold items-center text-white hover:border-b-yellow-100 hover:border-b-4 mx-3 ">Documents</a>
                        
                        <form action="{{ route('staff.auth.logout') }}" method="POST">
                            @csrf
                            
                            <button type="submit" class="flex font-semibold items-center hover:border-b-yellow-100 text-white hover:border-b-4 mx-3 ">Sign Out</button>
                        </form>       
                </div>
            
            

            @else
                {{-- <div class="flex flex-row px-1">
                    <div class="flex font-semibold items-center hover:border-b-red-700 hover:border-b-4 mx-3 ">Home</div>
                    <div class="hidden md:flex md:items-center md:justify-center font-semibold items-center hover:border-b-red-700 hover:border-b-4 mx-3 ">About</div>
                    <div class="hidden md:flex md:items-center md:justify-center font-semibold items-center hover:border-b-red-700 hover:border-b-4 mx-3 ">Contact</div>
                    <a  href='/login' class="flex font-semibold items-center hover:border-b-red-700 hover:border-b-4 mx-3 ">Sign In</a>
                                    
                </div> --}}
            @endif
        @endauth
        
    </div>
    <!-- end of header bar //-->
</header>
