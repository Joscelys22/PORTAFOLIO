<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link rel="stylesheet" href="./dist/output.css">
    <script src="https://kit.fontawesome.com/af1a09fa4d.js" crossorigin="anonymous"></script>
</head>

<body class="font-montserrat bg-dark-bg text-light-text">
    <header class="fixed top-0 left-0 w-full bg-darker-bg backdrop-blur-md z-50 border-b border-border-color">
            <nav class="flex justify-between items-center px-4 md:px-8 py-4 w-full max-w-7xl mx-auto">
                <div class="flex items-center">
                    <span class="text-primary-color text-3xl md:text-4xl font-semibold">BIO</span>
                    <span class="text-primary-color text-3xl md:text-4xl font-semibold">DERMA</span>
                </div>

                <button class="md:hidden text-light-text focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <ul class="hidden md:flex gap-4 md:gap-8 list-none items-center justify-center p-0 m-0 text-base md:text-xl">
                    <li> <a href="#vision" class="text-light-text no-underline px-3 py-2 md:px-5 md:py-2 rounded-md hover:bg-dark-bg hover:text-primary-color transition-all duration-300"> QUIENES SOMOS? </a></li>
                    <li> <a href="#productos" class="text-light-text no-underline px-3 py-2 md:px-5 md:py-2 rounded-md hover:bg-dark-bg hover:text-primary-color transition-all duration-300"> PRODUCTOS</a></li>
                    <li> <a href="./tips.php" class="text-light-text no-underline px-3 py-2 md:px-5 md:py-2 rounded-md hover:bg-dark-bg hover:text-primary-color transition-all duration-300"> TIPS </a></li>
                </ul>
            </nav>
        </header>
    <main>
        <section id="vision" class="min-h-screen flex items-center px-4 py-24 md:py-32 max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8 md:gap-16 w-full">
                <div class="flex-1 text-center md:text-left mx-auto">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4"> CONOCE BIODERMA </h1>
                    <p class="mb-4 text-base md:text-lg text-gray-text max-w-xl mx-auto md:mx-0"> Somos una empresa dedicada a la fabricación y comercialización de productos dermatológicos de
                        alta calidad. Nuestro compromiso es ofrecer soluciones efectivas para el cuidado de la piel,
                        basadas en la investigación científica y la innovación constante.</p>
                    <p class="mb-8 text-base md:text-lg text-gray-text max-w-xl mx-auto md:mx-0"> En este portafolio te mostraremos un poco sobre nosotros.</p>
                    <div class="flex gap-4 mb-8 justify-center md:justify-start items-center">
                        <a href="https://www.instagram.com/biodermavenezuela?igsh=YWl6ZHJ6M2s3dmVn" target="_blank" class="text-light-text text-xl md:text-2xl transition-all duration-300 hover:scale-110"> <i
                                class="fab fa-instagram"> </i></a>
                        <a href="https://www.facebook.com/BiodermaVenezuela" target="_blank" class="text-light-text text-xl md:text-2xl transition-all duration-300 hover:scale-110"> <i
                                class="fab fa-facebook"> </i></a>

                        <a href="https://www.facebook.com/BiodermaVenezuela" class="inline-block text-gray-800 bg-card-bg px-5 py-2 md:px-6 md:py-3 rounded-md font-semibold transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-darker-bg"> Más información</a>
                    </div>
                </div>
                <div class="flex-1 flex justify-center md:justify-end">
                    <img src="./src/assets/img_ppal.png" alt="imagen_ppal" class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg h-auto object-contain border-4 md:border-5 border-primary-color shadow-lg shadow-green-900 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-green-900">
                </div>
            </div>
        </section>

        <section id="productos" class="py-16 md:py-24 max-w-7xl mx-auto px-4">
            <h2 class="section-title text-3xl md:text-4xl font-semibold mb-8 text-center pb-4 relative"> NUESTROS PRODUCTOS </h2>
            <div class="flex flex-wrap justify-center gap-6">
                
                <div class="bg-border-color rounded-lg overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-purple-800 flex flex-col w-full sm:w-72 md:w-64 lg:w-72 xl:w-80">
                    <div class="overflow-hidden h-48 flex justify-center items-center">
                        <img src="./src/assets/product1.jpg" alt="product1" class="w-full h-full object-cover transition-all duration-300 hover:scale-105">
                    </div>
                    <div class="p-4 flex-grow text-center">
                        <h3 class="text-lg md:text-xl font-semibold mb-2"> Protector solar de máxima protección con textura nutritiva.</h3>
                        <p class="text-gray-text mb-4 text-sm md:text-base flex-grow"> Activa las defensas naturales de la piel y la protege de los riesgos del daño celular.</p>
                    </div>
                </div>

                <div class="bg-border-color rounded-lg overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-purple-800 flex flex-col w-full sm:w-72 md:w-64 lg:w-72 xl:w-80">
                    <div class="overflow-hidden h-48 flex justify-center items-center">
                        <img src="./src/assets/product2.jpg" alt="product2" class="w-full h-full object-cover transition-all duration-300 hover:scale-105">
                    </div>
                    <div class="p-4 flex-grow text-center">
                        <h3 class="text-lg md:text-xl font-semibold mb-2"> Gel Limpiador Piel Sensible.</h3>
                        <p class="text-gray-text mb-4 text-sm md:text-base flex-grow">Gel limpiador micelar calmante que refuerza la hidratación natural de la piel.</p>
                    </div>
                </div>

                <div class="bg-border-color rounded-lg overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-purple-800 flex flex-col w-full sm:w-72 md:w-64 lg:w-72 xl:w-80">
                    <div class="overflow-hidden h-48 flex justify-center items-center">
                        <img src="./src/assets/product3.jpg" alt="product3" class="w-full h-full object-cover transition-all duration-300 hover:scale-105">
                    </div>
                    <div class="p-4 flex-grow text-center">
                        <h3 class="text-lg md:text-xl font-semibold mb-2"> Crema Cicatrizante</h3>
                        <p class="text-gray-text mb-4 text-sm md:text-base flex-grow">Crema cicatrizante que hidrata, repara y calma.</p>
                    </div>
                </div>

                <div class="bg-border-color rounded-lg overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-purple-800 flex flex-col w-full sm:w-72 md:w-64 lg:w-72 xl:w-80">
                    <div class="overflow-hidden h-48 flex justify-center items-center">
                        <img src="./src/assets/product4.jpg" alt="product4" class="w-full h-full object-cover transition-all duration-300 hover:scale-105">
                    </div>
                    <div class="p-4 flex-grow text-center">
                        <h3 class="text-lg md:text-xl font-semibold mb-2"> Bioderma Sébium Gel </h3>
                        <p class="text-gray-text mb-4 text-sm md:text-base flex-grow">Limpiador para Piel Mixta y/o Grasa</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="tips" class="relative py-16 md:py-24 max-w-5xl mx-auto px-4 sm:px-6 md:px-8">
            <h2 class="section-title text-3xl md:text-4xl font-semibold mb-8 text-center pb-4 relative"> TIPS PARA UN ROSTRO PERFECTO</h2>
            <div class="flex flex-col items-center gap-8 py-4 md:py-8">

                <div class="tips-item relative w-full sm:w-4/5 max-w-xl">
                    <div class="bg-card-bg p-4 rounded-lg border-l-4 border-primary-color ml-8">
                        <span class="inline-block px-3 py-1 bg-darker-bg rounded-md text-sm mb-4">Hidratación</span>
                        <p class="text-sm md:text-base mb-2">Utiliza una crema hidratante adecuada para tu tipo de piel, como una crema para piel seca o
                            un gel para piel grasa.</p>
                        <p class="text-sm md:text-base"> Bebe suficiente agua a lo largo del día para mantener tu piel hidratada. </P>
                    </div>
                </div>

                <div class="tips-item relative w-full sm:w-4/5 max-w-xl">
                    <div class="bg-card-bg p-4 rounded-lg border-l-4 border-primary-color ml-8">
                        <span class="inline-block px-3 py-1 bg-darker-bg rounded-md text-sm mb-4">Protección solar</span>
                        <P class="text-sm md:text-base mb-2">Aplica protector solar todos los días, incluso si está nublado, para proteger tu piel de los
                            daños del sol.</P>
                        <P class="text-sm md:text-base"> Elige un protector solar de amplio espectro con un factor de protección solar (FPS) adecuado
                            para tu tipo de piel.</P>
                    </div>
                </div>

                <div class="tips-item relative w-full sm:w-4/5 max-w-xl">
                    <div class="bg-card-bg p-4 rounded-lg border-l-4 border-primary-color ml-8">
                        <span class="inline-block px-3 py-1 bg-darker-bg rounded-md text-sm mb-4">Limpieza</span>
                        <P class="text-sm md:text-base mb-2">Limpia tu rostro dos veces al día con un limpiador suave para eliminar impurezas y exceso de
                            grasa.</P>
                        <P class="text-sm md:text-base"> Evita el uso de jabones agresivos que puedan irritar tu piel.</P>
                    </div>
                </div>
            </div>
        </section>

        <footer class="flex flex-col justify-center items-center w-full py-8 bg-darker-bg text-center">
            <div class="flex flex-col items-center">
                <h4 class="text-primary-color text-xl md:text-2xl mb-2"> BIODERMA</h4>
                <h6 class="text-base md:text-xl mb-2"> &copy; Todos los derechos reservados </h6>
                <p class="text-sm md:text-lg text-gray-text"> Este portafolio fue creado como parte de un proyecto académico. </p>
            </div>
        </footer>
    </main>
</body>

</html>