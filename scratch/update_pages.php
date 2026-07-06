<?php

use App\Enums\ContentStatus;
use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

// Delete the unused 'About Us' page
Page::where('slug', 'about')->delete();

// Insert Privacy Policy
Page::updateOrCreate(
    ['slug' => 'privacy-policy'],
    [
        'title' => 'Privacy Policy',
        'content' => '
<h2>1. Information We Collect</h2>
<p>At DO-RYT Machine Corp, we take your privacy seriously. We collect information to provide better services to our users. This includes:</p>
<ul>
    <li>Information you give us (e.g., name, email, phone number) when you submit an inquiry or contact form.</li>
    <li>Information we get from your use of our services, such as IP addresses, browser types, and device information.</li>
</ul>

<h2>2. How We Use Information</h2>
<p>We use the information we collect from all of our services to provide, maintain, protect, and improve them, to develop new ones, and to protect DO-RYT Machine Corp and our users.</p>
<p>Specific uses include:</p>
<ul>
    <li>Processing your industrial equipment inquiries and quotes.</li>
    <li>Communicating with you regarding sales, support, and technical documentation.</li>
    <li>Improving our website performance and user experience through aggregated analytics.</li>
</ul>

<h2>3. Information Sharing</h2>
<p>We do not share personal information with companies, organizations, and individuals outside of DO-RYT Machine Corp unless one of the following circumstances applies:</p>
<ul>
    <li><strong>With your consent:</strong> We will share personal information when we have your consent.</li>
    <li><strong>For external processing:</strong> We provide personal information to our trusted partners or other trusted businesses based on our instructions and in compliance with our Privacy Policy.</li>
    <li><strong>For legal reasons:</strong> We will share personal information if we have a good-faith belief that access, use, preservation, or disclosure of the information is reasonably necessary to meet any applicable law, regulation, legal process, or enforceable governmental request.</li>
</ul>

<h2>4. Data Security</h2>
<p>We work hard to protect DO-RYT Machine Corp and our users from unauthorized access to or unauthorized alteration, disclosure, or destruction of information we hold. In particular:</p>
<ul>
    <li>We encrypt many of our services using SSL.</li>
    <li>We review our information collection, storage, and processing practices, including physical security measures, to guard against unauthorized access to systems.</li>
</ul>

<h2>5. Changes</h2>
<p>Our Privacy Policy may change from time to time. We will not reduce your rights under this Privacy Policy without your explicit consent. We will post any privacy policy changes on this page.</p>
        ',
        'status' => ContentStatus::Published,
    ]
);

// Insert Terms of Service
Page::updateOrCreate(
    ['slug' => 'terms-of-service'],
    [
        'title' => 'Terms of Service',
        'content' => '
<h2>1. Agreement to Terms</h2>
<p>By accessing or using the DO-RYT Machine Corp website, you agree to be bound by these Terms of Service. If you disagree with any part of the terms, then you may not access our website or use our services.</p>

<h2>2. Intellectual Property</h2>
<p>The website and its original content, features, and functionality are owned by DO-RYT Machine Corp and are protected by international copyright, trademark, patent, trade secret, and other intellectual property or proprietary rights laws.</p>
<p>You may not copy, modify, distribute, sell, or lease any part of our website or included software, nor may you reverse engineer or attempt to extract the source code of that software.</p>

<h2>3. Equipment Specifications</h2>
<p>While we strive to ensure that all equipment specifications, dimensions, and capacities listed on this website are accurate, they are subject to change without notice due to continuous engineering improvements. Final specifications are confirmed at the time of order placement.</p>

<h2>4. Limitation of Liability</h2>
<p>In no event shall DO-RYT Machine Corp, nor its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from your access to or use of or inability to access or use the website.</p>

<h2>5. Governing Law</h2>
<p>These Terms shall be governed and construed in accordance with the laws of our operating jurisdiction, without regard to its conflict of law provisions.</p>
<p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect.</p>

<h2>6. Changes to Terms</h2>
<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. What constitutes a material change will be determined at our sole discretion. By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms.</p>
        ',
        'status' => ContentStatus::Published,
    ]
);

echo "Pages updated successfully.\n";
