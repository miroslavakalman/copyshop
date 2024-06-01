<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>CopyStar</title>
</head>
<body>
<nav>
        <a href="{{ url('/') }}">Главная</a>
        <a href="{{ url('/products') }}">Каталог</a>
        <a href="{{ url('/about') }}">О компании</a>
        <a href="{{ url('/contacts') }}">Где нас найти</a>
        <a href="{{ url('/login') }}">Авторизация</a>
        <a href="{{ url('/cart') }}"><img src="/img/cart.png" alt=""></a>
        <a href="{{ url('/checkout/success') }}"><img src="/img/user.png" alt=""></a>
    </nav>

    <div class="h11">
        <h1>Экономьте время и ресурсы с копировальным оборудованием CopyStar!</h1>
    </div>
    <style>
        .slider-container {
          width: 50%;
          overflow: hidden;
          position: relative;
          margin-left: 200px;
        }
        .slider {
          width: 20%;
          display: flex;
          transition: transform 0.5s ease;
        }
        .slide {
          width: 30%;
          flex-shrink: 0;
        } 
      </style>
      </head>
      <body>
      
      <div class="slider-container">
        <div class="slider">
          <div class="slide"><img src="img/image1.png" alt="Slide 1"></div>
          <div class="slide"><img src="img/image2.png" alt="Slide 2"></div>
          <div class="slide"><img src="img/image3.png" alt="Slide 3"></div>
        </div>
      </div>
      <div class="text2">
        В сердце технологического прогресса и инноваций лежит история компании CopyStar, одного из ведущих мировых производителей копировального оборудования. С его скромных начал в качестве стартапа крупнейшим мировым поставщиком офисного оборудования, CopyStar продолжает формировать отрасль и создавать новые стандарты в качестве, эффективности и технологической инновации.
<br>
 начале 1980-х годов группа талантливых инженеров и предпринимателей со всего мира объединили свои силы с одной целью - изменить игру в копировальной индустрии. Им удалось создать небольшую компанию, основанную на принципах инноваций, качества и обслуживания. Этот стартап был началом CopyStar.
<br>

С каждым годом CopyStar расширяла свой ассортимент продукции и укрепляла свою позицию на рынке. Благодаря постоянному фокусу на исследованиях и разработках, компания предлагала новаторские решения, которые соответствовали потребностям современных бизнесов.
<br>
Ключевым моментом в развитии компании стала стратегия партнерства с ведущими мировыми организациями и предприятиями. Это позволило CopyStar создать сильную сеть дистрибьюторов и сервисных центров по всему миру, обеспечивая своих клиентов высочайшим уровнем обслуживания.

CopyStar всегда ставила перед собой задачу оставаться на переднем крае технологического прогресса. Она внедряла новейшие технологии в свои устройства, обеспечивая своих клиентов самыми современными и эффективными решениями для копирования, печати и сканирования.

Сегодня CopyStar является мировым лидером в области копировального оборудования, предоставляя свои продукты и услуги в более чем ста странах мира. Ее технологии помогают компаниям всех размеров и отраслей повышать эффективность и продуктивность своих рабочих процессов.


      </div>
      <footer>
      <nav>
        <a href="{{ url('/') }}">Главная</a>
        <a href="{{ url('/products') }}">Каталог</a>
        <a href="{{ url('/about') }}">О компании</a>
        <a href="{{ url('/contacts') }}">Где нас найти</a>
        <a href="{{ url('/login') }}">Авторизация</a>
    </nav>
    </footer>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $(document).ready(function(){
          var slideCount = $('.slider').children().length;
          var slideWidth = $('.slider-container').width();
          var slideIndex = 0;
      
          $('.slider').css('width', slideWidth * slideCount);
      
          function nextSlide() {
            slideIndex++;
            if(slideIndex >= slideCount) {
              slideIndex = 0;
            }
            $('.slider').css('transform', 'translateX(-' + slideWidth * slideIndex + 'px)');
          }
      
          setInterval(nextSlide, 1500);
        });
      </script>
      
</body>
</html>