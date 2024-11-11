<x-admin-layout>

    <div class="flex flex-col w-[95%] border border-0 mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Service Providers               
                </div>
                
                
        </section>
    


        @if ($service_providers->count())

        <div class="flex flex-col overflow-x-auto">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                    <table class="table-auto border-collapse border border-1 border-gray-200" 
                                >
                        <thead>
                            <tr class="bg-gray-200">
                                <th width='5%' class="text-center font-semibold py-2">SN</th>
                                <th width='25%' class="font-semibold py-2 text-left">Provider Name</th>
                                <th width='10%' class="font-semibold py-2 text-left">Provider Type</th>
                                <th width='15%' class="font-semibold py-2 text-left">Contact Person</th>
                                <th width='10%'class="font-semibold py-2 text-left">Contact Phone</th>
                                <th width='20%' class="font-semibold py-2 text-left">Email</th>
                                <th width='10%' class="font-semibold py-2 text-left">Service Categories</th> 
                                <th width='15%' class="font-semibold py-2 text-left">Submitted By</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = ($service_providers->currentPage() -1 ) * $service_providers->perPage();
                            @endphp

                                @foreach ($service_providers as $service_provider)
                                <tr class="border border-b border-gray-200">
                                    <td class='text-center py-4'>{{ ++$counter }}.</td>
                                    <td>
                                        
                                            {{ $service_provider->provider_name }} 
                                                       
                                           
                                    </td>
                                    
                                    <td>
                                            @php
                                                $provider_type = ucfirst($service_provider->provider_type)
                                            @endphp
                                            {{ $provider_type }}
                                        
                                    </td>

                                    <td>
                                            {{ $service_provider->contact_person }}
                                    </td>

                                    <td>
                                            {{ $service_provider->contact_phone }}
                                    </td>

                                    <td>
                                            {{ $service_provider->email }}
                                    </td>

                                    <td>
                                        {{ $service_provider->service_categories }}
                                        
                                    </td>
                                    <td class="whitespace-nowrap py-4">
                                               {{ $service_provider->user->staff->surname}} {{ $service_provider->user->staff->firstname}}
                                    </td>

                                   
                                    

                                </tr>
                                @endforeach                         
                            
                        </tbody>

                    </table>

                </div>
                <div>

                {{ $service_providers->links() }}


        </div>
        @else
            <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                <div class="flex flex-row border-0 justify-center 
                            text-2xl font-semibold text-gray-300 py-8">
                        There is currently no Service Provider
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