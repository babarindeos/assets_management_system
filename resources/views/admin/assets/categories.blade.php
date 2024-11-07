<x-admin-layout>
    <div class="container border-0 mx-auto">
        <!-- page header //-->
        <section class="flex flex-col w-[95%] md:w-[95%] py-1 mt-6 px-4 border-red-900 mx-auto">
        
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div class="flex flex-row md:w-1/4">
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">Asset Categories</h1>
                    </div>                   
            </div>
        </section>
        <!-- end of page header //-->



        <!-- section //-->
        <section class="flex flex-col w-[95%] md:w-[95%] mx-auto px-4" style="overflow-x:auto;">

            <table class="table-auto border-collapse border border-1 border-gray-200 md:w-1/2">
                <thead>
                    <tr class="bg-gray-200">
                        <th width='15%' class="text-center py-4 px-2">SN</th>
                        <th class='text-left'>Category</th>
                        <th class='text-left'>Assets</th>
                    </tr>
                </thead>
                <tbody>
                        @php
                                $counter = ($categories->currentPage() -1 ) * $categories->perPage();
                        @endphp

                        @foreach ($categories as $category)
                            <tr>
                                <td class='text-center py-4'>{{ ++$counter }}.</td>
                                <td>
                                    <a class="underline" href="{{ route('admin.assets.categories.show', ['category'=>$category->id]) }}" class="hover:underline">
                                        {{ $category->name }}
                                    </a>
                                </td>
                                <td>{{ $category->assets->count() }}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
           
        </section>
        <!-- end of section //-->

        
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