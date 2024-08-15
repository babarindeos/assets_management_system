<x-staff-layout>

    <div class="flex flex-col container mx-4 border border-0 md:mx-auto">
        <section class="border-b border-gray-200 py-2 mt-2">
                <div class="text-2xl font-semibold ">
                    Private Message              
                </div>
                
        </section>
    
        <section>
                <div class="flex flex-row space-x-4 md:space-x-8">
                        <div class="flex">
                                <a onclick="history.back();" class="border px-4 py-1 mt-1 cursor-pointer 
                                                                hover:font-semibold hover:border-gray-300">    
                                        &laquo; Back
                                </a>
                        </div>
                        <div class="flex md:justify-center items-center">
                                <a href="{{ route('staff.workflows.flow', ['document'=>$document->id]) }}" class="font-semibold hover:underline cursor-pointer">
                                {{ $document->title }}
                                </a>
                        </div>
                </div>
        </section>


        <section class="py-2 mt-2">
            
            <div class="flex md:w-[30%] text-xs justify-end">                                        
                <a href="{{ route('staff.workflows.general_message',['document'=>$document->id]) }}" class="border border-1 rounded-md border-green-500 py-1 px-3
                        hover:bg-green-500 hover:text-white">
                        General Message
                </a>
            </div>
            
            <div class="flex flex-col md:flex-row border-1">
                                
                
                <div class="flex  md:w-[30%] border-0 px-2 py-2 overflow-y-auto h-100 mr-2"><!-- left panel //-->
                        
                    
                        
                        <!-- Workflow Contributors //-->
                        <div class="w-full mt-2">
                            @foreach($workflow_contributors as $contributor)
                                <div class="w-full py-1">
                                        <div class="flex flex-row w-full text-sm border-b ">
                                                <div class="flex flex-col justify-center px-4 py-2 items-center">
                                                        @if ($contributor->user->profile!=null && $contributor->user->profile->avatar!='')
                                                                <img class="w-12 h-10 rounded-full" src="{{ asset('storage/'.$contributor->user->profile->avatar)}}" />
                                                        @else
                                                                <img class="w-12" src="{{ asset('images/avatar_64.jpg')}}" />
                                                        @endif                                                               
                                                </div>
                                                <div class="flex flex-col py-2 w-full">
                                                    <div class="font-bold">{{ $contributor->user->staff->surname}}  {{ $contributor->user->staff->firstname}}</div>
                                                    <div>{{ $contributor->user->staff->department->department_name}}  ({{ $contributor->user->staff->department->department_code}})</div>
                                                    <div>{{ $contributor->user->staff->department->ministry->name}} ({{ $contributor->user->staff->department->ministry->code}})</div>
                                                    
                                                </div>
                                        </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- end of workflow contributors //-->


                </div><!-- end of left pane //-->


                <div class="flex flex-col md:border-l  md:w-[60%] px-3 py-0 mb-2"><!-- Right pane //-->
                    <form action="{{ route('staff.workflows.private_message.store',['document'=>$document->id, 'sender'=>$sender, 
                                                                                   'recipient'=>$recipient, 'chat_uuid'=>$chat_uuid]) }}" method="POST">
                            @csrf
                            <!-- textarea //-->
                            <div>
                                    <span class="text-sm">
                                        @ {{$recipient->surname}} {{$recipient->firstname}}
                                    </span>
                            </div>
                            <div class="flex items-center py-1">
                                    <textarea name="message" rows="3" class="overflow-hidden border border-1 border-gray-400 bg-gray-50
                                            w-full p-1 py-2 rounded-md 
                                            focus:outline-none
                                            focus:border-blue-500 
                                            focus:ring
                                            focus:ring-blue-100" 
                                            
                                            value="{{ old('message') }}"
                                            
                                            style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                            maxlength="140">  </textarea>
                            </div>
                            <!-- end of textarea //-->

                            <!-- button //-->
                            <div class="flex justify-between">

                                <div class="flex text-xs text-gray-500">
                                    140 characters max
                                </div>
                                
                                <div>    
                                    <button type="submit" class="border border-1 border-green-500
                                    bg-green-500 text-white rounded-md py-2 px-4 text-xs font-semibold">
                                            Send
                                    </button>
                                </div>
                            </div>
                            <!-- end of button //-->
                    </form>



                    <!-- list of messages //-->
                    <div class="flex flex-col border-0 border-blue-900 h-50 overflow-y-auto py-2 mt-2">
                            
                        @foreach ($messages as $message)
                            <div class="flex flex-row my-2">
                                    <div class="px-3 border-0">
                                        @if ($message->sender->profile!=null && $message->sender->profile->avatar!="" )
                                            
                                                <img src="{{ asset('storage/'.$message->sender->profile->avatar)}}" class='w-12 h-10 rounded-full' />
                                        
                                        @else
                                                <img class="w-12" src="{{ asset('images/avatar_64.jpg')}}" />  
                                        @endif 
                                    </div>
                                    <div class="px-3 py-1 rounded-md bg-gray-100 w-full">
                                            <div class="font-semibold text-sm">
                                                    {{ $message->sender->surname }} {{ $message->sender->firstname }}
                                            </div>
                                            <div class="text-xs">
                                                    {{ $message->created_at->format('l jS F, Y @ g:i a') }}
                                            </div>
                                            <div class="text-sm py-2">
                                                    {{ $message->message}}
                                            </div>

                                    </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- end of list of messages //-->
                                                                                

                </div><!-- end of right panel //-->
            </div>             
        </section>
        
    </div>
    
    </x-staff-layout>