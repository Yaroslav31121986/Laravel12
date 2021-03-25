<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\{DetailsLib, DMaterialsInc, DParamsInc, DProcessInc, MaterialsLib, ProcessLib};

class DetailsController extends Controller
{
    protected $messag = [];
    protected $error_array = [];

    public function index()
    {
        //подготавливаем список всех материалов
        $materials_list = MaterialsLib::all([
            'm_name',
            'm_id',
            'm_units',
            'm_units_type',
            'm_price',
            'm_critical_limit',
            'm_minimal_limit',
            'm_notice',
            ]);

        //подготавливаем список всех процессов
        $processes_list = ProcessLib::all([
            'pr_id',
            'pr_name',
            'pr_active',
            'pr_type',
            'pr_options',
            'pr_notice',
            ]);

        return response()->json([$materials_list, $processes_list]);
    }

    public function form()
    {
        $detal_form = 'admin.include.detail_form';
        $add_params_ja = 'js/admin/addParams.js';
        $materials_list = MaterialsLib::all(['m_name', 'm_id']);
        $processes_list = ProcessLib::all(['pr_id', 'pr_name']);

        return view('admin.layouts.detail', [
            'detal_form' => $detal_form,
            'add_params_ja' => $add_params_ja,
            'materials_list' => $materials_list,
            'processes_list' => $processes_list,
        ]);
    }

