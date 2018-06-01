<?php

namespace App\Http\Controllers;


use App\Model\Configuration;
use App\Http\Requests;
use App\Http\Controllers;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Session;


class ConfigurationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $config = Configuration::all();
        return view('admin.configurations.index', compact('config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'max_student_per_class' => 'required|integer',
            'min_student_age' =>'required|integer',
            'max_student_age' =>'required|integer',
            'pass_condition_score' => 'required|integer',
            'numb_of_subject' => 'required|integer'
        ]);
        $requestData = $request->all();

        $rules = Configuration::findOrFail($id);
        $rules->update($requestData);

        Session::flash('flash_message', 'Đã cập nhật quy định!');

        return redirect('home/configurations');
    }

    public function edit($id)
    {
        $config = Configuration::findOrFail($id);

        return view('admin.configurations.edit', compact('config'));
    }

}
