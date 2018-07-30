<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?=$this->e($title)?></title>
    <link rel="stylesheet" href="<?= $basePath ?>assets/css/reset.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css">
    <link rel="stylesheet" href="<?= $basePath ?>assets/css/style.css">
    <script>
    var BASE_PATH = "<?= $basePath ?>";
    </script>
  </head>

  <body>

    <header>
        <?=$this->insert('main/partials/nav')?>
    </header>

    <main>
        <?=$this->section('content')?>
    </main>

    <footer>
      <div class="footer">
        <p>&copy;RémyMartin-2018</p>
      </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="<?= $basePath ?>assets/js/app.js"></script>
  </body>
</html>
