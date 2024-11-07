<x-staff-layout>

    <div class="flex flex-col container mx-4 border border-0 md:mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Service Provider               
                </div>
                <div>
                            <a href="{{ route('staff.maintenance.service_providers.index') }}" class="bg-green-600 text-white py-2 px-4 
                                            rounded-lg text-sm hover:bg-green-500">Service Providers</a>
                </div>
                
        </section>
    
        
    
        <section class="py-8 mt-2">
            <div>
                <form  action="{{ route('staff.maintenance.service_providers.store')}} " method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-[90%] items-center justify-center">
                    @csrf

                    

                    <div class="flex flex-col w-[80%] md:w-[60%] py-2 md:py-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                        <h2 class="font-semibold text-xl py-1" >New Service Provider</h2>
                        Provide information about the Service Provider
                    </div>


                    @include('partials._session_response')
                    
                    

                    <!-- Provider name  //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <input type="text" name="provider_name" class="border border-1 border-gray-400 bg-gray-50
                                                                w-full p-4 rounded-md 
                                                                focus:outline-none
                                                                focus:border-blue-500 
                                                                focus:ring
                                                                focus:ring-blue-100" placeholder="Provider Name"
                                                                
                                                                value="{{ old('uuid') }}"
                                                                
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                required
                                                                />  
                                                                                                                                    

                                                                @error('provider_name')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror
                        
                    </div><!-- end of Provider name //-->

                    <!-- Provider Type //-->
                    <div class="flex flex-col w-[80%] md:w-[60%] py-3">
                        <select name="provider_type" class="border border-1 border-gray-400 bg-gray-50
                                                                     w-full p-4 rounded-md 
                                                                     focus:outline-none
                                                                     focus:border-blue-500 
                                                                     focus:ring
                                                                     focus:ring-blue-100"
                                                                     
                                                                     
                                                                     style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                     required
                                                                     >
                                                                        <option value=''>-- Select Provider Type --</option>
                                                                        <option value='internal'>Internal</option>
                                                                        <option value='external'>External</option>
                                                                       
                                                                        

                                                                    </select>

                                                                     @error('provider_type')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                     @enderror
                            
                    </div>                        
                    <!-- end of Provider Type //-->   


                    
                     
                    

                    <!-- Contact //-->
                    <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2 border-red-900 w-[80%] md:w-[60%] py-3">
                    
                                     <div class="w-full md:w-2/3">
                                                <input type="text" name="contact_person" class="border border-1 border-gray-400 bg-gray-50
                                                                                        w-full p-4 rounded-md 
                                                                                        focus:outline-none
                                                                                        focus:border-blue-500 
                                                                                        focus:ring
                                                                                        focus:ring-blue-100" placeholder="Contact Person"
                                                                                        
                                                                                        value="{{ old('contact_person') }}"
                                                                                        
                                                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                        required
                                                                                        />  
                                                                                                                                                            

                                                                                        @error('contact_person')
                                                                                            <span class="text-red-700 text-sm">
                                                                                                {{$message}}
                                                                                            </span>
                                                                                        @enderror
                                    </div>

                                    <div class="w-full md:w-1/3">
                                                <input type="text" name="contact_phone" class="border border-1 border-gray-400 bg-gray-50
                                                                                        w-full p-4 rounded-md 
                                                                                        focus:outline-none
                                                                                        focus:border-blue-500 
                                                                                        focus:ring
                                                                                        focus:ring-blue-100" placeholder="Contact Phone No."
                                                                                        
                                                                                        value="{{ old('contact_phone') }}"
                                                                                        
                                                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                        required
                                                                                        />  
                                                                                                                                                            

                                                                                        @error('contact_phone')
                                                                                            <span class="text-red-700 text-sm">
                                                                                                {{$message}}
                                                                                            </span>
                                                                                        @enderror
                                    </div>


                        
                    </div><!-- end of Contact //-->

                   
                    

                    


                    <!-- Email //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <!-- Email//-->
                        <input type="email" name="email" class="border border-1 border-gray-400 bg-gray-50
                                                                            w-full p-4 rounded-md 
                                                                            focus:outline-none
                                                                            focus:border-blue-500 
                                                                            focus:ring
                                                                            focus:ring-blue-100" placeholder="Email"
                                                                            
                                                                            value="{{ old('email') }}"
                                                                            
                                                                            style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                            
                                                                            />  
                                                                                                                                                

                                                                            @error('email')
                                                                                <span class="text-red-700 text-sm">
                                                                                    {{$message}}
                                                                                </span>
                                                                            @enderror           

                           

                    </div><!-- end of email //-->


                    <!-- Service Categories //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <!-- Email//-->
                        <input type="text" name="service_categories" class="border border-1 border-gray-400 bg-gray-50
                                                                            w-full p-4 rounded-md 
                                                                            focus:outline-none
                                                                            focus:border-blue-500 
                                                                            focus:ring
                                                                            focus:ring-blue-100" placeholder="Service Categories"
                                                                            
                                                                            value="{{ old('service_category') }}"
                                                                            
                                                                            style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                            required
                                                                            /> 
                                                                            <small>
                                                                            e.g. Electrical, Mechanical, IT Support
                                                                            </small>
                                                                                                                                                

                                                                            @error('service_categories')
                                                                                <span class="text-red-700 text-sm">
                                                                                    {{$message}}
                                                                                </span>
                                                                            @enderror           

                           

                    </div><!-- end of dispose_authority //-->
                    
                   


                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-4">
                        <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                       hover:bg-gray-500
                                       rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Create Service Provider</button>
                    </div>
                    
                </form><!-- end of new asset form //-->
            <div>

        </section>
        
    </div>
    
    </x-staff-layout>