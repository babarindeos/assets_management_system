<x-staff-layout>

    <div class="flex flex-col container mx-4 border border-0 md:mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Maintenance Schedule               
                </div>
                <div>
                            <a href="{{ route('staff.maintenance.maintenance_schedules.index') }}" class="bg-green-600 text-white py-2 px-4 
                                            rounded-lg text-sm hover:bg-green-500">Maintenance Schedules</a>
                </div>
                
        </section>
    
        
    
        <section class="py-8 mt-2">
            <div>
                <form  action="{{ route('staff.maintenance.maintenance_schedules.update',['maintenance_schedule' => $maintenance_schedule->id]) }} " method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-[90%] items-center justify-center">
                    @csrf

                    

                    <div class="flex flex-col w-[80%] md:w-[60%] py-2 md:py-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                        <h2 class="font-semibold text-xl py-1" >Edit Maintenance Schedule</h2>
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
                                                                            <option value="{{ $asset->id }}" @if ($maintenance_schedule->asset_id == $asset->id) selected @endif>{{ $asset->item }} ({{ $asset->uuid }})</option>
                                                                        @endforeach
                                                                       
                                                                        

                                                                    </select>

                                                                     @error('item')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                     @enderror
                            
                    </div>                        
                    <!-- end of Item //-->   

                    

                    <!-- Frequency  //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <input type="text" name="frequency" class="border border-1 border-gray-400 bg-gray-50
                                                                w-full p-4 rounded-md 
                                                                focus:outline-none
                                                                focus:border-blue-500 
                                                                focus:ring
                                                                focus:ring-blue-100" placeholder="Frequency"
                                                                
                                                                value="{{ $maintenance_schedule->frequency }}"
                                                                
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                required
                                                                />  
                                                                                                                                    

                                                                @error('frequency')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror
                        
                    </div><!-- end of frequency //-->

                    

                    <!-- Description //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <textarea name="description" class="border border-1 border-gray-400 bg-gray-50
                                                                w-full p-4 rounded-md 
                                                                focus:outline-none
                                                                focus:border-blue-500 
                                                                focus:ring
                                                                focus:ring-blue-100" 
                                                                
                                                                value="{{ $maintenance_schedule->message }}"
                                                                
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                maxlength="140"
                                                                >  </textarea>
                                                                <div class="text-xs text-gray-600">Description (140 words)</div>
                                                                                                                                    

                                                                @error('description')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror
                        
                    </div><!-- end of description //-->
                     
                    


                    
                   


                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-4">
                        <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                       hover:bg-gray-500
                                       rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Update Schedule</button>
                    </div>
                    
                </form><!-- end of new asset form //-->
            <div>

        </section>
        
    </div>
    
    </x-staff-layout>