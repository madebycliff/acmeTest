<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\ModelInterface;

class Question extends Model implements Auditable, ModelInterface
{
    use AuditableTrait, SoftDeletes;

    protected $fillable = ['form_id', 'description', 'mandatory', 'type'];

    public function form()
    {
        return $this->belongsTo('\App\Models\Form');
    }

    public function answers()
    {
        return $this->hasMany('\App\Models\Answer');
    }

    public function usersanswers()
    {
        return $this->hasMany('\App\Models\UserAnswer');
    }
}
