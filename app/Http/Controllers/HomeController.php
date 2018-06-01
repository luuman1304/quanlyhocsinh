<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = Student::count();
        $tenGradeStudents = Student::whereIn('class_id',[1,2,3,4])
            ->count();
        $elevenGradeStudents = Student::whereIn('class_id',[5,6,7])
            ->count();
        $twelveGradeStudents = Student::whereIn('class_id',[8,9])
            ->count();

        $params = [
            'tenGradeStudents' => $tenGradeStudents,
            'elevenGradeStudents' =>$elevenGradeStudents,
            'twelveGradeStudents' => $twelveGradeStudents,
            'total' => $total
        ];
        return view('home',compact('params'));
    }

    public function getRegister()
    {
        return view('auth.register');
    }
}
