<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table units is empty
        if(DB::table('units')->get()->count() == 0){
            DB::table('units')->insert([
                [   
                    'unit'        => 'Kg',
                    'description' => 'Lorem ipsum dolor',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [   
                    'unit'        => 'ton',
                    'description' => 'Lorem ipsum dolor',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [   
                    'unit'        => 'g',
                    'description' => 'Lorem ipsum dolor',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [   
                    'unit'        => 'mg',
                    'description' => 'Lorem ipsum dolor',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ]
            ]);

        } 
        else { 
            echo "Unable to run the seed. The table is not empty."; 
        }
    }
}
