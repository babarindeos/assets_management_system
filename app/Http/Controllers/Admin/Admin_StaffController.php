<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Department;
use App\Models\Staff;
use App\Models\Ministry;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Directorate;
use App\Models\Division;
use App\Models\Branch;
use App\Models\Section;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Mail;


class Admin_StaffController extends Controller
{
    //
    public function index(){
       
        $staffs = Staff::orderBy('surname', 'asc')
                        ->orderBy('firstname', 'asc')
                        ->orderBy('middlename', 'asc')
                        ->paginate(2);
        return view('admin.staff.index', compact('staffs'));

    }

    public function select_organ(Request $request)
    {
        
        return redirect()->route('admin.staff.create', ['organ'=> $request->input('organ')]);

    }

    public function create(){
        
       return view('admin.staff.create');

    }

    public function store(Request $request){

        //dd($request);
        // generate a 6 character passsword
        $password= Str::substr(Str::uuid(), 0,6);

       // dd($password);

        $formFields = $request->validate([             
            'fileno' => 'required|unique:staff,fileno',
            'title' => 'required',
            'surname' => 'required | string',
            'firstname' => ['required', 'string'],
            'middlename' => ['required', 'string'],            
            'email' => 'required|email|unique:users,email',
            'role' => 'required | string'
        ]);


        $staff_exist = Staff::where('fileno', $request->input('fileno'))->exists();

        if ($staff_exist)
        {
            $data = [
                'error' => true,
                'status' => 'fail',
                'message' => 'A Staff with the Staff No. already exist'
            ];

            return redirect()->back()->with($data);
        }

        $formFields['surname'] = strtoupper($formFields['surname']);
        $formFields['firstname'] = ucfirst($formFields['firstname']);
        $formFields['middlename'] = ucfirst($formFields['middlename']);
        $formFields['email'] = strtolower($formFields['email']);
        

        DB::beginTransaction();

        try{
            
            // create user login for the user
            /* $user = new User();
            $user->fileno = $formFields['fileno'];
            $user->surname = $formFields['surname'];
            $user->firstname = $formFields['firstname'];
            $user->middlename = $formFields['middlename'];
            $user->email = $formFields['email'];
            $user->password = bcrypt($password);
            $user->role = "staff";
            $user->save(); */

            $userData = [
                'surname' => $formFields['surname'],
                'firstname' => $formFields['firstname'],
                'middlename' => $formFields['middlename'],
                'email' => $formFields['email'],
                'password' => bcrypt($password),
                'role' => 'staff'
            ];

            
            $createUser = User::create($userData);           


            if ($createUser){                      

                try
                {

                    $formFields['user_id'] = $createUser->id;

                    $createStaff = Staff::create($formFields);

                    if ($createStaff)
                    {
                            $data = [
                                'error' => true,
                                'status' => 'success',
                                'message' => 'The Staff has been successfully created'
                            ];         


                            // send email
                            $fullname = $formFields['surname'].' '.$formFields['firstname'];
                            $username = $formFields['email'];
                            $recipient = $fullname;
                            $recipient_email = $formFields['email'];

                            $payload = array("fullname"=>$fullname, "username"=>$username, "password"=>$password);

                            
                            Mail::send('emails.onboarding', $payload, function($message) use($recipient_email, $recipient){
                                $message->to($recipient_email, $recipient)
                                        ->subject("Welcome to O-ORBDA AMS");
                                $message->from("clearanceinfo@funaab.edu.ng", "O-ORBDA AMS");
                                        
                            });        

                            DB::commit();
                    }
                    else
                    {
                            $data = [
                                'error' => true,
                                'status' => 'success',
                                'message' => 'An error occurred creating the Staff'
                            ];   
                            
                            DB::rollBack();
                    }

                    
    
                }
                catch(\Exception $e)
                {
                    $data = [
                        'error' => true,
                        'status' => 'fail',
                        'message' => 'An error occurred '.$e->getMessage()
                    ];   

                        DB::rollBack();
                }

            }
            else
            {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred creating the User Account'
                ];

                DB::rollBack();
            }
        }
        catch(\Exception $e)
        {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred creating the Staff '.$e->getMessage()
                ];

                DB::rollBack();
        }

        return redirect()->back()->with($data);

    }


    public function edit(Request $request, Staff $staff){
        $departments = Department::orderBy('department_name', 'asc')->get();
        $colleges = College::orderBy('college_name', 'asc')->get();

        return view('admin.staff.edit', compact('staff', 'colleges', 'departments'));
    }

    
    public function update(Request $request, Staff $staff){
        $formFields = $request->validate([            
            'department' => ['required'],
            'title' => ['required', 'string'],
            'fileno' => 'required | string',
            'surname' => 'required | string',
            'firstname' => 'required | string',
            'middlename' => 'required | string',
        ]);

        
        $formFields['department_id'] = $request->input('department');

        try{
            $update = $staff->update($formFields);

            if ($update){
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'Staff Information has been successfully updated'
                ];
            }else{
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred updating the staff information'
                ];
            }

        }catch(\Exception $e){
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred updating the staff information: '.$e->getMessage()
                ];
        }
       
        return redirect()->back()->with($data);
    }
}
