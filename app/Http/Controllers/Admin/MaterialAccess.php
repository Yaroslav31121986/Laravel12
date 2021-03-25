<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MaterialAccess extends Controller
{
    /**
     * @return string возвращяет список всех материалов в json формате
     */
    public function showMaterial()
    {
        $materials = Material::all();

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
            'm_name' => 'required|max:255',
            'm_units' => 'required',
            'm_units_type' => 'required',
            'm_price' => 'required|regex:/^([0-9]+[.]{1}[0-9]{2})/i',
            'm_critical_limit' => 'required|max:255|regex:/^([0-9]+)/i',
            'm_minimal_limit' => 'required|max:255|regex:/^([0-9]+)/i',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //сохраняем данные введенные из формы
        $material = $request->all();
        unset($material['_token']);
        $material += ["m_create_uid" => Auth::user()->id];

        Material::create($material);

        return json_encode('Material '. $request->m_name .' успешно добавлен');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function materialView($id)
    {
        $material = Material::find($id);

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
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //сохраняем данные введенные из формы
        $material = Material::find($id);
        $material->m_name = $request->m_name;
        $material->m_units = $request->m_units;
        $material->m_units_type = $request->m_units_type;
        $material->m_price = $request->m_price;
        $material->m_critical_limit = $request->m_critical_limit;
        $material->m_minimal_limit = $request->m_minimal_limit;
        $material->m_edit_uid = Auth::user()->id;
        $material->save();

        $massag = 'Материал '. $request->m_name .' успешно изменен';
        return json_encode($massag);
    }

    public function deleteMaterials($id)
    {
        $material = Material::find($id);
        $material->delete();

        return json_encode('Material  успешно удален');
    }
}
