<?php
namespace App\Http\Requests\Setting;

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
            'key'=>'required',
            'value'=>'required'
        ];
    }
}