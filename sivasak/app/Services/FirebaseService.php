<?php

namespace App\Services;

use Kreait\Firebase\Factory;

class FirebaseService
{
    private $database;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(base_path('storage/app/firebase/serviceAccountKey.json'));
        $factory->withDatabaseUri('https://ptimobile-d3a69-default-rtdb.firebaseio.com/');

        $this->database = $factory->createDatabase();
    }

    public function getComplaints()
    {
        return $this->database->getReference('complaints')->getValue();
    }

    public function saveComplaint($data)
    {
        $this->database->getReference('complaints')->push($data);
    }
}