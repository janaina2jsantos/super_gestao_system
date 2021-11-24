<?php

use Illuminate\Database\Seeder;

class ContactReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table contact_reasons is empty
        if(DB::table('contact_reasons')->get()->count() == 0){
            DB::table('contact_reasons')->insert([
                [   
                    'reason'     => 'Doubt',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [   
                    'reason'     => 'Compliment',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [   
                    'reason'     => 'Suggestion',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [   
                    'reason'     => 'Complaint',
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
