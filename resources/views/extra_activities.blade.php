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
            <span class="block xl:inline">Actividades</span>
            <span class="block text-isptec xl:inline">Extracurriculares</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/IMG_8561.jpg') }}" alt="" loading="lazy"/>
  </div>
</div>


<div class="py-16 bg-gray-50 overflow-hidden lg:py-24">
  <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
    <svg class="hidden lg:block absolute left-full transform -translate-x-1/2 -translate-y-1/4" width="404" height="784" fill="none" viewBox="0 0 404 784" aria-hidden="true">
      <defs>
        <pattern id="b1e6e422-73f8-40a6-b5d9-c8586e37e0e7" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="784" fill="url(#b1e6e422-73f8-40a6-b5d9-c8586e37e0e7)" />
    </svg>

    <div class="relative">
      <h2 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        Fora das salas de aulas
      </h2>
      <p class="mt-4 max-w-3xl mx-auto text-xl text-gray-500 text-justify">
      As actividades extracurriculares visam o enriquecimento curricular e propõem estimular o desenvolvimento das dimensões físicas e cognitivas dos membros da comunidade académica, através de novas experiências de aprendizagens que possibilitam desenvolver habilidades para além do processo tradicional de ensino e aprendizagem.
      </p>
    </div>

    <div class="relative mt-12 lg:mt-24 lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
      <div class="relative">
        <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight sm:text-3xl">
          Desporto
        </h3>
        <p class="leading-relaxed text-gray-600 mt-2 text-justify">
            Fazendo jus a formação diferenciada, o ISPTEC reconhece a importância da actividade física para o desenvolvimento integral do cidadão, visto que esta prática promove valores como o fair play, igualdade, honestidade, excelência, compromisso, coragem, trabalho em equipa, o respeito pelas regras e leis, lealdade, respeito por si próprio e outros participantes, o espírito de comunidade e solidariedade sendo estes elementos fundamentais para vida social.
            </p>
            <p class="leading-relaxed text-gray-600 mt-2 text-justify">
            A actividade desportiva no ISPTEC está dotada de um carácter inequivocamente educativo e formativo, pelo que constitui-se como um elemento significativo de experiência do associativismo estudantil, profissional e de integração em grupos onde é respeitado e aceite a convivência na diversidade
            </p>
            <p class="leading-relaxed text-gray-600 mt-2 text-justify">
            Nesta área dispomos de um Pavilhão Polidesportivo integrando campo multiuso, ginásio e piscina.
            </p>
            <p class="leading-relaxed text-gray-600 mt-2 text-justify">
            O ISPTEC tem uma prática regular das seguintes modalidades:
            </p>
            <ul class="list-disc list-inside">
            <li class="text-gray-600">Futsal masculino e feminino</li>
            <li class="text-gray-600">Basquetebol Masculino</li>
            <li class="text-gray-600">Andebol masculino e feminino</li>
            <li class="text-gray-600">Xadrez masculino e feminino</li>
            <li class="text-gray-600">Capoeira</li>
            </ul>
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
        <img class="relative mx-auto rounded-full" width="490" src="{{ asset('/campaign/IMG_8448.jpg') }}" alt="" loading="lazy"/>
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

    <div class="relative mt-12 sm:mt-16 lg:mt-24">
      <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-8 lg:items-center">
        <div class="lg:col-start-2">
          <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight sm:text-3xl">
            Cultura
          </h3>
          <p class="leading-relaxed text-gray-600 mt-2 text-justify">
            O ISPTEC dispõe de capital humano, infraestruturas e equipamentos que ajudam a promover iniciativas culturais em articulação com o processo de ensino. Neste particular, os estudantes têm dinamizado actividades tais como:
            </p>
            <ul class="list-disc list-inside">
            <li class="text-gray-600">Palestras, Workshops e Debates</li>
            <li class="text-gray-600">Feira do Livro</li>
            <li class="text-gray-600">Canto e Dança</li>
            <li class="text-gray-600">Teatro e Poesia</li>
            <li class="text-gray-600">Outros Eventos Temáticos Culturais</li>
            </ul>

          
        </div>

        <div class="mt-10 -mx-4 relative lg:mt-0 lg:col-start-1">
          <svg class="absolute left-1/2 transform -translate-x-1/2 translate-y-16 lg:hidden" width="784" height="404" fill="none" viewBox="0 0 784 404" aria-hidden="true">
            <defs>
              <pattern id="e80155a9-dfde-425a-b5ea-1f6fadd20131" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
              </pattern>
            </defs>
            <rect width="784" height="404" fill="url(#e80155a9-dfde-425a-b5ea-1f6fadd20131)" />
          </svg>
          <img class="relative mx-auto rounded-full" width="490" src="{{ asset('/campaign/_DSR3022.jpg') }}" alt="" loading="lazy"/>
        </div>
      </div>
    </div>

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
        <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight sm:text-3xl">
        Associação dos Estudantes do ISPTEC (AEISPTEC)
        </h3>
        <p class="leading-relaxed text-gray-600 mt-2 text-justify">
            No ISPTEC, o movimento associativo estudantil é uma realidade e por via deste mecanismo os estudantes participam de forma directa na gestão da Instituição. O Departamento de Acção Social, tem sido um interlocutor e parceiros dos Estudantes na consecução das suas actividades.
            </p>
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
        <img class="relative mx-auto rounded-full" width="490" src="{{ asset('/campaign/2P7A2111.jpg') }}" alt="" loading="lazy"/>
      </div>
    </div>
  </div>
</div>

@endsection

@section('footer_scripts')

@endsection