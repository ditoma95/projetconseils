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


        $user2 = User::create([
            'name' => 'crepin',

            'profession' => 'developpeur',
            'email' => 'crepin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'type' => '',
            'telephone' => '93996422',
        ]);

        $user2->assignRole('mentor');


        $user3 = User::create([
            'name' => 'sawana',

            'profession' => 'medecin',
            'email' => 'sawana@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'type' => '',
            'telephone' => '93996422',
        ]);

        $user3->assignRole('client');


        $mentor_ = Mentor::create([
            'user_id' => $user2->id,
            'annee_experience' => 30,
            'domaine_experience' => 'informatique',
            'biographie' => 'je gnion e n ',
        ]);


        $mentor_2 = Mentor::create([
            'user_id' => $user->id,
            'annee_experience' => 20,
            'domaine_experience' => 'marketing',
            'biographie' => 'djkfjkd djklf dlfkj',
        ]);
    }
}
