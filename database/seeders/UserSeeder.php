<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $users = [
      [
        'name' => 'Test 1',
        'email' => 'test1@example.com',
        'password' => Hash::make('00000000'),
        'affiliate_key' => 'AAAAA',
        'referrer_id' => 1
      ],
      [
        'name' => 'Test 2',
        'email' => 'test2@example.com',
        'password' => Hash::make('00000000'),
        'affiliate_key' => 'BBBBBB',
        'referrer_id' => 2
      ]
    ];

    foreach ($users as $user) {
      User::create($user);
    }
  }
}
