<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'configurations';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['max_student_per_class','max_student_age','min_student_age','pass_condition_score','numb_of_subject'];
}
