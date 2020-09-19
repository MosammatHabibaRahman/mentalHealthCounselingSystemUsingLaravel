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

    function updateRecord()
    {
        $id = auth()->user()->id;
        $patient = Patient::where('userId',$id)->get();
        $record = Record::where('patientId',$patient[0]['id'])->get();

        return view('patient.updateRecord')->with('record',$record);
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
        
        return view('patient.prescriptions');
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
