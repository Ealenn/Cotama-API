@extends('layouts.app')

@section('content')

<section class="hero">
    <section class="navigation">
        <header>
            <div class="header-content">
                <div class="logo"><a href="#"><img src="/img/logo.png"></a></div>
                <div class="header-nav">
                    <nav>
                        <ul class="primary-nav">
                            <li><a href="#features">Fonctionnalités</a></li>
                            <li><a href="#mission">Missions</a></li>
                            <li><a href="#foyer">Foyer</a></li>
                            <li><a href="#partenaires">Partenaires</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="navicon">
                    <a class="nav-toggle" href="#"><span></span></a>
                </div>
            </div>
        </header>
    </section>

    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="hero-content text-center">
                    <h1>@lang('views/home.header-title') <span id="js-rotating">@lang('views/home.header-words')</span> !</h1>
                    <p class="intro">Qui a dit que le ménage devait être une corvée ?<br>Transformer les tâches ménagères en jeu amusant et ludique tout en répartissant les tâches de manière équitable, juste et de façon non répétitive !</p>
                </div>
            </div>
        </div>
    </div>
    <div class="down-arrow floating-arrow"><a href="#"><i class="fa fa-angle-down"></i></a></div>
</section>

<section class="intro" style="padding: 20px">
    <div class="container">
        <div class="row">
            <div class="col-md-4 intro-feature">
                <div class="intro-icon">
                    <span data-icon="&#xe040;" class="icon"></span>
                </div>
                <div class="intro-content">
                    <h5>Compte / Foyer</h5>
                    <p>Créez votre compte et un foyer afin d'inviter votre famille ou vos colocataires à vous rejoindre</p>
                </div>
            </div>
            <div class="col-md-4 intro-feature">
                <div class="intro-icon">
                    <span data-icon="&#xe03b;" class="icon"></span>
                </div>
                <div class="intro-content">
                    <h5>Missions</h5>
                    <p>Ajoutez un ordre de mission pour une date donnée et laissez Cotama distribuer les tâches de manière équitable</p>
                </div>
            </div>
            <div class="col-md-4 intro-feature">
                <div class="intro-icon">
                    <span data-icon="&#xe017;" class="icon"></span>
                </div>
                <div class="intro-content last">
                    <h5>Cadeaux</h5>
                    <p>Après chaque mission, gagnez des points, des trophées et plein de surprises !</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- iphone -->
<section class="hidden-md-down features section-padding" id="iphone-din">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-4 app-features-wrapper wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                <div class="app-features-box" data-img="iphone_missions">
                    <div class="app-features-box-icon">
                        <i class="fa fa-play" aria-hidden="true"></i>
                    </div>
                    <h3>Missions</h3>
                    <p>Maintenant vous avez vos instructions, que la guerre commence! Mécontant du résultat ? Défiez vos amis ou votre famille dans des duels sans merci !</p>
                </div>

                <div class="app-features-box" data-img="iphone_trophy">
                    <div class="app-features-box-icon">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                    </div>
                    <h3>Trophées</h3>
                    <p>Chaque trophée est unique dans sa catégorie, prouvez à tout le monde que vous êtes le roi du rangement et débloquez le succès Tetris!</p>
                </div>
            </div>

            <div class="col-sm-4 app-features-image wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                <img id="app-features-phone" src="/img/iphone_home.png" style="max-width: 100%;">
            </div>

            <div class="col-sm-4 app-features-wrapper wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                <div class="app-features-box" data-img="iphone_foyer">
                    <div class="app-features-box-icon">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </div>
                    <h3>Foyer</h3>
                    <p>Gérez votre foyer, changez le mode de jeu et affichez les profils de vos amis en quelques clics afin d’établir une stratégie d'attaque!</p>
                </div>
                <div class="app-features-box" data-img="iphone_prefs">
                    <div class="app-features-box-icon">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <h3>Préférences</h3>
                    <p>Si vous préférez faire la vaisselle plutôt que de laver les sols il faut le dire ! Chaque détail a son importance avec Cotama</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero-icon section-padding">
    <div class="container">
        <div class="col-md-3 text-center">
            <ul>
                <li>
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <h3>Compte</h3>
                    <p>Créez votre compte gratuitement, invitez votre famille ou vos colocataires dans un foyer</p>
                </li>
            </ul>
        </div>
        <div class="col-md-3 text-center">
            <ul>
                <li>
                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                    <h3>Planifiez</h3>
                    <p>Planifiez à l'avance vos taches ménagères à effectuer</p>
                </li>
            </ul>
        </div>
        <div class="col-md-3 text-center">
            <ul>
                <li>
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <h3>Selectionnez</h3>
                    <p>Selectionnez les tâches a effectuer à une date precise</p>
                </li>
            </ul>
        </div>
        <div class="col-md-3 text-center">
            <ul>
                <li>
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                    <h3>Amusez-vous !</h3>
                    <p>Cotama distribue les tâches ! Vous recevez votre ordre de mission directement dans le jeu</p>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- ipad mac -->
