<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\Record;

class PatientsController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $patient = Patient::where('userId',$id)->get();
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


    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
}
