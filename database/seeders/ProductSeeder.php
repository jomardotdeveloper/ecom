<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => '2-in-1 Switch opener (KailhOutemu and CherryGateron)',
                'description' => '2-in-1 Switch opener (KailhOutemu and CherryGateron)',
                'price' => 100,
                'image' => url('frontend/special_image/1.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => '10PcsGateronBlackBoxandClassicInkV2(StockLubedLubed+Film)',
                'description' => '10PcsGateronBlackBoxandClassicInkV2(StockLubedLubed+Film)',
                'price' => 370,
                'image' => url('frontend/special_image/2.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => '10PCSGateronCapV2GoldenandMilkyYellow(2021)',
                'description' => '10PCSGateronCapV2GoldenandMilkyYellow(2021)',
                'price' => 150,
                'image' =>  url('frontend/special_image/3.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => '10PCSGateronCJChinaJoyPOMLinearSwitch(StockLubedLubed+Film)',
                'description' => '10PCSGateronCJChinaJoyPOMLinearSwitch(StockLubedLubed+Film)',
                'price' => 320,
                'image' => url('frontend/special_image/4.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => '10PCSGateronNorthPoleSwitches50g(StockLubedLubed+Film)',
                'description' => '10PCSGateronNorthPoleSwitches50g(StockLubedLubed+Film)',
                'price' => 275,
                'image' => url('frontend/special_image/5.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => '10PCSGateronYellowKS3switches5Pin(StockLubedLubed+Film)',
                'description' => '10PCSGateronYellowKS3switches5Pin(StockLubedLubed+Film)',
                'price' => 110,
                'image' => url('frontend/special_image/6.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => '10PCSGateronYellowMilkyandMilkyPROSwitches5Pin(StockLubedLubed+Film)',
                'description' => '10PCSGateronYellowMilkyandMilkyPROSwitches5Pin(StockLubedLubed+Film)',
                'price' => 110,
                'image' => url('frontend/special_image/7.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => '10pcsJWKBlack',
                'description' => '10pcsJWKBlack',
                'price' => 120,
                'image' => url('frontend/special_image/8.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => '10pcsJWKUltimateBlack',
                'description' => '10pcsJWKUltimateBlack',
                'price' => 180,
                'image' => url('frontend/special_image/9.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => '10PCSKTTMint(StockLubed)MechanicalSwitches',
                'description' => '10PCSKTTMint(StockLubed)MechanicalSwitches',
                'price' => 126,
                'image' => url('frontend/special_image/10.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => '10PCSKTTPeach(StockLubed)MechanicalSwitches',
                'description' => '10PCSKTTPeach(StockLubed)MechanicalSwitches',
                'price' => 127,
                'image' => url('frontend/special_image/11.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'DurockFoamFilms',
                'description' => 'DurockFoamFilms',
                'price' => 290,
                'image' => url('frontend/special_image/12.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'DurockPlatemountStabilizers',
                'description' => 'DurockPlatemountStabilizers',
                'price' => 320,
                'image' => url('frontend/special_image/13.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'DurockV2StabilizersMechanicalKeyboards',
                'description' => 'DurockV2StabilizersMechanicalKeyboards',
                'price' => 1000,
                'image' => url('frontend/special_image/14.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'GateronOilKingper10PCS',
                'description' => 'GateronOilKingper10PCS',
                'price' => 310,
                'image' => url('frontend/special_image/15.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'HandLubedAKKOCSSwitches',
                'description' => 'HandLubedAKKOCSSwitches',
                'price' => 849,
                'image' => url('frontend/special_image/16.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'KeycapPullerforMechanicalKeyboardKBS',
                'description' => 'KeycapPullerforMechanicalKeyboardKBS',
                'price' => 100,
                'image' => url('frontend/special_image/17.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'KTTKangWhite(StockLubed)MechanicalSwitches10PCS',
                'description' => 'KTTKangWhite(StockLubed)MechanicalSwitches10PCS',
                'price' => 126,
                'image' => url('frontend/special_image/18.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'LubedAKKOCSJELLYSwitches',
                'description' => 'LubedAKKOCSJELLYSwitches',
                'price' => 899,
                'image' => url('frontend/special_image/19.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'SteelSwitchPuller',
                'description' => 'SteelSwitchPuller',
                'price' => 100,
                'image' => url('frontend/special_image/20.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'TecwarePearlMechanicalSwitches',
                'description' => 'TecwarePearlMechanicalSwitches',
                'price' => 850,
                'image' => url('frontend/special_image/21.png'),
                'category_id' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
