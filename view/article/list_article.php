<div class="container py-14 pt-md-0 pb-md-16">
    <!-- /.row -->
    <div class="row text-center">
        <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto">
        <h2 class="fs-15 text-uppercase text-primary mb-3">Blog</h2>
        <h3 class="display-4 mb-6">Check out some of our awesome projects with creative ideas and great design.</h3>
        </div>
        <!-- /column -->
    </div>
    <!-- /.row -->
    <div class="position-relative">
        <div class="shape bg-dot primary rellax w-17 h-20" data-rellax-speed="1" style="top: 0; left: -1.7rem;"></div>
        <div class="carousel owl-carousel gap-small blog grid-view" data-margin="0" data-dots="true" data-autoplay="false" data-autoplay-timeout="5000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "2"}, "1200":{"items": "3"}}'>
        <!-- /debut boucle pour afficher tous les données dans l'api on refere sur la taille de l'api pour la valeur max -->
            <?php   for ($i = 0; $i < count($api_data_decoded['hydra:member']); $i++) {?>
                <div class="item">
                    <div class="item-inner">
                    <article>
                        <div class="card">
                        <figure class="card-img-top overlay overlay-1 hover-scale">
                             <!-- /dans le lien source de l image on mettra notre Header image pour charger les images -->
                            <a href="#"> <img src="./<?= $api_data_decoded['hydra:member'][$i]['HeaderImage'] ?>" alt="" /></a>
                            <figcaption>
                            <h5 class="from-top mb-0">Read More</h5>
                            </figcaption>
                        </figure>
                        <div class="card-body">
                            <div class="post-header">
                            <h2 class="post-title h3 mt-1 mb-3">
                                <a class="link-dark" href="./blog-post.html">
                                     <!-- /Ici on mettra notre titre de l'article -->
                                    <?= $api_data_decoded['hydra:member'][$i]['Title'] ?>
                                </a>
                        </h2>
                            </div>
                            <!-- /.post-header -->
                            <div class="post-content">
                            <p>
                                 <!-- /Notre Introduction -->
                                <?= $api_data_decoded['hydra:member'][$i]['Introduction'] ?>
                            </p>
                            </div>
                            <!-- /.post-content -->
                        </div>
                        <!--/.card-body -->
                        <div class="card-footer">
                            <ul class="post-meta d-flex mb-0">
                            <li class="post-date">
                                <i class="uil uil-calendar-alt"></i>
                                <span>
                                     <!-- /Notre dernière date de modification -->
                                    <?php
                                    // On va changer le string en secondes afin de par la suite avoir la possibilite de mettre un format de date
                                        $time_input = strtotime($api_data_decoded['hydra:member'][$i]['LastMod']); 
                                    // Format de date anglais avec l'heure minute et le jour de la semaine
                                        //echo(date('g:ia \o\n l jS F Y', $time_input));
                                    // Format de date anglais sans l'heure minute et le jour de la semaine(juste la date,mois et l année)
                                        echo(date('jS F Y', $time_input));
                                    ?>
                                    
                                </span>
                            </li>
                            <li class="post-comments">
                                <a href="#">
                                    <i class="uil uil-file-alt fs-15"></i>
                                     <!-- /Le Theme du projet -->
                                    <?= $api_data_decoded['hydra:member'][$i]['theme']['name'] ?>
                                </a>
                            </li>
                            </ul>
                            <!-- /.post-meta -->
                        </div>
                        <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </article>
                    <!-- /article -->
                    </div>
                    <!-- /.item-inner -->
                </div>
                <!-- /.item -->
            <?php   }?>
        <!-- /fin boucle -->
        
        </div>
        <!-- /.owl-carousel -->
    </div>
    <!-- /.position-relative -->
</div>
     <!-- /.container -->