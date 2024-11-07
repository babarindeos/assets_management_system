<x-staff-layout>

    <div class="flex flex-col w-[95%] border border-0 mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Service Providers               
                </div>
                <div>
                            <a href="{{ route('staff.maintenance.service_providers.create') }}" class="bg-green-600 text-white py-2 px-4 
                                            rounded-lg text-sm hover:bg-green-500">New Service Provider</a>
                </div>
                
        </section>
    


        @if ($service_providers->count())
            <section class="flex flex-col py-2 ">
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
                                <th width='15%' class="font-semibold py-2 text-left">Service Categories</th> 
                                <th width='15%' class="font-semibold py-2 text-center">Action</th>                                
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
                                    <td>
                                                <div class="flex flex-col md:flex-row justify-center items-center space-y-1 md:space-x-1 md:space-y-0">
                                                    <span class="text-sm">
                                                        <a class="hover:bg-blue-500 bg-blue-400 text-white rounded-md 
                                                                px-4 py-1 text-xs" href="{{ route('staff.maintenance.service_providers.edit',['service_provider'=>$service_provider->id]) }}">Edit</a>
                                                    </span>
                                                    <span> 
                                                        <a class="hover:bg-red-500 bg-red-400 text-white rounded-md 
                                                                px-4 py-1 text-xs"
                                                                href="{{ route('staff.maintenance.service_providers.confirm_delete',['service_provider'=>$service_provider->id]) }}">Delete</a>
                                                    </span>
                                                </div>
                                         


                                    </td>
                                    
                                    

                                </tr>
                                @endforeach                         
                            
                        </tbody>

                    </table>

                    {{ $service_providers->links() }}


            </section>
        @else
            <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                <div class="flex flex-row border-0 justify-center 
                            text-2xl font-semibold text-gray-300 py-8">
                        There is currently no Service Provider
                </div>
            </section>
        @endif
        
       
        
        
    </div>
    
    </x-staff-layout>

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