<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    const SEMESTER_TYPE = [
        'SEMESTER1' => 'Học kỳ 1',
        'SEMESTER2' => 'Học kỳ 2'
    ];

    const SUBJECT_TYPE = [
        'LITERATURE' => 1,
        'MATHEMATICS' => 2,
        'PHYSICS' => 3,
        'CHEMISTRY' => 4,
        'BIOLOGY' => 5,
        'HISTORY' => 6,
        'GEOGRAPHY' => 7,
        'PHYSICAL EDUCATION' => 8,
        'CIVIC EDUCATION' => 9,
    ];

    const SUBJECT_TYPE_TEXT = [
        'LITERATURE' => "Văn",
        'MATHEMATICS' => "Toán",
        'PHYSICS' => "Vật lý",
        'CHEMISTRY' => "Hóa học",
        'BIOLOGY' => "Sinh học",
        'HISTORY' => "Lịch sử",
        'GEOGRAPHY' => "Địa lý",
        'PHYSICAL EDUCATION' => "Thể dục",
        'CIVIC EDUCATION' => "Đạo đức",
    ];

    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'scores';

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
    protected $fillable = ['subject_type','student_id','semester','fifteenmin_exam_score','fortyfivemin_exam_score'];

    public  function student(){
        return $this->belongsTo('App\Model\Student','student_id');
    }

    /**
     * Gender text
     *
     * @return mixed
     */
    public function semesterTypeText()
    {
        return $this->semester ? Score::SEMESTER_TYPE['SEMESTER2'] : Score::SEMESTER_TYPE['SEMESTER1'];
    }

    public function subjectTypeText()
    {
        return $this->subject_type ? Score::SUBJECT_TYPE_TEXT[array_keys(Score::SUBJECT_TYPE, $this->subject_type)[0]] : '';
    }

    public static function subjectTypeTextByKey($key)
    {
        return $key ? Score::SUBJECT_TYPE_TEXT[array_keys(Score::SUBJECT_TYPE, $key)[0]] : '';
    }

    public static function subjects(){
        $keys = array_keys(Score::SUBJECT_TYPE);
        $subjects = [];
        foreach ($keys as $key){
            array_push($subjects,[
                Score::SUBJECT_TYPE_TEXT[$key],
                Score::SUBJECT_TYPE[$key]
            ]);
        }
        return $subjects;
    }
}
