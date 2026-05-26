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
            <span class="block xl:inline">JUNTOS</span>
            <span class="block text-isptec xl:inline">por Angola</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            Juntos construiremos o futuro
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="" loading="lazy"/>
  </div>
</div>



<div class="bg-white">
  <div class="container xl:max-w-7xl mx-auto px-4 py-16 lg:px-8 lg:py-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      <a href="javascript:void(0)" class="sm:col-span-2 md:col-span-1 block group relative transition ease-out active:opacity-75 overflow-hidden rounded-full">
        <img src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="Product Image" class="transform transition ease-out group-hover:scale-110 lg-rounded" loading="lazy" />
        <div class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0"></div>
        <div class="p-4 flex items-center justify-center absolute inset-0">
          <div class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-isptec">
          Laboratório
          </div>
        </div>
      </a>
      <a href="javascript:void(0)" class="block group relative transition ease-out active:opacity-75 overflow-hidden rounded-full">
        <img src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="Product Image" class="transform transition ease-out group-hover:scale-110 lg-rounded" loading="lazy" />
        <div class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0"></div>
        <div class="p-4 flex items-center justify-center absolute inset-0">
          <div class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-isptec">
            Consumíveis de Laboratório
          </div>
        </div>
      </a>
      <a href="javascript:void(0)" class="block group relative transition ease-out active:opacity-75 overflow-hidden rounded-full">
        <img src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="Product Image" class="transform transition ease-out group-hover:scale-110 lg-rounded" loading="lazy" />
        <div class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0"></div>
        <div class="p-4 flex items-center justify-center absolute inset-0">
          <div class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-isptec">
            Material de Escritório
          </div>
        </div>
      </a>
      <a href="javascript:void(0)" class="sm:col-span-2 md:col-span-1 block group relative transition ease-out active:opacity-75 overflow-hidden rounded-full">
        <img src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="Product Image" class="transform transition ease-out group-hover:scale-110 lg-rounded" loading="lazy" />
        <div class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0"></div>
        <div class="p-4 flex items-center justify-center absolute inset-0">
          <div class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-isptec">
            Equipamento de Segurança
          </div>
        </div>
      </a>
      <a href="javascript:void(0)" class="block group relative transition ease-out active:opacity-75 overflow-hidden rounded-full">
        <img src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="Product Image" class="transform transition ease-out group-hover:scale-110 lg-rounded" loading="lazy" />
        <div class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0"></div>
        <div class="p-4 flex items-center justify-center absolute inset-0">
          <div class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-isptec">
            Equipamento de Comunicação e Marketing
          </div>
        </div>
      </a>
      <a href="javascript:void(0)" class="block group relative transition ease-out active:opacity-75 overflow-hidden rounded-full">
        <img src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="Product Image" class="transform transition ease-out group-hover:scale-110 lg-rounded" loading="lazy" />
        <div class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0"></div>
        <div class="p-4 flex items-center justify-center absolute inset-0">
          <div class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-isptec">
            Material Informático
          </div>
        </div>
      </a>

      <a href="javascript:void(0)" class="block group relative transition ease-out active:opacity-75 overflow-hidden rounded-full">
        <img src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="Product Image" class="transform transition ease-out group-hover:scale-110 lg-rounded" loading="lazy" />
        <div class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0"></div>
        <div class="p-4 flex items-center justify-center absolute inset-0">
          <div class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-isptec">
            Mobiliário
          </div>
        </div>
      </a>
      <a href="javascript:void(0)" class="block group relative transition ease-out active:opacity-75 overflow-hidden rounded-full">
        <img src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="Product Image" class="transform transition ease-out group-hover:scale-110 lg-rounded" loading="lazy" />
        <div class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0"></div>
        <div class="p-4 flex items-center justify-center absolute inset-0">
          <div class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-isptec">
            Softwares
          </div>
        </div>
      </a>
      <a href="javascript:void(0)" class="block group relative transition ease-out active:opacity-75 overflow-hidden rounded-full">
        <img src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="Product Image" class="transform transition ease-out group-hover:scale-110 lg-rounded" loading="lazy" />
        <div class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0"></div>
        <div class="p-4 flex items-center justify-center absolute inset-0">
          <div class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-isptec">
            Viaturas
          </div>
        </div>
      </a>
      <a href="javascript:void(0)" class="block group relative transition ease-out active:opacity-75 overflow-hidden rounded-full">
        <img src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="Product Image" class="transform transition ease-out group-hover:scale-110 lg-rounded" loading="lazy" />
        <div class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0"></div>
        <div class="p-4 flex items-center justify-center absolute inset-0">
          <div class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-isptec">
            Formação
          </div>
        </div>
      </a>
      
      <a href="javascript:void(0)" class="block group relative transition ease-out active:opacity-75 overflow-hidden rounded-full">
        <img src="{{ asset('/campaign/2P7A7681.jpg') }}" alt="Product Image" class="transform transition ease-out group-hover:scale-110 lg-rounded" loading="lazy" />
        <div class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0"></div>
        <div class="p-4 flex items-center justify-center absolute inset-0">
          <div class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-isptec">
            Diversos
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

@endsection

@section('footer_scripts')

@endsection