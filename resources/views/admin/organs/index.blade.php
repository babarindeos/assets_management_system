<x-admin-layout>
    <div class="container border-0 mx-auto">
        <!-- page header //-->
        <section class="flex flex-col w-[95%] md:w-[95%] py-1 mt-6 px-4 border-red-900 mx-auto">
        
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div class="flex flex-row w-1/4">
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">Organs</h1>
                    </div>
                    <div class="flex flex-row w-3/4 justify-end space-x-1">
                            
                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.locations.index') }}" class="bg-green-600 text-white py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500">Locations</a>
                                </div>

                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.location_types.index') }}" class="border border-green-600 text-gree py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500 hover:text-white hover:border-green-500">Location Types</a>
                                </div>

                                
                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.organs.create') }}" class="border border-green-600 text-gree py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500 hover:text-white hover:border-green-500">New Organ</a>
                                </div>
                            </form>
                    </div>
            </div>
        </section>
        <!-- end of page header //-->

        @if ($organs->count())
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
                                <th width="5%" class="text-center font-semibold py-2 w-16">SN</th>                                
                                <th width="55%" class="font-semibold py-2 text-left">Name</th>                    
                                <th width="10%" class="font-semibold py-2 text-left">Code</th>
                                <th width="10%" class="font-semibold py-2 text-left">Location Type</th>
                                <th width="20%" class="font-semibold py-2 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php 
                                    $counter = 0;
                                    
                                    $counter = ($organs->currentPage() - 1 ) * $organs->perPage();
                                
                                @endphp

                                @foreach ($organs as $organ)
                                    <tr class="border border-b border-gray-200 ">
                                        <td class='text-center py-4'>{{ ++$counter }}.</td>                                       
                                        <td>
                                            <a class="hover:underline" href="{{ route('admin.organs.show',['organ'=>$organ->id]) }}">
                                                {{ $organ->name }}</a>
                                            

                                            <div class="flex flex-row text-sm space-x-4">
                                                <div>Assets ()</div>
                                                <div>Users ()</div>
                                            </div>

                                        </td>

                                        <td>{{ $organ->code }}</td>

                                        <td>{{ $organ->location_type->name }}</td>
                                        <td class="text-center">
                                            
                                            <span class="text-sm">
                                                <a class="hover:bg-blue-500 bg-blue-400 text-white rounded-md 
                                                        px-4 py-1 text-xs" href="{{ route('admin.organs.edit', ['organ' => $organ->id]) }}">Edit</a>
                                            </span>
                                            <span> 
                                                <a class="hover:bg-red-500 bg-red-400 text-white rounded-md 
                                                        px-4 py-1 text-xs"
                                                href="{{ route('admin.organs.confirm_delete', ['organ' => $organ->id]) }}">Delete</a>
                                            </span>	
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                                
                    </table>

                    <div class="py-2">
                        {{ $organs->links() }}
                    </div>
                </section>
        @else
                <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                    <div class="flex flex-row text-2xl font-semibold text-gray-300 justify-center py-8">
                        No Organ record is found
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