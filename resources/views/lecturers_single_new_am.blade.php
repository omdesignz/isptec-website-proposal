@extends('layouts.front')

@section('content')
<main class="py-10">
    <!-- Page header -->
    <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
      <div class="flex items-center space-x-5">
        <div class="flex-shrink-0">
          <div class="relative">
            <img class="h-16 w-16 rounded-full" src="{{ asset('/lecturers/Artur Miguel_.jpg') }}" alt="" loading="lazy"/>
            <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
          </div>
        </div>
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Artur Domingos Miguel</h1>
          <p class="text-sm font-medium text-gray-500">Doutor em Ciências de Mineração: Mineração, Obra Civil e Meio Ambiente, Universidade de Oviedo – Oviedo, Espanha</p>
        </div>
      </div>
      <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
        <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-isptec">
          Página Pessoal
        </button>
        <a href="https://orcid.org/0000-0003-0867-3421" target="_blank" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-900 hover:bg-isptec transform transition-all hover:scale-125 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-isptec">
          Perfil ORCID
        </a>
      </div>
    </div>

    <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
      <div class="space-y-6 lg:col-start-1 lg:col-span-2">
        <!-- Description list-->
        <section aria-labelledby="applicant-information-title">
          <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
              <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">
              Perfil
              </h2>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">
              Dados de realce / trajectória
              </p>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Nome completo
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    Artur Domingos Miguel
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Cargo e/ou titulo actual
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    Director Científico e de Extensão
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Departamento Afiliado
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    Departamento de Geociências
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Contactos Institucionais
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    artur.miguel@isptec.co.ao | 226 690 335
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Orcid ID
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    0000-0003-0867-3421
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Disciplinas Leccionadas
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    Meio ambiente e Sustentabilidade e Propriedades Físicas das Rochas
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Histórico Académico
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    2006 - Doutor em Ciências de Mineração: Mineração, Obra Civil e Meio Ambiente, Universidade de Oviedo – Oviedo, Espanha <br> <br>
                    1999 - Engenheiro de Minas Instituto Superior Mineiro Metalúrgico (ISMM) – Moa, Holguin, Cuba
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Trajectória Profissional
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    2012 - Presente: Instituto Superior de Tecnologias e Ciências (ISPTEC) - Luanda <br> <br>
                    - Director Científico e de Extensão
                    - Chefe do Departamento de Geociências <br>
                    - Coordenador da Comissão de Acompanhamento dos Docente em Formação no Exterior do País <br>
                    - Coordenador da Comissão de Enquadramento Docente <br>
                    - Coordenador da Comissão para criação do Departamento de Geociências <br>
                    - Coordenador do curso de engenharia mecânica (2012-2015) <br>
                    - Membro da Comissão da Reforma curricular do ciclo (2018-2022) <br>
                    - Professor das disciplinas de Propriedades Físicas das Rochas, Mineralogia e Meio Ambiente e Sustentabilidade. <br> <br>
                    2007 - 2021: Sociedade Mineira de Catoca - Lunda Sul <br> <br>
                    Engenheiro de Minas (Planeamento):
                    Coordenação das actividades técnicas de produção
                    Elaboração do programa de turnos de produção e transporte de minério
                    Apoio técnico à equipa de pesquisas de áreas novas
                    Coordenador do programa de gestão integrada SAP (módulo de produção)
                    Universidade Lueji a Nkonde – Lunda sul <br> <br>
                    Professor Auxiliar:
                    Professor das cadeiras de Mecânica das Rochas e Equipamento de Exploração Mineira
                    Coordenador Adjunto da Comissão Científica
                    Coordenador da comissão de reforma curricular do curso de engenharia de minas <br> <br>
                    2004 - 2005: Belonga (Pedreira, Materias de Construção) – Belonga, Oviedo, Espanha <br> <br>
                    Engenheiro de Minas: Dimensionamento e desenho dos trabalhos de fragmentação de rochas com uso de explosivos. <br> <br>
                    2001: Instituto Médio de Petróleos Cruz da Linda – Luanda <br> <br>
                    Docente das disciplinas: Técnicas de prospecção e Jazigos Minerais <br> <br>
                    1999 - 2000: Afrominérios – Lunda Norte <br> <br>
                    Engenheiro de Minas: Líder da equipa de pesquisa e exploração no campo Coordenação das actividades principais técnico-logísticas

                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Áreas de Interesse / Área de Investigação
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    Geotecnia/Water Assessment/Sedimentologia.
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Projectos
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    1. Estudo fundamental da injecção de água calibrada em reservatórios carbonáticos não convencionais. <br> <br>
                    2. Desenvolvimento de um modelo computacional de alta ordem para simular escoamento bifásico gás-líquido em regime transiente. <br> <br>
                    3. Desenvolvimento de um protótipo industrial de uma sonda ultrassônica para identificação do padrão de escoamento e determinação da fração de gás de escoamentos multifásicos. <br> <br>
                    4. Desenvolvimento de metodologia para avaliar o desenvolvimento de antiespumante para petróleo em laboratório. 5. Realização de análises para levantamento de dados geológicos, geoquímicos e geofísicos do Poço Estratigráfico 6. Estudo hidrogeológico da origem das águas termais da Província do Kuanza Sul (caso de estudo) Áurea <br> <br>
                    7. Aplicação do método geoeléctrico para o estudo de águas subterrâneas. <br> <br>
                    8. Efeitos da diminuição da espessura das camadas na capacidade de suporte dos pavimentos rodoviários flexíveis. 9. Contourite vs Turbidite Outcrop and Seismic Architectures. <br> <br>
                    10. Development and Characterization of a New Solid Electrolyte for Sodium Battery. <br> <br>
                    11. Water assessment: análise do grau de poluição das águas nos rios da província de Luanda. <br> <br>
                    12. Avaliação da Potencialidade do Ouro e Associados na Região Bula Atumba – Ndalatando, província do Cuanza Norte, por meio da prospeção geoquímica. <br> <br>
                    13. Caracterización Mineralógica y Geoquímica de las Intrusiones Básicas en los Valles de los Rios Chicapa y Luachimo (Lucapa – Calonda)” província da Lunda Norte, Angola – VI convención de Ciencias de la Tierra (Geociências 2014).
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Orientações de TCC, Dissertações, Teses
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    1. Aproveitamento de resíduos sólidos para obtenção de Biogás. <br> <br>
                    2. Formação de Ravinas. Proposta de contenção da sua Evolução: Estudo de Caso. <br> <br>
                    3. Aplicação da análise preliminar de risco (APR) no posto de combustível SONANGALP. <br> <br>
                    4. Estudo de viabilidade técnico económica da recuperação da escombreira ESTE de Catoca. <br> <br>
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Artigos / Publicações
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 flex-1 w-0 truncate">
                            xxxxxxxxx.pdf
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            <a href="#" class="font-medium text-isptec hover:text-gray-700">
                            Baixar
                            </a>
                        </div>
                        </li>
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 flex-1 w-0 truncate">
                            xxxxxxxxx.pdf
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            <a href="#" class="font-medium text-isptec hover:text-gray-700">
                            Baixar
                            </a>
                        </div>
                        </li>
                    </ul>
                    </dd>
                </div>
                </dl>
            </div>
            <div>
              <a href="#" class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg"></a>
            </div>
          </div>
        </section>

      </div>

      <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
        <div class="bg-white px-1 py-1 shadow sm:rounded-lg sm:px-1 rounded-md">
            <img src="{{ asset('/lecturers/Artur Miguel_.jpg') }}" alt="Man wearing a charcoal gray cotton t-shirt." class="w-full h-full rounded-md" loading="lazy"/>
        </div>
        <br>
        
      </section>
    </div>
  </main>
@endsection