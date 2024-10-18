<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>ProjetoPW2</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="themes/web/assets/css/bootstrap.css"/>

  <link rel="stylesheet" type="text/css" href="themes/web/assets/css/style.css.map"/>
  <link rel="stylesheet" type="text/css" href="themes/web/assets/css/style.scss"/>
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="themes/web/assets/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="themes/web/assets/css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Neogym
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Início <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="#about"> Sobre Nós </a>
                </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#personais"> Personais</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#plans">Planos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#questions">Perguntas</a>
                </li>
                <li class="nav-item">
                <a href="<?= url("entrar"); ?>">Login</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="col-lg-10 col-md-11 mx-auto">
                <div class="detail-box">
                  <div>
                    <h3>
                      Fitness
                    </h3>
                    <h2>
                      Training
                    </h2>
                    <h1>
                      Neogym
                    </h1>
                    <p>
                      Aqui é uma area onde vamos falar um pouco sobre nós e nossa empresa
                    </p>
                    <div class="">
                      <a href="#about">
                        Sobre
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="col-lg-10 col-md-11 mx-auto">
                <div class="detail-box">
                  <div>
                    <h3>
                      Fitness
                    </h3>
                    <h2>
                      Training
                    </h2>
                    <h1>
                      Neogym
                    </h1>
                    <p>
                    Aqui é a area onde iremos falar sobre alguns cuidados e da importancia de ter saúde   
                    </p>
                    <div class="">
                      <a href="#helthy">
                        Saúde
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="col-lg-10 col-md-11 mx-auto">
                <div class="detail-box">
                  <div>
                    <h3>
                      Fitness
                    </h3>
                    <h2>
                      Training
                    </h2>
                    <h1>
                      Neogym
                    </h1>
                    <p>
                      Aqui é a area onde iremos falar sobre os alguns personais ou donos
                    </p>
                    <div class="">
                      <a href="#personais">
                        Personais
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="col-lg-10 col-md-11 mx-auto">
                <div class="detail-box">
                  <div>
                    <h3>
                      Fitness
                    </h3>
                    <h2>
                      Training
                    </h2>
                    <h1>
                      Neogym
                    </h1>
                    <p>
                      Aqui iremos mostrar nossos planos e os respectivos valores de cada um
                    </p>
                    <div class="">
                      <a href="#plans">
                        Planos
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="col-lg-10 col-md-11 mx-auto">
                <div class="detail-box">
                  <div>
                    <h3>
                      Fitness
                    </h3>
                    <h2>
                      Training
                    </h2>
                    <h1>
                      Neogym
                    </h1>
                    <p>
                      Aqui irá levar o cliente para o sistema de perguntas e respostas 
                    </p>
                    <div class="">
                      <a href="#questions">
                        Perguntas
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->
  </div>


  <!-- Us section -->

  <section class="us_section layout_padding" id="about">
    <div class="container">
      <div class="heading_container">
        <h2>
          PORQUE NOS ESCOLHER?
        </h2>
      </div>

      <div class="us_container ">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="img/u-1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  EQUIPAMENTOS DE QUALIDADE
                </h5>
                <p>
                Venha para a [Nome da Academia]! Equipamentos modernos, esteiras avançadas, bicicletas ergométricas, pesos livres. Transforme seu corpo e mente conosco!
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="img/u-4.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  NUTRIÇÃO
                </h5>
                <p>
                Consultas nutricionais personalizadas, planos alimentares balanceados e suporte contínuo. Alimente-se bem e atinja seus objetivos conosco!
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="img/u-2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  PLANOS DE DIETAS SAUDÁVEIS
                </h5>
                <p>
                Oferecemos planos de dietas saudáveis, personalizados para você. Alimente-se bem, sinta-se melhor e alcance seus objetivos!
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="img/u-3.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  TREINAMENTO ESPORTIVO
                </h5>
                <p>
                oferecemos treinamento esportivo personalizado. Melhore seu desempenho, conquiste seus objetivos e supere seus limites conosco!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end us section -->


  <!-- heathy section -->

  <section class="heathy_section layout_padding" id="helthy">
    <div class="container">

      <div class="row">
        <div class="col-md-12 mx-auto">
          <div class="detail-box">
            <h2>
              MENTE SAUDÁVEL, CORPO SAUDÁVEL
            </h2>
            <p>
            Uma mente saudável é a chave para um corpo saudável. A conexão entre saúde mental e física é profunda e interdependente. Quando cuidamos da nossa mente, reduzindo o estresse e a ansiedade, nosso corpo responde positivamente. Práticas como meditação, mindfulness e atividades relaxantes promovem clareza mental e estabilidade emocional, refletindo em um corpo mais saudável. Por outro lado, a prática regular de exercícios físicos libera endorfinas, que melhoram o humor e a saúde mental. Alimentação equilibrada e sono adequado também são essenciais. Cuidar da mente e do corpo de forma integrada proporciona uma vida mais harmoniosa e plena.
            </p>
            <div class="btn-box">
              <a href="">
                Início
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- end heathy section -->

  <!-- trainer section -->

  <section class="trainer_section layout_padding" id="personais">
    <div class="container">
      <div class="heading_container">
        <h2>
          NOSSOS PERSONAIS
        </h2>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 mx-auto">
          <div class="box">
            <div class="name">
              <h5>
                Smirth Jon
              </h5>
            </div>
            <div class="img-box">
              <img src="img/t1.jpg" alt="">
            </div>
            <div class="social_box">
              <a href="">
                <img src="img/facebook-logo.png" alt="">
              </a>
              <a href="">
                <img src="img/twitter.png" alt="">
              </a>
              <a href="">
                <img src="img/instagram-logo.png" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mx-auto">
          <div class="box">
            <div class="name">
              <h5>
                Jean Doe
              </h5>
            </div>
            <div class="img-box">
              <img src="img/t2.jpg" alt="">
            </div>
            <div class="social_box">
              <a href="">
                <img src="img/facebook-logo.png" alt="">
              </a>
              <a href="">
                <img src="img/twitter.png" alt="">
              </a>
              <a href="">
                <img src="img/instagram-logo.png" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mx-auto">
          <div class="box">
            <div class="name">
              <h5>
                Alex Den
              </h5>
            </div>
            <div class="img-box">
              <img src="img/t3.jpg" alt="">
            </div>
            <div class="social_box">
              <a href="">
                <img src="img/facebook-logo.png" alt="">
              </a>
              <a href="">
                <img src="img/twitter.png" alt="">
              </a>
              <a href="">
                <img src="img/instagram-logo.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end trainer section -->

  <!-- questions section -->

  <section class="questions_section" id="questions">
    <div class="container">
      <p>PERGUNTAS FREQUENTES</p>
    </div>
  </section>

  <!-- end question section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_items">
        <a href="">
          <div class="item ">
            <div class="img-box box-2">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                +55 (51) 99002-8922
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-3">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                iagosanches.ch054@academico.ifsul.edu.br
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      Site de academia: Iago Oliveira Sanches
    </p>
  </footer>
  <!-- footer section -->

  <script src="themes/web/assets/js/jquery-3.4.1.min.js"></script>
  <script src="themes/web/assets/js/bootstrap.js"></script>

</body>

</html>