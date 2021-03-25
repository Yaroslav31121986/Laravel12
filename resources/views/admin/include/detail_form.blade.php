<form method="POST" action="{{ route('create_detail') }}" aria-label="{{ __('Create Detail') }}">

    @csrf

{{--    блок детали (имя и примечание)--}}
    <div class="form-group row">
        <label for="d_abbr" class="col-md-5 col-form-label text-md-right">{{ __('Наименование детали') }}</label>
        <input id="d_abbr" type="text" class="form-control col-md-5" name="d_abbr">
    </div>
    <div class="form-group row">
        <label for="d_notice" class="col-md-5 col-form-label text-md-right">{{ __('Примечание к детали') }}</label>
        <textarea class="form-control col-md-5" id="d_notice" rows="3" name="d_notice"></textarea>
    </div>

{{--    блок с кнопками добавления параметра--}}
    <div class="form-group row">
        <label for="dpa_abbr" class="col-md-6 col-form-label text-md-right">{{ __('Добавте параметр') }}</label>
        <div class="col-md-2">
            <submit class="js-remove pull-right btn btn-danger">-</submit>
        </div>
        <div class="col-md-2">
            <submit class="js-add pull-right btn btn-success">+</submit>
        </div>
    </div>

{{--    блок параметров--}}
    <div class="params">
        <div class="param">
            <div class="form-group row">
                <label for="dpa_abbr" class="col-md-5 col-form-label text-md-right">{{ __('Имя параметра') }}</label>
                <div class="col-md-4">
                    <input id="dpa_abbr" type="text" class="form-control" name="dpa_abbr[]">
                    <br>
                </div>
                <label for="dpa_min" class="col-md-5 col-form-label text-md-right">{{ __('Минимальное значение') }}</label>
                <div class="col-md-4">
                    <input id="dpa_min" type="text" class="form-control" name="dpa_min[]">
                    <br>
                </div>
                <label for="dpa_max" class="col-md-5 col-form-label text-md-right">{{ __('Максимальное значение') }}</label>
                <div class="col-md-4">
                    <input id="dpa_max" type="text" class="form-control" name="dpa_max[]">
                    <br>
                </div>
                <label for="dpa_static" class="col-md-5 col-form-label text-md-right">{{ __('Стандартное значение') }}</label>
                <div class="col-md-4">
                    <input id="dpa_static" type="text" class="form-control" name="dpa_static[]">
                    <br>
                </div>
                <label for="dpa_type" class="col-md-5 col-form-label text-md-right">{{ __('Тип поля: обязательное или нет') }}</label>
                <div class="col-md-4">
                    <input id="dpa_type" type="checkbox" class="form-check-label" name="dpa_type[]">
                    <br>
                </div>
                <label for="dpa_editable" class="col-md-5 col-form-label text-md-right">{{ __('Редакутируемое или нет') }}</label>
                <div class="col-md-4">
                    <input id="dpa_editable" type="checkbox" class="form-check-label" name="dpa_editable[]">
                    <br>
                </div>
                <label for="dpa_notice" class="col-md-5 col-form-label text-md-right">{{ __('Примечание') }}</label>
                <div class="col-md-4">
                    <textarea class="form-control" id="dpa_notice" rows="3" name="dpa_notice[]"></textarea>
                    <br>
                </div>
            </div>
        </div>
    </div>

{{--    блок с кнопками добавления материала--}}
    <div class="form-group row">
        <label for="dpa_abbr" class="col-md-6 col-form-label text-md-right">{{ __('Добавте материала') }}</label>
        <div class="col-md-2">
            <submit class="pull-right btn btn-danger" id="material_remove">-</submit>
        </div>
        <div class="col-md-2">
            <submit class="js-add pull-right btn btn-success" id="material_add">+</submit>
        </div>
    </div>

{{--    блок материалов--}}
    <div class="materials">
        <div class="material">
            <div class="form-group row">
                <label for="dpa_notice" class="col-md-5 col-form-label text-md-right">{{ __('Название материала') }}</label>
                <select class="col-md-5 form-control" name="m_id[]">
                    <option></option>
                    @foreach($materials_list as $material)
                        <option value="{{ $material->m_id }}">{{ $material->m_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label for="dm_qty" class="col-md-5 col-form-label text-md-right">{{ __('Кол-во материала') }}</label>
                <div class="col-md-4">
                    <input id="dm_qty" type="text" class="form-control" name="dm_qty[]">
                    <br>
                </div>
            </div>
            <div class="form-group row">
                <label for="dm_calc" class="col-md-5 col-form-label text-md-right">{{ __('Формула расчета') }}</label>
                <div class="col-md-4">
                    <input id="dm_calc" type="text" class="form-control" name="dm_calc[]">
                    <br>
                </div>
            </div>
        </div>
    </div>

    {{--    блок с кнопками добавления процесса--}}
    <div class="form-group row">
        <label for="dpa_abbr" class="col-md-6 col-form-label text-md-right">{{ __('Добавте процесса') }}</label>
        <div class="col-md-2">
            <submit class="pull-right btn btn-danger" id="process_remove">-</submit>
        </div>
        <div class="col-md-2">
            <submit class="js-add pull-right btn btn-success" id="process_add">+</submit>
        </div>
    </div>

    {{--    блок процесса--}}
    <div class="processes">
        <div class="process">
            <div class="form-group row">
                <label for="dpa_notice" class="col-md-5 col-form-label text-md-right">{{ __('Название процесса') }}</label>
                <select class="col-md-5 form-control" name="pr_id[]">
                    <option></option>
                    @foreach($processes_list as $process)
                        <option value="{{ $process->pr_id }}">{{ $process->pr_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label for="dpr_options" class="col-md-5 col-form-label text-md-right">{{ __('Опции') }}</label>
                <div class="col-md-4">
                    <input id="dpr_options" type="text" class="form-control" name="dpr_options[]">
                </div>
            </div>
            <div class="form-group row">
                <label for="dpr_notice" class="col-md-5 col-form-label text-md-right">{{ __('Примечание') }}</label>
                <div class="col-md-4">
                    <textarea class="form-control" id="dpr_notice" rows="3" name="dpr_notice[]"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>

</form>

