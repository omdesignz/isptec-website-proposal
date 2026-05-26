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
            <span class="block xl:inline">DET</span>
            <span class="block text-isptec xl:inline">Departamento de Engenharias e Tecnologias</span>
          </h1>
          <p class="mt-3 text-justify text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
          O Departamento de Engenharias e Tecnologias – DET, é responsável pela oferta de disciplinas nos cursos de Engenharia química, engenharia civil, engenharia mecânica, engenharia de produção industrial, engenharia informática e engenharia electrotécnica. Deste Departamento, fazem parte as Unidades Laboratoriais dedicadas ao desenvolvimento de actividades académicas e de investigação relacionadas com os respectivos cursos.
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/2P7A3526.jpg') }}" alt="" loading="lazy"/>
  </div>
</div>
<br>
<div class="relative bg-white">
  <div class="h-56 bg-white sm:h-72 lg:absolute lg:left-0 lg:h-full lg:w-1/2">
    <img class="w-full h-full object-cover rounded-3xl" src="{{ asset('/campaign/2P7A7762.jpg') }}" alt="Support team" loading="lazy"/>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 py-8 sm:py-12 sm:px-6 lg:py-16">
    <div class="max-w-2xl mx-auto lg:max-w-none lg:mr-0 lg:ml-auto lg:w-1/2 lg:pl-10">
      
      <h2 class="mt-6 text-3xl font-extrabold text-gray-900 sm:text-4xl">
      Engenharia Química
      </h2>
      <p class="mt-6 text-lg text-gray-500 text-justify">
      Formar profissionais com capacidade para desenvolver processos, em escala industrial, através da transformação da matéria-prima em produtos, utilizando operações físicas, químicas e biológicas. O profissional de Engenharia Química actuará nas empresas alimentares, papel e celulose, combustíveis, petroquímica e seus derivados tais como plásticos e produtos químicos, cosméticos, cerâmica, produtos têxteis, bebidas, vidros, entre outros.
      </p>
      <div class="mt-8 overflow-hidden">
        <dl class="-mx-8 -mt-8 flex flex-wrap">
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Duração
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              5 Anos
            </dd>
          </div>
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Grau
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              Licenciatura
            </dd>
          </div>
          
        </dl>
      </div>
    </div>
  </div>
</div>
<hr class="m-2">
<div class="relative bg-white">
  <div class="h-56 bg-white sm:h-72 lg:absolute lg:left-0 lg:h-full lg:w-1/2">
    <img class="w-full h-full object-cover rounded-3xl" src="{{ asset('/campaign/2P7A2203.jpg') }}" alt="Support team" loading="lazy"/>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 py-8 sm:py-12 sm:px-6 lg:py-16">
    <div class="max-w-2xl mx-auto lg:max-w-none lg:mr-0 lg:ml-auto lg:w-1/2 lg:pl-10">
      
      <h2 class="mt-6 text-3xl font-extrabold text-gray-900 sm:text-4xl">
      Engenharia Civil
      </h2>
      <p class="mt-6 text-lg text-gray-500 text-justify">
      Formar profissionais com capacitação para actuar em projectos, execução, gerenciamento, planeamento, administração de empreendimentos na área de Engenharia Civil. O curso tem como objectivo a formação de um Engenheiro Civil pluralista em seus conhecimentos, capacitando-o a desenvolver uma actividade eclética no campo da produção, aplicação, pesquisa e desenvolvimento gerencial de obras civis.
      </p>
      <div class="mt-8 overflow-hidden">
        <dl class="-mx-8 -mt-8 flex flex-wrap">
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Duração
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              5 Anos
            </dd>
          </div>
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Grau
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              Licenciatura
            </dd>
          </div>
          
        </dl>
      </div>
    </div>
  </div>
</div>

<hr class="m-2">
<div class="relative bg-white">
  <div class="h-56 bg-white sm:h-72 lg:absolute lg:left-0 lg:h-full lg:w-1/2">
    <img class="w-full h-full object-cover rounded-3xl" src="{{ asset('/campaign/2P7A7735.jpg') }}" alt="Support team" loading="lazy"/>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 py-8 sm:py-12 sm:px-6 lg:py-16">
    <div class="max-w-2xl mx-auto lg:max-w-none lg:mr-0 lg:ml-auto lg:w-1/2 lg:pl-10">
      
      <h2 class="mt-6 text-3xl font-extrabold text-gray-900 sm:text-4xl">
      Engenharia de Produção Industrial
      </h2>
      <p class="mt-6 text-lg text-gray-500 text-justify">
      Formar um engenheiro com visão sistémica que possa actuar em diversos sectores da economia, planeando, executando, avaliando métodos para melhoria da eficiência, eficácia e efectividade das empresas. Sob essa perspectiva, o curso foi concebido de forma a direccionar as actividades científicas para áreas de interesse articuladas às necessidades tecnológicas regionais e nacionais.
      </p>
      <div class="mt-8 overflow-hidden">
        <dl class="-mx-8 -mt-8 flex flex-wrap">
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Duração
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              5 Anos
            </dd>
          </div>
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Grau
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              Licenciatura
            </dd>
          </div>
          
        </dl>
      </div>
    </div>
  </div>
