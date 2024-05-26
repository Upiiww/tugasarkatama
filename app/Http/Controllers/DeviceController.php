<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        return Device::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_type' => 'required',
            'sensor_type' => 'required',
            'location' => 'nullable',
            'description' => 'nullable',
        ]);

        $device = Device::create($request->all());

        return response()->json($device, 201);
    }

    public function show($id)
    {
        return Device::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->update($request->all());

        return response()->json($device, 200);
    }

    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();

        return response()->json(null, 204);
    }
}
