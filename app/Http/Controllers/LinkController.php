<?php

namespace App\Http\Controllers;

use App\Repositories\LinkRepository;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function redirect($code){
        $checkCode = (new LinkRepository())->get([
            'new_url' => $code
        ], false)->first();

        if (!$checkCode) {
            abort(404);
        }

        return redirect()->away($checkCode->old_url);
    }
}
