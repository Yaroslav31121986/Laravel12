<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ProcessLib;

class ProcessList extends Controller
{
    public function createForm()
    {
        return view('admin.layouts.process');
    }

    public function createProcess(Request $request)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'pr_name' => 'required|max:255|unique:process_lib,pr_name',
            'pr_active' => 'required|boolean',
            'pr_type' => $request->pr_type ? 'integer' : '',
            'pr_options' => $request->pr_options ? 'integer' : '',
            'pr_notice' => 'max:255|present',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //сохраняем данные введенные из формы
        $process = $request->except(["_token"]);
        $process += ["pr_who_create" => Auth::user()->id];

        ProcessLib::create($process);

        return json_encode('Process '. $request->pr_name .' успешно добавлен');
    }

    public function processView($id)
    {
        $material = ProcessLib::findOrFail($id);

        return $material->toJson();
    }

    public function showProcess()
    {
        $material = ProcessLib::all();

        return $material->toJson();
    }

    public function updateProcess(Request $request, $id)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'pr_name' => 'required|max:255|unique:process_lib,pr_name',
            'pr_active' => 'required|boolean',
            'pr_type' => $request->pr_type ? 'integer' : '',
            'pr_options' => $request->pr_options ? 'integer' : '',
            'pr_notice' => 'max:255|present',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        $process = ProcessLib::findOrFail($id);
        $process->pr_who_lastedit = Auth::user()->id;
        $process->fill($request->except(["_token"]))->save();

        $massag = 'Процесс '. $request->pr_name .' успешно изменен';
        return json_encode($massag);
    }

    public function deleteProcess($id)
    {
        $process = ProcessLib::findOrFail($id);
        $process->delete();

        return json_encode('Процесс  успешно удален');
    }
}
