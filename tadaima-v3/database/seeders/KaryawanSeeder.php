<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    public function run(): void
    {
        $karyawans = [
            [
                'name' => 'Tholhas Tampubolon',
                'position' => 'Owner',
                'image' => 'karyawan/owner.jpg'
            ],
            [
                'name' => 'Henry G. Z. Sinambela',
                'position' => 'Waiters',
                'image' => 'karyawan/henry.jpg'
            ],
            [
                'name' => 'Zefri Gusman Halawa',
                'position' => 'Chef',
                'image' => 'karyawan/zefri.jpg'
            ],
            [
                'name' => 'Jesse Tingkos Tampubolon',
                'position' => 'Chef',
                'image' => 'karyawan/jesse.jpg'
            ],
            [
                'name' => 'Ruhut Ksatria Tampubolon',
                'position' => 'Chef',
                'image' => 'karyawan/ruhut.jpg'
            ],
        ];

        foreach ($karyawans as $karyawan) {
            Karyawan::create($karyawan);
        }
    }
}
