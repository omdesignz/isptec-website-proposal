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
            <span class="block xl:inline">Mantenha-se</span>
            <span class="block text-isptec xl:inline">Actualizado</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/2P7A2089.jpg') }}" alt="" loading="lazy"/>
  </div>
</div>


<div class="bg-white pt-2 pb-20 px-4 sm:px-6 lg:pt-4 lg:pb-12 lg:px-8">
  <div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 lg:max-w-7xl">
    <div>
      <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl animate__animated animate__fadeInLeft">
        Notícias Recentes
      </h2>
      <p class="mt-3 text-xl text-gray-500 sm:mt-4">
        Esteja actualizado sobre os acontecimentos da nossa instituição
      </p>
    </div>
    <div class="mt-12 grid gap-16 pt-12 lg:grid-cols-3 lg:gap-x-5 lg:gap-y-12">
        
    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
        <div class="flex-shrink-0">
          <img class="h-48 w-full object-cover" src="{{ asset('/campaign/2P7A2143.jpg') }}" alt="" loading="lazy"/>
        </div>
        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="#" class="hover:underline">
                <!-- Video -->
              </a>
            </p>
            <a href="/news-single" class="block mt-2">
              <p class="text-xl font-semibold text-gray-900">
              ARTIGO DE PROFESSORES DO ISPTEC EM REVISTA CIENTÍFICA INTERNACIONAL
              </p>
              <p class="mt-3 text-base text-gray-500 text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo laudantium.
              </p>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            
          </div>
        </div>
    </div>

    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
        <div class="flex-shrink-0">
          <img class="h-48 w-full object-cover" src="{{ asset('/campaign/2P7A7752.jpg') }}" alt="" loading="lazy"/>
        </div>
        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="#" class="hover:underline">
                <!-- Video -->
              </a>
            </p>
            <a href="/news-single" class="block mt-2">
              <p class="text-xl font-semibold text-gray-900">
              ISPTEC REALIZA A CERIMÓNIA OFICIAL DE ABERTURA DO ANO ACADÉMICO 2021-2022
              </p>
              <p class="mt-3 text-base text-gray-500 text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo laudantium.
              </p>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            
          </div>
        </div>
    </div>

    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
        <div class="flex-shrink-0">
          <img class="h-48 w-full object-cover" src="{{ asset('/campaign/2P7A7793.jpg') }}" alt="" loading="lazy"/>
        </div>
        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="#" class="hover:underline">
                <!-- Video -->
              </a>
            </p>
            <a href="/news-single" class="block mt-2">
              <p class="text-xl font-semibold text-gray-900">
              ESTUDANTES DO ISPTEC VENCEM CONCURSO DA COMISSÃO DE MERCADO DE CAPITAIS
              </p>
              <p class="mt-3 text-base text-gray-500 text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo laudantium.
              </p>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            
          </div>
        </div>
    </div>


    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
        <div class="flex-shrink-0">
          <img class="h-48 w-full object-cover" src="{{ asset('/campaign/2P7A2143.jpg') }}" alt="" loading="lazy"/>
        </div>
        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="#" class="hover:underline">
                <!-- Video -->
              </a>
            </p>
            <a href="/news-single" class="block mt-2">
              <p class="text-xl font-semibold text-gray-900">
              ARTIGO DE PROFESSORES DO ISPTEC EM REVISTA CIENTÍFICA INTERNACIONAL
              </p>
              <p class="mt-3 text-base text-gray-500 text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo laudantium.
              </p>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            
          </div>
        </div>
    </div>

    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
        <div class="flex-shrink-0">
          <img class="h-48 w-full object-cover" src="{{ asset('/campaign/2P7A7752.jpg') }}" alt="" loading="lazy"/>
        </div>
        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="#" class="hover:underline">
                <!-- Video -->
              </a>
            </p>
            <a href="/news-single" class="block mt-2">
              <p class="text-xl font-semibold text-gray-900">
              ISPTEC REALIZA A CERIMÓNIA OFICIAL DE ABERTURA DO ANO ACADÉMICO 2021-2022
              </p>
              <p class="mt-3 text-base text-gray-500 text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo laudantium.
              </p>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            
          </div>
        </div>
    </div>

    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
        <div class="flex-shrink-0">
          <img class="h-48 w-full object-cover" src="{{ asset('/campaign/2P7A7793.jpg') }}" alt="" loading="lazy"/>
        </div>
        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="#" class="hover:underline">
                <!-- Video -->
              </a>
            </p>
            <a href="/news-single" class="block mt-2">
              <p class="text-xl font-semibold text-gray-900">
              ESTUDANTES DO ISPTEC VENCEM CONCURSO DA COMISSÃO DE MERCADO DE CAPITAIS
              </p>
              <p class="mt-3 text-base text-gray-500 text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo laudantium.
              </p>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            
          </div>
        </div>
    </div>

      
    </div>
  </div>
</div>
@endsection