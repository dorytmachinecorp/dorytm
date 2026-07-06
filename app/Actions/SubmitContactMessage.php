<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\ContactMessage;
use Illuminate\Support\Facades\Request;

class SubmitContactMessage
{
    /**
     * Handle the submission of a contact message.
     */
    public function execute(array $data): ContactMessage
    {
        $data['ip_address'] = Request::ip();

        $message = ContactMessage::create($data);

        // Notification logic would go here (e.g., dispatch job, send email)

        return $message;
    }
}
