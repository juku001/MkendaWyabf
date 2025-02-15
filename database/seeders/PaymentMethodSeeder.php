<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            [
                'name' => 'Mix By Yas',
                'type' => 'mobile_money',
                'logo' => '/images/pay_mix.png',
                'key' => env('PAY_METHOD_TIGO')
            ],
            [
                'name' => 'Airtel',
                'type' => 'mobile_money',
                'logo' => '/images/pay_airtel.png',
                'key' => env('PAY_METHOD_AIRTEL')
            ],
            [
                'name' => 'Halopesa',
                'type' => 'mobile_money',
                'logo' => '/images/pay_halopesa.png',
                'key' => env('PAY_METHOD_HALOTEL')
            ],
            [
                'name' => 'M-Pesa',
                'type' => 'mobile_money',
                'logo' => '/images/pay_voda.png',
                'key' => env('PAY_METHOD_VODA')
            ],
            [
                'name' => 'Mastercard/Visa',
                'type' => 'card',
                'logo' => '/images/pay_card.png',
                'key' => env('PAY_METHOD_CARD')
            ],
        ];

        foreach ($methods as $method) {
            PaymentMethod::create([
                'name' => $method['name'],
                'type' => $method['type'],
                'logo' => $method['logo'],
                'key' => $method['key']
            ]);
        }
    }
}
