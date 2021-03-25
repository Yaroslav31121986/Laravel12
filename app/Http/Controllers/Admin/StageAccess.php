<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StageAccess extends Controller
{
    public function showStages()
    {
        $stages = Stage::all();

        return $stages->toJson();
    }

    public function createForm()
    {
        return view('admin.layouts.stage');
    }

    public function createStage(Request $request)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'st_abbr' => 'required|max:255',
            'st_options' => 'max:255',
            'st_notice' => 'max:255',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //сохраняем данные введенные из формы
        $stage = $request->all();
        unset($stage['_token']);
        $stage += ["st_create_uid" => Auth::user()->id];

        Stage::create($stage);

        return json_encode('Stage '. $request->st_abbr .' успешно добавлен');
    }

    public function stageView($id)
    {
        $stage = Stage::findOrFail($id);

        return $stage->toJson();
    }

    public function updateStage(Request $request, $id)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'st_abbr' => 'required|max:255',
            'st_options' => 'max:255',
            'st_notice' => 'max:255',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //сохраняем данные введенные из формы
        $stage = Stage::findOrFail($id);
        $stage->updateStage($request);

        $massag = 'Stage '. $request->st_abbr .' успешно изменен';
        return json_encode($massag);
    }

    public function deleteStage($id)
    {
        $material = Stage::find($id);
        $material->delete();

        return json_encode('Stage  успешно удален');
    }
}
