<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterQuesionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Apakah bisnis utama anda yang sudah berjalan berkaitan dengan barang atau jasa yang akan dipasok?',
            'Apakah perusahaan anda merupakan distributor resmi dari barang atau jasa yang anda pasok?',
            'Jelaskan rangkaian bisnis anda sampai ke PT PGP',
            'Apa spesifikasi produk / jasa anda?',
            'Apakah perusahaan anda dapat memberikan harga dan kualitas terbaik dari barang / jasa yang anda pasok?',
            'Apakah perusahaan anda memiliki jaminan klaim terhadap barang / jasa yang anda pasok?',
            'Apakah perusahaan anda dapat memberikan ketepatan waktu dalam pengiriman dari barang / jasa yang kami pesan?',
            'Apakah ada peristiwa penting menyangkut sertifikasi produk/ jasa atau sistem manajemen, penghargaan, dan lain-lain yang diterima oleh perusahaan anda?',
            'Apakah ada penjualan / pekerjaan ekspor produk / jasa anda?',
            'Berapa persen pelanggan anda yang mempunyai kontrak jangka panjang? (sebutkan)',
            'Siapa saja pelanggan potensial dan utama anda (sebutkan)',
            'Apakah anda memiliki fasilitas transportasi sendiri?',
            'Apakah perusahaan anda memiliki gudang penyimpanan barang / pool kendaraan sendiri?',
            'Apakah ada rencana pengembangan usaha?'
        ];

        foreach ($data as $question) {
            \App\Models\MasterQuestioner::create([
                'questioner' => $question,
            ]);
        }
    }
}
