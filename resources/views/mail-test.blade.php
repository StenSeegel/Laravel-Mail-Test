<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Mail Test</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #007cba; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <h1>E-Mail Test</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <ul style="margin: 0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mail-test.send') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="email">E-Mail-Adresse:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="message">Nachricht:</label>
            <textarea id="message" name="message" rows="5" required>{{ old('message', 'Dies ist eine Test-E-Mail von meiner Laravel-Anwendung.') }}</textarea>
        </div>

        <button type="submit">E-Mail senden</button>
    </form>

    <hr style="margin: 30px 0;">
    
    <h3>Hinweise für lokale Tests:</h3>
    <ul>
        <li><strong>Mailpit:</strong> Installiere Mailpit für lokale E-Mail-Tests: <code>brew install mailpit</code></li>
        <li><strong>Starten:</strong> <code>mailpit</code> und öffne <a href="http://localhost:8025" target="_blank">http://localhost:8025</a></li>
        <li><strong>MailHog:</strong> Alternative: <code>brew install mailhog</code> und <code>mailhog</code></li>
        <li><strong>Log-Driver:</strong> Setze <code>MAIL_MAILER=log</code> in .env für Log-Ausgabe</li>
    </ul>
</body>
</html>
