<x-admin-layout>
    <div class="flex flex-col w-[95%] mx-auto">
        <!-- page header //-->
        <section class="flex flex-col md:w-full py-1 mt-6 px-4 border-red-900 mx-auto">
        
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div class="flex flex-row w-1/4">
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">Maintenance History</h1>
                    </div>
                   
            </div>
        </section>
        <!-- end of page header //-->

         <!-- Search //-->
         <Section class="border-0 border-red-600 w-[95%] md:w-1/2 mx-auto">
                <form method="GET" action="{{ route('admin.maintenance.history')}}" class="flex flex-row border-0  border-blue-900 w-full space-x-1">
                        @csrf


                         <!-- Search by //-->
                        <div class="flex flex-col w-full md:w-full py-3 border-0 justify-center">
                            <select name="asset" class="border border-1 border-gray-400 bg-gray-50
                                                                        w-full p-4 rounded-md 
                                                                        focus:outline-none
                                                                        focus:border-blue-500 
                                                                        focus:ring
                                                                        focus:ring-blue-100"
                                                                        
                                                                        
                                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                        required
                                                                        >
                                                                            <option value=''>-- Maintenance Asset --</option>
                                                                            @foreach($assets as $asset)
                                                                                <option value="{{ $asset->asset_id}}">{{ $asset->asset->item }} ( {{ $asset->asset->uuid }} )</option>
                                                                            @endforeach
                                                                        </select>

                                                                        @error('asset')
                                                                            <span class="text-red-700 text-sm">
                                                                                {{$message}}
                                                                            </span>
                                                                        @enderror
                                
                        </div>                        
                        <!-- end of Category //-->   
                    
                        
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
                    @if (count($maintenance_history))
                        @php
                            $workorders = $maintenance_history;
                        @endphp

                        <div class="py-4 px-4 mt-12 text-xl">
                            Search Result ({{ $assets->count() }})
                        </div>

                        <section class="flex flex-col py-2 ">
                            <table class="table-auto border-collapse border border-1 border-gray-200" 
                                        >
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th width='5%' class="text-center font-semibold py-2">SN</th>
                                        <th width='20%' class="font-semibold py-2 text-left">Asset</th>
                                        <th width='10%' class="font-semibold py-2 text-left">Maintenance Type</th>
                                        <th width='15%' class="font-semibold py-2 text-left">Priority Level</th>                               
                                        <th width='20%' class="font-semibold py-2 text-left">Assigned Personnel</th>
                                        <th width='15%' class="font-semibold py-2 text-left">Scheduled Date</th>                                
                                        <th width='15%' class="font-semibold py-2 text-left">Submitted By</th>                                
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 0;
                                    @endphp

                                        @foreach ($workorders as $workorder)
                                        <tr class="border border-b border-gray-200">
                                            <td class='text-center py-4'>{{ ++$counter }}.</td>
                                            <td>    
                                                <a href="{{ route('staff.maintenance.workorders.show',['workorder'=>$workorder->id]) }}" class="underline">                               
                                                    {{ $workorder->asset->item}} 
                                                </a>
                                                <div> 
                                                    <small>
                                                    Category: {{ $workorder->asset->category->name}}    
                                                    </small>
                                                </div>
                                                
                                            </td>
                                            
                                            <td>
                                                    @php
                                                        $maintenance_type = ucfirst($workorder->maintenance_type)
                                                    @endphp
                                                
                                                    {{ $maintenance_type }}
                                            </td>

                                            <td>
                                                    @php
                                                        $priority_level = ucfirst($workorder->priority_level)
                                                    @endphp
                                                    {{ $priority_level }}
                                            </td>

                                            <td>
                                                    {{ $workorder->assigned_personnel }}
                                            </td>

                                            <td>
                                                    {{ $workorder->scheduled_date_time }}
                                            </td>

                                            
                                            <td>
                                                        {{ $workorder->user->staff->surname}} {{ $workorder->user->staff->firstname}}

                                            </td>
                                            
                                            

                                        </tr>
                                        @endforeach                         
                                    
                                </tbody>

                            </table>
                        </section>

                    
            @else   
                <div class="mx-auto py-8 md:py-12 border-0">
                        <div class="flex text-lg justify-center">
                            No record is found that meets the search criteria, try again.
                        </div>
                </div>
            @endif               
            
        @endif






</x-admin-layout>