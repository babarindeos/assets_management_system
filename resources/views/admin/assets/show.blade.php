<x-admin-layout>
    <div class="container mx-auto">
        <!-- page header //-->
        <section class="flex flex-col md:w-full py-1 mt-6 px-4 border-red-900 mx-auto">
        
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div class="flex flex-row w-1/4">
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">Assets</h1>
                    </div>
                   
            </div>
        </section>
        <!-- end of page header //-->



        <!-- section //-->
        <section class="py-8 px-4 mt-2">
            <table width="80%"  >
                <tbody>
                    <tr class="border-b">
                        <td width="35%" class="py-4 font-semibold">Unique Identifer</td>
                        <td>{{ $asset->uuid }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Category</td>
                        <td>{{ $asset->category->name }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Item</td>
                        <td>{{ $asset->item }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Description</td>
                        <td>{{ $asset->description }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Cost</td>
                        <td>{{ $asset->cost }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Date of Purchase/Completion</td>
                        <td>{{ $asset->purchase_date }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Date of Purchase/Completion</td>
                        <td>{{ $asset->purchase_date }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Expected Life Span</td>
                        <td>{{ $asset->life_span }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Rate and Method of Depreciation</td>
                        <td>{{ $asset->depreciation_rate }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Date of Disposal</td>
                        <td>{{ $asset->disposal_date }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Revenue from Disposal/Receipt No.</td>
                        <td>{{ $asset->disposal_revenue }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Authority to Disposed</td>
                        <td>{{ $asset->dispose_authority }}</td>
                    </tr>

                    <tr class="border-b">
                        <td width="25%" class="py-4 font-semibold">Additional Information</td>
                        <td>{{ $asset->comment }}</td>
                    </tr>



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