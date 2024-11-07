<x-admin-layout>

    <div class="flex flex-col w-[95%] border border-0 mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Maintenance Schedule             
                </div>               
                
        </section>
    


        @if ($schedules->count())
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
                                <th width='15%' class="font-semibold py-2 text-left">Item</th>
                                <th width='10%' class="font-semibold py-2 text-left">Frequency</th>
                                <th width='25%' class="font-semibold py-2 text-left">Description</th>                                
                                <th width='15%' class="font-semibold py-2 text-left">Date</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = ($schedules->currentPage() -1 ) * $schedules->perPage();
                            @endphp

                                @foreach ($schedules as $schedule)
                                <tr class="border border-b border-gray-200">
                                    <td class='text-center py-4'>{{ ++$counter }}.</td>
                                    <td>
                                        
                                            {{ $schedule->asset->item}} 

                                            <div class="text-sm">
                                                    {{ $schedule->asset->category->name }}
                                            </div>
                                                       
                                           
                                    </td>
                                    
                                    <td>
                                           {{ $schedule->frequency }}
                                        
                                    </td>

                                    <td>
                                            {{ $schedule->description }}
                                    </td>

                                    <td>
                                                {{ $schedule->created_at->format('l jS F, Y') }}
                                    </td>
                                    
                                    

                                </tr>
                                @endforeach                         
                            
                        </tbody>

                    </table>

                    {{ $schedules->links() }}


            </section>
        @else
            <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                <div class="flex flex-row border-0 justify-center 
                            text-2xl font-semibold text-gray-300 py-8">
                        There is currently no Maintenance Schedule
                </div>
            </section>
        @endif
        
       
        
        
    </div>
    
    </x-admin-layout>

<script>
    $(document).ready(function() {
        $("input[name='search']").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            
            $("table tbody tr").filter(function() {
                // Get the text content excluding the title link
                // Get the text content excluding the title link
                var rowText = $(this).find("td").not(":first").text().toLowerCase();
                $(this).toggle(rowText.indexOf(value) > -1 || $(this).find("td").length === 1); // Keep the heading row visible
            });
        });
    });
</script>