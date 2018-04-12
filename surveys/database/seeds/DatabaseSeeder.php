<?php

use Illuminate\Database\Seeder;
use App\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Type::insert(array(
            ['type' => 'Checkbox'], 
            ['type' => 'Rango'], 
            ['type' => 'Radio'], 
            ['type' => 'Select']
        ));
        factory(App\Survey::class, 5)->create()->each(function ($u){
            for ($i=0; $i <rand(1,10) ; $i++) { 
                $u->questions()->save(factory(App\Question::class)->make());
            }
        });
    }
}