<section class="features section-padding" id="features">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-7">
                    <div class="feature-list">
                        <h3>La répartition des taches ménagères</h3>
                        <p>Cotama vous demande vos goûts en matière de tâches ménagères. Si vous préférez passer l’aspirateur plutôt que de faire la vaisselle par exemple. Ces données permettent d’équilibrer les tâches selon vos goûts, mais ce n’est pas tout ! Vous n’aurez plus jamais de dispute avec cette phrase récurrente : « Encore moi ? Je l’ai fait il y a peu de temps ! » </p>
                        <ul class="features-stack">
                            <li class="feature-item">
                                <div class="feature-icon">
                                    <span data-icon="&#xe03e;" class="icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h5>Non répétitive</h5>
                                    <p>Cotama prend en compte votre historique de mission afin d'équilibrer la distribution des tâches ménagère</p>
                                </div>
                            </li>
                            <li class="feature-item">
                                <div class="feature-icon">
                                    <span data-icon="&#xe040;" class="icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h5>Propre à chacun</h5>
                                    <p>Cotama examine vos goûts et ceux de votre foyer afin de satisfaire le plus grand nombre, le plus souvent possible. Si ce n'est pas le cas défiez vos ennemis à travers de mini-jeux afin d'éviter votre funeste destin!</p>
                                </div>
                            </li>
                            <li class="feature-item">
                                <div class="feature-icon">
                                    <span data-icon="&#xe03c;" class="icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h5>Defis</h5>
                                    <p>En cas de désistement, ou d'une partie perdue, vous aurez un défi a réaliser !</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="device-showcase">
            <div class="devices">
                <div class="ipad-wrap wp1"></div>
                <div class="iphone-wrap wp2"></div>
            </div>
        </div>
        <div class="responsive-feature-img"><img src="/img/devices.png" alt="responsive devices"></div>
    </section>

<section class="features-extra section-padding" id="mission">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="feature-list">
                    <h3>Comment se déroule une partie ?</h3>
                    <p>Lors de votre inscription, Cotama vous pose plusieurs questions, afin de connaître vos goûts. Une fois validée, vous pourrez créer ou rejoindre un foyer.</p>
                    <p>N’importe quel utilisateur appartenant à un foyer peut lancer, à une date précise, une mission ménagère. Pour cela, l’utilisateur sélectionne les taches à effectuer et éventuellement les pièces et/ou une description précise de la mission.</p>
                    <p>A ce moment tous les utilisateurs du foyer reçoivent une notification. Le jour de la mission, chaque utilisateur reçoit ses ordres de mission qu'ils lui sont assignés.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="macbook-wrap wp3"></div>
    <div class="responsive-feature-img"><img src="/img/macbook-pro.png" alt="responsive devices"></div>
</section>

<section class="hero-strip section-padding" id="foyer">
        <div class="container">
            <div class="col-md-12 text-center">
                <h2>Foyer : Mode de jeu</h2>
                <p>"Je déteste faire le ménage. Vous faites le lit, la vaisselle et six mois après, tout est à refaire!"</p>
                <p><b>Les modes de jeu sont les différentes manières parmi lesquelles l'utilisateur peut choisir de jouer</b></p>
                <a href="#" class="btn btn-ghost btn-accent btn-large">Créer un foyer</a>
                <div class="logo-placeholder floating-logo"><img src="/img/house.png" style="width: 230px;height: 230px"></div>
            </div>
        </div>
    </section>

