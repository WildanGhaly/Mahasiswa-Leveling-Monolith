<!DOCTYPE html>
<html lang="en">
<head>
  <title>Error 404</title>
  <link rel="stylesheet" type="text/css" href="/public/css/error404.css">
</head>
<body>
    <section>
    <?php for ($i = 0; $i < 260; $i++) { ?>
        <span></span>
    <?php } ?>

    <div class="random404">
        <h1>404</h1>
    </div>
    <div class="mahasiswa">
        <h1>Mahasiswa</h1>
        <h1>Leveling</h1>
    </div>
    <div class="error404">
        <div class="error404-content">
        
        <h2>Page Not Found</h2>
        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <button id="btn" class="btn" onclick="window.location.href='/app/views/landing/'">Back to Home</button>
        </div>
    </div>
    </section>
</body>
</html>