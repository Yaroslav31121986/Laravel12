<form method="POST" action="{{ route('create_material') }}" aria-label="{{ __('Create Material') }}">
    @csrf
    <div class="form-group row">
        <label for="m-name" class="col-md-5 col-form-label text-md-right">{{ __('Название материала') }}</label>

        <div class="col-md-6">
            <input id="m-name" type="text" class="form-control" name="m_name">
        </div>
    </div>

    <div class="form-group row">
        <label for="m-units" class="col-md-5 col-form-label text-md-right">{{ __('Единицы измерения') }}</label>

        <div class="col-md-6">
            <input id="m-units" type="text" class="form-control" name="m_units">
        </div>
    </div>

    <div class="form-group row">
        <label for="m-units-type" class="col-md-5 col-form-label text-md-right">{{ __('Тип измирения материала') }}</label>

        <div class="col-md-6">
            <input id="m-units-type" type="text" class="form-control" name="m_units_type">
        </div>
    </div>

    <div class="form-group row">
        <label for="m-price" class="col-md-5 col-form-label text-md-right">{{ __('Цена за единицу (кг/м/шт/м2....)') }}</label>

        <div class="col-md-6">
            <input id="m-price" type="text" class="form-control" name="m_price">
        </div>
    </div>

    <div class="form-group row">
        <label for="m-critical-limit" class="col-md-5 col-form-label text-md-right">{{ __('Критический предел (по количеству)') }}</label>

        <div class="col-md-6">
            <input id="m-critical-limit" type="text" class="form-control" name="m_critical_limit">
        </div>
    </div>

    <div class="form-group row">
        <label for="m-minimal-limit" class="col-md-5 col-form-label text-md-right">{{ __('Минимальный предел (по количеству)') }}</label>

        <div class="col-md-6">
            <input id="m-minimal-limit" type="text" class="form-control" name="m_minimal_limit">
        </div>
    </div>

    <div class="form-group row">
        <label for="m-notice" class="col-md-5 col-form-label text-md-right">{{ __('Примечание') }}</label>
        <div class="col-md-6">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="m_notice" name="m_notice">
            </textarea>
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
