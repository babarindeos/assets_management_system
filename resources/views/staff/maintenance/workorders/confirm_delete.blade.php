<x-staff-layout>
    <div class="container mx-auto">
        <!-- page header //-->
        <section class="flex flex-col w-[90%] md:w-[95%] py-8 px-4 border-red-900 mx-auto">
            
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div >
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">Delete Work Order</h1>
                    </div>                
            </div>
            
        </section>
        <!-- end of page header //-->



        <!-- new service provider form //-->
        <section>
                <div>
                    <form  action="{{ route('staff.maintenance.workorders.delete', ['workorder' => $workorder->id]) }} " method="POST" class="flex flex-col mx-auto w-[90%] items-center justify-center">
                        @csrf

                        

                        <div class="flex flex-col w-[80%] md:w-[60%] py-2 md:py-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                            <h2 class="font-semibold text-xl py-1" ></h2>
                            Do you really wish to delete this Work Order?
                        </div>


                       
                        <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-4">
                            <button type="submit" class="border border-1 bg-gray-400 py-4 px-4 text-white 
                                           hover:bg-red-500
                                           rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Delete Work Order</button>
                        </div>
                        
                    </form><!-- end of new Service Provider form //-->
                <div>
        </section>
        <!-- end of new service provider form //-->


    </div><!-- end of container //-->
</x-staff-layout>