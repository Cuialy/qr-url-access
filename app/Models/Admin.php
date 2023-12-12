<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function getFullNameAttribute(){
        return $this->name . ' ' . $this->surname;
    }

     protected $fillable = ['name', 'surname', 'email', 'password','hashed_id'];
}
