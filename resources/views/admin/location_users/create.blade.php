<x-admin-layout>
    <div class="container mx-auto">
        <!-- page header //-->
        <section class="flex flex-col w-[95%] md:w-[95%] py-1 mt-6 px-4 border-red-900 mx-auto">
            
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div class="flex flex-col w-3/4">
                        <h1 class="text-md font-semibold font-serif text-gray-800">
                            Location</h1>
                            <h1 class="text-2xl font-semibold font-serif text-gray-800">
                            {{$location->name}} ({{ $location->code }})</h1>
                    </div>
                    <div class="flex flex-row w-1/4 justify-end space-x-1">

                            
                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.locations.show', ['location' => $location->id]) }}" class="bg-green-600 text-white py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500">Location</a>
                                </div>

                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.location_users.index', ['location'=> $location->id]) }}" class="border border-green-600 text-gree py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500 hover:text-white hover:border-green-500">Users</a>
                                </div>
                            </form>
                    </div>
            </div>
        </section>
        <!-- end of page header //-->



        <!-- new college form //-->
        <section>
                <div>
                    <form  action="{{ route('admin.location_users.store',['location'=>$location->id])}} " method="POST" class="flex flex-col mx-auto w-[90%] items-center justify-center">
                        @csrf

                        

                        <div class="flex flex-col w-[80%] md:w-[60%] py-2 md:py-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                            <h2 class="font-semibold text-xl py-1" >Add User to Location</h2>
                            Provide User File No.
                        </div>


                        @include('partials._session_response')
                        
                        

                        <!-- User File no //-->
                        <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                        
                            
                            <input type="text" name="fileno" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="File No."
                                                                    
                                                                    value="{{ old('fileno') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    required
                                                                    />  
                                                                                                                                        

                                                                    @error('name')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                        </div><!-- end of User File No. //-->

                        

                        <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-4">
                            <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                           hover:bg-gray-500
                                           rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Add User</button>
                        </div>
                        
                    </form><!-- end of new Ministry form //-->
                <div>
        </section>
        <!-- end of new ministry form //-->


    </div><!-- end of container //-->
</x-admin-layout>