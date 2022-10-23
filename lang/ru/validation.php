<?php

return [
    'same' => 'Новый пароль не совпадает.',
    'min' => [
        // 'numeric' => 'The :attribute must be at least :min.',
        // 'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'Поле ":attribute" должно содержать не менее :min символов.',
        // 'array' => 'The :attribute must have at least :min items.',
    ],
    'max' => [
        // 'numeric' => 'The :attribute may not be greater than :max.',
        // 'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'Поле ":attribute" не может быть больше 255 символов.',
        // 'array' => 'The :attribute may not have more than :max items.',
    ],
    'alpha_num' => 'Поле ":attribute" может содержать только буквы и цифры.',
    'required' => 'Поле ":attribute", обязательное для заполнения.',
    'regex' => 'Поле ":attribute" содержит недопустимые символы.',
    'integer' => 'Поле ":attribute" содержит недопустимые символы.',
    'after_or_equal' => 'Даты указаны неверно',
    'current_password' => 'Неверный текущий пароль',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    */
    'custom' => [
        'promisedPaymentAmount' => [
            'min' => 'Сумма обещанного платежа не может быть меньше рекомендованной :min руб.',
            'max' => 'Слишком большая сумма',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    */
    'attributes' => [
        'promisedPaymentAmount' => 'Обещанный платеж',
        'newPassword' => 'Новый пароль',
        'confirmNewPassword' => 'Подтверждение нового пароля',
        'currentPassword' => 'Текущий пароль',
        'tpname' => 'Название тарифа',
        'orderPhone' => 'Номер телефона',
        'city' => 'Город',
    ],

];
