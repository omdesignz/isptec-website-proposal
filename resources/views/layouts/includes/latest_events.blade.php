<div class="relative bg-white">
  <!-- Background image and overlap -->
  <div aria-hidden="true" class="hidden absolute inset-0 sm:flex sm:flex-col">
    <div class="flex-1 relative w-full bg-gray-800">
      <div class="absolute inset-0 overflow-hidden">
        <img src="{{ asset('/campaign/calendar.jpeg') }}" alt="" class="w-full h-full object-center object-cover" loading="lazy" />
      </div>
      <div class="absolute inset-0 bg-gray-600 mix-blend-multiply" aria-hidden="true"></div>
    </div>
    <div class="w-full bg-white h-32 md:h-40 lg:h-48"></div>
  </div>

  <div class="relative max-w-3xl mx-auto pb-96 px-4 text-center sm:pb-0 sm:px-6 lg:px-8">
    <!-- Background image and overlap -->
    <div aria-hidden="true" class="absolute inset-0 flex flex-col sm:hidden">
      <div class="flex-1 relative w-full bg-gray-800">
        <div class="absolute inset-0 overflow-hidden">
          <img src="{{ asset('/campaign/calendar.jpeg') }}" alt="" class="w-full h-full object-center object-cover" loading="lazy" />
        </div>
        <div class="absolute inset-0 bg-gray-600 mix-blend-multiply" aria-hidden="true"></div>
      </div>
      <div class="w-full bg-white h-48"></div>
    </div>
    <div class="relative py-16">
      <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl animate__animated animate__fadeInLeft">Eventos Recentes</h1>
      <div class="mt-4 sm:mt-6">
        <a href="/events" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gray-900 hover:bg-isptec transform transition-all hover:scale-125">
        Consultar agenda
        <svg class="-mr-1 ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                </svg>
      </a>
      </div>
    </div>
  </div>

  <section aria-labelledby="collection-heading" class="-mt-96 relative sm:mt-0">
    <h2 id="collection-heading" class="sr-only">Collections</h2>
    <div class="max-w-md mx-auto grid grid-cols-1 gap-y-6 px-4 sm:max-w-7xl sm:px-6 sm:grid-cols-3 sm:gap-y-0 sm:gap-x-6 lg:px-8 lg:gap-x-8">
      <div class="group relative h-96 bg-white rounded-lg shadow-xl">
        <div>
          <div aria-hidden="true" class="absolute inset-0 rounded-lg overflow-hidden">
            <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
              <img src="{{ asset('/campaign/_DSR3022.jpg') }}" alt="Woman wearing an off-white cotton t-shirt." class="w-full h-full object-center object-cover" loading="lazy"/>
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
          </div>
          <div class="absolute inset-0 rounded-lg p-6 flex items-end">
            <div>
              <p aria-hidden="true" class="text-sm text-white">
                Semana da Engenharia
              </p>
              <h3 class="mt-1 font-semibold text-white">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  24/03
                </a>
              </h3>
            </div>
          </div>
        </div>
      </div>

      <div class="group relative h-96 bg-white rounded-lg shadow-xl">
        <div>
          <div aria-hidden="true" class="absolute inset-0 rounded-lg overflow-hidden">
            <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
              <img src="{{ asset('/campaign/2P7A3486.jpg') }}" alt="Man wearing a charcoal gray cotton t-shirt." class="w-full h-full object-center object-cover" loading="lazy"/>
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
          </div>
          <div class="absolute inset-0 rounded-lg p-6 flex items-end">
            <div>
              <p aria-hidden="true" class="text-sm text-white">
                Dia Mundial da Leitura
              </p>
              <h3 class="mt-1 font-semibold text-white">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  05/09
                </a>
              </h3>
            </div>
          </div>
        </div>
      </div>

      <div class="group relative h-96 bg-white rounded-lg shadow-xl">
        <div>
          <div aria-hidden="true" class="absolute inset-0 rounded-lg overflow-hidden">
            <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
              <img src="{{ asset('/campaign/2P7A3530.jpg') }}" alt="Person sitting at a wooden desk with paper note organizer, pencil and tablet." class="w-full h-full object-center object-cover" loading="lazy"/>
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
          </div>
          <div class="absolute inset-0 rounded-lg p-6 flex items-end">
            <div>
              <p aria-hidden="true" class="text-sm text-white">
                Concurso Universitário de Programação
              </p>
              <h3 class="mt-1 font-semibold text-white">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  09/11
                </a>
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<br>
<br>
