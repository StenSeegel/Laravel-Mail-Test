<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test E-Mail</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #007cba; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background: #f9f9f9; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Test E-Mail von Laravel</h1>
        </div>
        
        <div class="content">
            <p>Hallo <strong>{{ $name }}</strong>,</p>
            
            <p>{{ $message }}</p>
            
            <p>Diese E-Mail wurde von deiner Laravel-Anwendung gesendet.</p>
            
            <hr>
            
            <p><strong>Technische Details:</strong></p>
            <ul>
                <li>Gesendet am: {{ now()->format('d.m.Y H:i:s') }}</li>
                <li>Von: {{ config('app.name') }}</li>
                <li>Environment: {{ config('app.env') }}</li>
            </ul>
        </div>
        
        <div class="footer">
            <p>© {{ date('Y') }} {{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>
