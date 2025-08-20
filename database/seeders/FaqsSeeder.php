<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqsSeeder extends Seeder
{
    public function run()
    {
        $faqs = [
            [
                'question' => 'Bagaimana cara membuat KTP?',
                'answer' => 'Datang ke kantor desa dengan membawa KK dan dokumen pendukung.',
                'category' => 'administrasi',
                'order' => 1,
                'views' => 0,
                'is_active' => true,
            ],
            [
                'question' => 'Apa jam pelayanan kantor desa?',
                'answer' => 'Senin sampai Jumat, pukul 08.00 - 15.00 WIB.',
                'category' => 'layanan',
                'order' => 2,
                'views' => 0,
                'is_active' => true,
            ],
            [
                'question' => 'Bagaimana prosedur mengurus izin usaha?',
                'answer' => 'Ajukan permohonan ke kantor desa dengan membawa dokumen usaha.',
                'category' => 'umkm',
                'order' => 3,
                'views' => 0,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
