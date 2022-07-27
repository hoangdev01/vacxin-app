<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaccines')->insert([
        	['name'=>'BCG', 'origin'=>'Vietname', 'allocate'=>'Tuberculosis prevention', "reser_price" => '780', 'late_price'=>'650'],
        	['name'=>'ENGERIX B', 'origin'=>'Belgium', 'allocate'=>'Hepatitis B', "reser_price" => '1300', 'late_price'=>'1118'],
        	['name'=>'HAVAX', 'origin'=>'Vietname', 'allocate'=>'Hepatitis AB', "reser_price" => '1404', 'late_price'=>'1196'],
        	['name'=>'ROTARIX', 'origin'=>'Belgium', 'allocate'=>'Cholera rotavirus', "reser_price" => '4420', 'late_price'=>'4186'],
        	['name'=>'MMR II', 'origin'=>'America', 'allocate'=>'Measles mumps rubella', "reser_price" => '1508', 'late_price'=>'1248'],
        	['name'=>'MVAC', 'origin'=>'America', 'allocate'=>'Measles single', "reser_price" => '1820', 'late_price'=>'1560'],
        	['name'=>'PENTAXIM', 'origin'=>'France', 'allocate'=>'Diphtheria-whooping cough-tetanus', "reser_price" => '4420', 'late_price'=>'3900'],
        	['name'=>'IMOJEV', 'origin'=>'Thailand', 'allocate'=>'Japanese encephalitis', "reser_price" => '3640', 'late_price'=>'3484'],
        	['name'=>'VARIVAX', 'origin'=>'America', 'allocate'=>'Chicken pox', "reser_price" => '4420', 'late_price'=>'4264'],
        	['name'=>'VERORAB', 'origin'=>'France', 'allocate'=>'Rabies room', "reser_price" => '1664', 'late_price'=>'1508']
    	]);
    }
}
