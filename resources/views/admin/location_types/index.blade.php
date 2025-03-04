<x-admin-layout>
    <div class="container border-0 mx-auto">
        <!-- page header //-->
        <section class="flex flex-col w-[95%] md:w-[95%] py-1 mt-6 px-4 border-red-900 mx-auto">
        
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div class="flex flex-row w-1/4">
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">Location Types</h1>
                    </div>
                    <div class="flex flex-row w-3/4 justify-end space-x-1">

                            
                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.location_types.create') }}" class="bg-green-600 text-white py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500">New Location Type</a>
                                </div>

                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.organs.index') }}" class="border border-green-600 text-gree py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500 hover:text-white hover:border-green-500">Organs</a>
                                </div>

                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.locations.index') }}" class="border border-green-600 text-gree py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500 hover:text-white hover:border-green-500">Locations</a>
                                </div>
                            </form>
                    </div>
            </div>
        </section>
        <!-- end of page header //-->

        @if ($location_types->count())
                <section class="flex flex-col py-2 px-2 justify-end w-[93%] mx-auto md:px-1">
                    <div class="flex justify-end border border-0">
                    
                        <input type="text" name="search" class="w-4/5 md:w-2/5 border border-1 border-gray-400 bg-gray-50
                                    p-2 rounded-md 
                                    focus:outline-none
                                    focus:border-blue-500 
                                    focus:ring
                                    focus:ring-blue-100" placeholder="Search"                
                                
                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                  
                        
                        />  
                    </div>
                    
                </section>
                <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                    <table class="table-auto border-collapse border border-1 border-gray-200" 
                                >
                        <thead>
                            <tr class="bg-gray-200">
                                <th width="8%" class="text-center font-semibold py-4 ">SN</th>

                                <th width="70%" class="font-semibold py-2 text-left">Name</th>                  
                                
                                <th class="font-semibold py-2 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = ($location_types->currentPage() -1) * $location_types->perPage();
                            @endphp
                            
                            @foreach($location_types as $location_type)
                                <tr class="border border-b border-gray-200 ">
                                    <td class='text-center py-8'>{{ ++$counter }}.</td>
                                    <td>
                                        <a class="hover:underline" href="{{ route('admin.location_types.show', ['location_type'=>$location_type->id]) }}" >
                                                {{ $location_type->name }}
                                        </a>
                                        <div class="flex flex space-x-4 text-sm">
                                            <div>Organs ({{ $location_type->organ->count() }})</div>    
                                                                                     
                                            
                                        </div>
                                    
                                    </td>
                                    
                                    <td class="text-center">
                                        <span class="text-sm">
                                            <a class="hover:bg-blue-500 bg-blue-400 text-white rounded-md 
                                                    px-4 py-1 text-xs" href="{{ route('admin.location_types.edit', ['location_type'=>$location_type->id])}}">Edit</a>
                                        </span>
                                        <span> 
                                            <a class="hover:bg-red-500 bg-red-400 text-white rounded-md 
                                                    px-4 py-1 text-xs" href="{{ route('admin.location_types.confirm_delete', ['location_type'=>$location_type->id])}}"
                                            href=''>Delete</a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                                
                    </table>

                    <div class="py-2">
                        {{ $location_types->links() }}
                    </div>
                </section>
        @else
                <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                    <div class="flex flex-row text-2xl font-semibold text-gray-300 justify-center py-8">
                        No Location Type record is found
                    </div>
                </section>
        @endif
    </div>
</x-admin-layout>

<script>
    $(document).ready(function(){
        $("input[name='search']").on('keyup', function(){
            var value = $(this).val().toLowerCase();

            $("table tbody tr").filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            })
        });
    });

</script>