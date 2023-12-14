<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFullNameAttribute(){
        return $this->name . ' ' . $this->surname;
    }

    public function getPhotoAttribute(){
        return "https://www.gravatar.com/avatar/".md5(strtolower(trim($this->email)));
    }

}
