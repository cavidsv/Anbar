<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>




<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ __('messages.title') }}</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="{{url('css/main.css?v=1628755089081')}}">

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

  <meta name="description" content="Admin One - free Tailwind dashboard">

  <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin One HTML">
  <meta property="og:description" content="Admin One - free Tailwind dashboard">
  <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Admin One HTML">
  <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
  <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="twitter:image:width" content="1920">
  <meta property="twitter:image:height" content="960">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head>
<body>

<div id="app">

<nav id="navbar-main" class="navbar is-fixed-top">
  <div class="navbar-brand">

    <a class="navbar-item mobile-aside-button">
      <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
    <div class="navbar-item">
      <div class="control">
        <form method="get" action="@yield('axtar')#cedvel">
          <input placeholder="{{ __('messages.axtar') }}..." name="sorgu" class="input">
        </form>
      </div>
    </div>

  </div>

  <select class="changeLang">
    <option value="en" {{session()->get('locale')=='en' ? 'selected' : ''}}>EN</option>  
    <option value="az" {{session()->get('locale')=='az' ? 'selected' : ''}}>AZ</option>
      
  </select>


</nav>

<!--MENU START-->
<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
    {{ __('messages.title') }} <b class="font-black"></b>
    </div>
  </div>
  <div class="menu is-menu-main">
    
    <ul class="menu-list">
      <li class="set-active-tables-html">
        <a href="{{route('brands')}}">
          <span class="icon"><i class="mdi mdi-slack"></i></span>
          <span class="menu-item-label">{{ __('messages.brands') }}</span>
        </a>
      </li>
    </ul>
    
    <ul class="menu-list">
      <li class="--set-active-tables-html">
        <a href="{{route('clients')}}">
          <span class="icon"><i class="mdi mdi-account-details"></i></span>
          <span class="menu-item-label">{{ __('messages.clients') }}</span>
        </a>
      </li>
      <li class="--set-active-forms-html">
        <a href="{{route('products')}}">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">{{ __('messages.products') }}</span>
        </a>
      </li>
      <li class="--set-active-profile-html">
        <a href="{{route('xerc')}}">
          <span class="icon"><i class="mdi mdi-cash-multiple"></i></span>
          <span class="menu-item-label">{{ __('messages.xerc') }}</span>
        </a>
      </li>




      <li class="--set-active-profile-html">
        <a href="{{route('sobe')}}">
          <span class="icon"><i class="mdi mdi-account-cog-outline"></i></span>
          <span class="menu-item-label">{{ __('messages.shobe') }}</span>
        </a>
      </li>





      <li class="--set-active-profile-html">
        <a href="{{route('staff')}}">
          <span class="icon"><i class="mdi mdi-account-plus-outline"></i></span>
          <span class="menu-item-label">{{ __('messages.staff') }}</span>
        </a>
      </li>


      
      <li class="--set-active-profile-html">
        <a href="{{route('profil')}}">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">{{ __('messages.profil') }}</span>
        </a>
      </li>




      <li>
        <a href="{{route('orders')}}">
          <span class="icon"><i class="mdi mdi-bookmark-outline"></i></span>
          <span class="menu-item-label">{{ __('messages.orders') }}</span>
        </a>
      </li>
      <li>



      <li class="--set-active-profile-html">
        <a href="{{route('logout')}}">
          <span class="icon"><i class="mdi mdi-exit-to-app"></i></span>
          <span class="menu-item-label">{{ __('messages.logout') }}</span>
        </a>
      </li>


  </div>
</aside>



<!--<a href="{{route('brands')}}">Brands</a><br>
<a href="{{route('clients')}}">Clients</a><br>
<a href="{{route('orders')}}">Orders</a><br>
<a href="{{route('xerc')}}">Xerc</a><br>
<a href="{{route('products')}}">Products</a><br>-->

    @yield('content')

    



    
<footer class="footer">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
    <div class="flex items-center justify-start space-x-3">
      <div>
        © 2023, Anbar
      </div>

      <div>
        <p>Programmed By: <a href="https://cavid.pw/" target="_blank">Cavid Suleymanov</a></p>
      </div>
      
        
  </div>
</footer>

<div id="sample-modal" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>

    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button red --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

<div id="sample-modal-2" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>
    <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button blue --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="js/chart.sample.min.js"></script>


<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '658339141622648');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
<script>
  let url = "{{route('changeLang')}}"
  $('.changeLang').change(function(){
    window.location.href = url + "?lang=" + $(this).val()
  })
</script>
