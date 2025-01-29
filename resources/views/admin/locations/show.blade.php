<x-admin-layout>
    <div class="container border-0 mx-auto">
        <!-- page header //-->
        <section class="flex flex-col w-[95%] md:w-[95%] py-1 mt-6 px-4 border-red-900 mx-auto">
        
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div class="flex flex-col w-3/4">
                        <h1 class="text-md font-semibold font-serif text-gray-800">
                            Location</h1>
                            <h1 class="text-2xl font-semibold font-serif text-gray-800">
                            {{$location->name}} ({{ $location->code }})</h1>
                    </div>
                    <div class="flex flex-row w-1/4 justify-end space-x-1">

                            
                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.locations.index') }}" class="bg-green-600 text-white py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500">Locations</a>
                                </div>

                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.location_users.index', ['location'=>$location->id]) }}" class="border border-green-600 text-gree py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500 hover:text-white hover:border-green-500">Users</a>
                                </div>
                            </form>
                    </div>
            </div>
        </section>
        <!-- end of page header //-->

        @if ($location->count())
                <section class="flex flex-row py-2 px-2 justify-between w-[93%] mx-auto md:px-1">
                    <div>
                        <h1 class="text-2xl font-medium">Assets</h1>
                    </div>


                    <div class="flex justify-end border w-1/4">
                    
                        <input type="text" name="search" class="w-4/5 md:w-full border border-1 border-gray-400 bg-gray-50
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
                                <th width="10%" class="text-center font-semibold py-2 w-16">SN</th>  
                                <th width="10%" class="font-semibold py-2 text-left">Identifier</th>                                
                                <th width="40%" class="font-semibold py-2 text-left">Item</th>                    
                                <th width="20%" class="font-semibold py-2 text-left">Category</th>
                                <th width="20%" class="font-semibold py-2 text-left">Life Span</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 0;
                            @endphp

                            @foreach($location->users as $user)
                                @foreach($user->assets as $asset)
                                     <tr class="border border-b border-gray-200 ">
                                        <td class='text-center py-8'>{{ ++$counter }}.</td>   
                                        <td>
                                            <a class='underline' href="{{ route('admin.assets.show',['asset'=>$asset->id]) }}">
                                                {{ $asset->uuid }}
                                            </a>
                                        </td>                                    
                                        <td>{{ $asset->item }}</td>
                                        <td>{{ $asset->category->name }} </td>
                                        <td>{{ $asset->life_span }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>                       
                                
                    </table>

                    <div class="py-2">
                        <!-- {{-- $location->links() --}} -->
                    </div>
                </section>
        @else
                <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                    <div class="flex flex-row text-2xl font-semibold text-gray-300 justify-center py-8">
                        No Location record is found
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