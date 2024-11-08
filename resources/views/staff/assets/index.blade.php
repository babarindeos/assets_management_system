<x-staff-layout>

    <div class="flex flex-col w-[95%] border border-0 mx-auto">
        <section class="flex border-b border-gray-300 py-4 mt-4 justify-between">
                <div class="text-2xl font-semibold ">
                    Assets               
                </div>
                <div>
                            <a href="{{ route('staff.assets.create') }}" class="bg-green-600 text-white py-2 px-4 
                                            rounded-lg text-sm hover:bg-green-500">New Asset</a>
                </div>
                
        </section>
    


        @if ($assets->count())
            <section class="flex flex-col py-2 ">
                    <table class="table-auto border-collapse border border-1 border-gray-200" 
                                >
                        <thead>
                            <tr class="bg-gray-200">
                                <th width='5%' class="text-center font-semibold py-2">SN</th>
                                <th width='15%' class="font-semibold py-2 text-left">Identifier</th>
                                <th width='25%' class="font-semibold py-2 text-left">Item</th>
                                <th width='10%' class="font-semibold py-2 text-left">Cost</th>
                                <th width='15%'class="font-semibold py-2 text-left">Purchase Date</th>
                                <th class="font-semibold py-2 text-left">Life Span</th>
                                <th class="font-semibold py-2 text-left">Location</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = ($assets->currentPage() -1 ) * $assets->perPage();
                            @endphp

                                @foreach ($assets as $asset)
                                <tr class="border border-b border-gray-200">
                                    <td class='text-center py-4'>{{ ++$counter }}.</td>
                                    <td>
                                        <a class="underline" href="{{ route('staff.assets.show', ['asset'=>$asset->id]) }}">
                                            {{ $asset->uuid }} 
                                        </a>
                                        
                                        
                                    </td>
                                    
                                    <td>
                                        {{ $asset->item }}
                                        <div>
                                            <small>
                                                Category: {{  $asset->category->name }}
                                            </small>
                                        </div>
                                    </td>

                                    <td>
                                        @if($asset->cost!='')
                                            {{ $asset->cost }}
                                        @endif
                                    </td>

                                    <td>
                                        {{ $asset->purchase_date }}
                                    </td>

                                    <td>
                                        {{ $asset->life_span }}
                                    </td>

                                    <td>
                                        {{ $asset->location->location->name }}
                                        <div>
                                            <small> {{ $asset->location->location->organ->name }} </small>
                                        </div>
                                    </td>
                                    
                                    

                                </tr>
                                @endforeach                         
                            
                        </tbody>

                    </table>

                    {{ $assets->links() }}


            </section>
        @else
            <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                <div class="flex flex-row border-0 justify-center 
                            text-2xl font-semibold text-gray-300 py-8">
                        There is currently no Asset
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