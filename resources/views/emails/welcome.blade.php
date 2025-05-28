<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Willkommen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎉 Willkommen bei Laravel Mail Test!</h1>
    </div>
    
    <div class="content">
        <h2>Hallo {{ $user->name }}!</h2>
        
        <p>Willkommen zu deiner Laravel Mail Test-Anwendung. Diese E-Mail wurde erfolgreich über eine Mailable-Klasse versendet.</p>
        
        <h3>Was du mit dieser App lernen kannst:</h3>
        <ul>
            <li>Einfache Text-Mails versenden</li>
            <li>HTML-formatierte E-Mails erstellen</li>
            <li>Mailable-Klassen verwenden</li>
            <li>E-Mail-Anhänge hinzufügen</li>
            <li>Mails in Queues einreihen</li>
            <li>Bulk-Mails versenden</li>
        </ul>
        
        <a href="{{ config('app.url') }}/dashboard" class="button">
            Zum Dashboard
        </a>
        
        <p><strong>Entwicklungs-Info:</strong><br>
        Diese Mail wurde am {{ now()->format('d.m.Y um H:i:s') }} über Herd Pro Mail Service versendet.</p>
    </div>
    
    <div class="footer">
        <p>Laravel Mail Test App - Powered by Herd Pro</p>
    </div>
</body>
</html>
