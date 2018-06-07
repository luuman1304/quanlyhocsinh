<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Model\Student;
use App\Services\CommonService;
use Carbon\Carbon;

class StudentController extends Controller
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
        $students = (new Student())->newQuery()->orderBy('full_name', 'asc');

        if (!empty($keyword)) {
            $keyword = CommonService::correctSearchKeyword($keyword);
            $students = $students->where(function ($query) use ($keyword) {
                $query->orWhere('full_name', 'LIKE', $keyword);

            });
        }

        $total = Student::count();

        $students = $students->paginate($perPage);

        return view('admin.students.index', compact('students','total'));
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

        return view('admin.students.show', compact('student'));
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

        return view('admin.students.edit', compact('student'));
    }

    public function update($id, Request $request)
    {
        $dt = new Carbon();
        $before = $dt->subYears(15)->format('Y-m-d');
//        $after = $dt->subYears(20)->format('Y-m-d');

        $validationList = [
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'gender' => 'required',
            'address' => 'required|max:300',
            'birthday' => 'required|date|before:' . $before
        ];

        $message = [
            'birthday.before' => "Tuổi phải lớn hơn 15 và bé hơn 20 ",
        ];

        $this->validate($request,$validationList,$message);
        $requestData = $request->all();

        $students = Student::findOrFail($id);
        $students->update($requestData);

        Session::flash('flash_message', 'Đã cập nhật hồ sơ học sinh!');

        return redirect('home/student-list');
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

        return redirect('home/student-list');
    }

}
