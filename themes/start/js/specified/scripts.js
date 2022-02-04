$(document).ready(function() {
    $('#preloader').hide();
})

$('[data-toggle]').click(function() {
    $(this).next('.dropdown-menu').toggle();

    if($('.dropdown-menu').is(':visible')) {
        $('.dropdown-menu').not($(this).next('.dropdown-menu')).hide();
    }
})

$(document).ready(function() {
    $('.navbar-toggler').click(function() {
        $('#navbarNavDropdown').toggleClass('show');
    })
    
    $('.close-menu').click(function() {
        $('#navbarNavDropdown').toggleClass('show');
    })
})

$('#file-upload').bind('change', function() { 
    var fileName = ''; 
    fileName = $(this).val(); $('#name-selected').html(fileName); 
})  

$(document).ready(function($){   
           
    $('form.cart').on( 'click', 'button.plus, button.minus', function() {

       // Get current quantity values
       var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
       var val   = parseFloat(qty.val());
       var max = parseFloat(qty.attr( 'max' ));
       var min = parseFloat(qty.attr( 'min' ));
       var step = parseFloat(qty.attr( 'step' ));

       // Change the value if plus or minus
       if ( $( this ).is( '.plus' ) ) {
          if ( max && ( max <= val ) ) {
             qty.val( max );
          } else {
             qty.val( val + step );
          }
       } else {
          if ( min && ( min >= val ) ) {
             qty.val( min );
          } else if ( val > 1 ) {
             qty.val( val - step );
          }
       }
         
    });
      
 });

//STRONA LOGOWANIA

$(document).ready(function() {
    
    if (window.location.href.indexOf("#login") > -1) {
        $('#customer_login .login').show();
        $('#customer_login .register').hide();
        $('#register').removeClass('active-button');
        $('#login').addClass('active-button');
    }
    
    else if (window.location.href.indexOf("#register") > -1) {
        $('#customer_login .register').show();
        $('#customer_login .login').hide();
        $('#login').removeClass('active-button');
        $('#register').addClass('active-button');
    }
    
    else {
        $('#customer_login .register').hide();
    }
    
    $('.log-button').click(function( event ) {
        $('.log-button').removeClass('active-button');
        $(this).addClass('active-button');
        
        if (event.target.id == 'login') {
            $('#customer_login .register').hide();
            $('#customer_login .login').show();
            event.preventDefault();
        }
    
        else if (event.target.id == 'register') {
            $('#customer_login .register').show();
            $('#customer_login .login').hide();
            event.preventDefault();
        }
    })
})


//Cookies
function WHCreateCookie(name, value, days) {
    var date = new Date();
    date.setTime(date.getTime() + (days*24*60*60*1000));
    var expires = "; expires=" + date.toGMTString();
    document.cookie = name+"="+value+expires+"; path=/";
}

function WHReadCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

window.onload = WHCheckCookies;

function WHCheckCookies() {
    if(WHReadCookie('cookies_accepted') != 'T') {
        var message_container = document.createElement('div');
        message_container.id = 'cookie-info';
        var html_code = '<p class="cookie-box">Diese Website verwendet Cookies, um Dienste auf höchstem Niveau bereitzustellen. Wenn Sie die Website weiterhin nutzen, stimmen Sie deren Nutzung zu.<a href="javascript:WHCloseCookiesWindow();" id="accept-cookies-checkbox" name="accept-cookies" class="close">Akzeptiere</a></p>';
        message_container.innerHTML = html_code;
        document.body.appendChild(message_container);
    }
}

function WHCloseCookiesWindow() {
    WHCreateCookie("cookies_accepted","T",365),
    document.getElementById('cookie-info').className = 'remove';
}

