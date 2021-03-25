<form method="POST" action="{{ route('create_client') }}" aria-label="{{ __('Create Client') }}">
    @csrf
    <div class="form-group row">
        <label for="c-name" class="col-md-5 col-form-label text-md-right">{{ __('Наименование') }}</label>

        <div class="col-md-6">
            <input id="c-name" type="text" class="form-control" name="c_name">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-manager" class="col-md-5 col-form-label text-md-right">{{ __('Отвественный менеджер') }}</label>

        <div class="col-md-6">
            <input id="c-manager" type="text" class="form-control" name="c_manager">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-company-code" class="col-md-5 col-form-label text-md-right">{{ __('Код ЕГРПОУ') }}</label>

        <div class="col-md-6">
            <input id="c-company-code" type="text" class="form-control" name="c_company_code">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-contact-person-1" class="col-md-5 col-form-label text-md-right">{{ __('Контактное лицо 1') }}</label>

        <div class="col-md-6">
            <input id="c-contact-person-1" type="text" class="form-control" name="c_contact_person_1">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-position-1" class="col-md-5 col-form-label text-md-right">{{ __('Должность 1') }}</label>

        <div class="col-md-6">
            <input id="c-position-1" type="text" class="form-control" name="c_position_1">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-phone-1" class="col-md-5 col-form-label text-md-right">{{ __('Телефон 1') }}</label>

        <div class="col-md-6">
            <input id="c-phone-1" type="text" class="form-control" name="c_phone_1">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-email-1" class="col-md-5 col-form-label text-md-right">{{ __('Email 1') }}</label>

        <div class="col-md-6">
            <input id="c-email-1" type="text" class="form-control" name="c_email_1">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-contact-person-2" class="col-md-5 col-form-label text-md-right">{{ __('Контактное лицо 2') }}</label>

        <div class="col-md-6">
            <input id="c-contact_person-2" type="text" class="form-control" name="c_contact_person_2">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-position-2" class="col-md-5 col-form-label text-md-right">{{ __('Должность 2') }}</label>

        <div class="col-md-6">
            <input id="c-position-2" type="text" class="form-control" name="c_position_2">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-phone-2" class="col-md-5 col-form-label text-md-right">{{ __('Телефон 2') }}</label>

        <div class="col-md-6">
            <input id="c-phone-2" type="text" class="form-control" name="c_phone_2">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-email-2" class="col-md-5 col-form-label text-md-right">{{ __('Email 2') }}</label>

        <div class="col-md-6">
            <input id="c-email-2" type="text" class="form-control" name="c_email_2">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-contact-person-3" class="col-md-5 col-form-label text-md-right">{{ __('Контактное лицо 3') }}</label>

        <div class="col-md-6">
            <input id="c-contact-person-3" type="text" class="form-control" name="c_contact_person_3">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-position-3" class="col-md-5 col-form-label text-md-right">{{ __('Должность 3') }}</label>

        <div class="col-md-6">
            <input id="c-position-3" type="text" class="form-control" name="c_position_3">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-phone-3" class="col-md-5 col-form-label text-md-right">{{ __('Телефон 3') }}</label>

        <div class="col-md-6">
            <input id="c-phone-3" type="text" class="form-control" name="c_phone_3">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-email-3" class="col-md-5 col-form-label text-md-right">{{ __('Email 3') }}</label>

        <div class="col-md-6">
            <input id="c-email-3" type="text" class="form-control" name="c_email_3">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-city" class="col-md-5 col-form-label text-md-right">{{ __('Город') }}</label>

        <div class="col-md-6">
            <input id="c-city" type="text" class="form-control" name="c_city">
        </div>
    </div>

    <div class="form-group row">
        <label for="c-legal-address" class="col-md-5 col-form-label text-md-right">{{ __('Юридический адрес') }}</label>

        <div class="col-md-6">
            <input id="c-legal-address" type="text" class="form-control" name="c_legal_address">
        </div>
    </div>

    <div class="form-group row">
        <label for="с-physical-adress" class="col-md-5 col-form-label text-md-right">{{ __('Физический адрес') }}</label>

        <div class="col-md-6">
            <input id="с-physical-adress" type="text" class="form-control" name="с_physical_adress">
        </div>
    </div>

    <div class="form-group row">
        <label for="с-notice" class="col-md-5 col-form-label text-md-right">{{ __('Примечание') }}</label>

        <div class="col-md-6">
            <input id="с-notice" type="text" class="form-control" name="с_notice">
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

