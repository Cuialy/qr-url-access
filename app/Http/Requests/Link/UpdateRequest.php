<?php
namespace App\Http\Requests\Link;

use App\Repositories\AdminRepository;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return (new AdminRepository())->isLogged();
    }
    public function rules()
    {
        return [
            'old_url' => 'required',
            'new_url' => 'nullable|string',
        ];
    }
}
