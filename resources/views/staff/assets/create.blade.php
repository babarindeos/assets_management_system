<x-staff-layout>

    <div class="flex flex-col container mx-4 border border-0 md:mx-auto">
        <section class="border-b border-gray-200 py-4 mt-4">
                <div class="text-2xl font-semibold ">
                    Asset           
                </div>
                
        </section>
    
        
    
        <section class="py-8 mt-2">
            <div>
                <form  action="{{ route('staff.assets.store')}} " method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-[90%] items-center justify-center">
                    @csrf

                    

                    <div class="flex flex-col w-[80%] md:w-[60%] py-2 md:py-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                        <h2 class="font-semibold text-xl py-1" >New Asset</h2>
                        Provide information about the Asset
                    </div>


                    @include('partials._session_response')
                    
                    

                    <!-- Unique Identification Number //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <input type="text" name="uuid" class="border border-1 border-gray-400 bg-gray-50
                                                                w-full p-4 rounded-md 
                                                                focus:outline-none
                                                                focus:border-blue-500 
                                                                focus:ring
                                                                focus:ring-blue-100" placeholder="Unique Identification Number"
                                                                
                                                                value="{{ old('uuid') }}"
                                                                
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                required
                                                                />  
                                                                                                                                    

                                                                @error('uuid')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror
                        
                    </div><!-- end of Unique Identification Number //-->

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
                                                                                <option value='{{ $location->location->id }}'>{{ $location->location->name }}</option>
                                                                        @endforeach
                                                                        

                                                                    </select>

                                                                     @error('location')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                     @enderror
                            
                    </div>                        
                    <!-- end of Location //-->   


                    <!-- Category //-->
                    <div class="flex flex-col w-[80%] md:w-[60%] py-3">
                        <select name="category" class="border border-1 border-gray-400 bg-gray-50
                                                                     w-full p-4 rounded-md 
                                                                     focus:outline-none
                                                                     focus:border-blue-500 
                                                                     focus:ring
                                                                     focus:ring-blue-100"
                                                                     
                                                                     
                                                                     style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                     required
                                                                     >
                                                                        <option value=''>-- Select Category --</option>
                                                                        @foreach ($categories as $category)
                                                                                <option value='{{ $category->id }}'>{{ $category->name }}</option>
                                                                        @endforeach
                                                                        

                                                                    </select>

                                                                     @error('category')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                     @enderror
                            
                    </div>                        
                    <!-- end of Category //-->   
                    
                     
                    

                    <!-- Items //-->
                    <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2 border-red-900 w-[80%] md:w-[60%] py-3">
                    
                                     <div class="w-full md:w-2/3">
                                                <input type="text" name="item" class="border border-1 border-gray-400 bg-gray-50
                                                                                        w-full p-4 rounded-md 
                                                                                        focus:outline-none
                                                                                        focus:border-blue-500 
                                                                                        focus:ring
                                                                                        focus:ring-blue-100" placeholder="Item Name"
                                                                                        
                                                                                        value="{{ old('item') }}"
                                                                                        
                                                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                        required
                                                                                        />  
                                                                                                                                                            

                                                                                        @error('item')
                                                                                            <span class="text-red-700 text-sm">
                                                                                                {{$message}}
                                                                                            </span>
                                                                                        @enderror
                                    </div>

                                    <div class="w-full md:w-1/3">
                                                <input type="text" name="cost" class="border border-1 border-gray-400 bg-gray-50
                                                                                        w-full p-4 rounded-md 
                                                                                        focus:outline-none
                                                                                        focus:border-blue-500 
                                                                                        focus:ring
                                                                                        focus:ring-blue-100" placeholder="Cost of Item"
                                                                                        
                                                                                        value="{{ old('cost') }}"
                                                                                        
                                                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                        
                                                                                        />  
                                                                                                                                                            

                                                                                        @error('cost')
                                                                                            <span class="text-red-700 text-sm">
                                                                                                {{$message}}
                                                                                            </span>
                                                                                        @enderror
                                    </div>


                        
                    </div><!-- end of item //-->

                   
                    

                    <!-- Description //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <textarea name="description" class="border border-1 border-gray-400 bg-gray-50
                                                                w-full p-4 rounded-md 
                                                                focus:outline-none
                                                                focus:border-blue-500 
                                                                focus:ring
                                                                focus:ring-blue-100" 
                                                                
                                                                value="{{ old('description') }}"
                                                                
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                maxlength="140"
                                                                >  </textarea>
                                                                <div class="text-xs text-gray-600">Description of Asset (140 words)</div>
                                                                                                                                    

                                                                @error('description')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror
                        
                    </div><!-- end of Description //-->


                    <!-- Date of Purchase  and Supplier//-->
                    <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2  border-red-900 w-[80%] md:w-[60%] py-3">

                            <!-- Purchase date //-->
                            <div class="w-[100%] md:w-1/2">
                                        <input type="text" name="purchase_date" class="border border-1 border-gray-400 bg-gray-50
                                                                            w-full p-4 rounded-md 
                                                                            focus:outline-none
                                                                            focus:border-blue-500 
                                                                            focus:ring
                                                                            focus:ring-blue-100" placeholder="Purchase Date"
                                                                            
                                                                            value="{{ old('document_title') }}"
                                                                            
                                                                            style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                            
                                                                            />  
                                                                                                                                                

                                                                            @error('purchase_date')
                                                                                <span class="text-red-700 text-sm">
                                                                                    {{$message}}
                                                                                </span>
                                                                            @enderror           

                            </div>
                            <!-- end of purchase date //-->


                            <!-- supplier //-->
                            <div class="w-[100%] md:w-1/2">
                                        <input type="text" name="supplier" class="border border-1 border-gray-400 bg-gray-50
                                                                            w-full p-4 rounded-md 
                                                                            focus:outline-none
                                                                            focus:border-blue-500 
                                                                            focus:ring
                                                                            focus:ring-blue-100" placeholder="Supplier or Contractor Details"
                                                                            
                                                                            value="{{ old('supplier') }}"
                                                                            
                                                                            style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                            
                                                                            />  
                                                                                                                                                

                                                                            @error('supplier')
                                                                                <span class="text-red-700 text-sm">
                                                                                    {{$message}}
                                                                                </span>
                                                                            @enderror           

                            </div>
                            <!-- end of supplier //-->
                        
                        
                    </div><!-- end of Date of Purchase //-->


                     <!-- Expected Life Span  and Rate and Method of Depreciation //-->
                    <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2  border-red-900 w-[80%] md:w-[60%] py-3">

                            <!-- Expected Life Span //-->
                            <div class="w-[100%] md:w-1/2">
                                        <input type="text" name="life_span" class="border border-1 border-gray-400 bg-gray-50
                                                                            w-full p-4 rounded-md 
                                                                            focus:outline-none
                                                                            focus:border-blue-500 
                                                                            focus:ring
                                                                            focus:ring-blue-100" placeholder="Expected Life Span"
                                                                            
                                                                            value="{{ old('life_span') }}"
                                                                            
                                                                            style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                            
                                                                            />  
                                                                                                                                                

                                                                            @error('life_span')
                                                                                <span class="text-red-700 text-sm">
                                                                                    {{$message}}
                                                                                </span>
                                                                            @enderror           

                            </div>
                            <!-- end of Life Span //-->


                            <!-- Rate and Method of Depreciation //-->
                            <div class="w-[100%] md:w-1/2">
                                        <input type="text" name="depreciation_rate" class="border border-1 border-gray-400 bg-gray-50
                                                                            w-full p-4 rounded-md 
                                                                            focus:outline-none
                                                                            focus:border-blue-500 
                                                                            focus:ring
                                                                            focus:ring-blue-100" placeholder="Rate and Method of Depreciation"
                                                                            
                                                                            value="{{ old('depreciation_rate') }}"
                                                                            
                                                                            style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                            
                                                                            />  
                                                                                                                                                

                                                                            @error('depreciation_rate')
                                                                                <span class="text-red-700 text-sm">
                                                                                    {{$message}}
                                                                                </span>
                                                                            @enderror           

                            </div>
                            <!-- end of depreciation_rate //-->
                        
                        
                    </div><!-- end of excpected life expectancy and depreciation_rate //-->

                    <!-- Date of Disposal, Revenue from Disposal, Authority to dispose /-->
                    <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2  border-red-900 w-[80%] md:w-[60%] py-3">

                            <!-- Disposal date //-->
                            <div class="w-full md:w-1/2">
                                        <input type="text" name="disposal_date" class="border border-1 border-gray-400 bg-gray-50
                                                                            w-full p-4 rounded-md 
                                                                            focus:outline-none
                                                                            focus:border-blue-500 
                                                                            focus:ring
                                                                            focus:ring-blue-100" placeholder="Date of Disposal"
                                                                            
                                                                            value="{{ old('disposal_date') }}"
                                                                            
                                                                            style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                            
                                                                            />  
                                                                                                                                                

                                                                            @error('disposal_date')
                                                                                <span class="text-red-700 text-sm">
                                                                                    {{$message}}
                                                                                </span>
                                                                            @enderror           

                            </div>
                            <!-- end of disposal date //-->


                            <!-- supplier //-->
                            <div class="w-full md:w-1/2">
                                        <input type="text" name="disposal_revenue" class="border border-1 border-gray-400 bg-gray-50
                                                                            w-full p-4 rounded-md 
                                                                            focus:outline-none
                                                                            focus:border-blue-500 
                                                                            focus:ring
                                                                            focus:ring-blue-100" placeholder="Revenue from Disposal/Receipt No."
                                                                            
                                                                            value="{{ old('disposal_revenue') }}"
                                                                            
                                                                            style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                            
                                                                            />  
                                                                                                                                                

                                                                            @error('disposal_revenue')
                                                                                <span class="text-red-700 text-sm">
                                                                                    {{$message}}
                                                                                </span>
                                                                            @enderror           

                            </div>
                            <!-- end of supplier //-->

                            

                    </div><!-- end of Date of Disposal, Revenue from Disposal, Authority to dispose //-->


                    <!-- dispose_authority //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <!-- dispose_authority //-->
                        <input type="text" name="dispose_authority" class="border border-1 border-gray-400 bg-gray-50
                                                                            w-full p-4 rounded-md 
                                                                            focus:outline-none
                                                                            focus:border-blue-500 
                                                                            focus:ring
                                                                            focus:ring-blue-100" placeholder="Authority to Dispose"
                                                                            
                                                                            value="{{ old('supplier') }}"
                                                                            
                                                                            style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                            
                                                                            />  
                                                                                                                                                

                                                                            @error('dispose_authority')
                                                                                <span class="text-red-700 text-sm">
                                                                                    {{$message}}
                                                                                </span>
                                                                            @enderror           

                           

                    </div><!-- end of dispose_authority //-->



                    
                    <!-- Comment //-->
                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                    
                        
                        <textarea name="comment" class="border border-1 border-gray-400 bg-gray-50
                                                                w-full p-4 rounded-md 
                                                                focus:outline-none
                                                                focus:border-blue-500 
                                                                focus:ring
                                                                focus:ring-blue-100" 
                                                                
                                                                value="{{ old('comment') }}"
                                                                
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                maxlength="140"
                                                                >  </textarea>
                                                                <div class="text-xs text-gray-600">Any other useful information (140 words)</div>
                                                                                                                                    

                                                                @error('comment')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror
                        
                    </div><!-- end of Comment //-->



                    <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-4">
                        <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                       hover:bg-gray-500
                                       rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Submit Asset</button>
                    </div>
                    
                </form><!-- end of new asset form //-->
            <div>

        </section>
        
    </div>
    
    </x-staff-layout>