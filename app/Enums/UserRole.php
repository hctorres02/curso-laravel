<?php

namespace App\Enums;

use App\Traits\EnumSupport;

enum UserRole: string
{
    use EnumSupport;

    case Admin = 'admin';
    case Editor = 'editor';
    case Guest = 'guest';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Administrator',
            self::Editor => 'Editor',
            self::Guest => 'Guest',
        };
    }

    public function permissions(): array
    {
        return match ($this) {
            self::Admin => UserPermission::cases(), // any
            self::Editor => [
                // categories
                UserPermission::IndexCategories,
                UserPermission::StoreCategories,

                // comments
                UserPermission::IndexComments,
                UserPermission::ModerateComments,

                // medias
                UserPermission::IndexMedias,
                UserPermission::StoreMedias,

                // posts
                UserPermission::IndexPosts,
                UserPermission::StorePosts,
            ],
            self::Guest => [], // nothing
        };
    }
}
