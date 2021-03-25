<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'gt'                   => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file'    => 'The :attribute must be greater than :value kilobytes.',
        'string'  => 'The :attribute must be greater than :value characters.',
        'array'   => 'The :attribute must have more than :value items.',
    ],
    'gte'                  => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file'    => 'The :attribute must be greater than or equal :value kilobytes.',
        'string'  => 'The :attribute must be greater than or equal :value characters.',
        'array'   => 'The :attribute must have :value items or more.',
    ],
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'lt'                   => [
        'numeric' => 'The :attribute must be less than :value.',
        'file'    => 'The :attribute must be less than :value kilobytes.',
        'string'  => 'The :attribute must be less than :value characters.',
        'array'   => 'The :attribute must have less than :value items.',
    ],
    'lte'                  => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file'    => 'The :attribute must be less than or equal :value kilobytes.',
        'string'  => 'The :attribute must be less than or equal :value characters.',
        'array'   => 'The :attribute must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'u_name' => [
            'required' => 'Вы не ввели Имя',
            'max' => 'Имя не должно превышать 255 символа',
        ],
        'u_surname' => [
            'required' => 'Вы не ввели Фамилию',
            'max' => 'Фамилия не должна превышать 255 символа',
        ],
        'u_login' => [
            'required' => 'Вы не ввели Логин',
            'max' => 'Логин не должен превышать 255 символа',
            'unique' => 'Такой логин уже существует',
        ],
        'u_email' => [
            'required' => 'Вы не ввели email',
            'max' => 'email не должен превышать 255 символа',
            'email' => 'email не корректный',
        ],
        'u_phone' => [
            'required' => 'Вы не ввели телефон',
            'regex' => 'телефон не соответсвут шаблону ^([+]?380[0-9]{7})$',
        ],
        'password' => [
            'required' => 'Вы не ввели пароль',
            'max' => 'пароль не должен превышать 255 символа',
            'min' => 'пароль не должен быть меньше 5 символов',
            'confirmed' => 'пароль в поле Password должен совпадать с полем Confirm Password',
        ],
        'positions' => [
            'required' => 'Вы не указали Должность',
        ],
        'departments' => [
            'required' => 'Вы не указали Отдел',
        ],
        'u_group' => [
            'required' => 'Вы не указали Группа',
        ],
        'u_lang' => [
            'required' => 'Вы не указали язык интерфейса',
        ],
        'u_active' => [
            'required' => 'Вы не указали активность',
        ],
        'u_ip_restrict' => [
            'required' => 'Вы не указали ограничение доступа',
        ],
        'user_perm' => [
            'required' => 'Вы не указали область видимости и права',
        ],
        'ugroups_name' => [
            'required' => 'Вы не ввели назваине группы',
            'max' => 'Имя группы не должно превышать 255 символа',
        ],
        'ugroups_description' => [
            'required' => 'Вы не дали описание группы',
        ],
        'groups_perm' => [
            'required' => 'Вы не указали область видимости и права',
        ],
        'operation' => [
            'required' => 'Вы не ввели название Perm',
            'max' => 'Название Perm не должно превышать 255 символа',
        ],
        'access_level' => [
            'required' => 'Вы не указали уровень доступа',
            'max' => 'Название уровня доступа не должно превышать 255 символа',
        ],
        'description' => [
            'required' => 'Вы не дали описание доступа',
        ],
        'notice' => [
            'required' => 'Вы не оставили примечание',
        ],
        'm_name' => [
            'required' => 'Вы не ввели название метериалла',
            'max' => 'Название метериалла не должно превышать 255 символа',
            'unique' => 'Материал с таким название уже есть в БДm_units',
        ],
        'm_units' => [
            'required' => 'Вы не ввели единицу измирения',
            'max' => 'Название единицу измирения не должно превышать 255 символа',
        ],
        'm_units_type' => [
            'required' => 'Вы не ввели тип измирения материала',
            'max' => 'Название тип измирения материала не должно превышать 255 символа',
        ],
        'm_price' => [
            'required' => 'Вы не указали цену',
            'regex' => 'цена не соответсвут шаблону ([0-9]+[.]{1}[0-9]{2})',
        ],
        'm_critical_limit' => [
            'required' => 'Вы не указали критический предел',
            'max' => 'Название критический предел не должно превышать 255 символа',
            'regex' => 'критический предел не соответсвут шаблону ^([0-9]+)',
        ],
        'm_minimal_limit' => [
            'required' => 'Вы не указали минимальный предел',
            'max' => 'Название минимальный предел не должно превышать 255 символа',
            'regex' => 'минимальный предел не соответсвут шаблону ^([0-9]+)',
        ],
        'm_notice' => [
            'm_notice' => 'в поле m_notice не может быть больше чем 255 символа',
        ],
        'st_abbr' => [
            'required' => 'Вы не ввели название процесса',
            'max' => 'название процесса не должно превышать 255 символа',
        ],
        'st_options' => [
            'max' => 'Опции процесса не должно превышать 255 символа',
        ],
        'st_notice' => [
            'max' => 'Примечание процесса не должно превышать 255 символа',
        ],
        'pr_name' => [
            'required' => 'Вы не указали название процесса',
            'max' => 'Название процесса не должна превышать 255 символа',
            'unique' => 'Такой процесс уже есть в базе',
        ],
        'pr_active' => [
            'required' => 'Активируйте или деактивируйте процесс',
            'boolean' => 'значение в процессе должно быть: true, false, 1, 0, "1" и "0".',
        ],
        'pr_type' => [
            'integer' => 'В поле тип процесса вы должны указать число'
        ],
        'pr_notice' => [
            'max' => 'Примечание не должна превышать 255 символа'
        ],
        'c_name' => [
            'required' => 'Вы не указали наименование',
            'max' => 'Наименование не должна превышать 255 символа',
            'unique' => 'Такое наименование уже есть в базе',
        ],
        'c_manager' => [
            'required' => 'Вы не указали менеджера',
            'numeric' => 'В поле c_manager должно быть только число',
        ],
        'c_company_code' => [
            'required' => 'Вы не указали ЕГРПОУ',
            'numeric' => 'ЕГРПОУ должно быть числом',
            'max' => 'ЕГРПОУ не может превышать 99999999',
            'min' => 'ЕГРПОУ не может быть меньше чем 10000000',
            'unique' => 'Такой ЕГРПОУ уже есть',
        ],
        'c_contact_person_1' => [
            'required' => 'Вы не указали контактное лицо',
            'max' => 'Поле контактное лицо не может быть больше чем 255 символа',
        ],
        'c_position_1' => [
            'required' => 'Вы не указали должность',
            'max' => 'в поле должность не может быть больше чем 255 символа',
        ],
        'c_phone_1' => [
            'required' => 'Вы не указали телефон',
            'max' => 'в поле c_phone_1 не может быть больше чем 255 символа',
            'regex' => 'c_phone_1 не соотвествует регулярному выражению /^([+]?380[0-9]{9})$/i',
        ],
        'c_email_1' => [
            'required' => 'Вы не указали c_email_1',
            'max' => 'в поле c_email_1 не может быть больше чем 255 символа',
            'email' => 'в поле c_email_1 вы указали не верный email',
        ],
        'c_contact_person_2' => [
            'max' => 'в поле c_contact_person_2 не может быть больше чем 255 символа',
        ],
        'c_position_2' => [
            'max' => 'в поле c_position_2 не может быть больше чем 255 символа',
        ],
        'c_phone_2' => [
            'max' => 'в поле c_phone_2 не может быть больше чем 255 символа',
            'regex' => 'c_phone_2 не соотвествует регулярному выражению /^([+]?380[0-9]{9})$/i',
        ],
        'c_email_2' => [
            'max' => 'в поле c_email_1 не может быть больше чем 255 символа',
            'email' => 'в поле c_email_2 вы указали не верный email',
        ],
        'c_contact_person_3' => [
            'max' => 'в поле c_contact_person_3 не может быть больше чем 255 символа',
        ],
        'c_position_3' => [
            'max' => 'в поле c_position_3 не может быть больше чем 255 символа',
        ],
        'c_phone_3' => [
            'max' => 'в поле c_phone_3 не может быть больше чем 255 символа',
            'regex' => 'c_phone_3 не соотвествует регулярному выражению /^([+]?380[0-9]{9})$/i',
        ],
        'c_email_3' => [
            'max' => 'в поле c_email_3 не может быть больше чем 255 символа',
            'email' => 'в поле c_email_2 вы указали не верный email',
        ],
        'c_city' => [
            'required' => 'Вы не указали c_city',
            'max' => 'в поле c_city не может быть больше чем 255 символа',
        ],
        'c_legal_address' => [
            'max' => 'в поле c_legal_address не может быть больше чем 255 символа',
        ],
        'с_physical_adress' => [
            'max' => 'в поле с_physical_adress не может быть больше чем 255 символа',
        ],
        'с_notice' => [
            'max' => 'в поле с_physical_adress не может быть больше чем 255 символа',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
