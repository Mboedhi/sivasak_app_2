<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use App\Models\complain;

class FetchFirebaseData extends Command
{
    protected $signature = 'fetch:firebase-data';
    protected $description = 'Fetch data from Firebase and save to MySQL';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $factory = (new Factory)->withServiceAccount('D:\Cool Yeah\sem 7\PTI\sivasak_app_2\storage\app\firebase\serviceAccountKey.json');
        $database = $factory->createDatabase();

       
        $reference = $database->getReference('komplain');
        $snapshot = $reference->getSnapshot();
        $data = $snapshot->getValue();

        if ($data) {
            foreach ($data as $key => $value) {
                // Simpan data ke MySQL
                complain::updateOrCreate(['firebase_id' => $key], [
                    'vehicle_plate' => $value['vehicle_plate'] ?? null,
                    'vehicle_type' => $value['vehicle_type'] ?? null,
                    'complain_desc' => $value['complain_desc'] ?? null,
                    'vehicle_registration' => $value['vehicle_registration'] ?? null,
                    // Tambahkan field lainnya sesuai kebutuhan
                ]);
            }

            $this->info('Data berhasil disimpan ke MySQL.');
        } else {
            $this->info('Tidak ada data untuk di-fetch.');
        }
    }
}
