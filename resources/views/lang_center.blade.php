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
            <span class="block xl:inline">Centro de Ensino de</span>
            <span class="block text-isptec xl:inline">Línguas</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/lang_center.jpeg') }}" alt="" loading="lazy"/>
  </div>
</div>

<div class="py-8 bg-gray-50 overflow-hidden lg:py-8">
    <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
      <svg class="hidden lg:block absolute left-full transform -translate-x-1/2 -translate-y-1/4" width="404" height="784" fill="none" viewBox="0 0 404 784" aria-hidden="true">
        <defs>
          <pattern id="b1e6e422-73f8-40a6-b5d9-c8586e37e0e7" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="784" fill="url(#b1e6e422-73f8-40a6-b5d9-c8586e37e0e7)" />
      </svg>
  
      <div class="relative mt-12 lg:mt-24 lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
        <div class="relative">
          <p class="mt-3 text-lg text-gray-500 text-justify">O Centro de Ensino de Línguas ministra formações corporativas que visam desenvolver as competências linguísticas essenciais para a obtenção de sucesso no mundo empresarial. As referidas formações abordam os conteúdos programáticos alinhados com o Quadro Europeu Comum de Referência para as Línguas (QECR) e são desenhadas especificamente conforme os interesses das empresas interessada permitindo, entre outras alternativas, oferecer as seguintes modalidades:</p>
  
          <dl class="mt-10 space-y-10">
            <div class="relative">
              <dt>
                <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-isptec text-white">
                  <!-- Heroicon name: outline/globe-alt -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                {{-- <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Linhas de Investigação</p> --}}
              </dt>
              <dd class="mt-2 ml-16 text-base text-gray-500 py-2">Formação corporativa individual dentro ou fora das instalações do ISPTEC</dd>
            </div>
  
            <div class="relative">
              <dt>
                <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-isptec text-white">
                  <!-- Heroicon name: outline/scale -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                {{-- <p class="ml-16 text-lg leading-6 font-medium text-gray-900">No hidden fees</p> --}}
              </dt>
              <dd class="mt-2 ml-16 text-base text-gray-500 py-2">Formação corporativa em grupos dentro ou fora das instalações do ISPTEC

            </dd>
            </div>
  
            <div class="relative">
              <dt>
                <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-isptec text-white">
                  <!-- Heroicon name: outline/lightning-bolt -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                {{-- <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Transfers are instant</p> --}}
              </dt>
              <dd class="mt-2 ml-16 text-base text-gray-500 py-2">Inclusão dos colaboradores em turmas regulares dentro das instalações do ISPTEC em horários variados</dd>
            </div>

            <div class="relative">
                <dt>
                  <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-isptec text-white">
                    <!-- Heroicon name: outline/lightning-bolt -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  {{-- <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Transfers are instant</p> --}}
                </dt>
                <dd class="mt-2 ml-16 text-base text-gray-500 py-2">Cursos preparatórios para os exames mais comuns de proficiência em língua inglesa (TOEFL, IELTS, KET, PET, FCE e CAE) baseados em estratégias específicas para os níveis pretendidos</dd>
              </div>

          </dl>
          <div class="relative">
            <p class="mt-3 text-lg text-gray-500 text-justify">O CEL também oferece serviços de tradução e interpretação de qualidade com rapidez voltados para a plena satisfação dos clientes, mantendo sigilo sobre o conteúdo dos projectos e um programa de formação em língua portuguesa para estrangeiros que tem como suporte teórico o programa de Ensino Português no Estrangeiro elaborado pela Direcção de Serviços de Língua e Cultura (DSLC) do Ministério dos Negócios Estrangeiros de Portugal.</p>
          </div>
        </div>
  
        <div class="mt-10 -mx-4 relative lg:mt-0" aria-hidden="true">
          <svg class="absolute left-1/2 transform -translate-x-1/2 translate-y-16 lg:hidden" width="784" height="404" fill="none" viewBox="0 0 784 404">
            <defs>
              <pattern id="ca9667ae-9f92-4be7-abcb-9e3d727f2941" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
              </pattern>
            </defs>
            <rect width="784" height="404" fill="url(#ca9667ae-9f92-4be7-abcb-9e3d727f2941)" />
          </svg>
          <img class="relative mx-auto border rounded-full" width="490" src="{{ asset('/campaign/lang_book.jpeg') }}" alt="" loading="lazy"/>
        </div>
      </div>
  
      <svg class="hidden lg:block absolute right-full transform translate-x-1/2 translate-y-12" width="404" height="784" fill="none" viewBox="0 0 404 784" aria-hidden="true">
        <defs>
          <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="784" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)" />
      </svg>
  
    </div>
  </div>


@endsection

@section('footer_scripts')

@endsection