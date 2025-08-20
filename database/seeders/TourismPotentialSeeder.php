<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TourismPotential;

class TourismPotentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tourismData = [
            [
                'name' => 'Wisata Sungai Kampung Dalam',
                'slug' => 'wisata-sungai-kampung-dalam',
                'category' => 'alam',
                'description' => 'Wisata sungai yang menawarkan keindahan alam dengan air jernih dan suasana yang tenang. Pengunjung dapat menikmati aktivitas seperti berenang, memancing, dan berperahu sambil menikmati pemandangan hutan tropis di sepanjang sungai.',
                'featured_image' => 'tourism/sungai-kampung-dalam.jpg',
                'gallery_images' => json_encode([
                    'tourism/sungai-1.jpg',
                    'tourism/sungai-2.jpg',
                    'tourism/sungai-3.jpg',
                    'tourism/sungai-4.jpg'
                ]),
                'address' => 'Dusun Sungai Jernih, RT 01/RW 02, Kampung Dalam',
                'latitude' => 0.8024115,
                'longitude' => 102.050517,
                'facilities' => json_encode([
                    'Area Parkir',
                    'Gazebo',
                    'Toilet',
                    'Warung Makan',
                    'Penyewaan Perahu',
                    'Area Bermain Anak'
                ]),
                'activities' => json_encode([
                    'Berenang',
                    'Memancing',
                    'Berperahu',
                    'Fotografi',
                    'Piknik',
                    'Camping'
                ]),
                'opening_hours' => '08:00 - 17:00',
                'ticket_price' => 10000,
                'contact_person' => 'Bapak Hasan (081234567890)',
                'is_active' => true,
            ],
            [
                'name' => 'Rumah Adat Melayu Kampung Dalam',
                'slug' => 'rumah-adat-melayu-kampung-dalam',
                'category' => 'budaya',
                'description' => 'Rumah adat tradisional Melayu yang telah berusia lebih dari 150 tahun dan masih terawat dengan baik. Rumah ini menjadi saksi sejarah kehidupan masyarakat Melayu dan menyimpan berbagai koleksi benda-benda bersejarah.',
                'featured_image' => 'tourism/rumah-adat-melayu.jpg',
                'gallery_images' => json_encode([
                    'tourism/rumah-adat-1.jpg',
                    'tourism/rumah-adat-2.jpg',
                    'tourism/rumah-adat-3.jpg',
                    'tourism/rumah-adat-4.jpg',
                    'tourism/rumah-adat-5.jpg'
                ]),
                'address' => 'Jl. Pusaka Melayu No. 5, RT 02/RW 01, Kampung Dalam',
                'latitude' => 0.8034115,
                'longitude' => 102.051517,
                'facilities' => json_encode([
                    'Museum Mini',
                    'Ruang Pameran',
                    'Toko Souvenir',
                    'Area Parkir',
                    'Toilet',
                    'Pemandu Wisata'
                ]),
                'activities' => json_encode([
                    'Tur Sejarah',
                    'Fotografi',
                    'Belajar Budaya Melayu',
                    'Workshop Kerajinan',
                    'Pertunjukan Seni',
                    'Storytelling'
                ]),
                'opening_hours' => '09:00 - 16:00',
                'ticket_price' => 15000,
                'contact_person' => 'Ibu Sari Dewi (081345678901)',
                'is_active' => true,
            ],
            [
                'name' => 'Kebun Wisata Organik Hijau Lestari',
                'slug' => 'kebun-wisata-organik-hijau-lestari',
                'category' => 'edukasi',
                'description' => 'Kebun wisata edukasi yang menampilkan sistem pertanian organik modern dengan teknologi hidroponik dan aquaponik. Pengunjung dapat belajar tentang pertanian berkelanjutan dan menikmati hasil panen segar.',
                'featured_image' => 'tourism/kebun-organik.jpg',
                'gallery_images' => json_encode([
                    'tourism/organik-1.jpg',
                    'tourism/organik-2.jpg',
                    'tourism/organik-3.jpg',
                    'tourism/organik-4.jpg'
                ]),
                'address' => 'Dusun Hijau Lestari, RT 01/RW 03, Kampung Dalam',
                'latitude' => 0.8014115,
                'longitude' => 102.049517,
                'facilities' => json_encode([
                    'Greenhouse Hidroponik',
                    'Kolam Aquaponik',
                    'Ruang Edukasi',
                    'Toko Produk Organik',
                    'Kafeteria',
                    'Area Parkir'
                ]),
                'activities' => json_encode([
                    'Tur Edukasi Pertanian',
                    'Workshop Hidroponik',
                    'Panen Sayuran',
                    'Cooking Class',
                    'Fotografi',
                    'Team Building'
                ]),
                'opening_hours' => '08:00 - 16:00',
                'ticket_price' => 20000,
                'contact_person' => 'Bapak Bambang (081890123456)',
                'is_active' => true,
            ],
            [
                'name' => 'Makam Keramat Datuk Kampung Dalam',
                'slug' => 'makam-keramat-datuk-kampung-dalam',
                'category' => 'sejarah',
                'description' => 'Makam keramat yang dipercaya sebagai tempat peristirahatan terakhir Datuk Kampung Dalam, tokoh penyebar Islam pertama di daerah ini. Tempat ini sering dikunjungi peziarah untuk berdoa dan mencari berkah.',
                'featured_image' => 'tourism/makam-keramat.jpg',
                'gallery_images' => json_encode([
                    'tourism/makam-1.jpg',
                    'tourism/makam-2.jpg',
                    'tourism/makam-3.jpg'
                ]),
                'address' => 'Bukit Keramat, RT 03/RW 01, Kampung Dalam',
                'latitude' => 0.8044115,
                'longitude' => 102.052517,
                'facilities' => json_encode([
                    'Area Parkir',
                    'Tempat Wudhu',
                    'Musholla',
                    'Toilet',
                    'Gazebo',
                    'Jalan Setapak'
                ]),
                'activities' => json_encode([
                    'Ziarah',
                    'Berdoa',
                    'Meditasi',
                    'Belajar Sejarah',
                    'Fotografi',
                    'Kontemplasi'
                ]),
                'opening_hours' => '06:00 - 18:00',
                'ticket_price' => 0,
                'contact_person' => 'Bapak Imam Masjid (081456789012)',
                'is_active' => true,
            ],
            [
                'name' => 'Warung Kuliner Tradisional Sari Rasa',
                'slug' => 'warung-kuliner-tradisional-sari-rasa',
                'category' => 'kuliner',
                'description' => 'Warung kuliner yang menyajikan masakan khas Melayu dengan resep turun temurun. Tempat ini menjadi destinasi wajib bagi wisatawan yang ingin merasakan cita rasa autentik masakan tradisional Kampung Dalam.',
                'featured_image' => 'tourism/warung-sari-rasa.jpg',
                'gallery_images' => json_encode([
                    'tourism/kuliner-1.jpg',
                    'tourism/kuliner-2.jpg',
                    'tourism/kuliner-3.jpg',
                    'tourism/kuliner-4.jpg'
                ]),
                'address' => 'Jl. Raya Kampung Dalam No. 15, RT 02/RW 01',
                'latitude' => 0.8024115,
                'longitude' => 102.050517,
                'facilities' => json_encode([
                    'Ruang Makan',
                    'Dapur Terbuka',
                    'Area Parkir',
                    'Toilet',
                    'Musholla',
                    'Taman'
                ]),
                'activities' => json_encode([
                    'Makan Tradisional',
                    'Cooking Class',
                    'Food Photography',
                    'Belajar Resep',
                    'Cultural Dining',
                    'Food Tasting'
                ]),
                'opening_hours' => '07:00 - 21:00',
                'ticket_price' => 0,
                'contact_person' => 'Ibu Siti Aminah (081234567890)',
                'is_active' => true,
            ],
            [
                'name' => 'Hutan Mangrove Kampung Dalam',
                'slug' => 'hutan-mangrove-kampung-dalam',
                'category' => 'alam',
                'description' => 'Kawasan hutan mangrove yang masih alami dengan keanekaragaman hayati yang tinggi. Tempat ini menjadi habitat berbagai jenis burung, ikan, dan satwa lainnya serta berperan penting dalam konservasi lingkungan.',
                'featured_image' => 'tourism/hutan-mangrove.jpg',
                'gallery_images' => json_encode([
                    'tourism/mangrove-1.jpg',
                    'tourism/mangrove-2.jpg',
                    'tourism/mangrove-3.jpg',
                    'tourism/mangrove-4.jpg',
                    'tourism/mangrove-5.jpg'
                ]),
                'address' => 'Pesisir Sungai Kampung Dalam, RT 01/RW 01',
                'latitude' => 0.7994115,
                'longitude' => 102.048517,
                'facilities' => json_encode([
                    'Jembatan Kayu',
                    'Menara Pandang',
                    'Gazebo',
                    'Toilet',
                    'Area Parkir',
                    'Pusat Informasi'
                ]),
                'activities' => json_encode([
                    'Bird Watching',
                    'Trekking',
                    'Fotografi Alam',
                    'Edukasi Lingkungan',
                    'Penelitian',
                    'Konservasi'
                ]),
                'opening_hours' => '07:00 - 17:00',
                'ticket_price' => 5000,
                'contact_person' => 'Bapak Agus (081567890123)',
                'is_active' => true,
            ],
            [
                'name' => 'Galeri Kerajinan Anyaman Pandan',
                'slug' => 'galeri-kerajinan-anyaman-pandan',
                'category' => 'budaya',
                'description' => 'Galeri yang menampilkan berbagai kerajinan anyaman pandan khas Kampung Dalam. Pengunjung dapat melihat proses pembuatan kerajinan dan membeli produk langsung dari pengrajin.',
                'featured_image' => 'tourism/galeri-anyaman.jpg',
                'gallery_images' => json_encode([
                    'tourism/anyaman-1.jpg',
                    'tourism/anyaman-2.jpg',
                    'tourism/anyaman-3.jpg',
                    'tourism/anyaman-4.jpg'
                ]),
                'address' => 'Dusun Pandan Wangi, RT 02/RW 01, Kampung Dalam',
                'latitude' => 0.8054115,
                'longitude' => 102.053517,
                'facilities' => json_encode([
                    'Ruang Pameran',
                    'Workshop',
                    'Toko Kerajinan',
                    'Area Parkir',
                    'Toilet',
                    'Kafeteria'
                ]),
                'activities' => json_encode([
                    'Workshop Anyaman',
                    'Belanja Kerajinan',
                    'Fotografi',
                    'Belajar Kerajinan',
                    'Cultural Tour',
                    'Hands-on Experience'
                ]),
                'opening_hours' => '08:00 - 16:00',
                'ticket_price' => 10000,
                'contact_person' => 'Bapak Ahmad Yusuf (081345678901)',
                'is_active' => true,
            ],
            [
                'name' => 'Kolam Pemancingan Lele Maju Jaya',
                'slug' => 'kolam-pemancingan-lele-maju-jaya',
                'category' => 'rekreasi',
                'description' => 'Kolam pemancingan yang menyediakan ikan lele berkualitas tinggi untuk aktivitas memancing keluarga. Dilengkapi dengan fasilitas yang nyaman dan suasana yang tenang di tengah alam.',
                'featured_image' => 'tourism/kolam-pancing.jpg',
                'gallery_images' => json_encode([
                    'tourism/pancing-1.jpg',
                    'tourism/pancing-2.jpg',
                    'tourism/pancing-3.jpg'
                ]),
                'address' => 'Dusun Maju, RT 02/RW 03, Kampung Dalam',
                'latitude' => 0.8004115,
                'longitude' => 102.047517,
                'facilities' => json_encode([
                    'Kolam Pemancingan',
                    'Gazebo',
                    'Penyewaan Alat Pancing',
                    'Warung Makan',
                    'Toilet',
                    'Area Parkir'
                ]),
                'activities' => json_encode([
                    'Memancing',
                    'Piknik Keluarga',
                    'Fotografi',
                    'Relaksasi',
                    'Makan Ikan Bakar',
                    'Family Time'
                ]),
                'opening_hours' => '06:00 - 18:00',
                'ticket_price' => 15000,
                'contact_person' => 'Bapak Agus Salim (082345678901)',
                'is_active' => true,
            ],
            [
                'name' => 'Pusat Oleh-oleh Kampung Dalam',
                'slug' => 'pusat-oleh-oleh-kampung-dalam',
                'category' => 'belanja',
                'description' => 'Pusat perbelanjaan yang menyediakan berbagai oleh-oleh khas Kampung Dalam seperti kerajinan tangan, makanan tradisional, dan produk UMKM lokal. Tempat yang tepat untuk membeli kenang-kenangan.',
                'featured_image' => 'tourism/pusat-oleh-oleh.jpg',
                'gallery_images' => json_encode([
                    'tourism/oleh-oleh-1.jpg',
                    'tourism/oleh-oleh-2.jpg',
                    'tourism/oleh-oleh-3.jpg',
                    'tourism/oleh-oleh-4.jpg'
                ]),
                'address' => 'Jl. Raya Kampung Dalam No. 35, RT 01/RW 02',
                'latitude' => 0.8034115,
                'longitude' => 102.051517,
                'facilities' => json_encode([
                    'Toko Souvenir',
                    'Food Court',
                    'Area Parkir',
                    'Toilet',
                    'ATM Center',
                    'Information Center'
                ]),
                'activities' => json_encode([
                    'Belanja Oleh-oleh',
                    'Food Tasting',
                    'Fotografi',
                    'Cultural Shopping',
                    'Product Demo',
                    'Meet the Artisan'
                ]),
                'opening_hours' => '08:00 - 20:00',
                'ticket_price' => 0,
                'contact_person' => 'Ibu Ratna Sari (081456789012)',
                'is_active' => true,
            ]
        ];

        foreach ($tourismData as $tourism) {
            TourismPotential::create($tourism);
        }
    }
}
