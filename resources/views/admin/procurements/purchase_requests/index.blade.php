<x-admin-layout>

    <div class="flex flex-col w-[95%] border border-0 mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Purchase Requests          
                </div>
               
                
        </section>
    


        @if ($requests->count())
            <section class="flex flex-col py-2 ">
                    <table class="table-auto border-collapse border border-1 border-gray-200" 
                                >
                        <thead>
                            <tr class="bg-gray-200">
                                <th width='5%' class="text-center font-semibold py-2">SN</th>
                                <th width='25%' class="font-semibold py-2 text-left">Item</th>
                                <th width='10%' class="font-semibold py-2 text-left">Quantity</th>
                                <th width='10%'class="font-semibold py-2 text-left">Cost</th>
                                <th width='20%' class="font-semibold py-2 text-left">Location</th>
                                <th width='20%' class="font-semibold py-2 text-left">Vendor</th>
                                <th width='15%' class="font-semibold py-2 text-left">Submitted By</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = ($requests->currentPage() -1 ) * $requests->perPage();
                            @endphp

                                @foreach ($requests as $request)
                                <tr class="border border-b border-gray-200">
                                    <td class='text-center py-4'>{{ ++$counter }}.</td>
                                    <td>                                        
                                            {{ $request->item }}                                                       
                                           
                                    </td>
                                    
                    
                                    <td>
                                            {{ $request->quantity }}
                                    </td>

                                    <td>
                                            {{ $request->cost }}
                                    </td>

                                    <td>
                                            {{ $request->location->name }}
                                    </td>

                                    <td>
                                            {{ $request->vendor->business_name }}
                                    </td>

                                    <td>
                                                
                                            {{ $request->user->staff->surname }} {{ $request->user->staff->firstname }}


                                    </td>
                                    
                                    

                                </tr>
                                @endforeach                         
                            
                        </tbody>

                    </table>

                    {{ $requests->links() }}


            </section>
        @else
            <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                <div class="flex flex-row border-0 justify-center 
                            text-2xl font-semibold text-gray-300 py-8">
                        There is currently no Purchase Request
                </div>
            </section>
        @endif
        
       
        
        
    </div>
    
    </x-admin-layout>

