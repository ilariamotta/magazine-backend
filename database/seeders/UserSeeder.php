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
        $admin = new User();
        $admin->name = 'Admin Pixel Pop';
        $admin->email = 'admin@pixelpop.it';
        $admin->password = Hash::make('password');
        $admin->role = 'admin';
        $admin->save();

        $editor = new User();
        $editor->name = 'Editor Pixel Pop';
        $editor->email = 'editor@pixelpop.it';
        $editor->password = Hash::make('password');
        $editor->role = 'editor';
        $editor->save();

        $moderator = new User();
        $moderator->name = 'Moderator Pixel Pop';
        $moderator->email = 'moderator@pixelpop.it';
        $moderator->password = Hash::make('password');
        $moderator->role = 'moderator';
        $moderator->save();
    }
}
