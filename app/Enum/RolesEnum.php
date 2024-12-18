<?php

namespace App\Enum;

enum RolesEnum:string
{
    case Admin = 'admin';
    case Commentor = 'commentor';
    case User = 'user';

    public static function labels():array
    {
        return [
          self::Admin -> value => 'Admin',
          self::Commentor -> value => 'Commentor',
          self::User -> value => 'User',
        ];
    }
    public function label()
    {
        return match ($this){
            self::Admin => self::Admin,
            self::Commentor => self::Commentor,
            self::User => self::User,
        };

    }
}
