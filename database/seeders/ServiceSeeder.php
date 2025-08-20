<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Surat Keterangan Domisili',
                'category' => 'tes 1',
                'description' => 'Layanan pembuatan surat keterangan domisili untuk warga yang membutuhkan.',
                'requirements' => "KTP Asli\nKartu Keluarga\nSurat Pengantar RT/RW",
                'process' => "Datang ke kantor desa\nMengisi formulir\nMenyerahkan persyaratan\nMenunggu proses verifikasi\nSurat selesai",
                'duration' => '1 hari kerja',
                'cost' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Surat Keterangan Tidak Mampu',
                'category' => 'tes 2',
                'description' => 'Layanan pembuatan surat keterangan tidak mampu untuk berbagai keperluan.',
                'requirements' => "KTP Asli\nKartu Keluarga\nSurat Pengantar RT/RW\nSurat Keterangan Penghasilan",
                'process' => "Datang ke kantor desa\nMengisi formulir\nMenyerahkan persyaratan\nSurvey lapangan (jika diperlukan)\nSurat selesai",
                'duration' => '2-3 hari kerja',
                'cost' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Surat Pengantar Nikah',
                'category' => 'tes 1',
                'description' => 'Layanan pembuatan surat pengantar untuk keperluan pernikahan.',
                'requirements' => "KTP Asli Calon Pengantin\nKartu Keluarga\nSurat Pengantar RT/RW\nAkta Kelahiran\nSurat Keterangan Belum Menikah",
                'process' => "Datang ke kantor desa\nMengisi formulir\nMenyerahkan persyaratan\nVerifikasi data\nSurat selesai",
                'duration' => '1 hari kerja',
                'cost' => 10000,
                'is_active' => true,
            ],
            [
                'name' => 'Surat Keterangan Usaha',
                'category' => 'tes 3',
                'description' => 'Layanan pembuatan surat keterangan usaha untuk UMKM.',
                'requirements' => "KTP Asli\nKartu Keluarga\nSurat Pengantar RT/RW\nFoto Tempat Usaha",
                'process' => "Datang ke kantor desa\nMengisi formulir\nMenyerahkan persyaratan\nSurvey lokasi usaha\nSurat selesai",
                'duration' => '2-3 hari kerja',
                'cost' => 5000,
                'is_active' => true,
            ],
            [
                'name' => 'Surat Keterangan Kelahiran',
                'category' => 'tes 1',
                'description' => 'Layanan pembuatan surat keterangan kelahiran untuk bayi baru lahir.',
                'requirements' => "KTP Asli Orang Tua\nKartu Keluarga\nSurat Keterangan Lahir dari Bidan/Dokter\nBuku Nikah Orang Tua",
                'process' => "Datang ke kantor desa\nMengisi formulir\nMenyerahkan persyaratan\nVerifikasi data\nSurat selesai",
                'duration' => '1 hari kerja',
                'cost' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Surat Keterangan Kematian',
                'category' => 'tes 4',
                'description' => 'Layanan pembuatan surat keterangan kematian.',
                'requirements' => "KTP Asli Pelapor\nKTP Asli Almarhum\nKartu Keluarga\nSurat Keterangan Kematian dari Dokter/RS",
                'process' => "Datang ke kantor desa\nMengisi formulir\nMenyerahkan persyaratan\nVerifikasi data\nSurat selesai",
                'duration' => '1 hari kerja',
                'cost' => 0,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            $service['slug'] = Str::slug($service['name'], '-'); // buat slug dari name
            Service::create($service);
        }
    }
}
