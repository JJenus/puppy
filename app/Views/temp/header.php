  
<head>
    <meta charset="utf-8">
    <title>Puppy | Digital Pet Shop</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Puppy - Online pet shop for dog lovers">
    <meta name="keywords" content="woof, business, pets, animal showcase, saas, fintech, finance, fur babies, software, medical, fur kid, services, e-commerce, shopping cart, multipurpose, shop, dogs, marketing, seo, wooman, dogo shop, portfolio, dogo, gallery">
    <meta name="author" content="JJenus.github.io">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url() ?>/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= base_url() ?>/assets/favicon/safari-pinned-tab.svg" color="#6366f1">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#080032">
    <meta name="msapplication-config" content="<?= base_url() ?>/assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <script src="<?= base_url() ?>/node_modules/eruda/eruda.js"></script>
		<script type="text/javascript" charset="utf-8">
		  eruda.init();
		</script> 
    <!-- Vendor Styles -->
    <link rel="stylesheet" media="screen" href="<?= base_url() ?>/assets/vendor/boxicons/css/boxicons.min.css"/>
    <link rel="stylesheet" media="screen" href="<?= base_url() ?>/assets/vendor/lightgallery.js/dist/css/lightgallery.min.css"/>
    <link rel="stylesheet" media="screen" href="<?= base_url() ?>/assets/vendor/swiper/swiper-bundle.min.css"/>

    <!-- Main Theme Styles + Bootstrap -->
    <link rel="stylesheet" media="screen" href="<?= base_url() ?>/assets/css/theme.min.css">

    <!-- Page loading styles -->
    <style>
      .indicator-progress {
        display: none;
      }
      [data-indicator=on] > .indicator-progress {
        display: inline-block;
      }
      
      [data-indicator=on] > .indicator-label {
        display: none;
      }
      
      .rotate {
        display: inline-flex;
        align-items: center;
      }
 
      .page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .dark-mode .page-loading {
        background-color: #131022;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #9397ad;
      }
      .dark-mode .page-loading-inner > span {
        color: #fff;
        opacity: .6;
      }
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #b4b7c9;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      .dark-mode .page-spinner {
        border-color: rgba(255,255,255,.4);
        border-right-color: transparent;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
    </style>

    <!-- Theme mode -->
    <script>
      let mode = window.localStorage.getItem('mode'),
          root = document.getElementsByTagName('html')[0];
      if (mode !== undefined && mode === 'dark') {
        root.classList.add('dark-mode');
      } else {
        root.classList.remove('dark-mode');
      }
    </script>

    <!-- Page loading scripts -->
    <script>
      (function () {
        window.onload = function () {
          const preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 1000);
        };
      })();
    </script>

  </head>
