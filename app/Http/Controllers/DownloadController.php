<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadController extends Controller
{
    private function getMockDownloads()
    {
        return collect([
            1 => ['title' => 'Corporate Brochure 2026', 'type' => 'PDF', 'size' => '4.2 MB', 'category' => 'Brochures'],
            2 => ['title' => 'Freeze Dryer Selection Guide', 'type' => 'PDF', 'size' => '2.1 MB', 'category' => 'Guides'],
            3 => ['title' => 'FD-10000 Technical Datasheet', 'type' => 'PDF', 'size' => '1.5 MB', 'category' => 'Datasheets'],
            4 => ['title' => 'Maintenance Schedule Template', 'type' => 'XLSX', 'size' => '0.5 MB', 'category' => 'Resources'],
        ]);
    }

    public function index(): View
    {
        $downloads = $this->getMockDownloads()->map(function ($item, $id) {
            return (object) array_merge($item, ['id' => $id]);
        });

        return view('pages.downloads.index', compact('downloads'));
    }

    public function download(int $id): StreamedResponse
    {
        $file = $this->getMockDownloads()->get($id);

        if (! $file) {
            abort(404);
        }

        $filename = Str::slug($file['title']).'_preview.txt';

        return response()->streamDownload(function () use ($file) {
            echo "DO-RYT Machine Corp - Technical Document Preview\n";
            echo "=================================================\n\n";
            echo 'Document: '.$file['title']."\n";
            echo 'Category: '.$file['category']."\n";
            echo 'Target Format: '.$file['type']."\n";
            echo 'File Size: '.$file['size']."\n";
            echo 'Generated: '.now()->format('Y-m-d H:i:s')."\n\n";
            echo "This is a dynamically generated technical document preview for testing purposes.\n";
            echo 'In the production environment, this link triggers a download of the verified file from AWS S3 or the local secure disk.';
        }, $filename, [
            'Content-Type' => 'text/plain',
        ]);
    }
}
