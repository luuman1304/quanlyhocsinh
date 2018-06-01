<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Score;
use App\Model\Student;
use App\Model\Classes;
use App\Services\CommonService;

class AverageScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('q');
        $perPage = config('constants.PAGE_SIZE');


//        $semester = $request->get('semester');
        $class_id = $request->get('class_id');
//
//        $students = Student::orderBy('full_name', 'asc')
//            ->join('scores', 'scores.student_id', 'students.id')
//            ->leftjoin('classes', 'classes.id', 'students.class_id')
//            ->where('students.class_id', $class_id)
//            ->select(['students.id', 'students.full_name', 'students.class_id', 'scores.id as score_id']);
        $students = Student::select('students.*');
        if (!empty($class_id)) {
            $students = $students->join('classes', 'classes.id', '=', 'students.class_id')
                ->where('class_id', $class_id)
                ->orderBy('full_name');
        }

//        $students = (new Student())->newQuery()->orderBy('full_name', 'asc');
//        if (!empty($class_id)) {
//            $students = $students->join('classes', 'classes.id', '=', 'students.class_id')
////                ->join('scores','scores.student_id','students.id')
//                ->where('class_id', $class_id);
////                ->select('students.id as student_id', 'students.full_name');
//
//        }

        if (!empty($keyword)) {
            $keyword = CommonService::correctSearchKeyword($keyword);
            $students = $students->where(function ($query) use ($keyword) {
                $query->orWhere('full_name', 'LIKE', $keyword);
            });
        }
        $request->session()->put('average_score',$students->get());
        $students = $students->paginate($perPage);

        return view('admin.average_score.index', compact('students', 'class_id'));

    }

    public function show($id)
    {
        $student = Student::where('id',$id)->firstOrFail();

        return view('admin.average_score.show', compact('student'));
    }
}
