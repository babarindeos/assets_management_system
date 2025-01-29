<x-admin-layout>
    <div class="container border-0 mx-auto">
        <!-- page header //-->
        <section class="flex flex-col w-[95%] md:w-[95%] py-1 mt-6 px-4 border-red-900 mx-auto">
        
            <div class="flex flex-col md:flex-row border-b  border-gray-300 py-2 justify-between">
                    <div class="flex flex-col md:w-3/4">
                        <h1 class="text-md font-semibold font-serif text-gray-800">
                            Location</h1>
                            <h1 class="text-2xl font-semibold font-serif text-gray-800">
                            {{$location->name}} ({{ $location->code }})</h1>
                    </div>
                    <div class="flex flex-row md:w-1/4 justify-end space-x-1">

                            
                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.locations.show', ['location' => $location->id]) }}" class="bg-green-600 text-white py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500">Location</a>
                                </div>

                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('admin.location_users.create', ['location'=> $location->id]) }}" class="border border-green-600 text-gree py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500 hover:text-white hover:border-green-500">Create User</a>
                                </div>
                            </form>
                    </div>
            </div>
        </section>
        <!-- end of page header //-->

        @if ($location_users->count())
        <section class="flex flex-row py-2 px-2 justify-between w-[93%] mx-auto md:px-1">
                    <div>
                        <h1 class="text-2xl font-medium">Users</h1>
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
                                <th width="10%" class="text-center font-semibold py-4 w-16">SN</th>                                
                                <th width="40%" class="font-semibold py-2 text-left">Full names</th>                    
                                <th width="30%" class="font-semibold py-2 text-left">Organ</th>
                                <th width="20%" class="border font-semibold py-2 text-center">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                @php 
                                    $counter = 0;
                                    
                                    $counter = ($location_users->currentPage() - 1 ) * $location_users->perPage();
                                
                                @endphp

                                @foreach ($location_users as $location_user)
                                    <tr class="border border-b border-gray-200 ">
                                        <td class='text-center py-8'>{{ ++$counter }}.</td>                                       
                                        <td>
                                            <a class="hover:underline" href="{{ route('admin.profile.email_user_profile',['email'=>$location_user->user->email]) }}">
                                                {{ $location_user->user->staff->surname }} {{ $location_user->user->staff->firstname }}</a>
                                            

                                            <div class="flex flex-row text-sm space-x-4"> 
                                                <div>Assets ({{ $location_user->assets->count() }})</div>                                                
                                            </div>

                                        </td>

                                        <td>
                                            {{ $location_user->location->organ->name}}
                                            <div class="text-sm">
                                                ({{ $location_user->location->organ->location_type->name }})
                                            </div>

                                        </td>
                                        
                                        <td class="text-center">                                           
                                            <form action="{{ route('admin.location_users.delete', ['location' => $location->id, 'location_user' => $location_user->id]) }}" 
                                                  method="POST">
                                                @csrf
                                                <span> 
                                                    <button class="hover:bg-red-500 bg-red-400 text-white rounded-md 
                                                            px-4 py-1 text-xs">Delete</button>
                                                </span>	
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                        
                                
                    </table>

                    <div class="py-2">
                        {{ $location_users->links() }} 
                    </div>
                </section>
        @else
                <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                    <div class="flex flex-row text-2xl font-semibold text-gray-300 justify-center py-8">
                        No User record is found in this Location
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