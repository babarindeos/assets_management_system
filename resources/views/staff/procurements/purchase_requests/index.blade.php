<x-staff-layout>

    <div class="flex flex-col w-[95%] border border-0 mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Purchase Requests          
                </div>
                <div>
                            <a href="{{ route('staff.procurements.purchase_requests.create') }}" class="bg-green-600 text-white py-2 px-4 
                                            rounded-lg text-sm hover:bg-green-500">New Purhase Request</a>
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
                                <th width='15%' class="font-semibold py-2 text-center">Action</th>                                
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
                                                <div class="flex flex-col md:flex-row justify-center items-center space-y-1 md:space-x-1 md:space-y-0">
                                                    <span class="text-sm">
                                                        <a class="hover:bg-blue-500 bg-blue-400 text-white rounded-md 
                                                                px-4 py-1 text-xs" href="{{ route('staff.procurements.purchase_requests.edit',['purchase_request'=>$request->id]) }}">Edit</a>
                                                    </span>
                                                    <span> 
                                                        <a class="hover:bg-red-500 bg-red-400 text-white rounded-md 
                                                                px-4 py-1 text-xs"
                                                                href="{{ route('staff.procurements.purchase_requests.confirm_delete',['purchase_request'=>$request->id]) }}">Delete</a>
                                                    </span>
                                                </div>
                                         


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
    
    </x-staff-layout>

