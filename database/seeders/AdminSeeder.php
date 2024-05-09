<?php

namespace Database\Seeders;

use App\Models\Mentor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'eklou',
            
            'profession' => 'developpeur',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('motdepasse'),
            'type' => '',
            'telephone' => '93996422',
        ]);
        $user->assignRole('super-admin');

        $mentor = Mentor::create([
            'user_id' => $user->id,
            'annee_experience' => 15,
            'domaine_experience' => 'informatique',
            'biographie' => 'djkfjkd djklf dlfkj',
            ]);
            
    }
}
