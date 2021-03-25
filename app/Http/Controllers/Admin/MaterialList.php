<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MaterialsLib;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MaterialList extends Controller
{
    /**
     * @return string возвращяет список всех материалов в json формате
     */
    public function showMaterial()
    {
        $materials = MaterialsLib::all();

        return $materials->toJson();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function createForm()
    {
        return view('admin.layouts.materials');
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function createMaterial(Request $request)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'm_name' => 'required|max:255|unique:materials_lib,m_name',
            'm_units' => 'required',
            'm_units_type' => 'required',
            'm_price' => 'required|regex:/^([0-9]+[.]{1}[0-9]{2})/i',
            'm_critical_limit' => 'required|max:255|regex:/^([0-9]+)/i',
            'm_minimal_limit' => 'required|max:255|regex:/^([0-9]+)/i',
            'm_notice' => 'max:255|present',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //сохраняем данные введенные из формы
        $material = $request->all();

        unset($material['_token']);
        $material += ["m_who_create" => Auth::user()->id];

        MaterialsLib::create($material);

        return json_encode('Material '. $request->m_name .' успешно добавлен');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function materialView($id)
    {
        $material = MaterialsLib::findOrFail($id);

        return $material->toJson();
    }

    public function updateMaterials(Request $request, $id)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'm_name' => 'required|max:255',
            'm_units' => 'required|max:255',
            'm_units_type' => 'required|max:255',
            'm_price' => 'required|regex:/^([0-9]+[.]{1}[0-9]{2})/i',
            'm_critical_limit' => 'required|max:255',
            'm_minimal_limit' => 'required|max:255',
            'm_notice' => 'max:255|present',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //сохраняем данные введенные из формы
        $material = MaterialsLib::findOrFail($id);
        $material->updateMaterials($request);

        $massag = 'Материал '. $request->m_name .' успешно изменен';
        return json_encode($massag);
    }

    public function deleteMaterials($id)
    {
        $material = MaterialsLib::findOrFail($id);
        $material->delete();

        return json_encode('Material  успешно удален');
    }
}
