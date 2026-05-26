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
            <span class="block xl:inline">Apresentação</span>
            <span class="block text-isptec xl:inline">Institucional</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/2P7A2227.jpg') }}" alt="" loading="lazy"/>
  </div>
</div>

<div class="py-12 bg-white">
  <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class=""></h2>
    <p class="mt-4 max-w-3xl text-lg text-gray-900">
    O Instituto Superior Politécnico de Tecnologias e Ciências (ISPTEC) é uma instituição de ensino superior de direito privado que tem como promotora a Empresa Pessoas Desenvolvimento e Associados S.A. (PDA).
    </p>
    <p class="mt-4 max-w-3xl text-lg text-gray-900">
    É uma Instituição com foco na formação diferenciada, sustentada pelos princípios da indissociabilidade entre Ensino, Investigação e Desenvolvimento e Extensão, na prespectiva de formar profissionais qualificados.
    </p>
    <p class="mt-4 max-w-3xl text-lg text-gray-900">
    O ISPTEC insere-se no subsistema do Ensino Superior e é tutelado pelo Ministério do Ensino Superior da República de Angola.
    </p><br>
    <dl class="space-y-10 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-8">
      <div>
        <dt>
          <div class="flex items-center justify-center h-12 w-12 rounded-full bg-isptec text-white">
            <!-- Heroicon name: outline/globe-alt -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M12 14l9-5-9-5-9 5 9 5z" />
            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
            
          </div>
          <p class="mt-5 text-lg leading-6 font-medium text-gray-900">2940</p>
        </dt>
        <dd class="mt-2 text-base text-gray-500">
        Em 2019 o ISPTEC por curso totalizou 2.940 estudantes
        </dd>
      </div>

      <div>
        <dt>
          <div class="flex items-center justify-center h-12 w-12 rounded-full bg-isptec text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
          </div>
          <p class="mt-5 text-lg leading-6 font-medium text-gray-900">251</p>
        </dt>
        <dd class="mt-2 text-base text-gray-500">
        O ISPTEC em 2019 possui uma força de trabalho de 233 funcionários dos quais 53% são docentes
        </dd>
      </div>

      <div>
        <dt>
          <div class="flex items-center justify-center h-12 w-12 rounded-full bg-isptec text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
        </svg>
          </div>
          <p class="mt-5 text-lg leading-6 font-medium text-gray-900">123</p>
        </dt>
        <dd class="mt-2 text-base text-gray-500">
        O ISPTEC possui 123 docentes
        </dd>
      </div>
    </dl>
  </div>
</div>
@endsection

@section('footer_scripts')

@endsection