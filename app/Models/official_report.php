<?php

namespace App\Models;

use App\Models\Picture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class official_report extends Model
{
    use HasFactory;
    use SoftDeletes;
   
    protected $table = 'official_reports';
    protected $primarykey = 'id';

    protected $fillable = [
        'user_id',
        'instansi','address','client',
        'position','time','distance','vehicle',
        'notes','image'
    ];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }
}