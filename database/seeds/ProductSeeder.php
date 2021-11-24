<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table products is empty
        if(DB::table('products')->get()->count() == 0){
            DB::table('products')->insert([
                [   
                    'unit_id'      => 1,
                    'provider_id'  => 1,
                    'name'         => 'Smart TV 50 Crystal UHD Samsung 4k',
                    'weight'       => 49,
                    'description'  => 'lorem ipsum dolor',
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s')
                ],
                [   
                    'unit_id'      => 1,
                    'provider_id'  => 1,
                    'name'         => 'Bicicleta Aro 29 GtSprint Volcon',
                    'weight'       => 120,
                    'description'  => 'lorem ipsum dolor',
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s')
                ],
                [   
                    'unit_id'      => 3,
                    'provider_id'  => 1,
                    'name'         => 'Kit C/10 Pacote Protetor De Fogão Folha Aluminio 26x26',
                    'weight'       => 25,
                    'description'  => 'lorem ipsum dolor',
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s')
                ],
                [   
                    'unit_id'      => 1,
                    'provider_id'  => 1,
                    'name'         => 'Geladeira/Refrigerador Electrolux Branca 260L Cycle Defrost',
                    'weight'       => 320,
                    'description'  => 'lorem ipsum dolor',
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s')
                ]
            ]);

        } 
        else { 
            echo "Unable to run the seed. The table is not empty."; 
        }
    }
}
