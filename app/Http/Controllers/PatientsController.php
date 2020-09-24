<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Patient;
use App\Models\Record;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;

class PatientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $id = auth()->user()->id;
        $patient = Patient::where('userId',$id)->get();
        
        if(count($patient) > 0)
        {
            $record = Record::where('patientId',$patient[0]['id'])->get();
            if(count($record) > 0)
            {
                return view('patient.index')->with('record',$record);
            }
            else
            {
                return redirect()->route('patient.createRecord');
            }
        }
        else
        {
            return redirect()->route('patient.create');
        }
    }

    public function create()
    {
        $user = auth()->user();
        return view('patient.create')->with('user',$user); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone'  => 'required|digits:11',
            'propic'      => 'required|image'
        ]);   

        $user = auth()->user();
        $patient = new Patient();
        $patient->phone = $request->phone;
        $patient->gender = $request->gender;
        $patient->bloodType = $request->bloodType;
        $patient->photo = $request->propic;
        $patient->userId = $user->id;
        $patient->save();

        $p = Patient::where('userId',$user->id)->get();
        $sub = new Subscription();
        $sub->regDate = date("Y-m-d H:i:s");
        $sub->paymentMethod = $request->pay;
        $sub->patientId = $p[0]['id'];
        $sub->subPlanId = $request->subPlan;
        $sub->save();

        return redirect()->route('patient.index'); 
    }

    function createRecord()
    {
        $id = auth()->user()->id;
        $patient = Patient::where('userId',$id)->get();
        
        return view('patient.createRecord');
    }

    function insertRecord(Request $request)
    {
        $request->validate([
            'height'  => 'required|integer|between:40,275',
            'weight'      => 'required|integer|gte:1',
            'bp'  => 'required|integer|between:40,200',
            'pulseRate'      => 'required|integer|between:50,200',
            'mood'      => 'required',
            'sleepDuration'      => 'required|integer|gte:0',
            'description'      => 'required'
        ]);

        $id = auth()->user()->id;
        $patient = Patient::where('userId',$id)->get();
        
        $record = new Record();
        $record->height = $request->height;
        $record->weight = $request->weight;
        $record->bp = $request->bp;
        $record->pulseRate = $request->pulseRate;
        $record->mood = $request->mood;
        $record->sleepDuration = $request->sleepDuration;
        $record->description = $request->description;
        $record->patientId = $patient[0]['id'];
        $record->save();

        return redirect()->route('patient.index');
    }

    function updateRecord()
    {
        $id = auth()->user()->id;
        $patient = Patient::where('userId',$id)->get();
        $record = Record::where('patientId',$patient[0]['id'])->get();
        
        return view('patient.updateRecord')->with('record',$record);
    }

    function editRecord(Request $request)
    {   
        $request->validate([
            'height'  => 'required|integer|between:40,275',
            'weight'      => 'required|integer|gte:1',
            'bp'  => 'required|integer|between:40,200',
            'pulseRate'      => 'required|integer|between:50,200',
            'mood'      => 'required',
            'sleepDuration'      => 'required|integer|gte:0',
            'description'      => 'required'
        ]);

        $id = auth()->user()->id;
        $patient = Patient::where('userId',$id)->get();
        $oldrecord = Record::where('patientId',$patient[0]['id'])->get();
        $hrid = $oldrecord[0]['hrid'];

        $record = Record::find($hrid);
        $record->height = $request->height;
        $record->weight = $request->weight;
        $record->bp = $request->bp;
        $record->pulseRate = $request->pulseRate;
        $record->mood = $request->mood;
        $record->sleepDuration = $request->sleepDuration;
        $record->description = $request->description;
        $record->save();

        return redirect()->route('patient.index');
    }

    function profile()
    {
        $id = auth()->user()->id;
        $patient = DB::table('users')
                        ->join('patients', 'users.id', '=', 'patients.userId')
                        ->where('users.id',$id)
                        ->get();
        return view('patient.profile')->with('patient',$patient);
    }

    function updateProfile()
    {
        $id = auth()->user()->id;
        $patient = DB::table('users')
                        ->join('patients', 'users.id', '=', 'patients.userId')
                        ->where('users.id',$id)
                        ->get();
        return view('patient.updateProfile')->with('patient',$patient);
    }

    function changePassword()
    {
        return view('patient.changePassword');
    }

    function updatePassword(Request $request)
    {
        $request->validate([
            'password'  => 'required',
            'newpassword'      => 'required|confirmed|min:8',
            'newpassword_confirmation' => 'required'
        ]);

        $encpassword = auth()->user()->password;

        if(Hash::check($request->password,$encpassword))
        {
            print_r('true');
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->newpassword);
            $user->save();
        }
        //return redirect()->route('logout');
    }

    function appointment()
    {
        $id = auth()->user()->id;
        $patient = Patient::where('userId',$id)->get();
        $list = DB::table('appointments')
                    ->join('doctors','appointments.docId','=','doctors.id')
                    ->join('users','doctors.userId','=','users.id')
                    ->where('patientId',$patient[0]['id'])
                    ->get();
        $doctors = DB::table('doctors')
                    ->join('users','users.id','=','doctors.userId')
                    ->get();
        return view('patient.appointment')->with('list',$list)->with('doctors',$doctors);
    }

    function deleteReq($id)
    {
        $apt = Appointment::find($id);
        print($apt);
    }

    function docList()
    {
        $doctors = DB::table('doctors')
                    ->join('users','users.id','=','doctors.userId')
                    ->get();
        return view('patient.docList')->with('doctors',$doctors);
    }

    function prescriptions()
    {
        $id = auth()->user()->id;
        $patient = Patient::where('userId',$id)->get();
        $pres = DB::table('prescriptions')
                    ->where('patientId',$patient[0]['id'])
                    ->get();
        return view('patient.prescriptions')->with('pres',$pres);
    }

    function subPlans()
    {
        $subs = DB::table('subplans')->get();
        return view('patient.subPlans')->with('subs',$subs);
    }
}
