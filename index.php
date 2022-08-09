<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastre já</title>
    <link rel="shortcut icon" href="img/cadastro.ico" type="image/x-icon" />
    <!-- Google fonts Lato -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <!-- CSS Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <!-- CSS do projeto -->
    <link rel="stylesheet" href="style.css" />
    <!-- JavaScript Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top bg-primary-color" id="navbar">
      <div class="container py-3">
        <a class="navbar-brand" href="#">
          <img src="img/cadastro.png" alt="cadastreja" />
          <span>Cadastre já</span>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbar-items"
          aria-controls="navbar-items"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="bi bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbar-items">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contato</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- SLIDER -->
    <div class="container" id="slider-container">
      <div id="slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#slider"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#slider"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/cliente.jpg" class="d-block w-100" alt="Cliente" />
            <div class="carousel-caption">
              <h5>Cadastro e Listagem de Clientes</h5>
              <a href="listagem_cliente.php" class="btn btn-dark">Veja Mais</a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/produto.jpg" class="d-block w-100" alt="Produto" />
            <div class="carousel-caption">
              <h5>Cadastro e Listagem de Produtos</h5>
              <a href="listagem_produto.php" class="btn btn-dark">Veja Mais</a>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#slider"
          data-bs-slide="prev"
        >
          <i class="bi bi-chevron-compact-left"></i>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#slider"
          data-bs-slide="next"
        >
          <i class="bi bi-chevron-compact-right"></i>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      
    <!-- INFO -->
    <div class="container" id="info-container">
      <div class="col-12">
        <h2 class="title primary-color">Detalhes Importantes</h2>
        <p class="subtitle secondary-color">
          Saiba mais sobre nós
        </p>
      </div>
      <div class="col-12">
        <div class="row">
          <div class="col-12 col-md-5" id="info-banner">
            <img src="img/informacoes.jpg" alt="Informações" class="img-fluid" />
          </div>
          <div class="col-12 col-md-7 bg-secondary-color" id="info-content">
            <div class="row">
              <div class="col-12">
                <h2 class="titulo">Estes dados fazem a diferença:</h2>
                <p class="subtitle secondary-color">
                  Contamos com profissionais altamente capacitados para cadastrar suas informações e as informações de seus produtos no melhor e mais seguro banco de dados.
                </p>
              </div>
              <div class="col-12" id="info-numbers">
                <div class="row">
                  <div class="col-4">
                    <h3 class="primary-color">8</h3>
                    <p class="secondary-color">Anos manipulando dados</p>
                  </div>
                  <div class="col-4">
                    <h3 class="primary-color">826</h3>
                    <p class="secondary-color">Cadastros executados</p>
                  </div>
                  <div class="col-4">
                    <h3 class="primary-color">634</h3>
                    <p class="secondary-color">Usuários</p>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <a class="btn btn-dark">Saber Mais</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FOOTER -->
    <footer class="container-fluid bg-dark-color" id="footer">
      <div class="container">
        <div class="row">
          <!-- FOOTER TOP -->
          <div class="col-12" id="footer-top">
            <div class="row justify-content-between">
              <div class="col-4">
                <h2>
                  Cadastre já
                </h2>
              </div>
              <div class="col-4" id="social-icons">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-youtube"></i>
                <i class="bi bi-twitter"></i>
              </div>
            </div>
          </div>
          <!-- FOOTER DETAILS -->
          <div class="col-12" id="footer-details">
            <div class="row">
              <div class="col-12 col-md-4" id="news-container">
                <h4>Fique por dentro das atualizações</h4>
                <p class="secondary-color">
                  Inscreva-se para saber em primeira mão
                </p>
                <form>
                  <div class="mb-3">
                    <input
                      type="email"
                      class="form-control"
                      placeholder="Digite o seu e-mail"
                    />
                  </div>
                  <button class="btn btn-dark">Inscrever</button>
                </form>
              </div>
              <div class="col-12 col-md-4" id="contact-container">
                <h4>Formas de contato</h4>
                <p class="secondary-color">(16)99999-9999</p>
                <p class="secondary-color">contato@cadastreja.com</p>
              </div>
              <div class="col-12 col-md-4" id="links-container">
                <div class="row">
                  <h4>Você pode estar buscando por:</h4>
                  <div class="col-6">
                    <ul class="list-unstyled">
                      <li><a href="#" class="secondary-color">Cadastros</a></li>
                      <li><a href="#" class="secondary-color">Consuta de dados</a></li>
                      <li><a href="#" class="secondary-color">Segurança</a></li>
                    </ul>
                  </div>
                  <div class="col-6">
                    <ul class="list-unstyled">
                      <li><a href="#" class="secondary-color">Profissionais</a></li>
                      <li>
                        <a href="#" class="secondary-color">Trabalhe conosco</a>
                      </li>
                      <li><a href="#" class="secondary-color">Contato</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- FOOTER BOTTOM -->
          <div class="col-12" id="footer-bottom">
            <div class="row justify-content-between">
              <div class="col-12 col-md-3">
                <p class="secondary-color">Cadastre já &copy; 2022</p>
              </div>
              <div class="col-12 col-md-3">
                <p class="secondary-color">
                  Cuidamos dos seus dados com
                  <i class="bi bi-heart"></i>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>