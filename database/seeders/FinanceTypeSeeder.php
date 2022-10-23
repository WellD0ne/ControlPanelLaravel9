<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Заполнение таблицы fin_types

        $types = [
            [
                'type_id' => 1,
                'op_name' => 'Расход',
                'op_sign' => -1,
            ],
            [
                'type_id' => 2,
                'op_name' => 'Приход',
                'op_sign' => 1,
            ],
            [
                'type_id' => 3,
                'op_name' => 'Баланс подвести',
                'op_sign' => 0,
            ],
            [
                'type_id' => 4,
                'op_name' => 'Обнуление',
                'op_sign' => 0,
            ],
            [
                'type_id' => 5,
                'op_name' => 'Счет',
                'op_sign' => 0,
            ],
            [
                'type_id' => 6,
                'op_name' => 'Документы',
                'op_sign' => 0,
            ],
            [
                'type_id' => 7,
                'op_name' => 'Услуга',
                'op_sign' => -1,
            ],
            [
                'type_id' => 100,
                'op_name' => 'Отчет за период',
                'op_sign' => 0,
            ],
            [
                'type_id' => 200,
                'op_name' => 'Интернет карты',
                'op_sign' => 0,
            ]
        ];

        \DB::table('fin_types')->truncate();
        \DB::table('fin_types')->insert($types);


    }
}
