<!-- FILE TEMPLATE UNTUK HEADER DAN FOOTER SEHINGGA -->
<!-- TIDAK BUTUH LAGI FILE HEADER.PHP DAN FOOTER.PHP -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title); ?></title>
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css">
    <!-- JS sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
    <!-- MY CSS -->
    <link rel="stylesheet" href="/css/styles.css">
  </head>
  <body>
      <!-- partial navbar -->
      <?= $this->include('layout/navbar'); ?>
      <!-- ./partial navbar -->

      <!-- renderring content -->
        <?= $this->renderSection('content'); ?>
      <!-- ./renderring content -->
    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


  </body>
  </html>