</div>

<hr class="m-2">
<div class="relative bg-white">
  <div class="h-56 bg-white sm:h-72 lg:absolute lg:left-0 lg:h-full lg:w-1/2">
    <img class="w-full h-full object-cover rounded-3xl" src="{{ asset('/campaign/2P7A3515.jpg') }}" alt="Support team" loading="lazy"/>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 py-8 sm:py-12 sm:px-6 lg:py-16">
    <div class="max-w-2xl mx-auto lg:max-w-none lg:mr-0 lg:ml-auto lg:w-1/2 lg:pl-10">
      
      <h2 class="mt-6 text-3xl font-extrabold text-gray-900 sm:text-4xl">
      Engenharia Informática
      </h2>
      <p class="mt-6 text-lg text-gray-500 text-justify">
      Formar profissionais com uma base sólida e de largo espectro em Engenharia Informática que permite dar resposta às necessidades e aos problemas observados no domínio da Informática. O profissional de Engenharia Informática tem competências multidisciplinares para desenvolver trabalho em equipa, tendo presentes as implicações sociais, económicas e legais resultantes do uso das ciências e tecnologias informáticas.
      </p>
      <div class="mt-8 overflow-hidden">
        <dl class="-mx-8 -mt-8 flex flex-wrap">
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Duração
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              5 Anos
            </dd>
          </div>
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Grau
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              Licenciatura
            </dd>
          </div>
          
        </dl>
      </div>
    </div>
  </div>
</div>

<hr class="m-2">
<div class="relative bg-white">
  <div class="h-56 bg-white sm:h-72 lg:absolute lg:left-0 lg:h-full lg:w-1/2">
    <img class="w-full h-full object-cover rounded-3xl" src="{{ asset('/campaign/20181119_120727.jpeg') }}" alt="Support team" loading="lazy"/>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 py-8 sm:py-12 sm:px-6 lg:py-16">
    <div class="max-w-2xl mx-auto lg:max-w-none lg:mr-0 lg:ml-auto lg:w-1/2 lg:pl-10">
      
      <h2 class="mt-6 text-3xl font-extrabold text-gray-900 sm:text-4xl">
      Engenharia Mecânica
      </h2>
      <p class="mt-6 text-lg text-gray-500 text-justify">
      Formar um profissional capaz de projectar e fabricar máquinas, equipamentos, actuar e projectar instalações e processos industriais. O curso de Engenharia Mecânica visa formar um engenheiro abrangente e com forte conhecimento técnico científico, capaz de enfrentar com competência os desafios no âmbito da Engenharia Mecânica.
      </p>
      <div class="mt-8 overflow-hidden">
        <dl class="-mx-8 -mt-8 flex flex-wrap">
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Duração
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              5 Anos
            </dd>
          </div>
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Grau
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              Licenciatura
            </dd>
          </div>
          
        </dl>
      </div>
    </div>
  </div>
</div>

<hr class="m-2">
<div class="relative bg-white">
  <div class="h-56 bg-white sm:h-72 lg:absolute lg:left-0 lg:h-full lg:w-1/2">
    <img class="w-full h-full object-cover rounded-3xl" src="{{ asset('/campaign/20181119_122343.jpeg') }}" alt="Support team" loading="lazy"/>
  </div>
  <div class="relative max-w-7xl mx-auto px-4 py-8 sm:py-12 sm:px-6 lg:py-16">
    <div class="max-w-2xl mx-auto lg:max-w-none lg:mr-0 lg:ml-auto lg:w-1/2 lg:pl-10">
      
      <h2 class="mt-6 text-3xl font-extrabold text-gray-900 sm:text-4xl">
      Engenharia Electrotécnica
      </h2>
      <p class="mt-6 text-lg text-gray-500 text-justify">
      Formar Engenheiros Eletroctécnicos capacitados a atender às diferentes solicitações profissionais pertinentes, com uma visão crítica, criativa e inovadora, através de uma formação acadêmica com forte fundamentação científico-tecnológica. O curso objectiva dar formação generalista plena aos profissionais, habilitando-os a actuarem nas sub áreas de conhecimento da Engenharia Electrotécnica, com destaque à competência para aplicação de métodos e técnicas de automatização de processos produtivos, instalações eléctricas e planeamento de sistemas eléctricos de potência.
      </p>
      <div class="mt-8 overflow-hidden">
        <dl class="-mx-8 -mt-8 flex flex-wrap">
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Duração
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              5 Anos
            </dd>
          </div>
          <div class="flex flex-col px-8 pt-8">
            <dt class="order-2 text-base font-medium text-gray-500">
              Grau
            </dt>
            <dd class="order-1 text-2xl font-extrabold text-gray-800 sm:text-3xl">
              Licenciatura
            </dd>
          </div>
          
        </dl>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer_scripts')

@endsection