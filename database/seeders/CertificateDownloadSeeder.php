<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\Download;
use Illuminate\Database\Seeder;

class CertificateDownloadSeeder extends Seeder
{
    public function run(): void
    {
        $certs = [
            ['title' => 'ISO 9001:2015', 'description' => 'Quality Management System standards across design, fabrication, and testing processes.', 'icon' => 'check-badge'],
            ['title' => 'CE Marking', 'description' => 'European Conformity standards met for all electrical panels and pneumatic control units.', 'icon' => 'shield-check'],
            ['title' => 'cGMP Compliant', 'description' => 'Current Good Manufacturing Practice designs for pharmaceutical and food process equipment.', 'icon' => 'clipboard-document-check'],
            ['title' => 'FDA Approved Materials', 'description' => 'Food-grade premium 316L/304 stainless steel and non-reactive polymers for all product contact parts.', 'icon' => 'star'],
        ];

        foreach ($certs as $index => $cert) {
            Certificate::updateOrCreate(
                ['title' => $cert['title']],
                [
                    'description' => $cert['description'],
                    'icon' => $cert['icon'],
                    'status' => 'published',
                    'sort_order' => $index,
                ]
            );
        }

        $downloads = [
            ['title' => 'Corporate Brochure 2026', 'type' => 'PDF', 'size' => '4.2 MB', 'category' => 'Brochures'],
            ['title' => 'Freeze Dryer Selection Guide', 'type' => 'PDF', 'size' => '2.1 MB', 'category' => 'Guides'],
            ['title' => 'FD-10000 Technical Datasheet', 'type' => 'PDF', 'size' => '1.5 MB', 'category' => 'Datasheets'],
            ['title' => 'Maintenance Schedule Template', 'type' => 'XLSX', 'size' => '0.5 MB', 'category' => 'Resources'],
        ];

        foreach ($downloads as $index => $dl) {
            try {
                Download::updateOrCreate(
                    ['title' => $dl['title']],
                    [
                        'file_type' => $dl['type'],
                        'file_size' => $dl['size'],
                        'category' => $dl['category'],
                        'status' => 'published',
                        'sort_order' => $index,
                    ]
                );
            } catch (\Exception $e) {
                // Ignore download creation failure
            }
        }
    }
}
