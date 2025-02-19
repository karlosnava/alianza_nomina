<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\DocumentType;

class DocumentTypeSeeder extends Seeder
{
    public function run()
    {
        $document_types = [
            [
                'name' => 'Cédula de ciudadania',
                'acronym' => 'C.C',
            ],
            [
                'name' => 'Tarjeta de identidad',
                'acronym' => 'T.I',
            ],
            [
                'name' => 'Pasaporte',
                'acronym' => 'P',
            ],
        ];

        foreach ($document_types as $document_type) {
            DocumentType::create($document_type);
        }
    }
}
