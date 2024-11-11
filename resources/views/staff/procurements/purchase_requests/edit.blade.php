<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<x-staff-layout>

    <div class="flex flex-col container mx-4 border border-0 md:mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Procurement              
                </div>
                <div>
                            <a href="{{ route('staff.procurements.purchase_requests.index') }}" class="bg-green-600 text-white py-2 px-4 
                                            rounded-lg text-sm hover:bg-green-500">Purchase Requests</a>
                </div>
                
        </section>
    
        
    
        <section class="py-8 mt-2">
            <div>
                <form  action="{{ route('staff.procurements.purchase_requests.update', ['purchase_request'=>$purchase_request->id])}} " method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-[90%] items-center justify-center">
                    @csrf

                    

                    <div class="flex flex-col w-[80%] md:w-[60%] py-2 md:py-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                        <h2 class="font-semibold text-xl py-1" >Purchase Request</h2>
                        Provide information for the Purchase Request
                    </div>


                    @include('partials._session_response')
                    
                    


                    <!-- Item  //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <input type="text" name="item" class="border border-1 border-gray-400 bg-gray-50
                                                                w-full p-4 rounded-md 
                                                                focus:outline-none
                                                                focus:border-blue-500 
                                                                focus:ring
                                                                focus:ring-blue-100" placeholder="Name of Item"
                                                                
                                                                value="{{ $purchase_request->item }}"
                                                                
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                required
                                                                />  
                                                                                                                                    

                                                                @error('item')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror
                        
                    </div><!-- end of item //-->


                    <div class="flex flex-col md:flex-row space-y-2 md:space-x-2 md:space-y-0 border-red-900 w-[80%] md:w-[60%] py-3">

                    <!-- Quabtity and Cost  //-->
                    <div class="flex flex-col w-full md:w-1/2">
                                <input type="text" name="quantity" class="border border-1 border-gray-400 bg-gray-50
                                                        w-full p-4 rounded-md 
                                                        focus:outline-none
                                                        focus:border-blue-500 
                                                        focus:ring
                                                        focus:ring-blue-100" placeholder="Quantity of Item"
                                                        
                                                        value="{{ $purchase_request->quantity }}"
                                                        
                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                        required
                                                        />  
                                                                                                                            

                                                        @error('quantity')
                                                            <span class="text-red-700 text-sm">
                                                                {{$message}}
                                                            </span>
                                                        @enderror
                    </div><!-- end of Quantity //-->

                    <!-- Cost  //-->
                    <div class="flex flex-col w-full md:w-1/2">
                                <input type="text" name="cost" class="border border-1 border-gray-400 bg-gray-50
                                                        w-full p-4 rounded-md 
                                                        focus:outline-none
                                                        focus:border-blue-500 
                                                        focus:ring
                                                        focus:ring-blue-100" placeholder="Cost"
                                                        
                                                        value="{{ $purchase_request->cost }}"
                                                        
                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                        required
                                                        />  
                                                                                                                            

                                                        @error('cost')
                                                            <span class="text-red-700 text-sm">
                                                                {{$message}}
                                                            </span>
                                                        @enderror
                    </div>

                    </div><!-- end of cost //-->


                    <!-- Location //-->
                    <div class="flex flex-col w-[80%] md:w-[60%] py-3">
                        <select name="location" class="border border-1 border-gray-400 bg-gray-50
                                                                     w-full p-4 rounded-md 
                                                                     focus:outline-none
                                                                     focus:border-blue-500 
                                                                     focus:ring
                                                                     focus:ring-blue-100"
                                                                     
                                                                     
                                                                     style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                     required
                                                                     >
                                                                        <option value=''>-- Select Location --</option>
                                                                        @foreach ($locations as $location)
                                                                                <option value='{{ $location->location->id }}' @if($location->location->id == $purchase_request->location_id) selected @endif >{{ $location->location->name }}</option>
                                                                        @endforeach
                                                                                                                       
                                                                       

                                                                    </select>

                                                                     @error('location')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                     @enderror
                            
                    </div>                        
                    <!-- end of Location //-->   


                    <!-- Vendor //-->
                    <div class="flex flex-col w-[80%] md:w-[60%] py-3">
                        <select name="vendor" class="border border-1 border-gray-400 bg-gray-50
                                                                     w-full p-4 rounded-md 
                                                                     focus:outline-none
                                                                     focus:border-blue-500 
                                                                     focus:ring
                                                                     focus:ring-blue-100"
                                                                     
                                                                     
                                                                     style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                     required
                                                                     >
                                                                        <option value=''>-- Select Vendor --</option>
                                                                        @foreach ($vendors as $vendor)
                                                                                <option value='{{ $vendor->id }}' @if($vendor->id == $purchase_request->vendor_id) selected  @endif >{{ $vendor->business_name }}</option>
                                                                        @endforeach
                                                                                                        
                                                                                                                       
                                                                        

                                                                    </select>

                                                                     @error('vendor')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                     @enderror
                            
                    </div>                        
                    <!-- end of Vendor //-->   


                    
                     
                    

                                                                                                                                                                              
                   


                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-4">
                        <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                       hover:bg-gray-500
                                       rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Update Purchase Request</button>
                    </div>
                    
                </form><!-- end of new asset form //-->
            <div>

        </section>
        
    </div>
    
    </x-staff-layout>