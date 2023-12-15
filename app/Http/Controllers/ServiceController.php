<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $requestServices = ServiceRequest::where('user_id', auth()->user()->id)->get();
        return view('pages.dashboard.service.index' , compact('services', 'requestServices'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        if(ServiceRequest::where('user_id', auth()->user()->id)->where('status', 'pendiente')->count() > 2) {
            return redirect()->route('services.index')->with('error', 'Ya tienes una solicitud de servicio pendiente');
            
        }

        ServiceRequest::create([
            'user_id' => auth()->user()->id,
            'service_id' => $request->input('service_id'),
            'employee_id' => null,
        ]);

        return redirect()->route('services.index')->with('message', 'Solicitud de servicio enviada con éxito');
    }

    public function update($id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);

        $serviceRequest->update([
            'status' => 'en proceso',
            'employee_id' => auth()->user()->employee->id,
        ]);

        return redirect()->route('employee.work')->with('message', 'Servicio aceptado con éxito');
    }

    public function finish($id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);

        $serviceRequest->update([
            'status' => 'finalizado',
        ]);

        return redirect()->route('employee.work')->with('message', 'Servicio finalizado con éxito');
    }

}
