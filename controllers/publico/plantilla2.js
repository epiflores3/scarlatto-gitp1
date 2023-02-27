
const NAV = document.querySelector('nav')
const FOOTER = document.querySelector('footer');

NAV.innerHTML =`
<div class="wrapper">
<div class="logo"><img height="45px" width="45px" src="../../resources/img/logo.png"  alt=""><a href="index.html">Scarlatto</a></div>
<ul class="nav-links"> 
    <li>
        <a href="producto.html">Productos</a>
        <div class="mega-box">
            <div class="content">
                <div class="row">
                    <img src="../../resources/img/fotosextra/brillianty-dragocennosti.jpg" alt="">
                </div>
                <div class="row">
                    <header>Pulseras</header>
                    <ul class="mega-links">
                        <li><a href="#">Todas las opciones</a></li>
                        <li><a href="#">Pulseras rigidas</a></li>
                        <li><a href="#">Pulseras de cuero</a></li>
                        <li><a href="#">Pulseras de reflexion</a></li>
                        <li><a href="#">Pulseras de escalonadas</a></li>
                    </ul>
                </div>
                <div class="row">
                    <header>Anillos</header>
                    <ul class="mega-links">
                        <li><a href="#">Todas las opciones</a></li>
                        <li><a href="#">Anillos combinados</a></li>
                        <li><a href="#">Anillos llamativos</a></li>
                        <li><a href="#">Anillos de compromiso</a></li>
                        <li><a href="#">Conjunto de anillos</a></li>
                    </ul>
                </div>
                <div class="row">
                    <header>Collares</header>
                    <ul class="mega-links">
                        <li><a href="#">Todas las opciones</a></li>
                        <li><a href="#">Collar de varias cuerdas</a></li>
                        <li><a href="#">Gargantillas</a></li>
                        <li><a href="#">Colgantes</a></li>
                        <li><a href="#">Cadenas</a></li>
                    </ul>
                </div>
                <div class="row">
                    <header>Pendientes</header>
                    <ul class="mega-links">
                        <li><a href="#">Todas las opciones</a></li>
                        <li><a href="#">Pendientes de aro</a></li>
                        <li><a href="#">Pedientes de boton</a></li>
                        <li><a href="#">Pendientes largos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li>
        <a href="#">Servicios</a>
        <ul class="drop-menu">
            <li><a href="pagina_info.html">Sobre nosotros</a></li>
            <li><a href="seccion_noticias.html">Noticias</a></li>
        </ul>
    </li>
    <li><a href="cuenta.html">Mi cuenta</a></li>
    <li><a href="mi_cesta.html">Carrito</a></li>
</ul>
</div>
`;

FOOTER.innerHTML = `
<div class="row">
    <div class="col">
      <h5 class="text-dark">Dashboard</h5>
      <p>
        <a href="#" class="text-dark" style="text-decoration: none">Ayuda</a>
      </p>
    </div>
    <div class="col">
      <h5 class="text-dark">Explorar</h5>
      <p>
        <a href="#" class="text-dark" style="text-decoration: none">Joyas</a>
      </p>
      <p>
        <a href="#" class="text-dark" style="text-decoration: none">Guía de tallas de anillos</a>
      </p>
      <p>
        <a href="#" class="text-dark" style="text-decoration: none">Guía de tallas de pulseras</a>
      </p>
      <p>
        <a href="#" class="text-dark" style="text-decoration: none">Mapa del sitio</a>
      </p>
    </div>
    <div class="col">
      <h5 class="text-dark">Gestionar</h5>
      <p>
        <a href="cuenta.html" class="text-dark" style="text-decoration: none">Mis datos</a>
      </p>
      <p>
        <a href="#" class="text-dark" style="text-decoration: none">Mi carrito de compra</a>
      </p>
    </div>
    <div class="col">
      <h5 class="text-dark">Sobre nosotros</h5>
      <p>
        <a href="quienes_somos.html" class="text-dark" style="text-decoration: none">¿Quiénes somos?</a>
      </p>
    </div>
    <div class="col">
      <h5 class="text-dark">Contacto</h5>
      <p class="text-dark">Teléfono: 5678-0978</p>
      <p class="text-dark">Correo: Scarlatto@gmail.com</p>
      <p class="text-dark">Facebook: Scarlatto_Shopsv</p>
      <p class="text-dark">Instagram: Scarlatto_Shopsv</p>
      <p class="text-dark">Twitter: Scarlatto_Shopsv</p>
      <p>
        <a href="#" class="text-dark">Contáctanos</a>
      </p>
    </div>
  </div>
`;