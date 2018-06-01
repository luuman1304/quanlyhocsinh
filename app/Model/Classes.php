<?php

namespace App\Model;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Eloquent\Model;
use App\Model\Student;
use App\Services\CommonService;
use App\Model\Configuration;

class Classes extends Model
{
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';

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
    protected $fillable = ['class_name'];

    /**
     * Get info of student
     */
    public function student(){
        return $this->hasMany('App\Model\Student','class_id');
    }

    public static function numberOfPasses($subjectType,$semester,$class_id)
    {
        $passScore = Configuration::first()['pass_condition_score'];
        $numOfPass = 0;
        $students = Student::where('class_id',$class_id)->get();
        foreach ($students as $student){
            $avg = $student->subjectAverageScore($subjectType,$semester);
            if($avg >= (double)$passScore){
                $numOfPass+=1;
            }
        }
        return $numOfPass;
    }

    public static function percentPass($subjectType,$semester,$class_id)
    {
        return self::numberOfPasses($subjectType,$semester,$class_id)*100;
    }

    public static function numberOfPassesSemester($semester,$class_id)
    {
        $passScore = Configuration::first()['pass_condition_score'];
        $numOfPass = 0;
        $students = Student::where('class_id',$class_id)->get();
        foreach ($students as $student){
            $avg = $student->semesterAverageScore($semester);
            if($avg >= $passScore){
                $numOfPass+=1;
            }
        }
        return $numOfPass;
    }

    public static function percentPassSemester($semester,$class_id)
    {
        return self::numberOfPassesSemester($semester,$class_id)*100;
    }

    public static function studentPerClass($class_id){
        $student_per_class = Classes::join('students as st', 'classes.id', 'st.class_id')
            ->where('class_id',$class_id)
            ->select('classes.id','classes.class_name')
            ->groupBy('classes.id')->count();
        return $student_per_class;
    }

}
