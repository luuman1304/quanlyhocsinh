<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, Log;
use App\Model\Student;
use App\Model\Classes;
use App\Services\CommonService;
use Excel,Carbon\Carbon;

class ClassController extends Controller
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

        $class_id = $request->get('class_id');

        if (!empty($class_id)) {
            $total = Student::where('class_id', $class_id)->count();
        } else {
            $total = Student::count();
        }
        $students = Student::select('students.*');

        if (!empty($class_id)) {
            $students = $students->join('classes', 'classes.id', '=', 'students.class_id')
                ->where('class_id', $class_id)
                ->orderBy('full_name');
        }

        if (!empty($keyword)) {
            $keyword = CommonService::correctSearchKeyword($keyword);
            $students = $students->where(function ($query) use ($keyword) {
                $query->orWhere('full_name', 'LIKE', $keyword);
            });
        }

        $isMale = $request->get('is_male') == 1;
        $isFemale = $request->get('is_female') == 1;

        if (!$isMale && !$isFemale) {
            $isMale = true;
        }

        if ($isMale && !$isFemale) {
            $students = $students->where('gender', true);
        } elseif (!$isMale && $isFemale) {
            $students = $students->where('gender', false);
        }

        $students = $students->paginate($perPage);
        return view('admin.classes.index', compact('students', 'isFemale', 'isMale', 'class_id', 'total'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $dt = new Carbon();
        $before = $dt->subYears(15)->format('Y-m-d');

        $validationList = [
            'class_id' => 'required',
            'full_name' => 'required|string|max:255',
            'birthday' => 'required|after_or_equal:1997-01-01|before:' . $before,
            'email' => 'required|string|email|max:255|unique:students',
            'gender' => 'required',
            'address' => 'required|max:300',
        ];

        $message = [
            'birthday.before' => "Tuổi phải lớn hơn 15 ",
            'birthday.after_or_equal' => "Tuổi phải bé hơn 20"
        ];

        $this->validate($request,$validationList,$message);

        $requestData = $request->all();

        Student::create($requestData);

        Session::flash('flash_message', 'Đã thêm học sinh mới!');

        return redirect('home/classes-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('admin.classes.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('admin.classes.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $dt = new Carbon();
        $before = $dt->subYears(15)->format('Y-m-d');

        $validationList = [
            'class_id' => 'required',
            'full_name' => 'required|string|max:255',
            'birthday' => 'required|after_or_equal:1997-01-01|before:' . $before,
            'email' => 'required|string|email|max:255|unique:students',
            'gender' => 'required',
            'address' => 'required|max:300',
        ];

        $message = [
            'birthday.before' => "Tuổi phải lớn hơn 15",
            'birthday.after_or_equal' => "Tuổi phải bé hơn 20"
        ];

        $this->validate($request,$validationList,$message);

        $requestData = $request->all();

        $student = Student::findOrFail($id);
        $student->update($requestData);

        Session::flash('flash_message', 'Đã cập nhật thông tin học sinh!');

        return redirect('home/classes-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Student::findOrFail($id);

        Student::destroy($id);

        Session::flash('flash_message', 'Đã xóa học sinh!');

        return redirect('home/classes-list');
    }


    /*Export Excel file*/
    public function downloadExcel()
    {
        $data = Student::join('classes','classes.id','students.class_id')
            ->select('classes.class_name','students.*')
            ->get();
//            ->toArray();
        return Excel::create('Students-List', function($excel) use ($data) {
            $excel->sheet('Data', function($sheet) use ($data)
            {
                $sheet->loadView('admin.classes.index');
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }

}
