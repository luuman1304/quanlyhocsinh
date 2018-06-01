<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use App\Services\CommonService;

class Student extends Model
{
    const GENDER_TYPE = [
        'MALE' => 'Nam',
        'FEMALE' => 'Nữ'
    ];

    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

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
    protected $fillable = ['class_id', 'full_name', 'gender', 'birthday', 'address', 'email'];

    /**
     * Get the class of student
     */
    public function classes()
    {
        return $this->belongsTo('App\Model\Classes', 'class_id');
    }

    public function scores()
    {
        return $this->belongsToMany('App\Model\Score', 'student_id');
    }

    /**
     * Gender text
     *
     * @return mixed
     */
    public function genderType()
    {
        return $this->gender ? Student::GENDER_TYPE['MALE'] : Student::GENDER_TYPE['FEMALE'];
    }

    public function subjectAverageScore($subjectType, $semester)
    {
        return ($this->getFifteenMinScore($subjectType, $semester) * 1 + $this->getFortyFiveMinScore($subjectType, $semester) * 2) / 3;
    }

    public function getFifteenMinScore($subjectType, $semester)
    {
        $score = Score::where('student_id', $this->id)->where('subject_type', $subjectType)->where('semester', $semester)->first();
        return empty($score) ? 0 : $score->fifteenmin_exam_score;
    }

    public function getFortyFiveMinScore($subjectType, $semester)
    {
        $score = Score::where('student_id', $this->id)->where('subject_type', $subjectType)->where('semester', $semester)->first();
        return empty($score) ? 0 : $score->fortyfivemin_exam_score;
    }

    public function semesterAverageScore($semester)
    {
        $scores = Score::where('student_id', $this->id)
            ->where('semester', $semester)->get();
        if($scores->count() == 0){
            return "N/A";
        }
        $sum = 0;
        $total_subject = $scores->count();
        foreach ($scores as $score){
            $sum += $score->fifteenmin_exam_score + $score->fortyfivemin_exam_score*2;
        }
        return CommonService::roundScore((float)($sum/3.0)/$total_subject);
    }

    public function abc()
    {

    }


}
