<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission as Permissions;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        Permissions::create([
        	'name' => 'Navegar usuarios',
        	'slug' => 'users.index',
        	'description' => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permissions::create([
        	'name' => 'Ver detalle de usuarios',
        	'slug' => 'users.show',
        	'description' => 'Ver el detalle de cada usuario del sistema',
        ]);
        Permissions::create([
            'name' => 'Creación de  usuarios',
            'slug' => 'users.create',
            'description' => 'Crear usuario del sistema',
        ]);
        Permissions::create([
        	'name' => 'Edición de  usuarios',
        	'slug' => 'users.edit',
        	'description' => 'Editar informacion de cualquier usuario del sistema',
        ]);
        Permissions::create([
        	'name' => 'Eliminar usuarios',
        	'slug' => 'users.delete',
        	'description' => 'Eliminar cualquier usuario del sistema',
        ]);

        // Roles
        Permissions::create([
        	'name' => 'Navegar roles',
        	'slug' => 'roles.index',
        	'description' => 'Lista y navega todos los roles del sistema',
        ]);
        Permissions::create([
        	'name' => 'Ver detalle de rol',
        	'slug' => 'roles.show',
        	'description' => 'Ver el detalle de cada rol del sistema',
        ]);
        Permissions::create([
        	'name' => 'Creación de  roles',
        	'slug' => 'roles.create',
        	'description' => 'Crear rol del sistema',
        ]);
        Permissions::create([
        	'name' => 'Edición de  roles',
        	'slug' => 'roles.edit',
        	'description' => 'Editar informacion de cualquier rol del sistema',
        ]);
        Permissions::create([
        	'name' => 'Eliminar rol',
        	'slug' => 'roles.delete',
        	'description' => 'Eliminar cualquier rol del sistema',
        ]);

        // Category
        Permissions::create([
            'name' => 'Navegar Categorias',
            'slug' => 'category.index',
            'description' => 'Lista y navega todos las categorias',
        ]);
        Permissions::create([
            'name' => 'Ver detalle de Categorias',
            'slug' => 'category.show',
            'description' => 'Ver el detalle de las categorias',
        ]);
        Permissions::create([
            'name' => 'Edición de  categorias',
            'slug' => 'category.edit',
            'description' => 'Editar informacion de categoria',
        ]);
        Permissions::create([
            'name' => 'Eliminar categoria',
            'slug' => 'category.delete',
            'description' => 'Eliminar cualquier categoria',
        ]);

        // Permissions
        Permissions::create([
            'name' => 'Navegar permisos',
            'slug' => 'permissions.index',
            'description' => 'Lista y navega todos los permisos del sistema',
        ]);
        Permissions::create([
            'name' => 'Ver detalle de permiso',
            'slug' => 'permissions.show',
            'description' => 'Ver el detalle de cada permiso del sistema',
        ]);
        Permissions::create([
            'name' => 'Creación de  permiso',
            'slug' => 'permissions.create',
            'description' => 'Crear permiso del sistema',
        ]);
        Permissions::create([
            'name' => 'Edición de  permiso',
            'slug' => 'permissions.edit',
            'description' => 'Editar informacion de cualquier permiso del sistema',
        ]);
        Permissions::create([
            'name' => 'Eliminar permiso',
            'slug' => 'permissions.delete',
            'description' => 'Eliminar cualquier permiso del sistema',
        ]);
    }
}
