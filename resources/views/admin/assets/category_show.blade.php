<x-admin-layout>
    <div class="container border-0 mx-auto">
        <!-- page header //-->
        <section class="flex flex-col md:w-full py-1 mt-6 px-4 border-red-900 mx-auto">       
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div class="flex flex-row w-full border-0">
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">Assets Category: {{ $category->name }}</h1>
                    </div>
                   
            </div>
        </section>
        <!-- end of page header //-->

        @if ($assets->count())
            <div class="flex flex-col overflow-x-auto">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table
                                class="min-w-full text-start text-md font-light text-surface dark:text-white">
                                <thead
                                    class="border-b border-neutral-200 font-medium dark:border-white/10">
                                    <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4 text-left">Identifier</th>
                                    <th scope="col" class="px-6 py-4 text-left">Item</th>
                                    <th scope="col" class="px-6 py-4 text-left">Cost</th>
                                    <th scope="col" class="px-6 py-4 text-left">Purchase Date</th>
                                    <th scope="col" class="px-6 py-4 text-left">Supplier</th>
                                    <th scope="col" class="px-6 py-4 text-left">Life Span</th>
                                    <th scope="col" class="px-6 py-4 text-left">Location</th>
                                    <th scope="col" class="px-6 py-4 text-left">Custodian</th>
                                    <th scope="col" class="px-6 py-4 text-left">Department</th>
                                    <th scope="col" class="px-6 py-4 text-left">Depreciation</th> 
                                    <th scope="col" class="px-6 py-4 text-left">Disposal Date</th> 
                                    <th scope="col" class="px-6 py-4 text-left">Disposal Revenue</th>
                                    <th scope="col" class="px-6 py-4 text-left">Dispose Authority</th> 
                                    <th scope="col" class="px-6 py-4 text-left">Comment</th>   

                                    </tr>
                                </thead>
                                <tbody>
                                        @php
                                            $counter = ($assets->currentPage() -1 ) * $assets->perPage();
                                        @endphp

                                        @foreach ($assets as $asset)

                                            <tr class="border-b border-neutral-200 dark:border-white/10">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium text-center">{{ ++$counter; }}.</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <a class='underline' href="{{ route('admin.assets.show',['asset'=>$asset->id]) }}"">
                                                        {{ $asset->uuid }}
                                                    </a>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $asset->item }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $asset->cost }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $asset->purchase_date}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $asset->supplier }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $asset->life_span }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $asset->location->location->name }}
                                                        <div>
                                                            <small> {{ $asset->location->location->organ->name }} </small>
                                                        </div>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $asset->user->surname }} {{ $asset->user->firstname }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $asset->location->location->organ->name}}

                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $asset->depreciation }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $asset->disposal_rate }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $asset->dispose_authority }}
                                                </td>

                                                <td class=" px-6 py-4">
                                                    {{ $asset->comment }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            {{ $assets->links() }}

        @else
                <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4">
                    <div class="flex flex-row text-2xl font-semibold text-gray-300 justify-center py-8">
                        No Asset record is found
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