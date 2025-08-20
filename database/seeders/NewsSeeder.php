<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'admin@kampungdalam.id')->first();
        
        $newsData = [
            [
                'title' => 'Pembangunan Jalan Desa Kampung Dalam Tahap Pertama Selesai',
                'slug' => 'pembangunan-jalan-desa-kampung-dalam-tahap-pertama-selesai',
                'excerpt' => 'Proyek pembangunan jalan desa sepanjang 2 kilometer telah selesai dikerjakan dan siap digunakan masyarakat untuk memperlancar aktivitas sehari-hari.',
                'content' => '<p>Desa Kampung Dalam berhasil menyelesaikan proyek pembangunan jalan desa tahap pertama sepanjang 2 kilometer yang menghubungkan pusat desa dengan daerah pertanian. Proyek ini menggunakan dana Alokasi Dana Desa (ADD) tahun 2024 sebesar Rp 500 juta.</p>

<p>Kepala Desa Kampung Dalam, Bapak Suryadi, menyampaikan bahwa pembangunan jalan ini merupakan prioritas utama untuk memperlancar akses masyarakat ke lahan pertanian dan meningkatkan perekonomian desa.</p>

<p>"Dengan selesainya jalan ini, petani dapat lebih mudah mengangkut hasil panen mereka ke pasar, dan akses kendaraan roda empat juga sudah bisa melewati jalan ini," ujar Kepala Desa.</p>

<p>Pembangunan jalan ini juga melibatkan gotong royong masyarakat dalam bentuk swadaya berupa tenaga kerja dan material lokal seperti pasir dan batu. Antusiasme masyarakat sangat tinggi karena mereka merasakan langsung manfaat dari pembangunan infrastruktur ini.</p>

<p>Rencananya, tahap kedua pembangunan jalan akan dilaksanakan tahun depan untuk melanjutkan ruas jalan menuju daerah wisata alam yang sedang dikembangkan desa.</p>',
                'featured_image' => 'news/pembangunan-jalan-desa.jpg',
                'category' => 'pembangunan',
                'status' => 'published',
                'is_featured' => true,
                'views' => 1250,
                'author_id' => $admin->id,
                'published_at' => now()->subDays(2),
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'title' => 'Festival Budaya Melayu Kampung Dalam Meriahkan HUT RI ke-79',
                'slug' => 'festival-budaya-melayu-kampung-dalam-meriahkan-hut-ri-ke-79',
                'excerpt' => 'Perayaan HUT RI ke-79 di Desa Kampung Dalam dimeriahkan dengan Festival Budaya Melayu yang menampilkan berbagai pertunjukan seni tradisional dan pameran kerajinan lokal.',
                'content' => '<p>Dalam rangka memperingati HUT RI ke-79, Desa Kampung Dalam menggelar Festival Budaya Melayu yang berlangsung selama tiga hari di lapangan desa. Acara ini menampilkan berbagai pertunjukan seni tradisional Melayu dan pameran produk UMKM lokal.</p>

<p>Festival ini dibuka langsung oleh Camat Siak yang didampingi Kepala Desa dan tokoh masyarakat. Dalam sambutannya, Camat mengapresiasi upaya desa dalam melestarikan budaya Melayu di tengah arus modernisasi.</p>

<p>Berbagai pertunjukan menarik ditampilkan seperti tari Zapin, musik Gambus, dan pertunjukan Makyong. Selain itu, ada juga lomba-lomba tradisional seperti lomba pantun, lomba masak rendang, dan lomba anyaman pandan.</p>

<p>Pameran UMKM juga menjadi daya tarik tersendiri dengan menampilkan 25 stand yang menjual berbagai produk lokal seperti kerajinan anyaman, makanan tradisional, dan produk pertanian organik.</p>

<p>"Festival ini tidak hanya untuk hiburan, tetapi juga untuk memperkenalkan potensi desa kepada masyarakat luas dan meningkatkan ekonomi masyarakat," kata Ketua Panitia, Ibu Sari Dewi.</p>',
                'featured_image' => 'news/festival-budaya-melayu.jpg',
                'category' => 'budaya',
                'status' => 'published',
                'is_featured' => true,
                'views' => 980,
                'author_id' => $admin->id,
                'published_at' => now()->subDays(5),
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'title' => 'Program Pertanian Organik Tingkatkan Pendapatan Petani 40%',
                'slug' => 'program-pertanian-organik-tingkatkan-pendapatan-petani-40-persen',
                'excerpt' => 'Program pertanian organik yang diinisiasi pemerintah desa berhasil meningkatkan pendapatan petani hingga 40% dengan sistem hidroponik dan aquaponik.',
                'content' => '<p>Program pertanian organik yang diluncurkan Desa Kampung Dalam pada awal tahun 2024 telah menunjukkan hasil yang menggembirakan. Pendapatan petani peserta program meningkat rata-rata 40% dibandingkan sistem pertanian konvensional.</p>

<p>Program ini melibatkan 50 petani yang dilatih untuk menggunakan sistem hidroponik dan aquaponik. Mereka mendapat bantuan bibit, nutrisi, dan peralatan dari dana desa serta kerjasama dengan Dinas Pertanian Kabupaten Siak.</p>

<p>Bapak Bambang Sutrisno, salah satu petani peserta program, mengaku sangat terbantu dengan adanya program ini. "Dulu saya hanya bisa panen 2 kali setahun, sekarang dengan hidroponik bisa 4-5 kali setahun dan hasilnya lebih berkualitas," ungkapnya.</p>

<p>Produk sayuran organik dari program ini telah dipasarkan ke berbagai supermarket di Pekanbaru dan mendapat respon positif dari konsumen karena kualitasnya yang baik dan bebas pestisida.</p>

<p>Kepala Desa berencana akan memperluas program ini dengan menambah 25 petani lagi pada tahun 2025 dan mengembangkan sistem pemasaran online untuk menjangkau pasar yang lebih luas.</p>',
                'featured_image' => 'news/pertanian-organik.jpg',
                'category' => 'pertanian',
                'status' => 'published',
                'is_featured' => true,
                'views' => 1450,
                'author_id' => $admin->id,
                'published_at' => now()->subDays(7),
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(7),
            ],
            [
                'title' => 'Posyandu Kampung Dalam Raih Penghargaan Posyandu Terbaik Tingkat Kecamatan',
                'slug' => 'posyandu-kampung-dalam-raih-penghargaan-posyandu-terbaik-tingkat-kecamatan',
                'excerpt' => 'Posyandu Melati Desa Kampung Dalam berhasil meraih penghargaan sebagai Posyandu Terbaik tingkat Kecamatan Siak berkat pelayanan kesehatan yang prima.',
                'content' => '<p>Posyandu Melati Desa Kampung Dalam berhasil meraih penghargaan sebagai Posyandu Terbaik tingkat Kecamatan Siak tahun 2024. Penghargaan ini diberikan berdasarkan penilaian komprehensif terhadap kualitas pelayanan, kelengkapan fasilitas, dan partisipasi masyarakat.</p>

<p>Penghargaan diserahkan langsung oleh Camat Siak dalam acara Hari Kesehatan Nasional yang diselenggarakan di Aula Kecamatan. Posyandu Melati unggul dari 15 posyandu lainnya di wilayah Kecamatan Siak.</p>

<p>Ibu Ratna Sari, Ketua Posyandu Melati, menyampaikan bahwa keberhasilan ini tidak lepas dari dukungan penuh pemerintah desa dan partisipasi aktif masyarakat. "Kami selalu berusaha memberikan pelayanan terbaik untuk ibu dan anak," ujarnya.</p>

<p>Posyandu Melati melayani 150 balita dan 80 ibu hamil dengan berbagai program seperti imunisasi, pemeriksaan kesehatan rutin, penyuluhan gizi, dan program KB. Tingkat partisipasi masyarakat mencapai 95%, tertinggi di kecamatan.</p>

<p>Sebagai bentuk apresiasi, Puskesmas Siak memberikan bantuan alat kesehatan tambahan dan akan menjadikan Posyandu Melati sebagai percontohan untuk posyandu lainnya.</p>',
                'featured_image' => 'news/posyandu-terbaik.jpg',
                'category' => 'kesehatan',
                'status' => 'published',
                'is_featured' => false,
                'views' => 750,
                'author_id' => $admin->id,
                'published_at' => now()->subDays(10),
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'title' => 'Peluncuran Website Resmi Desa Kampung Dalam untuk Transparansi Informasi',
                'slug' => 'peluncuran-website-resmi-desa-kampung-dalam-untuk-transparansi-informasi',
                'excerpt' => 'Desa Kampung Dalam meluncurkan website resmi sebagai upaya meningkatkan transparansi informasi dan pelayanan digital kepada masyarakat.',
                'content' => '<p>Desa Kampung Dalam resmi meluncurkan website desa sebagai bagian dari program digitalisasi pelayanan publik. Website ini dapat diakses melalui alamat www.kampungdalam-siak.desa.id dan menyediakan berbagai informasi serta layanan online.</p>

<p>Peluncuran website dilakukan oleh Kepala Desa didampingi Sekretaris Desa dan tim IT yang terdiri dari pemuda desa. Website ini dikembangkan dengan dana swadaya masyarakat dan bantuan dari Kementerian Desa PDTT.</p>

<p>Melalui website ini, masyarakat dapat mengakses informasi profil desa, berita terkini, layanan administrasi online, data statistik desa, dan informasi UMKM lokal. Tersedia juga fitur pengaduan masyarakat dan konsultasi online.</p>

<p>"Website ini adalah wujud komitmen kami untuk memberikan pelayanan yang transparan dan mudah diakses oleh masyarakat. Semua informasi tentang desa akan tersedia di sini," kata Sekretaris Desa, Bapak Ahmad Fauzi.</p>

<p>Kedepannya, website akan terus dikembangkan dengan menambah fitur-fitur baru seperti sistem informasi geografis desa, marketplace UMKM online, dan integrasi dengan aplikasi mobile.</p>',
                'featured_image' => 'news/peluncuran-website.jpg',
                'category' => 'teknologi',
                'status' => 'published',
                'is_featured' => false,
                'views' => 620,
                'author_id' => $admin->id,
                'published_at' => now()->subDays(12),
                'created_at' => now()->subDays(12),
                'updated_at' => now()->subDays(12),
            ],
            [
                'title' => 'Gotong Royong Pembersihan Sungai Libatkan Seluruh Warga Desa',
                'slug' => 'gotong-royong-pembersihan-sungai-libatkan-seluruh-warga-desa',
                'excerpt' => 'Kegiatan gotong royong pembersihan Sungai Kampung Dalam diikuti 200 warga dari berbagai kalangan untuk menjaga kelestarian lingkungan.',
                'content' => '<p>Sebanyak 200 warga Desa Kampung Dalam berpartisipasi dalam kegiatan gotong royong pembersihan Sungai Kampung Dalam yang dilaksanakan pada hari Minggu pagi. Kegiatan ini merupakan bagian dari program Desa Bersih dan Hijau.</p>

<p>Kegiatan dimulai pukul 07.00 WIB dengan pembagian area kerja untuk setiap RT. Warga membawa peralatan seperti cangkul, sabit, dan karung untuk mengumpulkan sampah. Antusiasme warga sangat tinggi, mulai dari anak-anak hingga lansia ikut berpartisipasi.</p>

<p>Dalam kegiatan ini berhasil dikumpulkan 15 karung sampah plastik, 8 karung sampah organik, dan berbagai barang bekas yang mencemari sungai. Selain itu, dilakukan juga penanaman pohon bambu di sepanjang bantaran sungai.</p>

<p>"Sungai ini adalah sumber kehidupan kita, jadi kita harus menjaganya bersama-sama. Alhamdulillah partisipasi warga sangat baik," kata Ketua RT 01, Bapak Hasan.</p>

<p>Setelah kegiatan pembersihan, warga berkumpul untuk makan bersama yang disediakan oleh ibu-ibu PKK. Kepala Desa berencana akan menjadwalkan kegiatan serupa setiap bulan untuk menjaga kebersihan lingkungan.</p>',
                'featured_image' => 'news/gotong-royong-sungai.jpg',
                'category' => 'lingkungan',
                'status' => 'published',
                'is_featured' => false,
                'views' => 890,
                'author_id' => $admin->id,
                'published_at' => now()->subDays(15),
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(15),
            ],
            [
                'title' => 'Pelatihan Kewirausahaan untuk Pemuda Desa Hasilkan 10 Usaha Baru',
                'slug' => 'pelatihan-kewirausahaan-untuk-pemuda-desa-hasilkan-10-usaha-baru',
                'excerpt' => 'Program pelatihan kewirausahaan yang diikuti 30 pemuda desa berhasil melahirkan 10 usaha baru di berbagai bidang dengan total modal awal Rp 200 juta.',
                'content' => '<p>Program pelatihan kewirausahaan untuk pemuda Desa Kampung Dalam yang berlangsung selama 3 bulan telah berhasil melahirkan 10 usaha baru. Program ini diikuti 30 pemuda dengan rentang usia 18-35 tahun.</p>

<p>Pelatihan dilaksanakan bekerjasama dengan Dinas Koperasi dan UMKM Kabupaten Siak serta melibatkan narasumber dari praktisi bisnis sukses. Materi yang diberikan meliputi business plan, manajemen keuangan, pemasaran digital, dan legalitas usaha.</p>

<p>Dari 30 peserta, 10 orang berhasil merealisasikan rencana bisnis mereka dengan berbagai jenis usaha seperti kuliner, kerajinan, jasa, dan perdagangan online. Total modal awal yang berhasil dihimpun mencapai Rp 200 juta dari berbagai sumber.</p>

<p>Rizki Pratama, salah satu peserta yang membuka toko online gadget, mengaku sangat terbantu dengan pelatihan ini. "Sekarang saya sudah punya usaha sendiri dan omzet per bulan sudah mencapai Rp 25 juta," ungkapnya.</p>

<p>Kepala Desa berkomitmen akan terus mendukung pengembangan usaha pemuda dengan menyediakan akses permodalan melalui BUMDes dan memfasilitasi pemasaran produk melalui berbagai event dan platform digital.</p>',
                'featured_image' => 'news/pelatihan-kewirausahaan.jpg',
                'category' => 'ekonomi',
                'status' => 'published',
                'is_featured' => true,
                'views' => 1120,
                'author_id' => $admin->id,
                'published_at' => now()->subDays(18),
                'created_at' => now()->subDays(18),
                'updated_at' => now()->subDays(18),
            ],
            [
                'title' => 'Pembangunan Balai Desa Baru Dimulai dengan Anggaran Rp 800 Juta',
                'slug' => 'pembangunan-balai-desa-baru-dimulai-dengan-anggaran-rp-800-juta',
                'excerpt' => 'Proyek pembangunan balai desa baru resmi dimulai dengan anggaran Rp 800 juta yang bersumber dari Dana Desa dan swadaya masyarakat.',
                'content' => '<p>Pembangunan balai desa baru Kampung Dalam resmi dimulai dengan peletakan batu pertama oleh Kepala Desa didampingi tokoh masyarakat dan kontraktor. Proyek ini menggunakan anggaran sebesar Rp 800 juta yang bersumber dari Dana Desa dan swadaya masyarakat.</p>

<p>Balai desa baru akan dibangun di atas lahan seluas 500 meter persegi dengan desain modern namun tetap mempertahankan ciri khas arsitektur Melayu. Bangunan akan terdiri dari ruang pelayanan, ruang rapat, aula serbaguna, dan fasilitas pendukung lainnya.</p>

<p>Kontraktor yang ditunjuk adalah CV. Karya Mandiri, perusahaan lokal yang telah berpengalaman dalam pembangunan gedung pemerintahan. Proyek direncanakan selesai dalam waktu 8 bulan dengan target beroperasi pada pertengahan tahun 2025.</p>

<p>"Balai desa baru ini akan menjadi pusat pelayanan yang lebih nyaman dan representatif untuk masyarakat. Kami juga akan menambah fasilitas digital untuk mendukung pelayanan online," kata Kepala Desa.</p>

<p>Selama masa pembangunan, pelayanan administrasi desa akan dipindah sementara ke gedung sekolah lama yang telah disiapkan dengan fasilitas yang memadai agar tidak mengganggu pelayanan kepada masyarakat.</p>',
                'featured_image' => 'news/pembangunan-balai-desa.jpg',
                'category' => 'pembangunan',
                'status' => 'published',
                'is_featured' => false,
                'views' => 680,
                'author_id' => $admin->id,
                'published_at' => now()->subDays(20),
                'created_at' => now()->subDays(20),
                'updated_at' => now()->subDays(20),
            ],
            [
                'title' => 'Desa Kampung Dalam Raih Juara 2 Lomba Desa Wisata Tingkat Provinsi',
                'slug' => 'desa-kampung-dalam-raih-juara-2-lomba-desa-wisata-tingkat-provinsi',
                'excerpt' => 'Desa Kampung Dalam berhasil meraih juara 2 dalam Lomba Desa Wisata tingkat Provinsi Riau berkat pengembangan wisata alam dan budaya yang berkelanjutan.',
                'content' => '<p>Desa Kampung Dalam berhasil meraih juara 2 dalam Lomba Desa Wisata tingkat Provinsi Riau tahun 2024. Prestasi ini diraih berkat konsistensi dalam mengembangkan potensi wisata alam dan budaya secara berkelanjutan.</p>

<p>Penilaian lomba meliputi aspek potensi wisata, pengelolaan, promosi, dan dampak ekonomi terhadap masyarakat. Tim juri terdiri dari akademisi, praktisi pariwisata, dan perwakilan Dinas Pariwisata Provinsi Riau.</p>

<p>Desa Kampung Dalam unggul dengan konsep wisata terintegrasi yang menggabungkan wisata alam sungai, wisata budaya Melayu, wisata edukasi pertanian organik, dan wisata kuliner tradisional. Paket wisata yang ditawarkan mendapat apresiasi tinggi dari juri.</p>

<p>"Ini adalah hasil kerja keras seluruh masyarakat dalam mengembangkan desa wisata. Penghargaan ini akan memotivasi kami untuk terus berinovasi," kata Ketua Pokdarwis, Ibu Sari Dewi.</p>

<p>Sebagai juara 2, desa mendapat hadiah uang pembinaan sebesar Rp 50 juta dan akan diikutsertakan dalam promosi wisata tingkat nasional. Kedepannya, desa berencana mengembangkan homestay dan paket wisata yang lebih beragam.</p>',
                'featured_image' => 'news/juara-desa-wisata.jpg',
                'category' => 'pariwisata',
                'status' => 'published',
                'is_featured' => true,
                'views' => 1350,
                'author_id' => $admin->id,
                'published_at' => now()->subDays(25),
                'created_at' => now()->subDays(25),
                'updated_at' => now()->subDays(25),
            ],
            [
                'title' => 'Program Bantuan Sembako untuk Keluarga Kurang Mampu Disalurkan',
                'slug' => 'program-bantuan-sembako-untuk-keluarga-kurang-mampu-disalurkan',
                'excerpt' => 'Pemerintah desa menyalurkan bantuan sembako kepada 75 keluarga kurang mampu sebagai bentuk kepedulian terhadap kesejahteraan masyarakat.',
                'content' => '<p>Pemerintah Desa Kampung Dalam menyalurkan bantuan sembako kepada 75 keluarga kurang mampu dalam program peduli sesama yang dilaksanakan di Balai Desa. Program ini menggunakan dana dari APBDes dan sumbangan masyarakat mampu.</p>

<p>Setiap paket bantuan berisi beras 10 kg, minyak goreng 2 liter, gula pasir 1 kg, teh, kopi, mie instan, dan kebutuhan pokok lainnya dengan total nilai Rp 150.000 per paket. Penyaluran dilakukan dengan protokol kesehatan yang ketat.</p>

<p>Penerima bantuan adalah keluarga yang terdaftar dalam data kemiskinan desa dan telah diverifikasi oleh tim pendataan yang terdiri dari perangkat desa dan tokoh masyarakat. Prioritas diberikan kepada lansia, janda, dan keluarga dengan anak balita.</p>

<p>"Ini adalah wujud kepedulian kita terhadap saudara yang membutuhkan. Semoga bantuan ini dapat meringankan beban mereka," kata Kepala Desa saat menyerahkan bantuan.</p>

<p>Para penerima bantuan mengucapkan terima kasih atas perhatian pemerintah desa. Ibu Salmah, salah satu penerima, mengatakan bantuan ini sangat membantu keluarganya yang sedang mengalami kesulitan ekonomi.</p>',
                'featured_image' => 'news/bantuan-sembako.jpg',
                'category' => 'sosial',
                'status' => 'published',
                'is_featured' => false,
                'views' => 540,
                'author_id' => $admin->id,
                'published_at' => now()->subDays(28),
                'created_at' => now()->subDays(28),
                'updated_at' => now()->subDays(28),
            ],
            [
                'title' => 'Musyawarah Desa Bahas Rencana Pembangunan Tahun 2025',
                'slug' => 'musyawarah-desa-bahas-rencana-pembangunan-tahun-2025',
                'excerpt' => 'Musyawarah Desa dihadiri 150 perwakilan masyarakat untuk membahas prioritas pembangunan tahun 2025 dengan fokus pada infrastruktur dan ekonomi.',
                'content' => '<p>Musyawarah Desa (Musdes) untuk membahas Rencana Pembangunan Jangka Menengah Desa (RPJMDes) tahun 2025 diselenggarakan di Balai Desa dengan dihadiri 150 perwakilan masyarakat dari berbagai elemen.</p>

<p>Dalam musyawarah ini dibahas berbagai usulan pembangunan yang telah dikumpulkan dari tingkat RT/RW. Prioritas utama yang disepakati adalah pembangunan infrastruktur jalan, pengembangan ekonomi masyarakat, dan peningkatan kualitas pendidikan.</p>

<p>Beberapa program prioritas yang akan dilaksanakan tahun 2025 antara lain: pembangunan jembatan penghubung antar dusun, pengembangan BUMDes, program beasiswa untuk anak berprestasi, dan pembangunan fasilitas olahraga.</p>

<p>"Semua usulan masyarakat akan kami tampung dan disesuaikan dengan kemampuan anggaran desa. Yang terpenting adalah transparansi dan akuntabilitas dalam pelaksanaannya," kata Kepala Desa.</p>

<p>Hasil musyawarah akan dituangkan dalam dokumen RPJMDes yang akan menjadi acuan pembangunan desa selama 6 tahun ke depan. Masyarakat juga diberi kesempatan untuk mengawasi pelaksanaan program melalui forum warga bulanan.</p>',
                'featured_image' => 'news/musyawarah-desa.jpg',
                'category' => 'pemerintahan',
                'status' => 'published',
                'is_featured' => false,
                'views' => 420,
                'author_id' => $admin->id,
                'published_at' => now()->subDays(30),
                'created_at' => now()->subDays(30),
                'updated_at' => now()->subDays(30),
            ]
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }
    }
}
