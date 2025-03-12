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

    public function index()
    {
        $skills = Skill::all();
        return $this->successMessage($skills , 200);
    }

    public function store(SkillRequest $request)
    {
        $inputs = [
          'name' => $request->name,
          'skill' => $request->skill
        ];
        $skill = Skill::query()->create($inputs);
        return $this->successMessage($skill , 200 , 'مهارت با موفقیت ساخته شد');
    }

    public function show(Skill $skill)
    {
        return $this->successMessage($skill , 200);
    }

    public function update(SkillRequest $request , Skill $skill)
    {
        $inputs = [
            'name' => $request->name,
            'skill' => $request->skill
        ];
        $updateSkill = $skill->update($inputs);
        return $this->successMessage($updateSkill , 200 , 'مهارت با موفقیت ویرایش شد');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return $this->successMessage($skill , 200 , "مهارت با موفقیت حذف شد");
    }

}
