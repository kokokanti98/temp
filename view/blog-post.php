<?php
    require_once "../controller/http_request.php";
// 2 moyens pour récuperer les données d'un seul article sur une variable php
  // 1ere methode: On va parcourir les données et si le num coincide avec une des articles du array on le prend dans un variable php
/*     for ($i = 0; $i < count($api_data_decoded['hydra:member']); $i++) {
      if($api_data_decoded['hydra:member'][$i]['id'] == $_GET['num']){
        $article = $api_data_decoded['hydra:member'][$i];
      }
    } */
  // 2eme methode utilisation de l'api/users/{id}
    // url de notre API
    $api_user_url = 'https://apisymfonyblog.koko.best/api/articles/'.$_GET['num'].'';
    // classe de notre API
    $api_user_data_class = new Myclass($api_user_url);
    // Recuperation des donnees de l'API
    $article = $api_user_data_class->API_CALL('GET');
    // Voir le type de donnees et ses valeurs
    //var_dump($article);
    //var_dump($article['Title']);
    // point d'arret pour le test
    //die();
    // url de notre API
    $api_themes_url = 'https://apisymfonyblog.koko.best/api/themes';
    // classe de notre API
    $api_themes_data_class = new Myclass($api_themes_url);
    // Recuperation des donnees de l'API ici on va recuperer tous les themes pour en faire un select options
    $themes = $api_themes_data_class->API_CALL('GET');
/*     var_dump($themes['hydra:member'][0]['id']);
    die(); */

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
  <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup">
  <meta name="author" content="elemis">
  <title>Sandbox - Modern & Multipurpose Bootstrap 5 Template</title>
  <link rel="shortcut icon" href="../assets/img/favicon.png">
  <link rel="stylesheet" href="../assets/css/plugins.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/colors/purple.css">
</head>

<body>
  <div class="content-wrapper">
    <header class="wrapper bg-soft-primary">
      <?php include './navbar.php'; ?>
      <!-- /.navbar -->
    </header>
    <!-- /header -->
    <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 bg-content text-white" data-image-src="../assets/img/photos/bg4.jpg">
        <?php include './top_blog_post.php'; ?>
        <!-- /.the intro -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-gray">
        <?php include './article/form/article_form.php'; ?>
        <!-- /.post an article -->
    </section>
    <!-- /section -->
    
  </div>
  <!-- /.content-wrapper -->
    <?php include './footer.php'; ?>
    <!-- /.footer -->
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
  <script src="../assets/js/plugins.js"></script>
  <script src="../assets/js/theme.js"></script>
</body>

</html>