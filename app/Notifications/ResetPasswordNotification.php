<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;

class ResetPasswordNotification extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable): array
    {
        return ['mail']; // L'email est le seul canal utilisé ici
    }
// Fonction pour générer un code aléatoire
    function generateRandomCode($length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

// Méthode pour envoyer l'email avec le code
    public function toMail($notifiable): MailMessage
    {
        // Génère un code aléatoire pour la réinitialisation
        $code = $this->generateRandomCode();

        // Mise à jour ou insertion du code dans la table password_reset_tokens
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $notifiable->email], // Vérifie si un enregistrement avec cet email existe déjà
            [
                'token' => $code, // Le code généré sera stocké comme "token"
                'created_at' => now(), // Si un enregistrement existe déjà, il est mis à jour avec le code actuel et la date
            ]
        );

        // Envoie l'email avec le code
        return (new MailMessage)
            ->subject('Code de réinitialisation de votre mot de passe')
            ->line('Voici votre code de réinitialisation pour votre mot de passe.')
            ->line('Code de réinitialisation : ' . $code) // Affiche le code dans l'email
            ->line('Veuillez entrer ce code dans la modale pour réinitialiser votre mot de passe.')
            ->line('Si vous n\'avez pas demandé cette réinitialisation, veuillez ignorer cet email.');
    }


}

