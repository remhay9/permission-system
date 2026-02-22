<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permission System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .welcome-card {
            background: #ffffff;
            padding: 60px 50px;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .welcome-icon {
            font-size: 50px;
            color: #2a5298;
            margin-bottom: 20px;
        }

        .welcome-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .welcome-subtitle {
            color: #6c757d;
            margin-bottom: 30px;
        }

        .btn-custom {
            padding: 12px;
            font-weight: 600;
            border-radius: 10px;
        }

        .footer-text {
            margin-top: 25px;
            font-size: 13px;
            color: #999;
        }
    </style>
</head>
<body>

<div class="welcome-card">
    <div class="welcome-icon">
        <i class="fa-solid fa-user-shield"></i>
    </div>

    <div class="welcome-title">New Life Internation School</div>
    <div class="welcome-subtitle">Secure and professional access control platform</div>

    <button class="btn btn-primary btn-lg btn-custom w-100" data-bs-toggle="modal" data-bs-target="#loginModal">
        <i class="fa-solid fa-right-to-bracket me-2"></i>
        Login to Continue
    </button>

    <div class="footer-text">
        © {{ date('Y') }} Permission System. All rights reserved.
    </div>
</div>

@include('auth.login-modal')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>  