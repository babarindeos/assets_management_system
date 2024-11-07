<x-staff-layout>

<div class="flex flex-col container mx-4 border border-0 md:mx-auto">
    <section class="border-b border-gray-200 py-2 mt-2">
            <div class="text-2xl font-semibold ">
                Dashboard                
            </div>
            <div>
                @if (Auth::check())
                    Welcome {{ Auth::user()->surname }} {{ Auth::user()->firstname}}
                @endif
            </div>
    </section>

    


    


        




    
</div>

</x-staff-layout>