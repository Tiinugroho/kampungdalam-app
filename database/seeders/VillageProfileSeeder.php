<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageProfile;

class VillageProfileSeeder extends Seeder
{
    public function run()
    {
        VillageProfile::create([
            'village_name'      => 'Kampung Dalam',
            'village_code'      => '14.09.05.2001',
            'district'          => 'Siak',
            'regency'           => 'Kabupaten Siak',
            'province'          => 'Riau',
            'postal_code'       => '28671',

            'about'             => 'Kampung Dalam adalah sebuah desa yang terletak di Kabupaten Siak, Provinsi Riau. Desa ini memiliki potensi alam yang indah dan masyarakat yang ramah serta gotong royong yang tinggi. Dengan luas wilayah 15,75 km², desa ini dihuni oleh 2.500 jiwa yang terbagi dalam 650 kepala keluarga.',
            'history'           => 'Kampung Dalam didirikan pada tahun 1950 oleh para pendatang dari berbagai daerah di Sumatera. Nama "Kampung Dalam" berasal dari lokasi desa yang berada di dalam hutan dan agak terpencil dari jalan utama. Seiring berjalannya waktu, desa ini berkembang menjadi komunitas yang solid dengan tradisi gotong royong yang kuat.',
            'vision'            => 'Menjadi desa yang maju, mandiri, dan sejahtera berbasis potensi lokal dengan tetap menjaga kelestarian lingkungan dan nilai-nilai budaya.',
            'mission'           => 'Meningkatkan kesejahteraan masyarakat melalui pembangunan infrastruktur, pendidikan, kesehatan, dan ekonomi kreatif berbasis kearifan lokal.',

            'total_population'  => 2500,
            'total_families'    => 650,
            'area_size'         => 15.75,
            'total_rt'          => 12,
            'total_rw'          => 4,

            // 'map_embed_url'     => 'https://maps.google.com/?q=0.8750,102.1667',

            'boundary_north'    => 'Berbatasan dengan Kampung Tengah',
            'boundary_south'    => 'Berbatasan dengan Sungai Siak',
            'boundary_east'     => 'Berbatasan dengan Kampung Baru',
            'boundary_west'     => 'Berbatasan dengan Hutan Lindung',

            'village_boundaries'=> 'Utara: Kampung Tengah, Selatan: Sungai Siak, Timur: Kampung Baru, Barat: Hutan Lindung',

            'contact_phone'     => '0761-123456',
            'contact_email'     => 'kampungdalam@siak.go.id',
            'contact_address'   => 'Jl. Raya Kampung Dalam, Kec. Siak, Kab. Siak, Riau 28671',
            // 'website'           => 'https://kampungdalam.siak.go.id',

            'latitude'          => 0.8750,
            'longitude'         => 102.1667,
        ]);
    }
}
