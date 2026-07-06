<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Permission::query()->delete();
Role::query()->delete();
echo 'Permissions deleted: '.Permission::count().PHP_EOL;
echo 'Roles deleted: '.Role::count().PHP_EOL;