$(document).ready(function() {
    var swiper = new Swiper('.slider-testimonials', {
        slidesPerView: 3,
        speed: 500,
        spaceBetween: 30,

        breakpoints: {
            576: {
                slidesPerView: 1,
                spaceBetween: 40
            },

            992: {
                slidesPerView: 2,
                spaceBetween: 40
            }
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
})

$(document).ready(function(e) {
    $(".cat-parent").one("click", false);

    $('.cat-parent a').click(function() {
        
        $(this).parents('.cat-parent').addClass('active');
    })

    $('.woof_submit_search_form').text('Verwenden');
})

 $('a[href^="#"]').not( 'header a' ).click(function(e) {   
    e.preventDefault();   
    var dest = $(this).attr('href');
    var nav = $('#header').height() + 15;   
    $('html,body').animate({ scrollTop: $(dest).offset().top - nav }, 'slow'); 
  })
  
  $(document).ready(function () {
    if (!$('body').hasClass('single-pixel')) {
      // Create wrapper
      $('.sidebar-wrapper').append('<div class="toc"><h3>Spis treści</h3></div>');
      var headers = [];
      var list = $('.toc');
      // Fetch all H3 headers and add IDs to them
      $('.entry-content h3').each(function (n) {
        var cur = $(this).text();
        var stripped = cur.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
        $(this).nextUntil("h3").addBack().wrapAll('<div class="slice" id=' + stripped + ' />');
        headers[n] = $(this).text();
        // Add table of contents list and add href to sections
        list.append('<p><a href="#' + stripped + '" class="toc--elem">' + $(this).text() + '</a></p>');
      })
  
      // Cache selectors
      var lastId,
        topMenu = $(".toc"),
        topMenuHeight = 100,
        // All list items
        menuItems = topMenu.find("a"),
        // Anchors corresponding to menu items
        scrollItems = menuItems.map(function () {
          var item = $($(this).attr("href"));
          if (item.length) {
            return item;
          }
        });
  
      // Bind click handler to menu items
      // so we can get a fancy scroll animation
      menuItems.click(function (e) {
        var href = $(this).attr("href"),
          offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
        $('html, body').stop().animate({
          scrollTop: offsetTop
        }, 300);
        e.preventDefault();
      });
  
      // Bind to scroll
      $(window).scroll(function () {
        // Get container scroll position
        var fromTop = $(this).scrollTop() + topMenuHeight;
  
        // Get id of current scroll item
        var cur = scrollItems.map(function () {
          if ($(this).offset().top < fromTop)
            return this;
        });
        // Get the id of the current element
        cur = cur[cur.length - 1];
        var id = cur && cur.length ? cur[0].id : "";
  
        if (lastId !== id) {
          lastId = id;
          // Set/remove active class
          menuItems
            .parent().removeClass("active")
            .end().filter("[href='#" + id + "']").parent().addClass("active");
        }
      });
    }
  })
  
$(document).ready(function() { 
    $( '.angebot__box' ).hover(
        function() {
            var data = $(this).data('tab');
            console.log(data);
            $('.angebot__answer[data-tab="'+data+'"]' ).slideDown();
        }, function() {
            $('.angebot__answer').slideUp();
        }
    );
})

$('[data-popup]').click(function () {
    $('.form-popup').fadeIn();
    var lista = [];

    $('.gallery__images input[type="checkbox"]:checked').each(function() {
        lista.push(this.value);
        console.log(lista);
        var elems = lista.join();
        $('#cf7-custom-checkboxes').val(elems);
    });
})

$(document).on('keyup click', function (e) {
    var close = $('.form-popup .close');
    var close1 = $('.form-popup .close');

    if (e.keyCode === 27) {
        if($('.form-popup').is(':visible')) {
            $('.form-popup').fadeOut();
        } else if ($('.form-popup').is(':visible')) {
            $('.form-popup').fadeOut();
        }
    } else if (close.is(e.target)) {
        $('.form-popup').fadeOut();
    } else if(close1.is(e.target)) {
        $('.form-popup').fadeOut();
    }
})

//Mapka

$(document).ready(function () {
    $('.points').each(function () {
      var elem1 = $(this);
      var attr = $(this).attr('id');
      var Y = $('[data-values]').find('input[name="localizationY-' + attr + '"]').val();
      var X = $('[data-values]').find('input[name="localizationX-' + attr + '"]').val();
      elem1.css({
        top: Y + 'px',
        left: X + 'px',
      });
    })
  
    $('#germany').mousemove(function (e) {
      //var offset = $(this).offset();
      //var X = (e.pageX - offset.left);
      //var Y = (e.pageY - offset.top);
      var p = $('p.test');
      var elem = $('p.test2');
  
      //alert('X: ' + X + ', Y: ' + Y);
  
      //p.html('left: ' + e.pageX - offset.left + ', top: ' + e.pageY - offset.top);
      var posY = e.pageY - p.parent().offset().top;
      var posX = e.pageX - p.parent().offset().left;
      //var offset = p.offset().left - p.parent().offset().left;
      //alert(offset);
      /*
      */
  
      $(this).click(function () {
        $('#info').text('Oś X: ' + posX + ' ' + 'Oś Y: ' + posY );
        p.css({
          top: posY,
          left: posX,
        });
        elem.css({
          top: 351.828125,
          left: 286.515625,
        });
      })
    });
  });

  $('a[href*="#"]').on('click', function (e) {
    e.preventDefault()
  
    $('html, body').animate(
      {
        scrollTop: $($(this).attr('href')).offset().top,
      },
      500,
      'linear'
    )
  })