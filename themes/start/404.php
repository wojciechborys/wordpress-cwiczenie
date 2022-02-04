<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<main>
  <div class="container mx-auto">
    <div class="row">
        <div class="col-12 mpad">
          <div class="error404-text centered">
              <div>
                <h2>Solche Seite wurde nicht gefunden</h2>
                <p>Es ist möglich, dass die Seite gelöscht oder an eine andere Adresse verlegt wurde. Überprüfen Sie die Adresse der Website und versuchen Sie es erneut!</p>
                <span class="msg-404">404</span>
              </div>
            </div>
          </div>
        </div>
    </div>  
  </main>
<?php get_footer(); ?>
