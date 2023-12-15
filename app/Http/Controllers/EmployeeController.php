<?php

namespace App\Http\Controllers;

use App\Models\EmployeeRequest;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use App\Models\Service;

class EmployeeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('pages.dashboard.employee.index' , compact('services'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        if(EmployeeRequest::where('user_id', auth()->user()->id)->where('status', 'pendiente')->count() > 1) {
            return redirect()->route('employee.index')->with('error', 'Ya tienes una solicitud de trabajo pendiente');
        }

        EmployeeRequest::create([
            'user_id' => auth()->user()->id,
            'service_id' => $request->input('service_id'),
        ]);

        return redirect()->route('employee.index')->with('message', 'Solicitud de trabajo enviada con éxito');

    }

    public function work()
    {
        $serviceRequests = ServiceRequest::where('status', 'pendiente')->get();
        $workerServices = ServiceRequest::where('employee_id', auth()->user()->employee->id)->get();

        return view('pages.dashboard.employee.work', compact('serviceRequests', 'workerServices'));
    }
}
