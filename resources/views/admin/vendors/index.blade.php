<x-admin-layout>

    <div class="flex flex-col w-[95%] border border-0 mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Vendors             
                </div>
                
                
        </section>
    


        @if ($vendors->count())
            <section class="flex flex-col py-2 ">
                    <table class="table-auto border-collapse border border-1 border-gray-200" 
                                >
                        <thead>
                            <tr class="bg-gray-200">
                                <th width='5%' class="text-center font-semibold py-4">SN</th>
                                <th width='25%' class="font-semibold py-2 text-left">Business Name</th>
                                <th width='15%' class="font-semibold py-2 text-left">Contact Person</th>
                                <th width='10%'class="font-semibold py-2 text-left">Contact Phone</th>
                                <th width='20%' class="font-semibold py-2 text-left">Email</th>
                                <th width='15%' class="font-semibold py-2 text-left">Submitted By</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = ($vendors->currentPage() -1 ) * $vendors->perPage();
                            @endphp

                                @foreach ($vendors as $vendor)
                                <tr class="border border-b border-gray-200">
                                    <td class='text-center py-8'>{{ ++$counter }}.</td>
                                    <td>
                                        
                                            {{ $vendor->business_name }} 
                                                       
                                           
                                    </td>
                                    
                    
                                    <td>
                                            {{ $vendor->contact_person }}
                                    </td>

                                    <td>
                                            {{ $vendor->contact_phone }}
                                    </td>

                                    <td>
                                            {{ $vendor->email }}
                                    </td>

                                    <td>
                                            {{ $vendor->user->staff->surname }} {{ $vendor->user->staff->firstname }}                                      


                                    </td>
                                    
                                    

                                </tr>
                                @endforeach                         
                            
                        </tbody>

                    </table>

                    {{ $vendors->links() }}


            </section>
        @else
            <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                <div class="flex flex-row border-0 justify-center 
                            text-2xl font-semibold text-gray-300 py-8">
                        There is currently no Vendor
                </div>
            </section>
        @endif
        
       
        
        
    </div>
    
    </x-admin-layout>

