<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Portfolio::all();
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
            "url" => "required|min:2|max:255|string",
            "image" => "required|image|mimes:jpg,jpeg,png,gif",
        ]);

        if ($validator->fails()) {
            return $this->errorMessage($validator->messages(), 422);
        }

        $inputs = [
            'name' => $request->name,
            'url' => $request->url,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('portfolio', $imageName , "public");
            $inputs['image'] = $path;
        }


        $portfolio = Portfolio::create($inputs);
        return $this->successMessage($portfolio, 200, "description create successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return $this->successMessage($portfolio, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|min:2|max:50|string",
            "description" => "required|min:2|max:50|string",
            "url" => "required|min:2|max:255|string",
            "image" => "nullable|image|mimes:jpg,jpeg,png,gif",
        ]);

        if ($validator->fails()) {
            return $this->errorMessage($validator->messages(), 422);
        }

        $inputs = [
            'name' => $request->name,
            'url' => $request->url,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('portfolio', $imageName , "public");
            $inputs['image'] = $path;
        }

        $portfolio = $portfolio->update($inputs);
        return $this->successMessage($portfolio, 200, "description update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return $this->successMessage($portfolio, 200, "description delete successfully");
    }
}
