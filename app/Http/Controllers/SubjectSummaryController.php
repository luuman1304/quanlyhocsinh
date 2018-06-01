<?php

namespace App\Http\Controllers;

use App\Model\Classes;
use Illuminate\Http\Request;
use App\Model\Score;
use App\Model\Student;
use Illuminate\Support\Facades\DB;

class SubjectSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = config('constants.PAGE_SIZE');

        $subjectType = $request->get('subject_type');
        $semester = $request->get('semester');

        $students = Student::select('students.*');
        if(!empty($semester)){
            $students = $students->join('scores','scores.student_id','students.id')
                ->where('semester',$semester)
                ->get();
        }

        if(!empty($subject_type)){
            $students = $students->join('scores','scores.student_id','students.id')
                ->where('subject_type',$subjectType)
                ->get();
        }

         $classes = Classes::join('students as st', 'classes.id', 'st.class_id')
             ->select('classes.id','classes.class_name', DB::raw('count(*) as total'))
             ->groupBy('classes.id')->paginate($perPage);

        $subject_type = $subjectType;
        return view('admin.subject_summary.index', compact('classes', 'subjectType', 'semester', 'subject_type', 'class_id', 'total','students'));

    }
//
//    public function show($id)
//    {
//        $score = Score::findOrFail($id);
//
//        return view('admin.subject_summary.show', compact('score','classes'));
//    }
}
