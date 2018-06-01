<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use Input;
use Excel;
use Log;

class ExportExcelController extends Controller
{
    /*Export Excel file*/
    public function downloadStudentProfile($class_id)
    {
        $title = array('Lớp', 'Họ tên', 'Giới tính', 'Ngày Sinh', 'Địa chỉ', 'Email');
        if ($class_id == 0) {
            $data = Student::join('classes', 'classes.id', 'students.class_id')
                ->select('classes.class_name', 'students.full_name', 'students.gender', 'students.birthday', 'students.address', 'students.email')
                ->get()
                ->toArray();
        } else {
            $data = Student::join('classes', 'classes.id', 'students.class_id')
                ->where('students.class_id', $class_id)
                ->select('classes.class_name', 'students.full_name', 'students.gender', 'students.birthday', 'students.address', 'students.email')
                ->get()
                ->toArray();
        }
        array_unshift($data, $title);
        return Excel::create('Danh Sách Học Sinh', function ($excel) use ($data) {
            $excel->sheet('Data', function ($sheet) use ($data) {
                $sheet->fromArray($data, null, 'A1', true, false);
            });
        })->download('xlsx');
    }

    public function downloadAverageScore(Request $request)
    {
        $data = array(array('Họ và tên','Lớp','TB học kỳ I','TB học kỳ II'));
        $students = $request->session()->get('average_score');
        foreach ($students as $student){
            $studentData = array('name' => $student->full_name,
                'class_name' => $student->classes->class_name,
                'sem_one_score'=> $student->semesterAverageScore(0),
                'sem_two_score'=> $student->semesterAverageScore(1),
            );
            array_push($data,$studentData);
        }

        return Excel::create('Bảng Điểm Trung Bình', function ($excel) use ($data) {
            $excel->sheet('Data', function ($sheet) use ($data) {
                $sheet->fromArray($data, null, 'A1', true, false);
            });
        })->download('xlsx');
    }
}
