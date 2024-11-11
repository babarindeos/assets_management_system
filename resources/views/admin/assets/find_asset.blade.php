<x-admin-layout>
    <div class="container mx-auto">
        <!-- page header //-->
        <section class="flex flex-col md:w-full py-1 mt-6 px-4 border-red-900 mx-auto">
        
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div class="flex flex-row w-1/4">
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">Assets</h1>
                    </div>
                   
            </div>
        </section>
        <!-- end of page header //-->

         <!-- Search //-->
         <Section class="border-0 border-red-600 w-[95%] md:w-1/2 mx-auto">
                <form method="GET" action="{{ route('admin.assets.find_asset')}}" class="flex flex-row border-0  border-blue-900 w-full space-x-1">
                        @csrf


                         <!-- Search by //-->
                        <div class="flex flex-col w-[35%] md:w-[25%] py-3 border-0 justify-center">
                            <select name="scope" class="border border-1 border-gray-400 bg-gray-50
                                                                        w-full p-4 rounded-md 
                                                                        focus:outline-none
                                                                        focus:border-blue-500 
                                                                        focus:ring
                                                                        focus:ring-blue-100"
                                                                        
                                                                        
                                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                        required
                                                                        >
                                                                            <option value=''>-- Search By --</option>
                                                                            <option value='uuid'>Identifier</option>
                                                                            <option value='item'>Asset Name</option>
                                                                            <option value='location'>Location</option>
                                                                            <option value='supplier'>Supplier</option>
                                                                        </select>

                                                                        @error('scope')
                                                                            <span class="text-red-700 text-sm">
                                                                                {{$message}}
                                                                            </span>
                                                                        @enderror
                                
                        </div>                        
                        <!-- end of Category //-->   
                    
                        <div class="flex flex-col w-[60%] border-0 justify-center">
                                <input type="text" name="q" class="border border-1 border-gray-400 bg-gray-50
                                        w-full p-4 rounded-md 
                                        focus:outline-none
                                        focus:border-blue-500 
                                        focus:ring
                                        focus:ring-blue-100" placeholder="Find Assets..."
                                        
                                        value="{{ old('name') }}"
                                        
                                        style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                        required
                                        />  
                                                                                                            

                                        @error('name')
                                            <span class="text-red-700 text-sm">
                                                {{$message}}
                                            </span>
                                        @enderror

                        </div><!-- end of search //-->
                        <!-- button //-->
                        <div class="flex flex-col justify-center">
                            <button type="submit" class="border border-1 bg-green-600 py-4 px-8 text-white 
                                     hover:bg-green-500 rounded-tr-md rounded-br-md text-lg" style="font-family:'Lato';font-weight:500;">
                                     <i class="fa-solid fa-magnifying-glass text-md"></i> 
                            </button>
                        </div>
                        <!-- end of button //-->
                </form>
        </Section>
        <!-- end of Search //-->



        @if ($isPostBack)
        <!-- Search Results //-->
                    @if (count($assets))

                        <div class="py-4 px-4 mt-16 text-xl">
                            Search Result ({{ $assets->count() }})
                        </div>

                        <div class="flex flex-col  overflow-x-auto">
                            <div class="sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                        <div class="overflow-x-auto">
                                            <table
                                            class="min-w-full text-start text-md font-light text-surface dark:text-white">
                                            <thead
                                                class="border-b border-neutral-200 font-medium dark:border-white/10">
                                                <tr>
                                                <th scope="col" class="px-6 py-4">#</th>
                                                <th scope="col" class="px-6 py-4 text-left">Identifier</th>
                                                <th scope="col" class="px-6 py-4 text-left">Item</th>
                                                <th scope="col" class="px-6 py-4 text-left">Cost</th>
                                                <th scope="col" class="px-6 py-4 text-left">Purchase Date</th>
                                                <th scope="col" class="px-6 py-4 text-left">Supplier</th>
                                                <th scope="col" class="px-6 py-4 text-left">Life Span</th>
                                                <th scope="col" class="px-6 py-4 text-left">Location</th>
                                                <th scope="col" class="px-6 py-4 text-left">Custodian</th>
                                                <th scope="col" class="px-6 py-4 text-left">Department</th>
                                                <th scope="col" class="px-6 py-4 text-left">Depreciation</th> 
                                                <th scope="col" class="px-6 py-4 text-left">Disposal Date</th> 
                                                <th scope="col" class="px-6 py-4 text-left">Disposal Revenue</th>
                                                <th scope="col" class="px-6 py-4 text-left">Dispose Authority</th> 
                                                <th scope="col" class="px-6 py-4 text-left">Comment</th>   

                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @php
                                                        $counter = 0;
                                                    @endphp

                                                    @foreach ($assets as $asset)

                                                        <tr class="border-b border-neutral-200 dark:border-white/10">
                                                            <td class="whitespace-nowrap px-6 py-4 font-medium text-center">{{ ++$counter; }}.</td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                <a class='underline' href="{{ route('admin.assets.show',['asset'=>$asset->id]) }}">
                                                                    {{ $asset->uuid }}
                                                                </a>
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-4">{{ $asset->item }}</td>
                                                            <td class="whitespace-nowrap px-6 py-4">{{ $asset->cost }}</td>
                                                            <td class="whitespace-nowrap px-6 py-4">{{ $asset->purchase_date}}</td>
                                                            <td class="whitespace-nowrap px-6 py-4">{{ $asset->supplier }}</td>
                                                            <td class="whitespace-nowrap px-6 py-4">{{ $asset->life_span }}</td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                    {{ $asset->location->location->name }}
                                                                    <div>
                                                                        <small> {{ $asset->location->location->organ->name }} </small>
                                                                    </div>
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                {{ $asset->user->surname }} {{ $asset->user->firstname }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                {{ $asset->location->location->organ->name}}

                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                {{ $asset->depreciation }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                {{ $asset->disposal_rate }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                {{ $asset->dispose_authority }}
                                                            </td>

                                                            <td class=" px-6 py-4">
                                                                {{ $asset->comment }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
            @else   
                <div class="mx-auto py-8 md:py-12 border-0">
                        <div class="flex text-lg justify-center">
                            No record is found that meets the search criteria, try again.
                        </div>
                </div>
            @endif               
            
        @endif






</x-admin-layout>