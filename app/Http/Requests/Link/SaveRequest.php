<?php

namespace App\Http\Requests\Link;

use App\Repositories\AdminRepository;
use Illuminate\Foundation\Http\FormRequest;

class SaveRequest extends FormRequest
{
    public function authorize()
    {
        return (new AdminRepository())->isLogged();
    }

    public function rules()
    {
        return [
            'old_url' => 'required|active_url',
        ];
    }
}
