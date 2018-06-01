<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Score;
use App\Model\Student;
use Illuminate\Support\Facades\DB;
use App\Model\Classes;

class SemesterSummaryController extends Controller
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

        $semester = $request->get('semester');

        $students = Student::select('students.*');

        if(!empty($semester)){
            $students = $students->join('scores','scores.student_id','students.id')
                ->where('semester',$semester)
                ->get();
        }

        $classes = Classes::join('students as st', 'classes.id', 'st.class_id')
            ->select('classes.id','classes.class_name', DB::raw('count(*) as total'))
            ->groupBy('classes.id')->paginate($perPage);

        return view('admin.semester_summary.index', compact('classes', 'semester', 'subject_type', 'class_id', 'total','students'));

    }

//    public function show($id)
//    {
//        $score = Score::findOrFail($id);
//
//        return view('admin.semester_summary.show', compact('score','students'));
//    }
}
