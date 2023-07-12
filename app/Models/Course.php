<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;

class Course extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'durasi',
    ];
    public function materials(){
        return $this->hasMany(Material::class, 'id_course', 'id');
    }
}
