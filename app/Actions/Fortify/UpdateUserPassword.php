<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\ValidationException;

class RegisterUser implements CreatesNewUsers
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, mixed>  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        // Vérifier si le compte est bloqué
        if (session()->has('register_attempts') && session('register_attempts') >= 3) {
            throw ValidationException::withMessages([
                'email' => 'Compte bloqué. Réessayez après 5 minutes.',
            ])->errorBag('register');
        }

        Validator::make($input, [
            'firstname' => ['required', 'string', 'regex:/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/'],
            'lastname' => ['required', 'string', 'regex:/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        // Vérifier si l'email existe déjà
        if ($this->emailExists($input['email'])) {
            throw ValidationException::withMessages([
                'email' => 'This email address is already used!',
            ])->errorBag('register');
        }

        // Créer l'utilisateur
        $user = User::create([
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        return $user;
    }

    /**
     * Check if email exists.
     *
     * @param  string  $email
     * @return bool
     */
    protected function emailExists($email): bool
    {
        // Votre logique de vérification de l'existence de l'email ici
        // Par exemple, vérifiez si l'email existe déjà dans la base de données
        return false; // Exemple de réponse, remplacez par votre propre logique
    }
}
