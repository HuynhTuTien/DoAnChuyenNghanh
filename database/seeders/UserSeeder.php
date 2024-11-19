<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'User 1',
                'email' => 'user1@example.com',
                'password' => bcrypt('password1'),
                'two_factor_secret' => 'null',
                'phone' => '0123456789',
                'address' => 'Address 1',
                'role' => 'user',
                'active' => 'inactive',
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@example.com',
                'password' => bcrypt('password1'),
                'phone' => '0987654321',
                'address' => 'Address 2',
                'role' => 'user',
                'active' => 'inactive',
            ],
            [
                'name' => 'User 3',
                'email' => 'user3@example.com',
                'password' => bcrypt('password1'),
                'phone' => '0123451729',
                'address' => 'Address 1',
                'role' => 'user',
                'active' => 'inactive',
            ],
            [
                'name' => 'User 4',
                'email' => 'user4@example.com',
                'password' => bcrypt('password1'),
                'phone' => '0122356789',
                'address' => 'Address 1',
                'role' => 'user',
                'active' => 'inactive',
            ],
            [
                'name' => 'User 5',
                'email' => 'user5@example.com',
                'password' => bcrypt('password1'),
                'phone' => '0123546789',
                'address' => 'Address 1',
                'role' => 'user',
                'active' => 'inactive',
            ],
            [
                'name' => 'User 6',
                'email' => 'user6@example.com',
                'password' => bcrypt('password1'),
                'phone' => '0354234441',
                'address' => 'Address 1',
                'role' => 'user',
                'active' => 'inactive',
            ],
            [
                'name' => 'Nguyen Cuong',
                'email' => 'ngoccuong147258@gmail.com',
                'password' => bcrypt('123456789'),
                'phone' => '0354233641',
                'address' => 'Cần Thơ',
                'role' => 'admin',
                'active' => 'active',
            ],
            [
                'name' => 'New User 2',
                'email' => 'newuser2@example.com',
                'password' => bcrypt('newpassword2'),
                'phone' => '0923456789',
                'address' => 'New Address 2',
                'role' => 'staff',
                'active' => 'active',
            ],
            [
                'name' => 'New User 3',
                'email' => 'newuser3@example.com',
                'password' => bcrypt('newpassword3'),
                'phone' => '0934567890',
                'address' => 'New Address 3',
                'role' => 'staff',
                'active' => 'active',
            ],
            [
                'name' => 'New User 4',
                'email' => 'newuser4@example.com',
                'password' => bcrypt('newpassword4'),
                'phone' => '0945678901',
                'address' => 'New Address 4',
                'role' => 'staff',
                'active' => 'active',
            ],
            [
                'name' => 'New User 5',
                'email' => 'newuser5@example.com',
                'password' => bcrypt('newpassword5'),
                'phone' => '0956789012',
                'address' => 'New Address 5',
                'role' => 'staff',
                'active' => 'active',
            ],
            [
                'name' => 'New User 6',
                'email' => 'newuser6@example.com',
                'password' => bcrypt('newpassword6'),
                'phone' => '0967890123',
                'address' => 'New Address 6',
                'role' => 'staff',
                'active' => 'active',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
