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
            <span class="block xl:inline">Programas de</span>
            <span class="block text-isptec xl:inline">Investigação</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/2P7A2250.jpg') }}" alt="" loading="lazy"/>
  </div>
</div>

<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="lg:text-center">
        
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          Programas Diferenciados
        </p>
        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
          Com os programas disponíveis, <b>AUMENTAMOS</b> o seu conhecimento.
        </p>
      </div>
  
      <div class="mt-10">
        <svg class="hidden lg:block absolute left-full transform -translate-x-1/2 -translate-y-1/4 opacity-50" width="404" height="784" fill="none" viewBox="0 0 404 784" aria-hidden="true">
          <defs>
            <pattern id="b1e6e422-73f8-40a6-b5d9-c8586e37e0e7" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
              <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
            </pattern>
          </defs>
          <rect width="404" height="784" fill="url(#b1e6e422-73f8-40a6-b5d9-c8586e37e0e7)" />
        </svg>
        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
          <div class="relative">
            <dt>
              <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-isptec text-white">
                <!-- Heroicon name: outline/globe-alt -->
                
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                  </svg>
              </div>
              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Cíclos de Palestras</p>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500 text-justify">O Ciclo de Palestras do ISPTEC, constitui uma sequência periódica de palestras onde o palestrante concorda em expor aos ouvintes o seu conhecimento científico, a sua experiência profissional ou a sua concepção sobre um determinado assunto. Poderão participar como palestrantes do Ciclo de Palestras todos os docentes/investigadores do ISPTEC, os docentes/investigadores de instituições de ensino superior externas, cujo trabalho de investigação científica seja relevante, bem como todas as personalidades da comunidade externa às quais lhes seja reconhecido mérito de natureza profissional, cultural e científico ou que se tenham destacado pelos seus positivos contributos para o desenvolvimento da economia e da sociedade angolana.</dd>
          </div>
  
          <div class="relative">
            <dt>
              <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-isptec text-white">
                <!-- Heroicon name: outline/scale -->
                
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                  </svg>
              </div>
              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Prémio Inovação</p>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500 text-justify">O Prémio Ideias Criativas é um concurso de ideias promovido pelo Instituto Superior Politécnico de Tecnologias e Ciências (ISPTEC), que visa estimular o desenvolvimento de ideias criativas no seio da Comunidade Académica do ISPTEC.</dd>
          </div>
  
          <div class="relative">
            <dt>
              <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-isptec text-white">
                <!-- Heroicon name: outline/lightning-bolt -->
                
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>
              </div>
              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Jornadas Científicas e Tecnológicas</p>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500 text-justify"></dd>
          </div>
  
          
        </dl>
      </div>
    </div>
  </div>



@endsection

@section('footer_scripts')

@endsection