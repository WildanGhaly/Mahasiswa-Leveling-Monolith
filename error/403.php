<!DOCTYPE html>
<html lang="en">
<head>
  <title>Error 403</title>
  <link rel="stylesheet" type="text/css" href="/public/css/error.css">
</head>
<body>
    <section>
    <?php for ($i = 0; $i < 260; $i++) { ?>
        <span></span>
    <?php } ?>

    <div class="random404">
        <h1>403</h1>
    </div>
    <div class="mahasiswa">
        <h1>Mahasiswa</h1>
        <h1>Leveling</h1>
    </div>
    <div class="error404">
        <div class="error404-content">
        
        <h2>Access Denied</h2>
        <p>You do not have permission to access this resource.</p>
        <button id="btn" class="btn" onclick="window.location.href='/app/views/landing/'">Back to Home</button>
        </div>
    </div>
    </section>
</body>
</html>