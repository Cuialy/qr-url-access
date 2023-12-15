<?php
namespace App\Http\Requests\Link;

use App\Repositories\LinkRepository;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function authorize()
    {
        return (new LinkRepository())->isLogged();
    }
    public function rules()
    {
        return [];
    }
}