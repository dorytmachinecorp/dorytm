<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('pages.about.index');
    }

    public function contact(): View
    {
        return view('pages.contact.index');
    }

    public function gallery(): View
    {
        // Assuming we might have a Media or Gallery model in the future
        // For now, static gallery view
        return view('pages.galleries.index');
    }

    public function privacy(): View
    {
        return view('pages.privacy.index');
    }

    public function terms(): View
    {
        return view('pages.terms.index');
    }

    public function postContact(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Anti-spam check
        if (! empty($data['website'])) {
            return back()->with('error', 'Spam detected.');
        }

        // In production, dispatch a Mailable to the sales team here
        // e.g. Mail::to('sales@doryt.com')->send(new ContactFormMail($data));

        // Log the inquiry
        Log::info('New contact inquiry from '.$data['email'], $data);

        return back()->with('success', 'Thank you for your inquiry. Our engineering team will contact you shortly.');
    }
}
