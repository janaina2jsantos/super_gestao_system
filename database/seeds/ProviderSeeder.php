<?php

use Illuminate\Database\Seeder;


class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table providers is empty
        if(DB::table('providers')->get()->count() == 0){
            DB::table('providers')->insert([
                [   
                    'name'       => 'Pedro Roberto Souza',
                    'uf'         => 'MG',
                    'email'      => 'pedrosouza@gmail.com',
                    'site'       => 'www.provider01.com.br',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [   
                    'name'       => 'Joanna Balaguer Alves',
                    'uf'         => 'SP',
                    'email'      => 'joanna123@gmail.com',
                    'site'       => 'www.provider02.com.br',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [   
                    'name'       => 'Anderson Silva Leitte',
                    'uf'         => 'ES',
                    'email'      => 'andersonleitte@gmail.com',
                    'site'       => 'www.provider03.com.br',
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
