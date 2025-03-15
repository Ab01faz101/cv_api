<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return $this->successMessage($contacts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|min:2|max:50|string",
            "description" => "required|min:2|string",
            "title" => "required|min:2|max:50|string",
            'email' => 'required|email|unique:contacts'
        ]);

        if ($validator->fails()) {
            return $this->errorMessage($validator->messages(), 422);
        }

        $contact = Contact::create([
            'name' => $request->name,
            'description' => $request->description,
            'title' => $request->title,
            'email' => $request->email,
        ]);
        return $this->successMessage($contact, 200, "contact create successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return $this->successMessage($contact, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|min:2|max:50|string",
            "description" => "required|min:2|string",
            "title" => "required|min:2|max:50|string",
            'email' => 'required|email|unique:contacts'
        ]);

        if ($validator->fails()) {
            return $this->errorMessage($validator->messages(), 422);
        }

        $newContact = $contact->update([
            'name' => $request->name,
            'description' => $request->description,
            'title' => $request->title,
            'email' => $request->email,
        ]);
        return $this->successMessage($newContact, 200, "contact update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return $this->successMessage($contact, 200, "contact delete successfully");
    }

}
