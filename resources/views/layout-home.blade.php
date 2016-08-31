<!DOCTYPE html>
<html lang="fr-BE">
  <head>
    <meta charset="utf-8">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,700italic,900italic' rel='stylesheet' type='text/css'>
        <title>minimaList</title>
  </head>
  <body id="home-page">
    <header class="header-home">
      <nav class="header-home-menu">
        <div class="header-home-menu-logo">
          <h1><a href="/today">minima<span>List</span></a></h1>
        </div>
        <div class="header-home-menu-nav">
          <ul>
            <li><a href="/auth/login">Se connecter</a></li>
            <li><a href="/auth/register">S'inscrire</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <section class="home-page-page">
      @yield('mainContent')
    </section>
    <footer>
      <p>
        Développé et créé par <a href="http://www.jimmy-havenith.be">Jimmy Havenith</a>
      </p>
    </footer>
    <script src="/js/jquery.js"></script>
    <script src="/js/script.js"></script>
  </body>
</html>
