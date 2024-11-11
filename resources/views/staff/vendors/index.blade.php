<x-staff-layout>

    <div class="flex flex-col w-[95%] border border-0 mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Vendors             
                </div>
                <div>
                            <a href="{{ route('staff.procurements.vendors.create') }}" class="bg-green-600 text-white py-2 px-4 
                                            rounded-lg text-sm hover:bg-green-500">New Vendor</a>
                </div>
                
        </section>
    


        @if ($vendors->count())
            <section class="flex flex-col py-2 ">
                    <table class="table-auto border-collapse border border-1 border-gray-200" 
                                >
                        <thead>
                            <tr class="bg-gray-200">
                                <th width='5%' class="text-center font-semibold py-2">SN</th>
                                <th width='25%' class="font-semibold py-2 text-left">Business Name</th>
                                <th width='15%' class="font-semibold py-2 text-left">Contact Person</th>
                                <th width='10%'class="font-semibold py-2 text-left">Contact Phone</th>
                                <th width='20%' class="font-semibold py-2 text-left">Email</th>
                                <th width='15%' class="font-semibold py-2 text-center">Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = ($vendors->currentPage() -1 ) * $vendors->perPage();
                            @endphp

                                @foreach ($vendors as $vendor)
                                <tr class="border border-b border-gray-200">
                                    <td class='text-center py-4'>{{ ++$counter }}.</td>
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
                                                <div class="flex flex-col md:flex-row justify-center items-center space-y-1 md:space-x-1 md:space-y-0">
                                                    <span class="text-sm">
                                                        <a class="hover:bg-blue-500 bg-blue-400 text-white rounded-md 
                                                                px-4 py-1 text-xs" href="{{ route('staff.procurements.vendors.edit',['vendor'=>$vendor->id]) }}">Edit</a>
                                                    </span>
                                                    <span> 
                                                        <a class="hover:bg-red-500 bg-red-400 text-white rounded-md 
                                                                px-4 py-1 text-xs"
                                                                href="{{ route('staff.procurements.vendors.confirm_delete',['vendor'=>$vendor->id]) }}">Delete</a>
                                                    </span>
                                                </div>
                                         


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
    
    </x-staff-layout>

