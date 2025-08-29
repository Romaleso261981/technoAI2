<!--  Футер  -->
<footer id="footer" class="footer-section">
  <div class="container">
    <div class="footer-content pt-5 pb-5">
      <div class="row">
        <!-- Логотип футера та соціальні іконки -->
        <div class="col-xl-4 col-lg-4 mb-50">
          <div class="footer-widget">
            <div class="footer-logo">
              <a href="index.html" class="logo d-flex align-items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png" alt="logo" />
              </a>
            </div>
            <div class="footer-text">
              <p>
                Ми надаємо інноваційні рішення, що відповідають вашим потребам. Приєднуйтесь до нас у перетворенні
                вашого цифрового ландшафту.
              </p>
            </div>
            <div class="footer-social-icon">
              <span>Ми в соціальних мережах</span>
              <a href="#" class="social-icon twitter"><i class="bi bi-twitter-x"></i></a>
              <a href="#" class="social-icon facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="social-icon instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="social-icon linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

        <!-- Список послуг -->
        <div class="col-lg-2 col-md-6 footer-column">
          <div class="service-widget footer-widget">
            <div class="footer-widget-heading">
              <h3>Наші послуги</h3>
            </div>
            <ul class="list">
              <li><a href="services.html">Веб-дизайн</a></li>
              <li><a href="services.html">Розробка додатків</a></li>
              <li><a href="services.html">Хмарні рішення</a></li>
              <li><a href="services.html">SEO послуги</a></li>
            </ul>
          </div>
        </div>

        <!-- Інформаційні посилання -->
        <div class="col-lg-2 col-md-6 footer-column">
          <div class="service-widget footer-widget">
            <div class="footer-widget-heading">
              <h3>Інформація</h3>
            </div>
            <ul class="list">
              <li><a href="about.html">Про нас</a></li>
              <li><a href="portfolio.html">Портфоліо</a></li>
              <li><a href="contact.html">Контакти</a></li>
              <li><a href="privacy-policy.html">Політика конфіденційності</a></li>
            </ul>
          </div>
        </div>

        <!-- Контактна інформація та розсилка -->
        <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
          <div class="contact-widget footer-widget">
            <div class="footer-widget-heading">
              <h3>Зв'яжіться з нами</h3>
            </div>
            <div class="footer-text">
              <p>
                <i class="bi bi-geo-alt-fill mr-15"></i> Київ, Банкова 23 Україна
              </p>
              <p>
                <i class="bi bi-telephone-inbound-fill mr-15"></i> +380 96 422 03 25
              </p>
              <p>
                <i class="bi bi-telephone-inbound-fill mr-15"></i> +380 66 255 06 35
              </p>
              <p>
                <i class="bi bi-envelope-fill mr-15"></i>
                info@technoai.io
              </p>
              <p>
                <i class="bi bi-envelope-fill mr-15"></i>
                support@technoai.io
              </p>
            </div>
          </div>

          <div class="footer-widget">
            <div class="footer-widget-heading">
              <h3>Розсилка</h3>
            </div>
            <div class="footer-text mb-25">
              <p>Підпишіться на нашу розсилку для отримання останніх оновлень!</p>
            </div>
            <div class="subscribe-form">
              <form action="#">
                <input type="text" placeholder="Email адреса" required />
                <button><i class="bi bi-send"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Авторські права футера -->
      <div class="row">
        <div class="col-xl-6 col-lg-6 text-left">
          <div class="copyright-text">
            <div class="footer__copy"> &copy; <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?> Всі права
              захищені.
            </div>
          </div>
        </div>
      </div>
    </div>
</footer>

<!-- Кінець Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center active">
  <i class="bi bi-arrow-up-short"></i>
</a>

<div id="preloader"></div>

<!-- JavaScript файли підключені через functions.php -->
<?php wp_footer(); ?>
</body>

</html>