<section class="blog-intro section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 leftcol">
                    <h5>COLOCATAIRES</h5>
                    <p>La meilleure façon de jouer ! Ce mode de jeu très décontracté vous permet de lancer des défis aléatoires lorsque les tâches ménagères ne sont pas effectuées correctement. L'interface est complète et les mini-jeux déjanté mettent de l'ambiance lors de vos missions.</p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 rightcol">
                    <h5>FAMILLE</h5>
                    <p>Ce mode de jeu est destiné à une famille. Beaucoup plus sérieux mais toujours aussi drôle, ce mode permet de répartir les tâches équitablement sous forme de jeu avec des défis et mini-jeuxƒ réalisables de 6 à 200 ans. L'interface est quant à elle plus simple et intuitive.</p>
                </div>
            </div>
        </div>
    </section>

<section class="hidden-md-down features-extra section-padding" id="partenaires">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Slider main container -->
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide"><img src="/img/slider/upjv.png"></div>
                        <div class="swiper-slide"><img src="/img/slider/saintquentin.png"></div>
                        <div class="swiper-slide"><img src="/img/slider/microsoft.png"></div>
                        <div class="swiper-slide"><img src="/img/slider/insset.png"></div>
                        <div class="swiper-slide"><img src="/img/slider/smartson.png"></div>
                    </div>

                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hidden-sm-down testimonial-slider section-padding text-center" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <div class="avatar">
                                    <img src="https://media.licdn.com/mpr/mpr/shrinknp_400_400/AAEAAQAAAAAAAAXyAAAAJDFiMWY5MGM0LWYxYzgtNDQzZC05NTRmLTdiMjAyNDAwZWU2Mw.jpg">
                                </div>
                                <h2>"Il faut absolument l'essayer !"</h2>
                                <p class="author">Laurine R.</p>
                            </li>

                            <li>
                                <div class="avatar"><img src="https://media.licdn.com/mpr/mpr/shrinknp_400_400/AAEAAQAAAAAAAAqfAAAAJDlmNGJjMTUwLWMzOWMtNDE2Ni05OTg4LTE5MjM5MmM4NzI2OQ.jpg"></div>
                                <h2>"L'idée est géniale, je m'inscris à la bêta !"</h2>
                                <p class="author">Elodie C.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="to-top">
        <div class="container">
            <div class="row">
                <div class="to-top-wrap">
                    <a href="#top" class="top"><i class="fa fa-angle-up"></i></a>
                </div>
            </div>
        </div>
    </section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="footer-links">
                    <p>Copyright © 2017<br>
                    Développer avec <span class="fa fa-heart pulse2"></span> par des amis en Master Cloud Computing<br>
                    D'une idée originale de <a href="https://www.linkedin.com/in/rudymarchandise/" target="_blank">Rudy</a>, présenté au Hackathon 2017 de Saint-Quentin.<br>
                    Avec l'aide d'<a href="https://www.linkedin.com/in/antoine-callot-05a610bb/" target="_blank">Antoine</a>, <a href="" target="_blank">Léo</a>, <a href="https://www.linkedin.com/in/alexandre-schoutteet-72a375106/" target="_blank">Alexandre</a> et <a href="https://www.linkedin.com/in/orélien-godart-089352115/" target="_blank">Orelien</a>.</p>
                </div>
            </div>
            <div class="social-share">
                <p>PARTAGER</p>
                <div class="footer-social-icons">
                    <ul class="social-icons">
                        <li><a href="http://hrefshare.com/7a5da" class="social-icon" target="_blank"> <i class="fa fa-facebook"></i></a></li>
                        <li><a href="http://hrefshare.com/78cec" class="social-icon" target="_blank"> <i class="fa fa-twitter"></i></a></li>
                        <li><a href="http://hrefshare.com/4ae2e" class="social-icon" target="_blank"> <i class="fa fa-linkedin"></i></a></li>
                        <li><a href="http://hrefshare.com/fd339" class="social-icon" target="_blank"> <i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

@endsection
