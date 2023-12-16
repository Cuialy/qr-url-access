<?php
namespace App\Http\Requests\Admin\Link;

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
            'old_url' => 'required|active_url',
            'new_url' => 'nullable|string',
        ];
    }
}
