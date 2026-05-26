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
            <span class="block xl:inline">Elaboração de</span>
            <span class="block text-isptec xl:inline">Projectos</span>
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

<div class="py-16 bg-gray-50 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 space-y-8 sm:px-6 lg:px-8">
    <div class="text-base max-w-prose mx-auto lg:max-w-none">
      <h2 class="text-base text-isptec font-semibold tracking-wide uppercase">GUIA</h2>
      {{-- <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Programa</p> --}}
    </div>
    <div class="relative z-10 text-base max-w-prose mx-auto lg:max-w-5xl lg:mx-0 lg:pr-72">
      <p class="text-lg text-gray-500">A procura de conhecimento é intrínseco aos seres humanos, mas por vezes a transmissão das ideias pode não ser bem compreendida. As ideias têm de ser transmitidas de forma clara, para que possam ser devidamente desenvolvidas e maturadas de modo a se transformarem em projectos exequíveis. É incontroverso admitir que a execução bem sucedida de projectos, desde os mais elementares aos mais complexos, contribui inequivocamente para o incremento do conhecimento.</p>
    </div>
    <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-start">
      <div class="relative z-10">
        <div class="prose prose-indigo text-gray-500 mx-auto lg:max-w-none">
        <p class="mt-4 text-lg leading-6 text-gray-500 text-justify">
            As candidaturas a Projectos de Investigação Científica integram o conjunto das actividades desenvolvidas por todos os Professores Universitários e, na verdade, não existe um modelo universal para a estruturação e apresentação de projectos científicos. De um modo geral, um Projecto de Investigação Científica deve ser escrito de forma suficientemente convincente para despoletar o interesse de um potencial financiador ou avaliador. Estes intervenientes, deverão ser convencidos que a ideia ou a área temática que originou a escrita do projecto é consistente, inovadora e tem potencial de exploração. Neste contexto, a proposta deve não só explicitar claramente os seus vectores de diferenciação face ao Estado-da-Arte vigente, mas também enfatizar os principais objectivos a alcançar, os impactos expectáveis, como por exemplo as aplicações específicas da tecnologia no mercado, e as estratégias adoptadas para promover a sua implementação.
        </p>
          

          <p class="mt-4 text-lg leading-6 text-gray-500 text-justify">
            Nesta fase, o documento ora apresentado tem como principal objectivo funcionar como um “instrumento” de apoio à estruturação e escrita de Projectos de Investigação Científica a serem submetidos e eventualmente executados por docentes/investigadores do Instituto Superior Politécnico de Tecnologias e Ciências (ISPTEC). O documento não pretende, de modo algum, ser rígido e por conseguinte é passível de ser sujeito a um elenco de alterações que contribuam para o seu processo de optimização. Com efeito, importa referir que em alguns organismos públicos e/ou privados, podem existir estruturas e metodologias diferentes para a apresentação de Projectos de Investigação Científica. Neste contexto, o actual documento pretende apenas ser de carácter informativo.
          </p>
        </div>
        
      </div>
      <div class="mt-12 relative text-base max-w-prose mx-auto lg:mt-0 lg:max-w-none">
        <svg class="absolute top-0 right-0 -mt-20 -mr-20 lg:top-auto lg:right-auto lg:bottom-1/2 lg:left-1/2 lg:mt-0 lg:mr-0 xl:top-0 xl:right-0 xl:-mt-20 xl:-mr-20" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
          <defs>
            <pattern id="bedc54bc-7371-44a2-a2bc-dc68d819ae60" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
              <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
            </pattern>
          </defs>
          <rect width="404" height="384" fill="url(#bedc54bc-7371-44a2-a2bc-dc68d819ae60)" />
        </svg>
        <img class="rounded-full" src="{{ asset('/campaign/2P7A2115.jpg') }}" alt="" loading="lazy"/>
          
      </div>
    </div>
  </div>
</div>


@endsection

@section('footer_scripts')

@endsection