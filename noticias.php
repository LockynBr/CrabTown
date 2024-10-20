<?php
header('Content-Type: text/html; charset=utf-8');

  require_once 'lib/conexao.php';
  require_once 'lib/noticias_funcoes_banco.php';

  $exec_query_artigos = selecionaUltimosTresArtigos($pdo);
  if ($exec_query_artigos->rowCount() === 0) { die('Erro ao selecionar artigos do banco de dados.'); }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/LogoCarangueijo.png" type="image/x-icon">
  <title>CrabTown | Notícias</title>

  <!-- META TAG -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="CrabTown" />
  <meta property="og:image" content="image" />
  <meta property="og:description" content="CrabTown" />
  <meta property="og:site_name" content="CrabTown" />

  <link rel="stylesheet" href="css/noticias.css?v=<?php echo time(); ?>">
  <script src="js/scripts.js" defer></script>
</head>

<body>
  <!-- Navbar -->
  <nav class="nav">
        <a href="index.php" class="logo"><img src="images/LogoVertical.png" alt="Logo CrabTown"></a>

        <button class="hamburguer"></button>

        <ul class="nav-list">
            <li><a href="recicle.php" class="roxo">Recicle</a></li>
            <li><a href="mapa.html" class="roxo">Mapa</a></li>
            <li><a href="classificacao.html" class="roxo">Classificações</a></li>
            <li><a href="noticias.php" class="roxo">Notícias</a></li>
            <li><a href="https://colab.research.google.com/drive/1LSmD46PSEJAgoQfNN8NhVhmvbYju7xPR#scrollTo=zE6sgclKypoU" class="roxo" target="_blank">Dashboard</a></li>
            <li><a href="equipe.html" class="roxo">Equipe</a></li>
            <li><a href="quiz.php" class="roxo">Quiz</a></li>
        </ul>
    </nav>

  <!-- Artigos -->
  <section class="artigo-mangue">

    <div class="container-artigo-mangue hidden">
      <h1>Poluição nos Mangues</h1>
      <p>Algumas notícias para você entender a gravidade do problema</p>
    </div>

    <div class="container-info-mangue hidden">

      <div class="container-textos-mangue hidden">

        <?php foreach($exec_query_artigos as $artigo) {?>
        <div class="container-item-mangue hidden">
          <p><?php echo $artigo['titulo']?></p>
          <a href="artigo.php?id=<?php echo $artigo['id_artigo']; ?>"><button>Ver notícia</button></a>
        </div>
        <?php }?>

      </div>

      <div class="container-imagem-mangue hidden">
        <img src="images/imagemMangue.png" alt="Imagens Sobre os Mangues">
        <p>O Recife cresceu em uma planície costeira na qual o solo predominante era de manguezal. Foto: Peu Ricardo/DP.
        </p>
      </div>

    </div>

  </section>

  <!-- Contato -->
  <section class="contato">
    <h1 class="hidden">Quer enviar sua nóticia? Entre em contato!</h1>

    <div class="formulario hidden">

      <form action="lib/noticias_envio_email.php" method="POST">
        <h1>Responda essas perguntas</h1>

        <div class="perguntas hidden">
          <input type="text" placeholder="Nome da notícia" required class="hidden" name="nomeNoticia">
          <input type="text" placeholder="Assunto da notícia" required class="hidden" name="assuntoNoticia">
          <input type="text" placeholder="Editora da notícia" required class="hidden" name="editoraNoticia">
          <input type="text" placeholder="Quando foi a notícia" required class="hidden" name="dataNoticia">
          <input type="text" placeholder="Local da notícia" required class="hidden" name="localNoticia">
          <input type="text" placeholder="Link da notícia" required class="hidden" name="linkNoticia">
        </div>


        <a href="" class="hidden"><button type="submit" name="enviarNoticia">Enviar</button></a>
      </form>
    </div>

  </section>


  <!-- Footer -->
  <footer>
    <!-- Primeira parte -->
    <section class="footer-sec">
      <div class="footer-content">
        <h3 class="footer-h3">Contato</h3>

        <div>
          <p class="footer-info">Instagram: @crabtown</p>
          <p class="footer-info">WhatsApp: (81) 9 0000-0000</p>
          <p class="footer-info">E-mail: contatocrabtown@gmail.com</p>
        </div>
      </div>
      <div class="footer-content">
        <h3 class="footer-h3">Localização</h3>

        <div>
          <p class="footer-info">Recife, Pernambuco</p>
          <!-- <p class="footer-info">CEP: 52050-280</p> -->
        </div>
      </div>
    </section>

    <!-- Linha divisória -->
    <div id="footer-linha-divisoria"></div>

    <!-- Segunda parte -->
    <section class="footer-sec" id="footer-sec2">
      <a href="https://www.instagram.com/visz.dev/" target="_blank">
        <p class="footer-copy">&copy; 2024 Visz, Inc.</p>
      </a>

      <div class="footer-redes-sociais">
        <!-- Instagram 
        <a href="https://www.instagram.com/visz.dev/" target="_blank">
          <img src="images/FeInstagram.png" class="footer-icon" alt="">
        </a> -->
      </div>
    </section>
  </footer>

</body>

</html>