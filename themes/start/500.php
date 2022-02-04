<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div class="container mx-auto">
      <div class="row">
          <div class="col-12 mpad">
              <div class="error404 text centered">
                <div>
                  <h2>Server-Fehler</h2>
                  <p>Es gab einen Serverfehler. Versuchen Sie es gleich noch einmal, oder wenden Sie sich an den Administrator.</p>
                  <span class="msg-404">500</span>
                </div>
              </div>
          </div>
        </div>
    </div>  

<?php get_footer(); ?>
