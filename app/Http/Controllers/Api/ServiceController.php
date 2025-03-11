<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return $this->successMessage($services , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , [
            "name" => "required|min:2|max:50|string",
            "description" => "required|min:2|max:50|string",
        ]);

        if ($validator->fails()){
            return $this->errorMessage($validator->messages() , 422);
        }

        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return $this->successMessage($service , 200 , "service create successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return $this->successMessage($service , 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validator = Validator::make($request->all() , [
            "name" => "required|min:2|max:50|string",
            "description" => "required|min:2|max:50|string",
        ]);

        if ($validator->fails()){
            return $this->errorMessage($validator->messages() , 422);
        }

        $service = $service->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return $this->successMessage($service , 200 , "service update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return $this->successMessage($service , 200 , "service delete successfully");
    }
}
