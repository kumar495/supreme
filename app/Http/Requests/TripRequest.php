<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'highlights' => 'required|string',
            'actual_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'trip_day' => 'required|numeric',
            'level' => 'required|string',
            'destination_id' => 'required|string',
            'activity_id' => 'required|string',
            'description'=>'required|string',
            'arrive' => 'required|date_format:H:i',
            'departure' => 'required|date_format:H:i',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'overview' => 'nullable|string',
            'brief_itinerary' => 'nullable|string',
            'details_itinerary' => 'nullable|string',
            'trip_includes' => 'nullable|string',
            'trip_excludes' => 'nullable|string',



        
    ];
    }
}
