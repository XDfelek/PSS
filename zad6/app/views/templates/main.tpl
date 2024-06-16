<!DOCTYPE html>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>Kalkulator Kredytowy</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />
    <link rel="stylesheet" href=
          "{$conf->app_url}/assets/css/main.css">
  </head>
  <body class="landing is-preload">
    <div id="page-wrapper">
      <!-- Header -->
      <header id="header" class="alt">
        <h1><a href="{$conf->app_url}">Alpha</a> by HTML5 UP</h1>
        <nav id="nav">
          <ul>
            <li><a href="{$conf->app_url}">Home</a></li>
            {block name=logout}{/block}
          </ul>
        </nav>
      </header>

      <!-- Banner -->
      <section id="banner">
        <h2>Kalkulator Kredytowy</h2>
      </section>

      
      <section id="main" class="container">
        <div class="col-12">
          <section class="box">
              {block name=content} Domyślna treść zawartości .... {/block}
          </section>
        </div>
      </section>

      <footer id="footer">
		<ul class="copyright">
			<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
		</ul>
	 </footer>

</body>
</html>
