<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Mail Test Routen
Route::get('/send-simple-mail', function () {
    Mail::raw('Das ist eine einfache Test-Mail von Laravel!', function ($message) {
        $message->to('test@example.com')
                ->subject('Einfache Test Mail');
    });
    
    return redirect('/dashboard')->with('success', 'Einfache Text-Mail wurde versendet!');
});

Route::get('/send-html-mail', function () {
    $htmlContent = '
        <h1>HTML Test Mail</h1>
        <p>Das ist eine <strong>formatierte HTML-E-Mail</strong> von Laravel!</p>
        <ul>
            <li>Feature 1: HTML Formatierung</li>
            <li>Feature 2: CSS Styling</li>
            <li>Feature 3: Strukturierter Content</li>
        </ul>
        <p style="color: blue;">Diese Mail wurde um ' . now()->format('d.m.Y H:i:s') . ' versendet.</p>
    ';
    
    Mail::html($htmlContent, function ($message) {
        $message->to('test@example.com')
                ->subject('HTML Test Mail');
    });
    
    return redirect('/dashboard')->with('success', 'HTML-Mail wurde versendet!');
});

Route::get('/send-welcome-mail', function () {
    try {
        $user = auth()->user() ?? (object)['name' => 'Test User', 'email' => 'test@example.com'];
        
        Mail::to('welcome@example.com')->send(new WelcomeMail($user));
        
        return redirect('/dashboard')->with('success', 'Welcome-Mail wurde erfolgreich versendet!');
    } catch (\Exception $e) {
        return redirect('/dashboard')->with('error', 'Fehler beim Versenden der Welcome-Mail: ' . $e->getMessage());
    }
});

Route::get('/send-attachment-mail', function () {
    Mail::raw('Diese E-Mail enthält eine Beispiel-Datei als Anhang.', function ($message) {
        $message->to('attachment@example.com')
                ->subject('Mail mit Anhang')
                ->attach(public_path('favicon.ico'), [
                    'as' => 'laravel-favicon.ico',
                    'mime' => 'image/x-icon',
                ]);
    });
    
    return redirect('/dashboard')->with('success', 'Mail mit Anhang wurde versendet!');
});

Route::get('/send-queued-mail', function () {
    try {
        $user = auth()->user() ?? (object)['name' => 'Queue User', 'email' => 'queue@example.com'];
        
        // Direkte Queue mit der bestehenden WelcomeMail Klasse
        Mail::to('queue@example.com')->queue(new WelcomeMail($user));
        
        return redirect('/dashboard')->with('success', 'Mail wurde in die Queue eingereiht! Führe "php artisan queue:work" aus, um sie zu verarbeiten.');
    } catch (\Exception $e) {
        return redirect('/dashboard')->with('error', 'Fehler beim Einreihen der Mail: ' . $e->getMessage());
    }
});

Route::get('/send-bulk-mail', function () {
    $recipients = ['bulk1@example.com', 'bulk2@example.com', 'bulk3@example.com'];
    
    // Verwende eine einzige Mail mit mehreren Empfängern (BCC)
    Mail::raw("Bulk Mail #" . rand(1000, 9999) . " - Diese Mail wurde an mehrere Empfänger versendet.", function ($message) use ($recipients) {
        $message->to('bulk-sender@example.com')
                ->bcc($recipients)
                ->subject('Bulk Test Mail');
    });
    
    return redirect('/dashboard')->with('success', count($recipients) . ' Bulk-Mails wurden über BCC versendet!');
});

// Alternative: Queue-basierte Bulk Mail Route hinzufügen
Route::get('/send-bulk-mail-queued', function () {
    try {
        $recipients = ['bulk1@example.com', 'bulk2@example.com', 'bulk3@example.com'];
        $user = auth()->user() ?? (object)['name' => 'Bulk User', 'email' => 'bulk@example.com'];
        
        foreach ($recipients as $recipient) {
            // Jede Mail in die Queue einreihen
            Mail::to($recipient)->queue(new WelcomeMail($user));
        }
        
        return redirect('/dashboard')->with('success', count($recipients) . ' Bulk-Mails wurden in die Queue eingereiht! Führe "php artisan queue:work" aus.');
    } catch (\Exception $e) {
        return redirect('/dashboard')->with('error', 'Fehler beim Einreihen der Bulk-Mails: ' . $e->getMessage());
    }
});

require __DIR__.'/auth.php';
