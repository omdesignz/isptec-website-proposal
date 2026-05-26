@extends('layouts.front')

@section('content')
<div class="relative bg-white overflow-hidden">
  <div class="max-w-7xl mx-auto">
    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
      <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
        <polygon points="50,0 100,0 50,100 0,100" />
      </svg>

      <div>
        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
          
        </div>
      </div>

      <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left animate-fade-in-down">
          <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Laboratórios</span>
            <span class="block text-isptec xl:inline">ISPTEC</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 text-justify">
          Os Laboratórios Profissionalizantes do ISPTEC prestam serviços de elevada qualidade técnica e científica, suportados por tecnologia de última geração.
          </p>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 text-justify">
          Complementam e potenciam a actividade do ISPTEC na sua contribuição para o desenvolvimento e modernização do País através da formação superior de profissionais altamente qualificados nas áreas das engenharias de Petróleo, Geofísica, Mecânica, Civil, Eléctrica, Electrónica, Química e Tecnologias de Informação e Comunicação (TICs).  

          </p>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 text-justify">
          Os Laboratórios do ISPTEC desenvolvem a sua actividade nas vertentes: Ensino, Investigação Científica e Extensão

          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/2P7A7674.jpg') }}" alt="" loading="lazy"/>
  </div>
</div>

<!-- Product List Section: Products Card List -->
<div class="bg-white">
  <div class="container xl:max-w-7xl mx-auto px-4 py-16 lg:px-8 lg:py-3">

    <!-- Products -->
    <div class="grid grid-cols-1 gap-4 lg:gap-8">
      <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="p-5 lg:p-6 flex-grow w-full flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
          <div class="flex-none md:w-64">
            <img src="{{ asset('/campaign/20181119_122744.jpeg') }}" alt="Product Image" class="rounded-lg" loading="lazy" />
          </div>
          <div class="flex-grow">
            <div class="uppercase text-isptec tracking-wide text-sm font-semibold">
              Unidade Laboratorial
            </div>
            <a href="javascript:void(0)" class="block font-semibold md:text-lg text-gray-600 hover:text-gray-500">
              Mecânica
            </a>
            
            <p class="leading-relaxed text-gray-600 mt-2 text-justify">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien.
            </p>
            <div class="mt-10 pb-12 bg-white sm:pb-16">
              <div class="relative">
                <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="max-w-4xl mx-auto">
                    <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                      <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                          Labs
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          16
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                        Ofertas de Cursos de Curta Duração
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          +10
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                        Técnicos Dedicados
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          9
                        </dd>
                      </div>
                    </dl>
                  </div>
                </div>
              </div>
            </div>

          </div>
          
        </div>
      </div>
      <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="p-5 lg:p-6 flex-grow w-full flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
          <div class="flex-none md:w-64">
            <img src="{{ asset('/campaign/2P7A7739.jpg') }}" alt="Product Image" class="rounded-lg" loading="lazy" />
          </div>
          <div class="flex-grow">
            <div class="uppercase text-isptec tracking-wide text-sm font-semibold">
              Unidade Laboratorial
            </div>
            <a href="javascript:void(0)" class="block font-semibold md:text-lg text-gray-600 hover:text-gray-500">
              Química
            </a>
            
            <p class="leading-relaxed text-gray-600 mt-2 text-justify">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien.
            </p>

            <div class="mt-10 pb-12 bg-white sm:pb-16">
              <div class="relative">
                <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="max-w-4xl mx-auto">
                    <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                      <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                          Labs
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          4
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                        Ofertas de Cursos de Curta Duração
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          +2
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                        Técnicos Dedicados
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          9
                        </dd>
                      </div>
                    </dl>
                  </div>
                </div>
              </div>
            </div>

          </div>
          
        </div>
      </div>
      <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="p-5 lg:p-6 flex-grow w-full flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
          <div class="flex-none md:w-64">
            <img src="{{ asset('/campaign/2P7A7702.jpg') }}" alt="Product Image" class="rounded-lg" loading="lazy" />
          </div>
          <div class="flex-grow">
            <div class="uppercase text-isptec tracking-wide text-sm font-semibold">
              Unidade Laboratorial
            </div>
            <a href="javascript:void(0)" class="block font-semibold md:text-lg text-gray-600 hover:text-gray-500">
              Civil
            </a>
            
            <p class="leading-relaxed text-gray-600 mt-2 text-justify">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien.
            </p>

            <div class="mt-10 pb-12 bg-white sm:pb-16">
              <div class="relative">
                <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="max-w-4xl mx-auto">
                    <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                      <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                          Labs
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          7
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                        Ofertas de Cursos de Curta Duração
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          +5
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                        Técnicos Dedicados
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          4
                        </dd>
                      </div>
                    </dl>
                  </div>
                </div>
              </div>
            </div>

          </div>
          
        </div>
      </div>
      <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="p-5 lg:p-6 flex-grow w-full flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
          <div class="flex-none md:w-64">
            <img src="{{ asset('/campaign/2P7A3526.jpg') }}" alt="Product Image" class="rounded-lg" loading="lazy" />
          </div>
          <div class="flex-grow">
            <div class="uppercase text-isptec tracking-wide text-sm font-semibold">
              Unidade Laboratorial
            </div>
            <a href="javascript:void(0)" class="block font-semibold md:text-lg text-gray-600 hover:text-gray-500">
              TICs
            </a>
            
            <p class="leading-relaxed text-gray-600 mt-2 text-justify">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien.
            </p>

            <div class="mt-10 pb-12 bg-white sm:pb-16">
              <div class="relative">
                <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="max-w-4xl mx-auto">
                    <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                      <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                          Labs
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          3
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                        Ofertas de Cursos de Curta Duração
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          +5
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                        Técnicos Dedicados
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          2
                        </dd>
                      </div>
                    </dl>
                  </div>
                </div>
              </div>
            </div>

          </div>
          
        </div>
      </div>
      <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="p-5 lg:p-6 flex-grow w-full flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
          <div class="flex-none md:w-64">
            <img src="{{ asset('/campaign/20181119_122343.jpeg') }}" alt="Product Image" class="rounded-lg" loading="lazy" />
          </div>
          <div class="flex-grow">
            <div class="uppercase text-isptec tracking-wide text-sm font-semibold">
              Unidade Laboratorial
            </div>
            <a href="javascript:void(0)" class="block font-semibold md:text-lg text-gray-600 hover:text-gray-500">
              Eléctrica
            </a>
            
            <p class="leading-relaxed text-gray-600 mt-2 text-justify">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien.
            </p>

            <div class="mt-10 pb-12 bg-white sm:pb-16">
              <div class="relative">
                <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="max-w-4xl mx-auto">
                    <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                      <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                          Labs
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          7
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                        Ofertas de Cursos de Curta Duração
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          +5
                        </dd>
                      </div>
                      <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                        Técnicos Dedicados
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-gray-600">
                          4
                        </dd>
                      </div>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>
    <!-- END Products -->

    <hr class="my-10" />
  </div>
</div>
<!-- END Product List Section: Products Card List -->
@endsection

@section('footer_scripts')

@endsection