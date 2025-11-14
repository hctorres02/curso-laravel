<?php

namespace App\Enums;

use App\Traits\EnumSupport;

enum UserPermission: string
{
    use EnumSupport;

    case IndexCategories = 'index_categories';
    case StoreCategories = 'store_categories';
    case DestroyCategories = 'destroy_categories';

    case IndexComments = 'index_comments';
    case ModerateComments = 'store_comments';
    case DestroyComments = 'destroy_comments';

    case IndexPosts = 'index_posts';
    case StorePosts = 'store_posts';
    case DestroyPosts = 'destroy_posts';

    case IndexMedias = 'index_medias';
    case StoreMedias = 'store_medias';
    case DestroyMedias = 'destroy_medias';

    case IndexUsers = 'index_users';
    case StoreUsers = 'store_users';
    case DestroyUsers = 'destroy_users';

    public function label(): string
    {
        return match ($this) {
            self::IndexCategories => 'Index Categories',
            self::StoreCategories => 'Create/update Categories',
            self::DestroyCategories => 'Destroy Categories',

            self::IndexComments => 'Index Comments',
            self::ModerateComments => 'Moderate Comments',
            self::DestroyComments => 'Destroy Comments',

            self::IndexPosts => 'Index Posts',
            self::StorePosts => 'Create/update Posts',
            self::DestroyPosts => 'Destroy Posts',

            self::IndexMedias => 'Index Medias',
            self::StoreMedias => 'Upload Medias',
            self::DestroyMedias => 'Destroy Medias',

            self::IndexUsers => 'Index Users',
            self::StoreUsers => 'Create/update Users',
            self::DestroyUsers => 'Destroy Users',
        };
    }
}
