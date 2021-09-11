<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Collor;

class CollorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collorModel = app(Collor::class);
        
        $collorModel->firstOrCreate(
            ['name' => 'Branco']
        );

        $collorModel->firstOrCreate(
            ['name' => 'Preto']
        );

        $collorModel->firstOrCreate(
            ['name' => 'Azul']
        );

        $collorModel->firstOrCreate(
            ['name' => 'Rosa']
        );

        $collorModel->firstOrCreate(
            ['name' => 'Verde']
        );

        $collorModel->firstOrCreate(
            ['name' => 'Amarelo']
        );

        $collorModel->firstOrCreate(
            ['name' => 'Vermelho']
        );

        $collorModel->firstOrCreate(
            ['name' => 'Cinza']
        );
    }
}
