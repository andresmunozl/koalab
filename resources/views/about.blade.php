<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        *{
	margin: 0;
	padding: 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

img{
	width: 100%;
}

body{
	background: #E2E2E2;
	font-family: "Lato";
}

.portafolio{
	width: 90%;
	max-width: 1400px;
	margin: auto;
}

.portafolio h1{
	text-align: center;
	font-size: 38px;
	margin: 15px 0px 40px;
}

.portafolio h2{
	text-align: center;
	font-size: 80%;
	margin: 15px -2px 5px;
}

.portafolio-container{
	display: -webkit-box;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-pack: justify;
	-webkit-justify-content: space-between;
	-ms-flex-pack: justify;
	justify-content: space-between;
}

.portafolio-item{
	width: 30%;
	position: relative;
	overflow: hidden;
}

.portafolio-img{
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}

.portafolio-text{
	position: absolute;
	bottom: 0;
	padding: 20px;

	background: rgba(0,0,0,0.7);
	color: #fff;

	-webkit-transform: translateY(100%);

	-ms-transform: translateY(100%);

	transform: translateY(100%);

	-webkit-transition: all 0.5s ease-out;

	transition: all 0.5s ease-out;
}

.portafolio-text p{
	text-align: justify;
}

.portafolio-item:hover .portafolio-text{
	-webkit-transform: translateY(0%);
	-ms-transform: translateY(0%);
	transform: translateY(0%);
}

.portafolio-item:hover .portafolio-img{
	-webkit-transform: scale(1.15);
	-ms-transform: scale(1.15);
	transform: scale(1.15);
}    
        
    
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bamboo</title>

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="assets/css/stylish-portfolio.css" rel="stylesheet" >
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" href="estilosabout.css"> --}}

</head>

<body id="page-top">
<!-- Navigation -->
<a class="menu-toggle rounded" href="#">
    <i class="fa fa-bars"></i>
</a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a class="js-scroll-trigger" href="#page-top">Bamboo</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#page-top">Inicio</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/logininto">Inicia Sesión</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#portfolio">Que Ofrecemos</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="/about">Acerca de</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#contact">Contacto</a>
        </li>
    </ul>
</nav>

<!-- Header -->
<header class="masthead d-flex ">
    <div class="container text-center my-auto">
        <img class="img-fluid"  style="width:80%" src="assets/img/logolg.png" alt="">
        {{--<h1 class="mb-1">Stylish Portfolio</h1>--}}
        <h3 class="mb-5">
            <em>¡Conoce un poco de nuestro equipo de trabajo!</em>
        </h3>
        <a class="btn btn-dark btn-xl js-scroll-trigger" href="#portfolio">Equipo de trabajo</a>
    </div>
    <div class="overlay"></div>
</header>
<!-- Portfolio -->
<section class="content-section" id="portfolio">
    {{-- tarjetas --}}

    <section class="portafolio">
            <h1>Nuestro Equipo de trabajo</h1>
            <div class="portafolio-container">
                <section class="portafolio-item">
                    <img src="assets/img/fotoYuly.png" alt="" class="portafolio-img">
                    <section class="portafolio-text">
                        <h2>YULI S. GARCES BOLAÑOS</h2>
                        <p class="d-none d-md-block">Ingeniera en Electrónica y Telecomunicaciones de la Universidad del Cauca, especialista en Administración de la Información y Bases de Datos, con conocimiento en desarrollo de aplicaciones java, .NET,  móviles Android y multiplataforma Xamarin, Desarollo Web bajo el framework .NET y JSF; administración de bases de datos con gestores Oracle, SQL Server, MySql, PostGres, Firebase y desarrollo de Sistemas de Información freelance.</p>
                    </section>
                </section>
                <section class="portafolio-item">
                    <img src="assets/img/fotoZulema.png" alt="" class="portafolio-img">
                    <section class="portafolio-text">
                        <h2>ZULEMA Y. LEÓN ESCOBAR</h2>
                        <p class="d-none d-md-block">Ingeniera en Sistemas y Tecnóloga en Desarrollo de Software, adquiere las técnicas y principios de la concepción, especificación, diseño, implementación y mantenimiento del software, aporte soluciones eficaces, eficientes y adecuadas a las necesidades empresariales e institucionales de la región y el país.
                                Con experiencia en plataformas para el desarrollo de Servicios Web (Php, Mysql , Dreamweaver), Tecnologías Web,Tecnología WEB 2.0.
                                Desarrollo de Aplicaciones para Dispositivos Móviles.
                                </p>
                    </section>
                </section>
                <section class="portafolio-item">
                    <img src="assets/img/fotoJhony.jpeg" alt="" class="portafolio-img">
                    <section class="portafolio-text">
                        <h2>JHONY SANCHEZ ASTUDILLO</h2>
                        <p class="d-none d-md-block">Diseñador gráfico egresado de la Universidad del Cauca con altas capacidades creativas y control avanzado de un variado tipo de programas o herramientas en la materia. He trabajado en multitud de formatos -web, cartelería, publicidad, periodismo- y he dirigido proyectos artísticos a nivel formativo y en exposiciones. Capacidad para trabajar en grupos para proyectos corporativos y también disponibilidad para desempeñar tareas de diseños concretos como autónomo.</p>
                    </section>
                </section>
            </div>
        </section>
</section>









<!-- Call to Action -->
<section class="content-section bg-primary text-white">
    <div class="container text-center">
        <h2 class="mb-4">No te olvides de hacernos saber tú interés...</h2>
        <a href="#contact" class="btn btn-xl btn-light mr-4">Por supuesto!</a>
    </div>
</section>

<!-- Map -->
<section id="contact" class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63778.38370424355!2d-76.63495379949367!3d2.4574702454476522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e300311c028d47d%3A0x880bd67f0987a54e!2zUG9wYXnDoW4sIENhdWNh!5e0!3m2!1ses!2sco!4v1528784923384" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        {{--<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Bamboo,+Inc.,+Popayan,+Cauca,+Co&amp;aq=0&amp;oq=bAMBOO&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Bamboo,+Inc.,+Popayan,+Cauca,+Co&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>--}}
    <br/>
    <small>
        <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Popayan,Cauca&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8   &amp;t=m&amp;z=15&amp;iwloc=A"></a>
    </small>
</section>

<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <ul class="list-inline mb-5">
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white mr-3" href="#">
                    <i class="icon-social-facebook"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white mr-3" href="#">
                    <i class="icon-social-twitter"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white" href="#">
                    <i class="icon-social-github"></i>
                </a>
            </li>
        </ul>
        <p class="text-muted small mb-0">Copyright &copy; Bamboo 2018</p>
    </div>
</footer>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript -->
{{--<script src="vendor/jquery/jquery.min.js"></script>--}}
<script src="assets/vendor/jquery/jquery.min.js"></script>

{{--<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
{{--<script src="vendor/jquery-easing/jquery.easing.min.js"></script>--}}
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
{{--<script src="js/stylish-portfolio.min.js"></script>--}}
<script src="assets/js/stylish-portfolio.min.js"></script>

</body>

</html>

