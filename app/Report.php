<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'tb_report';

    protected $primaryKey = 'id_report';

    protected $fillable = ['nik', 'task', 'description'];
}
