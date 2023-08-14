<?php

namespace App\Http\Requests;

use App\Models\Store;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $storeIdString = isset($this->store->id) ?  ',' . $this->store->id : '';

        return [
            'title' => 'required|max:255|unique:stores,title' . $storeIdString,
            'description' => 'required|max:255',
        ];
    }
}
