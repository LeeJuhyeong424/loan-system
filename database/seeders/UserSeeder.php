<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 관리자 계정
        User::create([
            'name' => '관리자',
            'email' => 'admin@example.com',
            'login_id' => 'admin',
            'password' => Hash::make('1234'),
            'role' => 'admin',
        ]);

        // 채권자 계정 5개 (test1~test5)
        foreach (range(1, 5) as $i) {
            User::create([
                'name' => "채권자{$i}",
                'email' => "test{$i}@example.com",
                'login_id' => "test{$i}",
                'password' => Hash::make('1234'),
                'role' => 'creditor',
            ]);
        }

        // 채무자 계정 5개 (user1~user5)
        foreach (range(1, 5) as $i) {
            User::create([
                'name' => "채무자{$i}",
                'email' => "user{$i}@example.com",
                'login_id' => "user{$i}",
                'password' => Hash::make('1234'),
                'role' => 'debtor',
            ]);
        }
    }
}
