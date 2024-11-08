<x-staff-layout>

    <div class="flex flex-col container mx-4 border border-0 md:mx-auto">
        <section class="border-b border-gray-200 py-4 mt-4">
                <div class="text-2xl font-semibold ">
                    Maintenance History           
                </div>
                
        </section>
    
        
    
        <section class="py-8 mt-2">
            <table width="80%"  >
                <tbody>
                    <tr class="border-b">
                        <td width="35%" class="py-4 font-semibold">Asset</td>
                        <td>{{ $workorder->asset->item }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Maintenance Type</td>
                        <td>
                            @php
                                $maintenance_type = ucfirst($workorder->maintenance_type)
                            @endphp
                                {{ $maintenance_type }}
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Priority Level</td>
                        <td>
                            {{ $workorder->priority_level }}
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Description</td>
                        <td>{{ $workorder->description }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Assigned Personnel</td>
                        <td>{{ $workorder->assigned_personnel }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Service Provider</td>
                        <td>{{ $workorder->service_provider->provider_name }}</td>
                    </tr>

                    

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Scheduled Date </td>
                        <td>{{ $workorder->scheduled_date_time }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Duration </td>
                        <td>{{ $workorder->duration }}</td>
                    </tr>


                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Cost</td>
                        <td>{{ $workorder->cost }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Requirements</td>
                        <td>{{ $workorder->requirements }}</td>
                    </tr>

                    


                </tbody>
            </table>
        
        </section>
    </div>
    
</x-staff-layout>