    public function update(Request $request, $id)
    {
        //указываем правила валидации полей d_abbr, d_notice
        $validator = Validator::make([
            'd_abbr' => $request->d_abbr,
            'd_notice' => $request->d_notice,
        ], [
            'd_abbr' => 'required|max:255',
            'd_notice' => 'max:255',
        ], [
            'd_abbr.required' => 'Вы не указали наименование детали',
            'd_abbr.max:255' => 'Наименование детали не должно превышать 255 символов',
            'd_notice.max:255' => 'Примечание к детали не должно превышать 255 символов',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messag_box = $validator->messages();

            if ($messag_box->has('d_abbr')) {
                $this->messag['d_abbr'] = $messag_box->get('d_abbr');
            }
            if ($messag_box->has('d_notice')) {
                $this->messag['d_notice'] = $messag_box->get('d_notice');
            }
        }

        //указываем правила валидации поля dpa_abbr
        if ($request->has('dpa_abbr')) {
            $this->validateDetail($request->dpa_abbr, [
                'dpa_abbr' => 'required|max:255',
            ], [
                'dpa_abbr.required' => 'Вы не указали наименование детали',
                'dpa_abbr.max:255' => 'Наименование детали не должно превышать 255 символов'],
                'dpa_abbr');
        }

        //указываем правила валидации поля dpa_min
        if ($request->has('dpa_min')) {
            $this->validateDetail(
                $request->dpa_min,
                ['dpa_min' => 'integer|nullable'],
                [
                    'dpa_min.integer' => 'В поле "Минимальное значение" нужно вводить только числа',
                ], 'dpa_min'
            );
        }

        //указываем правила валидации поля dpa_max
        if ($request->has('dpa_max')) {
            $this->validateDetail(
                $request->dpa_max,
                ['dpa_max' => 'integer|nullable'],
                [
                    'dpa_max.integer' => 'В поле "Максимальное значение" нужно вводить только числа',
                ],
                'dpa_max'
            );
        }

        //указываем правила валидации поля dpa_max
        if ($request->has('dpa_static')) {
            $this->validateDetail(
                $request->dpa_static,
                ['dpa_static' => 'integer|nullable'],
                [
                    'dpa_static.integer' => 'В поле "Стандартное значение" нужно вводить только числа',
                ], 'dpa_static'
            );
        }

        //указываем правила валидации поля dpa_notice
        if ($request->has('dpa_notice')) {
            $this->validateDetail(
                $request->dpa_notice,
                ['dpa_notice' => 'max:255'],
                [
                    'dpa_notice.max' => 'В поле "Примечание" (параметр) вы ввели более 255 символов',
                ], 'dpa_notice'
            );
        }

        //указываем правила валидации поля m_id
        if ($request->has('m_id')) {
            $this->validateDetail(
                $request->m_id,
                ['m_id' => 'numeric|required'],
                [
                    'm_id.numeric' => 'В поле "Название материала" вы должны передать переменную типа int',
                    'm_id.required' => 'Вы не указали материал',
                ], 'm_id'
            );
        }

        //указываем правила валидации поля dm_qty
        if ($request->has('dm_qty')) {
            $this->validateDetail(
                $request->dm_qty,
                ['dm_qty' => 'numeric|required'],
                [
                    'dm_qty.numeric' => 'В поле "Кол-во материала" должны быть данные типа float',
                    'dm_qty.required' => 'Вы не заполнили поле "Кол-во материала"'
                ], 'dm_qty'
            );
        }

        //указываем правила валидации поля dm_calc
        if ($request->has('dm_calc')) {
            $this->validateDetail(
                $request->dm_calc,
                ['dm_calc' => 'max:255'],
                [
                    'dm_calc.max' => 'В поле "Формула расчета" вы ввели более 255 символов',
                ], 'dm_calc'
            );
        }

        //указываем правила валидации поля pr_id
        if ($request->has('pr_id')) {
            $this->validateDetail(
                $request->pr_id,
                ['pr_id' => 'numeric|required'],
                [
                    'pr_id.numeric' => 'В поле "Название процесса" вы должны передать переменную типа int',
                    'pr_id.required' => 'Вы не указали название процесса',
                ], 'pr_id'
            );
        }

        //указываем правила валидации поля dpr_options
        if ($request->has('dpr_options')) {
            $this->validateDetail(
                $request->dpr_options,
                ['dpr_options' => 'max:255'],
                [
                    'dpr_options.max' => 'В поле "Опции" вы ввели более 255 символов',
                ], 'dpr_options'
            );
        }

        //указываем правила валидации поля dpr_notice
        if ($request->has('dpr_notice')) {
            $this->validateDetail(
                $request->dpr_notice,
                ['dpr_notice' => 'max:255'],
                [
                    'dpr_notice.max' => 'В поле "Примечание" (процесса) вы ввели более 255 символов',
                ], 'dpr_notice'
            );
        }

        //проверяем есть ли ошибки при валидации, если есть то выводим
        foreach ($this->messag as $mass) {
            array_map(array($this, 'isError'), $mass);
        }
        if (in_array('true', $this->error_array)) {
            return response()->json($this->messag);
        }

        $detail_request = $request->except([
            '_token',
            ]);

        $detail = DetailsLib::find($id);
        $detail->update([
            'd_abbr' => $detail_request['d_abbr'],
            'd_notice' => $detail_request['d_notice']
        ]);

        $detail->dProcessInc()->delete();
        $process = [];
        //сохраняем процессы
        for ($i = 0; $i < count($detail_request['pr_id']); $i++) {
            $process[] = DProcessInc::create([
                'dpr_detail_id' => $id,
                'dpr_process_id' => $detail_request['pr_id'][$i],
                'dpr_parent_id' => !empty($process[$i - 1]->dpr_id) ? $process[$i - 1]->dpr_id : 0,
                'dpr_options' => !empty($detail_request['dpr_options'][$i]) ? $detail_request['dpr_options'][$i] : NULL,
                'dpr_notice' => !empty($detail_request['dpr_options'][$i]) ? $detail_request['dpr_options'][$i] : NULL,
                'dpr_who_create' => Auth::user()->id,
            ]);
        }

        dd('hell');

        $detail->dParamsInc()->delete();
        //сохраняем параметры
        for ($i = 0; $i < count($request->d_params_inc); $i++) {
            DParamsInc::create([
                'dpa_detail_id' => $id,
                'dpa_abbr' => $request->d_params_inc[$i]['dpa_abbr'],
                'dpa_min' => !empty($request->d_params_inc[$i]['dpa_min']) ? $request->d_params_inc[$i]['dpa_min'] : NULL,
                'dpa_max' => !empty($request->d_params_inc[$i]['dpa_max']) ? $request->d_params_inc[$i]['dpa_max'] : NULL,
                'dpa_static' => !empty($request->d_params_inc[$i]['dpa_static']) ? $request->d_params_inc[$i]['dpa_static'] : NULL,
                'dpa_type' => !empty($request->d_params_inc[$i]['dpa_type']) ? 1 : 0,
                'dpa_editable' => !empty($request->d_params_inc[$i]['dpa_editable']) ? 1 : 0,
                'dpa_notice' => !empty($request->d_params_inc[$i]['dpa_notice']) ? $request->d_params_inc[$i]['dpa_notice'] : NULL,
                'dpa_who_create' => Auth::user()->id,
            ]);
        }

        $detail->dMaterialsInc()->delete();
        //сохраняем материалы
        for ($i = 0; $i < count($request->d_materials_inc); $i++) {
            DMaterialsInc::create([
                'dm_material_id' => $request->d_materials_inc[$i]['dm_material_id'],
                'dm_detail_id' => $id,
                'dm_qty' => $request->d_materials_inc[$i]['dm_qty'],
                'dm_calc' => !empty($request->d_materials_inc[$i]['dm_calc']) ? $request->d_materials_inc[$i]['dm_calc'] : NULL,
                'dm_who_create' => Auth::user()->id,
            ]);
        }

        return response()->json('Detail '. $request->d_abbr .' успешно добавлена', 200);
    }

    public function createDetail(Request $request)
    {
        //указываем правила валидации полей d_abbr, d_notice
        $validator = Validator::make([
            'd_abbr' => $request->d_abbr,
            'd_notice' => $request->d_notice,
        ], [
            'd_abbr' => 'required|max:255',
            'd_notice' => 'max:255',
        ], [
            'd_abbr.required' => 'Вы не указали наименование детали',
            'd_abbr.max:255' => 'Наименование детали не должно превышать 255 символов',
            'd_notice.max:255' => 'Примечание к детали не должно превышать 255 символов',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messag_box = $validator->messages();

            if ($messag_box->has('d_abbr')) {
                $this->messag['d_abbr'] = $messag_box->get('d_abbr');
            }
            if ($messag_box->has('d_notice')) {
                $this->messag['d_notice'] = $messag_box->get('d_notice');
            }
        }

        //указываем правила валидации поля dpa_abbr
        $this->validateDetail($request->dpa_abbr, [
            'dpa_abbr' => 'required|max:255',
            ], [
            'dpa_abbr.required' => 'Вы не указали наименование детали',
            'dpa_abbr.max:255' => 'Наименование детали не должно превышать 255 символов'],
            'dpa_abbr');

        //указываем правила валидации поля dpa_min
            $this->validateDetail(
                $request->dpa_min,
                ['dpa_min' => 'integer|nullable'],
                [
                    'dpa_min.integer' => 'В поле "Минимальное значение" нужно вводить только числа',
                ], 'dpa_min'
            );

        //указываем правила валидации поля dpa_max
            $this->validateDetail(
                $request->dpa_max,
                ['dpa_max' => 'integer|nullable'],
                [
                    'dpa_max.integer' => 'В поле "Максимальное значение" нужно вводить только числа',
                ],
                'dpa_max'
            );

        //указываем правила валидации поля dpa_max
            $this->validateDetail(
                $request->dpa_static,
                ['dpa_static' => 'integer|nullable'],
                [
                    'dpa_static.integer' => 'В поле "Стандартное значение" нужно вводить только числа',
                ], 'dpa_static'
            );

        //указываем правила валидации поля dpa_notice
        $this->validateDetail(
            $request->dpa_notice,
            ['dpa_notice' => 'max:255'],
            [
                'dpa_notice.max' => 'В поле "Примечание" (параметр) вы ввели более 255 символов',
            ], 'dpa_notice'
        );

        //указываем правила валидации поля m_id
        $this->validateDetail(
            $request->m_id,
            ['m_id' => 'numeric|required'],
            [
                'm_id.numeric' => 'В поле "Название материала" вы должны передать переменную типа int',
                'm_id.required' => 'Вы не указали материал',
            ], 'm_id'
        );

        //указываем правила валидации поля dm_qty
        $this->validateDetail(
            $request->dm_qty,
            ['dm_qty' => 'numeric|required'],
            [
                'dm_qty.numeric' => 'В поле "Кол-во материала" должны быть данные типа float',
                'dm_qty.required' => 'Вы не заполнили поле "Кол-во материала"'
            ], 'dm_qty'
        );

        //указываем правила валидации поля dm_calc
        $this->validateDetail(
            $request->dm_calc,
            ['dm_calc' => 'max:255'],
            [
                'dm_calc.max' => 'В поле "Формула расчета" вы ввели более 255 символов',
            ], 'dm_calc'
        );

        //указываем правила валидации поля pr_id
        $this->validateDetail(
            $request->pr_id,
            ['pr_id' => 'numeric|required'],
            [
                'pr_id.numeric' => 'В поле "Название процесса" вы должны передать переменную типа int',
                'pr_id.required' => 'Вы не указали название процесса',
            ], 'pr_id'
        );

        //указываем правила валидации поля dpr_options
        $this->validateDetail(
            $request->dpr_options,
            ['dpr_options' => 'max:255'],
            [
                'dpr_options.max' => 'В поле "Опции" вы ввели более 255 символов',
            ], 'dpr_options'
        );

        //указываем правила валидации поля dpr_notice
        $this->validateDetail(
            $request->dpr_notice,
            ['dpr_notice' => 'max:255'],
            [
                'dpr_notice.max' => 'В поле "Примечание" (процесса) вы ввели более 255 символов',
            ], 'dpr_notice'
        );

        //если есть ошибки выводим их и прерываем скрипт
        if (isset($this->messag)) {
            return response()->json($this->messag);
        }

        //сохраняем данные введенные из формы
        $detail = $request->all();
        unset($detail['_token']);

        //создаем деталь
        $detail_model = DetailsLib::create([
            'd_abbr' => $request->d_abbr,
            'd_notice' => $request->d_notice,
            'd_who_create' => Auth::user()->id,
        ]);

        //сохраняем параметры
        for ($i = 0; $i < count($detail['dpa_abbr']); $i++) {
            DParamsInc::create([
                'dpa_detail_id' => $detail_model->d_id,
                'dpa_abbr' => $detail['dpa_abbr'][$i],
                'dpa_min' => $detail['dpa_min'][$i],
                'dpa_max' => $detail['dpa_max'][$i],
                'dpa_static' => $detail['dpa_static'][$i],
                'dpa_type' => !empty($detail['dpa_type'][$i]) ? 1 : 0,
                'dpa_editable' => !empty($detail['dpa_editable'][$i]) ? 1 : 0,
                'dpa_notice' => $detail['dpa_notice'][$i],
                'dpa_who_create' => Auth::user()->id,
            ]);
        }

        //сохраняем материалы
        for ($i = 0; $i < count($detail['m_id']); $i++) {
            DMaterialsInc::create([
                'dm_material_id' => $detail['m_id'][$i],
                'dm_detail_id' => $detail_model->d_id,
                'dm_qty' => $detail['dm_qty'][$i],
                'dm_calc' => $detail['dm_calc'][$i],
                'dm_who_create' => Auth::user()->id,
            ]);
        }

        $process = [];
        //сохраняем процессы
        for ($i = 0; $i < count($detail['pr_id']); $i++) {
            $process[] = DProcessInc::create([
                'dpr_detail_id' => $detail_model->d_id,
                'dpr_process_id' => $detail['pr_id'][$i],
                'dpr_parent_id' => !empty($process[$i - 1]->dpr_id) ? $process[$i - 1]->dpr_id : 0,
                'dpr_options' => $detail['dpr_options'][$i],
                'dpr_notice' => $detail['dpr_options'][$i],
                'dpr_who_create' => Auth::user()->id,
            ]);
        }

        return response()->json('Detail '. $request->d_abbr .' успешно добавлена', 200);
    }

    public function showDetails()
    {
        $details = DetailsLib::with('dProcessInc', 'dMaterialsInc', 'dParamsInc')->get()->toArray();

        return response()->json($details);
    }

    public function showDetailsId($id)
    {
        $detail = DetailsLib::with('dProcessInc', 'dMaterialsInc', 'dParamsInc')->where('d_id', $id)
            ->get()->toArray();

        return response()->json($detail);
    }

    public function delete($id)
    {
        $detail = DetailsLib::findOrFail($id);
        $detail->delete();

        return response()->json('Detail успешно удален');
    }

    protected function validateDetail(array $data, array $regulations, array $massege, $name_field)
    {
        for ($i = 0; $i < count($data); $i++) {
            $validator = Validator::make([$name_field => $data[$i]], $regulations, $massege);

            $messag_box = $validator->messages();
            if ($messag_box->has($name_field)) {
                $this->messag[$name_field][$i] =  $messag_box->get($name_field);
            } else {
                $this->messag[$name_field][$i] = [];
            }
        }
    }

    protected function isError($d)
    {
        if (!empty($d)) {
            $this->error_array[] = 'true';
        } else {
            $this->error_array[] = 'false';
        }
    }
}
