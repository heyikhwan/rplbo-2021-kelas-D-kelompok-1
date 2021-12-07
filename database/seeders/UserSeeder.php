<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = User::create([
            'name' => 'Andi Fermansyah',
            'email' => 'andi@mtsn10.com',
            'password' => bcrypt('andi1'),
            'nomor_induk' => '1800913',
            'jenis_kelamin' => 'Pria',
            'agama' => 'Islam',
            'tempat_lahir' => 'Pekanbaru',
            'tanggal_lahir' => '2006-09-21',
            'alamat' => 'Jl. Delima No. 12A'
        ]);

        $siswa->assignRole('Siswa');

        $alumni = User::create([
            'name' => 'Risa',
            'email' => 'risa@mtsn10.com',
            'password' => bcrypt('risa1'),
            'nomor_induk' => '1523942',
            'jenis_kelamin' => 'Wanita',
            'agama' => 'Islam',
            'tempat_lahir' => 'Lampung',
            'tanggal_lahir' => '2002-12-25',
            'alamat' => 'Jl. Nangka No. 53'
        ]);

        $alumni->assignRole('Alumni');

        $staffTu = User::create([
            'name' => 'Rio',
            'email' => 'rio@mtsn10.com',
            'password' => bcrypt('rio1'),
            'nomor_induk' => '80923819',
            'jenis_kelamin' => 'Pria',
            'agama' => 'Islam',
            'tempat_lahir' => 'Jambi',
            'tanggal_lahir' => '1995-01-13',
            'alamat' => 'Jl. Durian Gg. Salak No. 18'
        ]);

        $staffTu->assignRole('Staff Tata Usaha');

        $ktu = User::create([
            'name' => 'Adit',
            'email' => 'adit@mtsn10.com',
            'password' => bcrypt('adit1'),
            'nomor_induk' => '80722748',
            'jenis_kelamin' => 'Pria',
            'agama' => 'Islam',
            'tempat_lahir' => 'Pekanbaru',
            'tanggal_lahir' => '1994-05-24',
            'alamat' => 'Jl. Bakti No. 21'
        ]);

        $ktu->assignRole('Kepala Tata Usaha');

        $resepsionis = User::create([
            'name' => 'Santi',
            'email' => 'santi@mtsn10.com',
            'password' => bcrypt('santi1'),
            'nomor_induk' => '80928261',
            'jenis_kelamin' => 'Wanita',
            'agama' => 'Kristen',
            'tempat_lahir' => 'Medan',
            'tanggal_lahir' => '1997-11-21',
            'alamat' => 'Jl. Delima Gg. Kancil No. 112'
        ]);

        $resepsionis->assignRole('Resepsionis');

        $kepalaSekolah = User::create([
            'name' => 'Fikri',
            'email' => 'fikri@mtsn10.com',
            'password' => bcrypt('fikri1'),
            'nomor_induk' => '80620192',
            'jenis_kelamin' => 'Pria',
            'agama' => 'Islam',
            'tempat_lahir' => 'Pekanbaru',
            'tanggal_lahir' => '1990-03-12',
            'alamat' => 'Jl. Gajah Mada No. 31A'
        ]);

        $kepalaSekolah->assignRole('Kepala Sekolah');
    }
}
