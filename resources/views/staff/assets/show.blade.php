<x-staff-layout>

    <div class="flex flex-col container mx-4 border border-0 md:mx-auto">
        <section class="flex border-b border-gray-200 py-4 mt-2">
                <div class="text-2xl font-semibold ">
                    Asset          
                </div>
                <div class="flex flex-row w-full justify-end space-x-1">
                            
                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('staff.assets.edit',['asset'=>$asset->id]) }}" class="bg-green-600 text-white py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500">Edit </a>
                                </div>

                                <div class="border-0 flex flex-col items-center justify-center">
                                        <a href="{{ route('staff.assets.confirm_delete',['asset'=>$asset->id]) }}" class="border border-green-600 text-gree py-2 px-4 
                                                rounded-lg text-sm hover:bg-green-500 hover:text-white hover:border-green-500">Delete</a>
                                </div>                               
                               
                            </form>
                    </div>
                
        </section>
    
        
    
        <section class="py-6">
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
    </div>
    
</x-staff-layout>