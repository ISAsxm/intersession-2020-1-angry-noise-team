<style>
.site-footer {
  background-color: transparent;
  padding: 45px 0 20px;
  font-size: 15px;
  line-height: 24px;
  color: rgba(235, 235, 242, 0.5);
}
.site-footer hr {
  border-top-color: #bbb;
  opacity: 0.5;
}
.site-footer hr.small {
  margin: 20px 0;
}
.site-footer h6 {
  color: #fff;
  font-size: 16px;
  text-transform: uppercase;
  margin-top: 5px;
  letter-spacing: 2px;
}
.site-footer a {
  color: rgba(235, 235, 242, 0.5);
}
.site-footer a:hover {
  color: #36d9c8;
  text-decoration: none;
}
.footer-links {
  padding-left: 0;
  list-style: none;
}
.footer-links li {
  display: block;
}
.footer-links a {
  color: rgba(235, 235, 242, 0.5);
}
.footer-links a:active,
.footer-links a:focus,
.footer-links a:hover {
  color: #36d9c8;
  text-decoration: none;
}
.footer-links.inline li {
  display: inline-block;
}
.site-footer .social-icons {
  text-align: right;
}
.site-footer .social-icons a {
  width: 40px;
  height: 40px;
  line-height: 40px;
  margin-left: 6px;
  margin-right: 0;
  border-radius: 100%;
  background-color: transparent;
}
.copyright-text {
  margin: 0;
}
@media (max-width: 991px) {
  .site-footer [class^="col-"] {
    margin-bottom: 30px;
  }
}
@media (max-width: 767px) {
  .site-footer {
    padding-bottom: 0;
  }
  .site-footer .copyright-text,
  .site-footer .social-icons {
    text-align: center;
  }
}
.social-icons {
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}
.social-icons li {
  display: inline-block;
  margin-bottom: 4px;
}
.social-icons li.title {
  margin-right: 15px;
  text-transform: uppercase;
  color: #96a2b2;
  font-weight: 700;
  font-size: 13px;
}
.social-icons a {
  background-color: #eceeef;
  color: rgba(235, 235, 242, 0.5);
  font-size: 16px;
  display: inline-block;
  line-height: 44px;
  width: 44px;
  height: 44px;
  text-align: center;
  margin-right: 8px;
  border-radius: 100%;
  -webkit-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear;
}
.social-icons a:active,
.social-icons a:focus,
.social-icons a:hover {
  color: #fff;
  background-color: #29aafe;
}
.social-icons.size-sm a {
  line-height: 34px;
  height: 34px;
  width: 34px;
  font-size: 14px;
}
.social-icons a.facebook:hover {
  background-color: #3b5998;
}
.social-icons a.twitter:hover {
  background-color: #00aced;
}
.social-icons a.linkedin:hover {
  background-color: #007bb6;
}
.social-icons a.github:hover {
  background-color: #323131;
}
@media (max-width: 767px) {
  .social-icons li.title {
    display: block;
    margin-right: 0;
    font-weight: 600;
  }
}
</style>
<template>
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About us</h6>
          <p class="text-justify">
            Code Laïka est un outil vous permettant d'analyser votre code PHP. Grâce à son analyse robuste, votre PHP deviendra une oeuvre d'art en seulement quelques minutes.
            Il suffit pour cela d'indiquer l'URL de votre repo puis de patienter quelques minutes. Une fois l'analyse terminée vous pouvez recevoir les résultats en indiquant votre adresse email.
          </p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Collaborateurs</h6>
          <ul class="footer-links">
            <li>
              <a href="https://github.com/Corenbla" target="_blank">Corenting</a>
            </li>
            <li>
              <a href="https://github.com/Mangata-Dev" target="_blank">Tony</a>
            </li>
            <li>
              <a href="https://github.com/MelissandeH" target="_blank">Mélissande</a>
            </li>
            <li>
              <a href="https://github.com/florianmg" target="_blank">Florian</a>
            </li>
            <li>
              <a href="https://github.com/AmauryLAPEYRE" target="_blank">Amaury</a>
            </li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Menu</h6>
          <ul class="footer-links">
            <li>
              <a href="#header">Code Laïka</a>
            </li>
            <li>
              <a href="#aboutus">A propos</a>
            </li>
            <li>
              <a href="#funding">Donations</a>
            </li>
            <li>
              <a href="#tool">Analyser</a>
            </li>
          </ul>
        </div>
      </div>
      <hr />
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">
            Copyright &copy; 2020 All Rights Reserved by
            <a href="#">Code Laïka</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li>
              <a class="facebook" href="https://fr-fr.facebook.com/itakademy/" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a class="twitter" href="https://twitter.com/it_akademy" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a class="github" href="https://github.com/itakademy" target="_blank">
                <i class="fab fa-github"></i>
              </a>
            </li>
            <li>
              <a class="linkedin" href="https://www.linkedin.com/company/it-akademy" target="_blank">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</template>
