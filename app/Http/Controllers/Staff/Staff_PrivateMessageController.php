<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Workflow;
use App\Models\FlowContributor;
use App\Models\Document;
use App\Models\PrivateMessage;
use App\Http\Classes\MessageClass;

class Staff_PrivateMessageController extends Controller
{
    //
    public function index($document, $recipient)
    {
        $sender = Auth::user()->id;
        $chat_users_id = MessageClass::chat_users_id($sender, $recipient);
        
        
        //$chat_uuid = Crypt::encryptString($chat_users_id);
        //$chat_uuid = sha1($chat_users_id);

        $chat_uuid = hash('sha256', $chat_users_id);

        // update recipient read status
         PrivateMessage::where('doc_id', $document)
                        ->where('recipient_id', Auth::user()->id)->update(['read'=>true]);
               

        return redirect()->route('staff.workflows.private_message.chat', ['document'=>$document, 'sender'=>$sender, 
                                                                          'recipient'=>$recipient, 'chat_uuid'=>$chat_uuid]);
        
    }

    public function chat(Document $document, $sender, $recipient, $chat_uuid)
    {
        

        $workflow_contributors = FlowContributor::where('doc_id', $document->id)
                                       ->whereIn('user_id', [$sender, $recipient])->get();      

        //dd($workflow_contributors);

        $messages = PrivateMessage::where('chat_uuid', $chat_uuid)->orderBy('created_at', 'desc')->get();


        $sender = User::find($sender);
        $recipient = User::find($recipient);

        return view('staff.private_messages.chat', compact('document', 'workflow_contributors', 'sender', 'recipient', 'chat_uuid', 'messages'));

    }

    public function store(Request $request, $document, $sender, $recipient, $chat_uuid)
    {
        $formFields = $request->validate([
            'message' => 'required'
        ]);


        
        $formFields['doc_id'] = $document;
        $formFields['sender_id'] = $sender;
        $formFields['recipient_id'] = $recipient;
        $formFields['chat_users_id'] =  MessageClass::chat_users_id($sender, $recipient);
        $formFields['chat_uuid'] = $chat_uuid;

        $chat = PrivateMessage::create($formFields);

        return redirect()->back();
    }

    public function my_private_messages()
    {
        $private_messages = PrivateMessage::where('recipient_id', Auth::user()->id)
                                            ->groupBy('sender_id')
                                            ->orderBy('created_at', 'desc')
                                            ->get();
        dd($private_messages);
    }


}
