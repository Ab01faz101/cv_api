<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\SkillRequest;
use App\Models\Skill;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{

    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Skill::all();
        return $this->successMessage($services , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , [
            "name" => "required|min:2|max:50|string",
            "skill" => "required|min:2|max:50|string",
        ]);

        if ($validator->fails()){
            return $this->errorMessage($validator->messages() , 422);
        }

        $skill = Skill::create([
            'name' => $request->name,
            'skill' => $request->skill,
        ]);
        return $this->successMessage($skill , 200 , "skill create successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return $this->successMessage($skill , 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $validator = Validator::make($request->all() , [
            "name" => "required|min:2|max:50|string",
            "skill" => "required|min:1|max:50|string",
        ]);

        if ($validator->fails()){
            return $this->errorMessage($validator->messages() , 422);
        }

        $skill = $skill->update([
            'name' => $request->name,
            'skill' => $request->skill,
        ]);
        return $this->successMessage($skill , 200 , "skill update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return $this->successMessage($skill , 200 , "skill delete successfully");
    }

}
