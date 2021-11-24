<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if(DB::table('users')->get()->count() == 0){
            DB::table('users')->insert([
                [   
                    'name'       => 'José Alves Souza',
                    'email'      => 'josetest@gmail.com',
                    'password'   => Hash::make('123456'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [   
                    'name'       => 'João da Silva',
                    'email'      => 'joaotest@gmail.com',
                    'password'   => Hash::make('123456'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [   
                    'name'       => 'Maria Helena Oliveira',
                    'email'      => 'mariatest@gmail.com',
                    'password'   => Hash::make('123456'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]);

        } 
        else { 
            echo "Unable to run the seed. The table is not empty."; 
        }
    }
}
