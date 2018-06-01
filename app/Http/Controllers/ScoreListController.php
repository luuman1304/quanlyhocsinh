<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Score;
use App\Model\Student;
use App\Services\CommonService;
use Session;

class ScoreListController extends Controller
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

        $subjectType = $request->get('subject_type');
        $semester = $request->get('semester');
        $class_id = $request->get('class_id');

        $students = Student::orderBy('full_name', 'asc')
            ->join('scores', 'scores.student_id', 'students.id')
            ->leftjoin('classes', 'classes.id', 'students.class_id')
            ->where('scores.subject_type', $subjectType)
            ->where('scores.semester', $semester)
            ->where('students.class_id', $class_id)
            ->select(['students.id', 'students.full_name', 'students.class_id', 'scores.id as score_id']);

        if(!empty($semester)){
            $students = $students->where('semester',$semester)
                ->orderBy('full_name');
        }

        if (!empty($keyword)) {
            $keyword = CommonService::correctSearchKeyword($keyword);
            $students = $students->where(function ($query) use ($keyword) {
                $query->orWhere('full_name', 'LIKE', $keyword);
            });
        }



        $students = $students->paginate($perPage);
        $subject_type = $subjectType;
        return view('admin.scores.index', compact('students', 'subjectType', 'semester', 'subject_type', 'class_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.scores.create');
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
        $this->validate($request, [
            'student_id' => 'required',
            'semester' => 'required',
            'subject_type' => 'required|integer',
            'fifteenmin_exam_score' => 'required|integer|min:0|max:10',
            'fortyfivemin_exam_score' => 'required|integer|min:0|max:10',
        ]);

        $requestData = $request->all();

        Score::create($requestData);

        Session::flash('flash_message', 'Đã thêm bảng điểm mới!');

        return redirect('home/scores-list');
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
        $score = Score::findOrFail($id);

        return view('admin.scores.show', compact('score'));
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
        $score = Score::findOrFail($id);

        return view('admin.scores.edit', compact('score'));
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
        $this->validate($request, [
            'fifteenmin_exam_score' => 'required|integer|min:0|max:10',
            'fortyfivemin_exam_score' => 'required|integer|min:0|max:10',
        ]);
        $requestData = $request->all();

        $score = Score::findOrFail($id);
        $score->update($requestData);

        Session::flash('flash_message', 'Đã cập nhật bảng điểm học sinh!');

        return redirect('home/scores-list');
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
        Score::findOrFail($id);

        Score::destroy($id);

        Session::flash('flash_message', 'Đã xóa bảng điểm!');

        return redirect('home/scores-list');
    }

}
