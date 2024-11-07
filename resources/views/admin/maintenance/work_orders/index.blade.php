<x-admin-layout>

    <div class="flex flex-col w-[95%] border border-0 mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Work Order             
                </div>
               
                
        </section>
    


        @if ($workorders->count())
            <section class="flex flex-col py-2 ">

                    <!-- search //-->
                    <div class="flex w-full justify-end items-center border-0 py-2 space-x-1">
                            <div class="w-full md:w-2/5">
                                <input type="text" name="search" class="w-full border border-gray-400 bg-gray-50
                                            p-2 rounded-md 
                                            focus:outline-none
                                            focus:border-blue-500 
                                            focus:ring
                                            focus:ring-blue-100" placeholder="Search"                
                                        
                                            style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                  
                                
                                />
                            </div>

                             <!-- button //-->
                            <div class="flex flex-col justify-center border ">
                                <button type="submit" class="border border-1 bg-green-600 py-2 px-8 text-white 
                                        hover:bg-green-500 rounded-md text-lg" style="font-family:'Lato';font-weight:500;">
                                        <i class="fa-solid fa-magnifying-glass text-md"></i> 
                                </button>
                            </div>
                            <!-- end of button //-->
                            

                    </div>
                    <!-- end of search //-->

                    
                    <table class="table-auto border-collapse border border-1 border-gray-200" 
                                >
                        <thead>
                            <tr class="bg-gray-200">
                                <th width='5%' class="text-center font-semibold py-2">SN</th>
                                <th width='25%' class="font-semibold py-2 text-left">Asset</th>
                                <th width='10%' class="font-semibold py-2 text-left">Maintenance Type</th>
                                <th width='15%' class="font-semibold py-2 text-left">Priority Level</th>                               
                                <th width='20%' class="font-semibold py-2 text-left">Assigned Personnel</th>
                                <th width='15%' class="font-semibold py-2 text-left">Scheduled Date</th>                                
                                <th width='15%' class="font-semibold py-2 text-center">Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = ($workorders->currentPage() -1 ) * $workorders->perPage();
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
                                                <div class="flex flex-col md:flex-row justify-center items-center space-y-1 md:space-x-1 md:space-y-0">
                                                    <span class="text-sm">
                                                        <a class="hover:bg-blue-500 bg-blue-400 text-white rounded-md 
                                                                px-4 py-1 text-xs" href="{{ route('staff.maintenance.workorders.edit',['workorder'=>$workorder->id]) }}">Edit</a>
                                                    </span>
                                                    <span> 
                                                        <a class="hover:bg-red-500 bg-red-400 text-white rounded-md 
                                                                px-4 py-1 text-xs"
                                                                href="{{ route('staff.maintenance.workorder.confirm_delete', ['workorder'=>$workorder->id]) }}">Delete</a>
                                                    </span>
                                                </div>
                                         


                                    </td>
                                    
                                    

                                </tr>
                                @endforeach                         
                            
                        </tbody>

                    </table>

                    {{ $workorders->links() }}


            </section>
        @else
            <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                <div class="flex flex-row border-0 justify-center 
                            text-2xl font-semibold text-gray-300 py-8">
                        There is currently no Work Order
                </div>
            </section>
        @endif
        
       
        
        
    </div>
    
</x-admin-layout>

