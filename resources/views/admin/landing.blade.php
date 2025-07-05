<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #333; color: white; margin: 0; }
        .container { text-align: center; }
        h1 { font-size: 2.5rem; margin-bottom: 1rem; }
        p { font-size: 1.2rem; color: #ccc; margin-bottom: 2rem; }
        .btn { display: inline-block; text-decoration: none; color: white; padding: 1rem 2rem; border-radius: 8px; font-size: 1rem; margin: 0 0.5rem; transition: transform 0.2s; }
        .btn:hover { transform: scale(1.05); }
        .btn-login { background-color: #28a745; }
        .btn-register { background-color: #007bff; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin & User Area</h1>
        <p>Silakan masuk untuk melanjutkan.</p>
        <div>
            <a href="{{ route('login') }}" class="btn btn-login">Login</a>
        </div>
    </div>
</body>
</html>