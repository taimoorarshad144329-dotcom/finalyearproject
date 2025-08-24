<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .mm-vehicle-card { background:#fff; border-radius:12px; box-shadow:0 4px 8px rgba(0,0,0,0.1); padding:15px; transition:0.3s; }
        .mm-vehicle-card:hover { transform:translateY(-5px); }
        .mm-vehicle-image { width:100%; border-radius:10px; margin-bottom:15px; }
        .mm-feature-badge { background:#c1121f; color:#fff; border-radius:12px; padding:3px 8px; margin:2px; font-size:12px; }
        .mm-btn-select { background:#c1121f; border:none; color:#fff; padding:8px 15px; border-radius:8px; cursor:pointer; transition:0.3s; }
        .mm-btn-select:hover { background:#a20e1a; }
    </style>
</head>
<body>
    <div class="container py-4">
        @yield('content')
    </div>
</body>
</html>
