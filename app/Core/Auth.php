<?php

class Auth
{
    public static function login(array $user): void
    {
        Session::set('user', [
            'id' => $user['id'],
            'role' => $user['role'],
            'email' => $user['email']
        ]);
    }

    public static function check(): bool
    {
        return Session::get('user') !== null;
    }

    public static function user(): ?array
    {
        return Session::get('user');
    }

    public static function logout(): void
    {
        Session::destroy();
    }
}
