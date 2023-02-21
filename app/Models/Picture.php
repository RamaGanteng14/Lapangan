<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    
    use HasFactory;
    protected $table = 'pictures';
    public $timetamps = 'false';
    protected $primaryKey ='id';

    protected  $fillable= [
        'official_report_id',
        'image',
    ];

    
}