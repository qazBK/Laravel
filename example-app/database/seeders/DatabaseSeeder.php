<?php

namespace Database\Seeders;
use App\Models\Item;
use App\Models\User;
use App\Models\Bassket;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //добавить 
        User::factory()->create([
            'name' => 'zzz',
            'email' => 'zzz@z.com',
            'password' => Hash::make('123')
        ]);
        
        /*
        Bassket::factory()
        ->count(10)
        ->has(Item::factory()->count(3))
        ->create();
*/

        $jsonData = '{
            "Области": [
              {
                "ID": 1,
                "Название": "Свердловская"
              },
              {
                "ID": 2,
                "Название": "Тюменская"
              },
              {
                "ID": 3,
                "Название": "Челябинская"
              }
            ],
            "Города": [
              {
                "ID": 1,
                "Название": "Екатеринбург",
                "ОбластьID": 1
              },
              {
                "ID": 2,
                "Название": "Нижний Тагил",
                "ОбластьID": 1
              },
              {
                "ID": 3,
                "Название": "Тюмень",
                "ОбластьID": 2
              },
              {
                "ID": 4,
                "Название": "Тобольск",
                "ОбластьID": 2
              },
              {
                "ID": 5,
                "Название": "Челябинск",
                "ОбластьID": 3
              }
            ],
            "Улицы": [
              {
                "ID": 1,
                "Название": "Ленина",
                "ГородID": 1
              },
              {
                "ID": 2,
                "Название": "Малышева",
                "ГородID": 1
              },
              {
                "ID": 3,
                "Название": "Карла Маркса",
                "ГородID": 2
              },
              {
                "ID": 4,
                "Название": "Победы",
                "ГородID": 2
              },
              {
                "ID": 5,
                "Название": "Республики",
                "ГородID": 3
              },
              {
                "ID": 6,
                "Название": "Дзержинского",
                "ГородID": 3
              },
              {
                "ID": 7,
                "Название": "Ленина",
                "ГородID": 4
              },
              {
                "ID": 8,
                "Название": "Октябрьская",
                "ГородID": 4
              },
              {
                "ID": 9,
                "Название": "Ленина",
                "ГородID": 5
              },
              {
                "ID": 10,
                "Название": "Комсомольская",
                "ГородID": 5
              }
            ]
          }';
          
          // Декодируем JSON в массив
          $data = json_decode($jsonData, true);
          
          //use Illuminate\Support\Facades\DB;
  
          // Перебор областей
          foreach ($data['Области'] as $oblast) {
              DB::table('regions')->insert([
                  'id' => $oblast['ID'],
                  'Title' => $oblast['Название'],
              ]);
          }
          
          foreach ($data['Города'] as $gorod) {
              // Находим область для города
              DB::table('cities')->insert([
                  'id' => $gorod['ID'],
                  'Title' => $gorod['Название'],
                  'Region_id' => $gorod['ОбластьID'],
              ]);
              
          }
          
          // Перебор улиц
          foreach ($data['Улицы'] as $ulica) {
              // Находим город для улицы
              $gorodName = '';
              DB::table('streets')->insert([
                  'id' => $ulica['ID'],
                  'Title' => $ulica['Название'],
                  'City_id' => $ulica['ГородID'],
              ]);
          }

        
    }
}
