<?php

namespace Database\Seeders;

use App\Models\MedicineClassification;
use Illuminate\Database\Seeder;

class MedicineClassificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data to be stored in the table
        $classifications = [
            ['classification_name' => 'Analgesik', 'classification_description' => 'Obat pereda nyeri'],
            ['classification_name' => 'Antibiotik', 'classification_description' => 'Obat untuk mengobati infeksi bakteri'],
            ['classification_name' => 'Antidepresan', 'classification_description' => 'Obat untuk mengobati depresi dan gangguan suasana hati'],
            ['classification_name' => 'Antihistamin', 'classification_description' => 'Obat untuk mengobati alergi dan gejala rhinitis alergi'],
            ['classification_name' => 'Antiemetik', 'classification_description' => 'Obat untuk mencegah atau mengurangi mual dan muntah'],
            ['classification_name' => 'Diuretik', 'classification_description' => 'Obat untuk meningkatkan produksi urine'],
            ['classification_name' => 'Antikoagulan', 'classification_description' => 'Obat untuk mencegah pembekuan darah yang berlebihan'],
            ['classification_name' => 'Bronkodilator', 'classification_description' => 'Obat untuk mengatasi penyempitan saluran udara dalam paru-paru'],
            ['classification_name' => 'Antikonvulsan', 'classification_description' => 'Obat untuk mengobati kejang epilepsi dan gangguan neurologis lainnya'],
            ['classification_name' => 'Antikolinergik', 'classification_description' => 'Obat untuk menghambat aktivitas neurotransmiter asetilkolin dalam sistem saraf parasimpatis'],
        ];

        // insert data to table
        foreach ($classifications as $classification) {
            MedicineClassification::create($classification);
        }
    }
}
