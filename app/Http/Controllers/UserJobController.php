<?php

namespace App\Http\Controllers;

use App\Models\UserJob;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserJobController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = UserJob::all();
        return $this->successMessage($services, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|min:2|max:50|string",
            "description" => "required|min:2|max:50|string",
        ]);

        if ($validator->fails()) {
            return $this->errorMessage($validator->messages(), 422);
        }

        $userJob = UserJob::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return $this->successMessage($userJob, 200, "description create successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(UserJob $userJob)
    {
        return $this->successMessage($userJob, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserJob $userJob)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|min:2|max:50|string",
            "description" => "required|min:1|max:50|string",
        ]);

        if ($validator->fails()) {
            return $this->errorMessage($validator->messages(), 422);
        }

        $userJob = $userJob->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return $this->successMessage($userJob, 200, "description update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserJob $userJob)
    {
        $userJob->delete();
        return $this->successMessage($userJob, 200, "description delete successfully");
    }
}
