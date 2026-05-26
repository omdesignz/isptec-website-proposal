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
            <span class="block xl:inline">Acção</span>
            <span class="block text-isptec xl:inline">Social</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/2P7A3552.jpg') }}" alt="" loading="lazy"/>
  </div>
</div>

<div class="bg-gray-800">
  <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
    <div class="max-w-auto">
      <p class="mt-5 text-xl text-gray-400 text-justify">É a actuação da Instituição no âmbito da Responsabilidade Social e Ambiental em prol dos membros da comunidade académica e da sociedade em geral. Esta actuação da Instituição visa atender preocupações tanto éticas, quanto sociais.</p>
    </div>

    <div class="max-w-auto">
      <p class="mt-5 text-xl text-gray-400 text-justify">Portanto, a Acção Social no ISPTEC, significa o grau de obrigações que a instituição assume por meio de acções que protejam e melhorem o bem-estar da sociedade, proporcionando múltiplos apoios académicos e sociais para atribuição de benefícios educacionais e incentivos à formação dos estudantes e colaboradores, bem como, reforçar os serviços a serem prestados às famílias e instituições comunitárias.</p>
    </div>
    
  </div>
</div>

<div class="bg-white">
  <!-- Header -->
  <div class="relative pb-32 bg-gray-800">
    <div class="absolute inset-0">
      <img class="w-full h-full object-cover" src="{{ asset('/campaign/2P7A3491.jpg') }}" alt="" loading="lazy"/>
      <div class="absolute inset-0 bg-gray-800 mix-blend-multiply" aria-hidden="true"></div>
    </div>
    <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
      <h1 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">Programa</h1>
      <p class="mt-6 max-w-3xl text-xl text-gray-300"></p>
    </div>
  </div>

  <!-- Overlapping cards -->
  <section class="-mt-32 max-w-7xl mx-auto relative z-10 pb-32 px-4 sm:px-6 lg:px-8" aria-labelledby="contact-heading">
    <h2 class="sr-only" id="contact-heading">Ver</h2>
    <div class="grid grid-cols-1 gap-y-20 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-8">
      <div class="flex flex-col bg-white rounded-2xl shadow-xl">
        <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
          <div class="absolute top-0 p-5 inline-block bg-isptec rounded-full shadow-lg transform -translate-y-1/2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
            
          </div>
          <h3 class="text-xl font-medium text-gray-900">APOIO SOCIAL</h3>
          <p class="mt-4 text-base text-gray-500"></p>
        </div>
        <div class="p-6 bg-gray-900 rounded-bl-2xl rounded-br-2xl md:px-8">
          <a href="/help" class="text-base font-medium text-white hover:text-isptec">Ver<span aria-hidden="true"> &rarr;</span></a>
        </div>
      </div>

      <div class="flex flex-col bg-white rounded-2xl shadow-xl">
        <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
          <div class="absolute top-0 p-5 inline-block bg-isptec rounded-full shadow-lg transform -translate-y-1/2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
        </svg>
          </div>
          <h3 class="text-xl font-medium text-gray-900">ACTIVIDADES EXTRACURRICULARES</h3>
          <p class="mt-4 text-base text-gray-500"></p>
        </div>
        <div class="p-6 bg-gray-900 rounded-bl-2xl rounded-br-2xl md:px-8">
          <a href="/extra-activities" class="text-base font-medium text-white hover:text-isptec">Ver<span aria-hidden="true"> &rarr;</span></a>
        </div>
      </div>

      <div class="flex flex-col bg-white rounded-2xl shadow-xl">
        <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
          <div class="absolute top-0 p-5 inline-block bg-isptec rounded-full shadow-lg transform -translate-y-1/2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
          </div>
          <h3 class="text-xl font-medium text-gray-900">SAÚDE</h3>
          <p class="mt-4 text-base text-gray-500"></p>
        </div>
        <div class="p-6 bg-gray-900 rounded-bl-2xl rounded-br-2xl md:px-8">
          <a href="/health" class="text-base font-medium text-white hover:text-isptec">Ver<span aria-hidden="true"> &rarr;</span></a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('footer_scripts')

@endsection