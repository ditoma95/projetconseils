<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Conducteur;
use App\Models\Passager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'profession' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'telephone' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:conducteur,passager'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            $user = User::create([
                'name' => $input['name'],
                'surname' => $input['surname'],
                'profession' => $input['profession'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'telephone' => $input['telephone'],
                'type' => $input['type'],
            ]);
                
            if ($input['type'] === 'conducteur') {
                Conducteur::create([
                    'conducteur_id' => $user->id,
                    'permis_image' => $input['permis_image'],
                ]);
                $user->assignRole('admin');

            } else if ($input['type'] === 'passager') {
                Passager::create([
                    'passager_id' => $user->id,
                ]);
                $user->assignRole('client');
            }

            //$this->createTeam($user);

            return $user;
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
