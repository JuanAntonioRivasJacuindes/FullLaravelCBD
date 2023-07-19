<x-guest-layout>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <div class="w-2/3 sm:w-1/6 mb-5">

                <x-application-logo />
            </div>




            <nav class=" flex flex-wrap items-center text-base text-secondary justify-center">
                <a href="#about" class="mx-2 hover:text-primary ">Quienes Somos</a>
                <a href="#beneficts" class="mx-2 hover:text-primary ">Beneficios</a>
                <a href="#products" class="mx-2 hover:text-primary  ">Nuestros Productos</a>
            </nav>
            <a href="#contact" class="mx-2 hover:text-primary  ">Contáctanos</a>
        
        </div>
    </header>

    <div class="min-h-screen w-full">
        <section class="w-full" id="products">
            <div class="container w-full mx-auto flex md:mx-28 my-5 md:flex-row flex-col items-center">
                <div class="lg:flex-grow w-full md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-5 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">ACEITE DE CBD
                       
                    </h1>
                    <p class="mb-8 leading-relaxed">Nuestro producto por cada 1ml. contiene
                        una concentración de 100 mg.
                    </p>
                    <div class="flex justify-center">
                        <x-button>
                            Comprar
                        </x-button>
                        <!-- <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
        <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button> -->
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded w-full" alt="hero" src="img\kx-15040g-30_0.png">
                </div>
            </div>
        </section>
        <section id="about" class="w-full bg-background p-3 sm:px-10 md:px-24  text-center">

            <h2 class="text-4xl font-bold m-3 bg-clip-text text-secondary  ">¿Quiénes somos?</h2>

            <p class="sm:m-5 m-5 text-left sm:text-center text-secondary">
                Somos una empresa líder en la
                industria del CBD, comprometida
                con la producción, distribución y
                comercialización de productos de
                alta calidad con un alto grado de
                concentración de CBD.
                Nuestra dedicación a la excelencia,
                la innovación y el servicio al cliente
                nos distingue en el mercado,
                brindando a nuestros clientes
                confianza y satisfacción al elegir
                nuestros productos.
                Nuestros productos no contienen
                THC.
            </p>


        </section>


        <section id="beneficts" class="w-full bg-background p-3   text-center text-secondary body-font">
            <h2 class="text-4xl font-bold mb-8 bg-clip-text text-secondary ">Beneficios</h2>



            <div class="flex items-center lg:w-5/6 mx-auto border-b pb-10 mb-10 border-primary sm:flex-row flex-col">
                <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-primary text-secondary flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="sm:w-16 sm:h-16 w-10 h-10">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-2.625 6c-.54 0-.828.419-.936.634a1.96 1.96 0 00-.189.866c0 .298.059.605.189.866.108.215.395.634.936.634.54 0 .828-.419.936-.634.13-.26.189-.568.189-.866 0-.298-.059-.605-.189-.866-.108-.215-.395-.634-.936-.634zm4.314.634c.108-.215.395-.634.936-.634.54 0 .828.419.936.634.13.26.189.568.189.866 0 .298-.059.605-.189.866-.108.215-.395.634-.936.634-.54 0-.828-.419-.936-.634a1.96 1.96 0 01-.189-.866c0-.298.059-.605.189-.866zm2.023 6.828a.75.75 0 10-1.06-1.06 3.75 3.75 0 01-5.304 0 .75.75 0 00-1.06 1.06 5.25 5.25 0 007.424 0z" clip-rule="evenodd" />
                    </svg>


                </div>
                <div class="flex-grow sm:text-left text-center mt-10 sm:mt-0">
                    <h2 class="text-white bg-primary text-lg title-font font-bold px-2 my-3">ALIVIO DEL DOLOR</h2>
                    <p class="leading-relaxed text-base">El CBD puede ayudar a reducir el dolor crónico y
                        agudo al interactuar con los receptores de dolor en el
                        sistema nervioso.
                    </p>

                </div>
            </div>
            <div class="flex items-center lg:w-5/6 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <h2 class="text-white bg-primary text-lg title-font font-bold px-2 my-3">REDUCCIÓN DE LA INFLAMACIÓN</h2>
                    <p class="leading-relaxed text-base">Se ha sugerido que el CBD puede tener propiedades
                        antiinflamatorias, lo que podría ser beneficioso para
                        enfermedades inflamatorias como la artritis</p>

                </div>
                <div class="sm:w-32 sm:order-none order-first sm:h-32 h-20 w-20 sm:ml-10 inline-flex items-center justify-center rounded-full bg-primary text-secondary flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sm:w-16 sm:h-16 w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                    </svg>


                </div>
            </div>
            <div class="flex items-center lg:w-5/6 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-primary text-secondary flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="sm:w-16 sm:h-16 w-10 h-10">
                        <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                    </svg>

                </div>
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <h2 class="text-white bg-primary text-lg title-font font-bold px-2 my-3">ALIVIO DE ESTRÉS Y ANSIEDAD</h2>
                    <p class="leading-relaxed text-base">Muchas personas encuentran que el CBD puede
                        ayudar a reducir el estrés y la ansiedad, y algunos
                        estudios respaldan esta afirmación.
                    </p>

                </div>
            </div>

            <div class="flex items-center lg:w-5/6 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <h2 class="text-white bg-primary text-lg title-font font-bold px-2 my-3">MEJORA DEL SUEÑO
                    </h2>
                    <p class="leading-relaxed text-base">El CBD puede tener un efecto calmante y relajante, lo
                        que podría ayudar a mejorar la calidad del sueño en
                        personas con trastornos del sueño.
                    </p>

                </div>
                <div class="sm:w-32 sm:order-none order-first sm:h-32 h-20 w-20 sm:ml-10 inline-flex items-center justify-center rounded-full bg-primary text-secondary flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="sm:w-16 sm:h-16 w-10 h-10">
                        <path d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z" clip-rule="evenodd" />
                    </svg>

                </div>
            </div>
            <div class="flex items-center lg:w-5/6 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-primary text-secondary flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="sm:w-16 sm:h-16 w-10 h-10">
                        <path fill-rule="evenodd" d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z" clip-rule="evenodd" />
                    </svg>

                </div>
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <h2 class="text-white bg-primary text-lg title-font font-bold px-2 my-3">APOYO PARA LA SALUD MENTAL</h2>
                    <p class="leading-relaxed text-base">Se ha investigado el uso del CBD como una opción de
                        tratamiento coadyuvante para afecciones como la
                        depresión, el trastorno de estrés postraumático y la
                        ansiedad social.
                    </p>
                </div>
            </div>

            <div class="flex items-center lg:w-5/6 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <h2 class="text-white bg-primary text-lg title-font font-bold px-2 my-3">REDUCCIÓN DE CONVULSIONES </h2>
                    <p class="leading-relaxed text-base">El CBD ha demostrado ser eficaz en el tratamiento de
                        ciertos trastornos convulsivos, como el síndrome de
                        Dravet y el síndrome de Lennox-Gastaut, en algunos
                        casos.

                    </p>

                </div>
                <div class="sm:w-32 sm:order-none order-first sm:h-32 h-20 w-20 sm:ml-10 inline-flex items-center justify-center rounded-full bg-primary text-secondary flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="sm:w-16 sm:h-16 w-10 h-10" viewBox="0 0 512 512">
                        <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V240c0 8.8-7.2 16-16 16s-16-7.2-16-16V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V336c0 1.5 0 3.1 .1 4.6L67.6 283c-16-15.2-41.3-14.6-56.6 1.4s-14.6 41.3 1.4 56.6L124.8 448c43.1 41.1 100.4 64 160 64H304c97.2 0 176-78.8 176-176V128c0-17.7-14.3-32-32-32s-32 14.3-32 32V240c0 8.8-7.2 16-16 16s-16-7.2-16-16V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V240c0 8.8-7.2 16-16 16s-16-7.2-16-16V32z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-center lg:w-5/6 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-primary text-secondary flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="sm:w-16 sm:h-16 w-10 h-10" viewBox="0 0 512 512">
                        <path d="M184 0c30.9 0 56 25.1 56 56V456c0 30.9-25.1 56-56 56c-28.9 0-52.7-21.9-55.7-50.1c-5.2 1.4-10.7 2.1-16.3 2.1c-35.3 0-64-28.7-64-64c0-7.4 1.3-14.6 3.6-21.2C21.4 367.4 0 338.2 0 304c0-31.9 18.7-59.5 45.8-72.3C37.1 220.8 32 207 32 192c0-30.7 21.6-56.3 50.4-62.6C80.8 123.9 80 118 80 112c0-29.9 20.6-55.1 48.3-62.1C131.3 21.9 155.1 0 184 0zM328 0c28.9 0 52.6 21.9 55.7 49.9c27.8 7 48.3 32.1 48.3 62.1c0 6-.8 11.9-2.4 17.4c28.8 6.2 50.4 31.9 50.4 62.6c0 15-5.1 28.8-13.8 39.7C493.3 244.5 512 272.1 512 304c0 34.2-21.4 63.4-51.6 74.8c2.3 6.6 3.6 13.8 3.6 21.2c0 35.3-28.7 64-64 64c-5.6 0-11.1-.7-16.3-2.1c-3 28.2-26.8 50.1-55.7 50.1c-30.9 0-56-25.1-56-56V56c0-30.9 25.1-56 56-56z" />
                    </svg>
                </div>
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <h2 class="text-white bg-primary text-lg title-font font-bold px-2 my-3">PROPIEDADES NEUROPROTECTORAS
                    </h2>
                    <p class="leading-relaxed text-base">Algunas investigaciones sugieren que el CBD puede
                        tener efectos neuroprotectores, lo que significa que
                        podría ayudar a proteger el cerebro de daños o
                        enfermedades neurodegenerativas.
                    </p>
                </div>
            </div>


        </section>

    </div>


    <!-- boton whats -->
    <div class="w-14 h-14 bg-transparent p-3 rounded-full animate-pulse  fixed bottom-5 right-5 scale-72 hover:scale-125 duration-300 hover:animate-none">
        <svg class="fill-secondary" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 30.667 30.667" xml:space="preserve">

            <g id="SVGRepo_bgCarrier" stroke-width="0" />

            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

            <g id="SVGRepo_iconCarrier">
                <g>
                    <path d="M30.667,14.939c0,8.25-6.74,14.938-15.056,14.938c-2.639,0-5.118-0.675-7.276-1.857L0,30.667l2.717-8.017 c-1.37-2.25-2.159-4.892-2.159-7.712C0.559,6.688,7.297,0,15.613,0C23.928,0.002,30.667,6.689,30.667,14.939z M15.61,2.382 c-6.979,0-12.656,5.634-12.656,12.56c0,2.748,0.896,5.292,2.411,7.362l-1.58,4.663l4.862-1.545c2,1.312,4.393,2.076,6.963,2.076 c6.979,0,12.658-5.633,12.658-12.559C28.27,8.016,22.59,2.382,15.61,2.382z M23.214,18.38c-0.094-0.151-0.34-0.243-0.708-0.427 c-0.367-0.184-2.184-1.069-2.521-1.189c-0.34-0.123-0.586-0.185-0.832,0.182c-0.243,0.367-0.951,1.191-1.168,1.437 c-0.215,0.245-0.43,0.276-0.799,0.095c-0.369-0.186-1.559-0.57-2.969-1.817c-1.097-0.972-1.838-2.169-2.052-2.536 c-0.217-0.366-0.022-0.564,0.161-0.746c0.165-0.165,0.369-0.428,0.554-0.643c0.185-0.213,0.246-0.364,0.369-0.609 c0.121-0.245,0.06-0.458-0.031-0.643c-0.092-0.184-0.829-1.984-1.138-2.717c-0.307-0.732-0.614-0.611-0.83-0.611 c-0.215,0-0.461-0.03-0.707-0.03S9.897,8.215,9.56,8.582s-1.291,1.252-1.291,3.054c0,1.804,1.321,3.543,1.506,3.787 c0.186,0.243,2.554,4.062,6.305,5.528c3.753,1.465,3.753,0.976,4.429,0.914c0.678-0.062,2.184-0.885,2.49-1.739 C23.307,19.268,23.307,18.533,23.214,18.38z" />
                </g>
            </g>

        </svg>
    </div>
    <footer class="text-gray-600 body-font position">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">

            <div class="w-1/3 sm:w-1/12 ">
                <x-application-logo />

            </div>

            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2023 CBDIEZ
                <!-- <a href="https://twitter.com/knyttneve" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@knyttneve</a> -->
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">



                <a class="ml-3 text-gray-500">
                    <svg class="fill-secondary" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg class="fill-secondary" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg class="fill-secondary" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </footer>
</x-guest-layout>