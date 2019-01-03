<?php

use App\User;
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role as Role;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $data = [];
        
        for ($i = 1; $i <= 1 ; $i++) {
            array_push($data, [
                'name' => 'Christian Tigre',
                'email' => 'andrescondo17@gmail.com',
                'password' => bcrypt('andrescondo17@gmail.com'),
                'role'     => 10,
                'bio'      => $faker->realText(),
            ]);
        }
        
        User::insert($data);

        Role::create([
            'name'      =>  'Admin',
            'slug'      =>  'admin',
            'special'   =>  'all-access',
            'description'   =>  'Administrador general del sistema, contiene todos los permisos',
        ]);
        // INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', NULL, NULL);
    }
}
