<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<x-staff-layout>

    <div class="flex flex-col container mx-4 border border-0 md:mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Work Order              
                </div>
                <div>
                            <a href="{{ route('staff.maintenance.history') }}" class="bg-green-600 text-white py-2 px-4 
                                            rounded-lg text-sm hover:bg-green-500">Maintenance History</a>
                </div>
                
        </section>
    
        
    
        <section class="py-8 mt-2">
            <div>
                <form  action="{{ route('staff.maintenance.workorders.update',['workorder'=>$workorder->id]) }} " method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-[90%] items-center justify-center">
                    @csrf
                   

                    <div class="flex flex-col w-[80%] md:w-[60%] py-2 md:py-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                        <h2 class="font-semibold text-xl py-1" >Edit Work Order</h2>
                        Provide information about the Schedule for the Item
                    </div>


                    @include('partials._session_response')
                    
                    

                    <!-- Item //-->
                    <div class="flex flex-col w-[80%] md:w-[60%] py-3">
                        <select name="asset" class="border border-1 border-gray-400 bg-gray-50
                                                                     w-full p-4 rounded-md 
                                                                     focus:outline-none
                                                                     focus:border-blue-500 
                                                                     focus:ring
                                                                     focus:ring-blue-100"
                                                                     
                                                                     
                                                                     style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                     required
                                                                     >
                                                                        <option value=''>-- Select Item --</option>
                                                                                                                       
                                                                        @foreach($assets as $asset)
                                                                            <option value="{{ $asset->id }}" @if($asset->id == $workorder->asset_id) selected @endif>{{ $asset->item }} ({{ $asset->uuid }})</option>
                                                                        @endforeach

                                                                    </select>

                                                                     @error('asset')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                     @enderror
                            
                    </div>                        
                    <!-- end of Item //-->   


                    <!-- Type of Maintenance //-->
                    <div class="flex flex-col w-[80%] md:w-[60%] py-3">
                        <select name="maintenance_type" class="border border-1 border-gray-400 bg-gray-50
                                                                     w-full p-4 rounded-md 
                                                                     focus:outline-none
                                                                     focus:border-blue-500 
                                                                     focus:ring
                                                                     focus:ring-blue-100"
                                                                     
                                                                     
                                                                     style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                     required
                                                                     >
                                                                        <option value=''>-- Select Maintenance Type --</option>
                                                                        <option @if($workorder->maintenance_type=='preventive') selected @endif value='preventive'>Preventive</option>
                                                                        <option @if($workorder->maintenance_type=='corrective') selected @endif value='corrective'>Corrective</option>
                                                                        <option @if($workorder->maintenance_type=='predictive') selected @endif value='predictive'>Predictive</option>                                  
                                                                                                                       
                                                                        

                                                                    </select>

                                                                     @error('maintenance_type')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                     @enderror
                            
                    </div>                        
                    <!-- end of Type of Maintenance //-->   


                    
                     
                    

                    <!-- Priority Level //-->
                    <div class="flex flex-col w-[80%] md:w-[60%] py-3">
                        <select name="priority_level" class="border border-1 border-gray-400 bg-gray-50
                                                                     w-full p-4 rounded-md 
                                                                     focus:outline-none
                                                                     focus:border-blue-500 
                                                                     focus:ring
                                                                     focus:ring-blue-100"
                                                                     
                                                                     
                                                                     style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                     required
                                                                     >
                                                                        <option value=''>-- Select Priority Level --</option>
                                                                        <option @if($workorder->priority_level=='high') selected @endif value='high'>High</option>
                                                                        <option @if($workorder->priority_level=='medium') selected @endif value='medium'>Medium</option>
                                                                        <option @if($workorder->priority_level=='low') selected @endif value='low'>Low</option>                                                                                                           
                                                                        

                                                                    </select>

                                                                     @error('priority_level')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                     @enderror
                            
                    </div>                        
                    <!-- end of Priority Level //-->  


                    <!-- Description of work //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <textarea name="description" class="border border-1 border-gray-400 bg-gray-50
                                                                w-full p-4 rounded-md 
                                                                focus:outline-none
                                                                focus:border-blue-500 
                                                                focus:ring
                                                                focus:ring-blue-100"                                                    
                                                                
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                maxlength="200"
                                                                >  {{ $workorder->description }} </textarea>
                                                                <div class="text-xs text-gray-600">Description of work</div>
                                                                                                                                    

                                                                @error('description')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror
                        
                    </div><!-- end of description of work //-->
                     

                    

                    <!-- Assigned Personnel  //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <input type="text" name="assigned_personnel" class="border border-1 border-gray-400 bg-gray-50
                                                                w-full p-4 rounded-md 
                                                                focus:outline-none
                                                                focus:border-blue-500 
                                                                focus:ring
                                                                focus:ring-blue-100" placeholder="Assigned Personnel"
                                                                
                                                                value="{{ $workorder->assigned_personnel }}"
                                                                
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                required
                                                                />  
                                                                                                                                    

                                                                @error('assigned_personnel')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror
                        
                    </div><!-- end of personnel //-->

                     <!-- Service Provider //-->
                     <div class="flex flex-col w-[80%] md:w-[60%] py-3">
                        <select name="service_provider" class="border border-1 border-gray-400 bg-gray-50
                                                                     w-full p-4 rounded-md 
                                                                     focus:outline-none
                                                                     focus:border-blue-500 
                                                                     focus:ring
                                                                     focus:ring-blue-100"
                                                                     
                                                                     
                                                                     style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                     required
                                                                     >
                                                                        <option value=''>-- Service Provider --</option>
                                                                        @foreach($service_providers as $service_provider) 
                                                                            <option value='{{ $service_provider->id }}'>{{ $service_provider->provider_name }}</option>
                                                                        @endforeach
                                                                        

                                                                    </select>

                                                                     @error('service_provider')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                     @enderror
                            
                    </div>                        
                    <!-- end of Service Provider //-->  


                    <!-- Schedule date and time  //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <input type="text" name="scheduled_date_time" class="border border-1 border-gray-400 bg-gray-50
                                                                w-full p-4 rounded-md 
                                                                focus:outline-none
                                                                focus:border-blue-500 
                                                                focus:ring
                                                                focus:ring-blue-100" placeholder="Scheduled Date and Time"
                                                                
                                                                value="{{ $workorder->scheduled_date_time }}"
                                                                
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                required
                                                                />  
                                                                                                                                    

                                                                @error('scheduled_date_time')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror
                        
                    </div><!-- end of scheduled date and time //-->


                    <!-- Requirements //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <textarea name="requirements" class="border border-1 border-gray-400 bg-gray-50
                                                                w-full p-4 rounded-md 
                                                                focus:outline-none
                                                                focus:border-blue-500 
                                                                focus:ring
                                                                focus:ring-blue-100"                                                                
                                                                
                                                                
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                maxlength="140"
                                                                >  {{ $workorder->requirements }} </textarea>
                                                                <div class="text-xs text-gray-600">Requirements (materials and parts needed)</div>
                                                                                                                                    

                                                                @error('requirements')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror
                        
                    </div><!-- end of requirements //-->
                     

                    
                    


                    
                   


                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-4">
                        <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                       hover:bg-gray-500
                                       rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Update Work Order</button>
                    </div>
                    
                </form><!-- end of new asset form //-->
            <div>

        </section>
        
    </div>
    
    </x-staff-layout>