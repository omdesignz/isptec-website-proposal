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
            <span class="block xl:inline">Histórico</span>
            <span class="block text-isptec xl:inline"></span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/2P7A3569.jpg') }}" alt="" loading="lazy"/>
  </div>
</div>

<div class="max-w-xl mx-auto px-6 py-6">
<div class="flow-root">
  <ul role="list" class="-mb-8">
    <li>
      <div class="relative pb-8">
        
        <div class="relative flex space-x-3">
          <div>
            <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
          </div>
          <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
            <div>
              <p class="text-sm text-gray-500 font-bold">Início do Projecto de Construção da UTEC</p>
              <p class="text-sm text-gray-500 text-justify">
              O ISPTEC nasce em Fevereiro de 2005, com o inicío do projecto da construção das instalações da Universidade de Tecnologias e Ciências (UTEC) como iniciativa da Sonangol, de criar uma universidade com qualidade nos seus processos académicos, pedagógicos e administrativos. Houve avanço na construção das instalações físicas, destacando-se os edifícios administrativos, de ensino, laboratórios e um complexo desportivo.
              </p>
            </div>
            <div class="text-right text-sm whitespace-nowrap text-gray-500 font-bold">
              <time datetime="2005-02">Fev 2005</time>
            </div>
          </div>
        </div>
      </div>
    </li>

    <li>
      <div class="relative pb-8">
        
        <div class="relative flex space-x-3">
          <div>
            <span class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            </span>
          </div>
          <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
            <div>
              <p class="text-sm text-gray-500 font-bold">Criação da Promotora PDA</p>
              <p class="text-sm text-gray-500 text-justify">
              Em Março de 2008, foi criada a PDA – Pessoas, Desenvolvimento e Associados, S.A, como promotora do Instituto Superior Politécnico de Tecnologias e Ciências (ISPTEC) com a responsabilidade de garantir o desenvolvimento integral da instituição e assegurar o seu financiamento.
              </p>
            </div>
            <div class="text-right text-sm whitespace-nowrap text-gray-500 font-bold">
              <time datetime="2008-03">Mar 2008</time>
            </div>
          </div>
        </div>
      </div>
    </li>

    <li>
      <div class="relative pb-8">
        
        <div class="relative flex space-x-3">
          <div>
            <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            </span>
          </div>
          <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
            <div>
              <p class="text-sm text-gray-500 font-bold">Decreto Executivo nº 111/11 Autorização a Criação do ISPTEC</p>
              <p class="text-sm text-gray-500 text-justify">
              A 5 de Agosto de 2011, considerando as duas áreas de saber a implementar ao invés de quatro para preencher os requisitos previsto na legislação para criação de uma Universidade, o Conselho de Ministros aprovou, através do Decreto Executivo nº 111/11, a criação do Instituto Superior Politécnico de Tecnologia e Ciências (ISPTEC).
              </p>
            </div>
            <div class="text-right text-sm whitespace-nowrap text-gray-500 font-bold">
              <time datetime="2011-08">Ago 2011</time>
            </div>
          </div>
        </div>
      </div>
    </li>

    <li>
      <div class="relative pb-8">
        
        <div class="relative flex space-x-3">
          <div>
            <span class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            </span>
          </div>
          <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
            <div>
              <p class="text-sm text-gray-500 font-bold">Início das Actividades Académicas</p>
              <p class="text-sm text-gray-500 text-justify">
              Em Março de 2012, iniciaram as actividades académicas no ISPTEC com a oferta de seis cursos de Engenharia (Mecânica, Civil, Eletrotécnica, Informática, Química e Produção Industrial) e dois cursos das áreas das Ciências Sociais Aplicadas (Economia e Gestão) nos turnos da manhã, tarde e noite.
              </p>
            </div>
            <div class="text-right text-sm whitespace-nowrap text-gray-500 font-bold">
              <time datetime="2012-03">Mar 2012</time>
            </div>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>
</div>
@endsection

@section('footer_scripts')

@endsection