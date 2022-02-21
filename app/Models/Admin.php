<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

//use Illuminate\Database\Eloquent\Model;
//下面這個很深入的裡面已經有extends Model了,所以這邊就把上面給註解
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable=['acc','pw'];

    public function getAuthPassword()
    {
        //return $this->password;
        return $this->pw;
    }
}
