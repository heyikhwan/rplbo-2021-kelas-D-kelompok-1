<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Siswa',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Alumni',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Kepala Sekolah',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Resepsionis',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Kepala Tata Usaha',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Staff Tata Usaha',
            'guard_name' => 'web'
        ]);
    }
}
