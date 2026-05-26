 <!--
    Mobile menu

    Off-canvas menu for mobile, show/hide based on off-canvas menu state.
  -->
  <div class="fixed inset-0 flex z-40 lg:hidden invisible1" role="dialog" aria-modal="true" x-cloak x-show="mobileMenuOpen">
    <!--
      Off-canvas menu overlay, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true" x-cloak x-show="mobileMenuOpen"></div> 

    <!--
      Off-canvas menu, show/hide based on off-canvas menu state.

      Entering: "transition ease-in-out duration-300 transform"
        From: "-translate-x-full"
        To: "translate-x-0"
      Leaving: "transition ease-in-out duration-300 transform"
        From: "translate-x-0"
        To: "-translate-x-full"
    -->
    <div class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto" x-cloak x-show="mobileMenuOpen"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">
      <div class="px-4 pt-5 pb-2 flex">
        <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400">
          <span class="sr-only">Close menu</span>
          <!-- Heroicon name: outline/x -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Links -->
      <div class="mt-2" x-cloak x-show="mobileMenuOpen" x-data="{ womenTabOpen: true, menTabOpen: false }">
        <div class="border-b border-gray-200">
          <div class="-mb-px flex px-4 space-x-8" aria-orientation="horizontal" role="tablist">
            <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
            <button id="tabs-1-tab-1" @click="womenTabOpen = !womenTabOpen" @click.away="womenTabOpen = false" class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">
              {{-- Sobre --}}
              @lang('translation.about_isptec')
            </button>

            <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
            <button id="tabs-1-tab-2" @click="menTabOpen = !menTabOpen" @click.away="menTabOpen = false" class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">
              @lang('translation.education')
            </button>
          </div>
        </div>

        <!-- 'Women' tab panel, show/hide based on tab state. -->
        <div id="tabs-1-panel-1" class="pt-10 pb-8 px-4 space-y-10" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0" x-cloak x-show="womenTabOpen">
          <div class="grid grid-cols-2 gap-x-4">
            <div class="group relative text-sm">
              <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                <img src="{{ asset('/campaign/2P7A7672.jpg') }}" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-center object-cover">
              </div>
              <a href="/labs" class="mt-6 block font-medium text-gray-900">
                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                {{-- Laboratórios Profissionalizantes --}}
                @lang('translation.labpro_long')
              </a>
              <p aria-hidden="true" class="mt-1">
                {{-- Saber mais --}}
                @lang('translation.news_read_more')
              </p>
            </div>

            <div class="group relative text-sm">
              <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                <img src="{{ asset('/campaign/2P7A3422.jpg') }}" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-center object-cover">
              </div>
              <a href="/library" class="mt-6 block font-medium text-gray-900">
                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                {{-- Biblioteca --}}
                @lang('translation.education_library')
              </a>
              <p aria-hidden="true" class="mt-1">
                {{-- Saber mais --}}
                @lang('translation.news_read_more')
              </p>
            </div>
          </div>

          <div>
            <p id="women-clothing-heading-mobile" class="font-medium text-gray-900">
            ISPTEC
            </p>
            <ul role="list" aria-labelledby="women-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
              <li class="flow-root">
                <a href="/board-msg" class="-m-2 p-2 block text-gray-500">
                {{-- Mensagem da Direcção Geral --}}
                @lang('translation.msg_from_dg')
                </a>
              </li>

              <li class="flow-root">
                <a href="/institutional-presentation" class="-m-2 p-2 block text-gray-500">
                {{-- Apresentação Institucional --}}
                @lang('translation.institutional_presentation')
                </a>
              </li>

              <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500">
                {{-- Organigrama --}}
                @lang('translation.org_chart')
                </a>
              </li>

              <li class="flow-root">
                <a href="/mvv" class="-m-2 p-2 block text-gray-500">
                {{-- Missão, Visão e Valores --}}
                @lang('translation.mission_vision_values')
                </a>
              </li>

              <li class="flow-root">
                <a href="/history" class="-m-2 p-2 block text-gray-500">
                {{-- Histórico --}}
                @lang('translation.history')
                </a>
              </li>

              <li class="flow-root">
                <a href="/infrastructure" class="-m-2 p-2 block text-gray-500">
                {{-- Infraestrutura --}}
                @lang('translation.infrastructure')
                </a>
              </li>

              <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500">
                {{-- Legislação --}}
                @lang('translation.legislation')
                </a>
              </li>

              <li class="flow-root">
                <a href="/protocols" class="-m-2 p-2 block text-gray-500">
                {{-- Convénios e Protocolos --}}
                @lang('translation.aggr_protocols')
                </a>
              </li>

              <li class="flow-root">
                <a href="/social-welfare" class="-m-2 p-2 block text-gray-500">
                {{-- Acção Social --}}
                @lang('translation.social_wellfare')
                </a>
              </li>
            </ul>
          </div>

          <div>
            <p id="women-accessories-heading-mobile" class="font-medium text-gray-900 uppercase">
            {{-- SERVIÇOS --}}
            @lang('translation.acad_services')
            </p>
            <ul role="list" aria-labelledby="women-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
              <li class="flow-root">
                <a href="/academic-calendar" class="-m-2 p-2 block text-gray-500">
                {{-- Calendário Académico --}}
                @lang('translation.acad_calendar')
                </a>
              </li>

              <li class="flow-root">
                <a href="/regulations" class="-m-2 p-2 block text-gray-500">
                {{-- Regulamentos --}}
                @lang('translation.regulations')
                </a>
              </li>

              <li class="flow-root">
                <a href="/edicts" class="-m-2 p-2 block text-gray-500">
                {{-- Editais --}}
                @lang('translation.edicts')
                </a>
              </li>

              <li class="flow-root">
                <a href="http://portal.isptec.co.ao/projetos/portal_online/index.php" class="-m-2 p-2 block text-gray-500">
                {{-- Portal Online --}}
                @lang('translation.online_portal')
                </a>
              </li>

              <li class="flow-root">
                <a href="/student-mobility" class="-m-2 p-2 block text-gray-500">
                {{-- Mobilidade Estudantil --}}
                @lang('translation.student_mobility')
                </a>
              </li>

              <li class="flow-root">
                <a href="/alumni" class="-m-2 p-2 block text-gray-500">
                {{-- Alumni --}}
                @lang('translation.alumni')
                </a>
              </li>

              <li class="flow-root">
                <a href="http://portal.isptec.co.ao/projetos/concurso/inscricao/index.php?&tid=0&lid=0&pid=17&sid=74824d0b44b" class="-m-2 p-2 block text-gray-500">
                {{-- Inscrições Online --}}
                @lang('translation.online_registrations')
                </a>
              </li>
            </ul>
          </div>

          <div>
            <p id="women-accessories-heading-mobile" class="font-medium text-gray-900 uppercase">
            {{-- COMUNICAÇÃO --}}
            @lang('translation.communication')
            </p>
            <ul role="list" aria-labelledby="women-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
              <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500">
                  {{-- Manual de Identidade --}}
                  @lang('translation.communication_branding')
                </a>
              </li>

              <li class="flow-root">
                <a href="/newsletters" class="-m-2 p-2 block text-gray-500">
                  {{-- Newsletters --}}
                  @lang('translation.communication_newsletters')
                </a>
              </li>
            </ul>
          </div>

          <div>
            <p id="women-brands-heading-mobile" class="font-medium text-gray-900 uppercase">
            {{-- EXTENSÃO --}}
            @lang('translation.extension_services')
            </p>
            <ul role="list" aria-labelledby="women-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
              <li class="flow-root">
                <a href="/extension-policy" class="-m-2 p-2 block text-gray-500">
                {{-- Política de Extensão --}}
                @lang('translation.extension_services_policy')
                </a>
              </li>

              <li class="flow-root">
                <a href="/extension-programmes" class="-m-2 p-2 block text-gray-500">
                {{-- Programas --}}
                @lang('translation.extension_services_programmes')
                </a>
              </li>

              <li class="flow-root">
                <a href="/extension-career" class="-m-2 p-2 block text-gray-500">
                  {{-- Serviços de Carreira e Empregabilidade --}}
                  @lang('translation.extension_services_employment_careers')
                </a>
              </li>

            </ul>
          </div>

          <div>
            <p id="women-brands-heading-mobile" class="font-medium text-gray-900 uppercase">
            {{-- CENTRO DE ENSINO DE LÍNGUAS --}}
            @lang('translation.extension_services_ltc')
            </p>
            <ul role="list" aria-labelledby="women-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
              <li class="flow-root">
                <a href="/lang-center" class="-m-2 p-2 block text-gray-500">
                {{-- - Apresentação --}}
                - @lang('translation.extension_services_ltc_presentation')
                </a>
              </li>
            </ul>
          </div>

        </div>

        <!-- 'Men' tab panel, show/hide based on tab state. -->
        <div id="tabs-1-panel-2" class="pt-10 pb-8 px-4 space-y-10" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0" x-cloak x-show="menTabOpen">
          <div class="grid grid-cols-2 gap-x-4">
            <div class="group relative text-sm">
              <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                <img src="{{ asset('/campaign/2P7A7767.jpg') }}" alt="Drawstring top with elastic loop closure and textured interior padding." class="object-center object-cover">
              </div>
              <a href="/ccd" class="mt-6 block font-medium text-gray-900">
                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                {{-- Cursos de Curta Duração --}}
                @lang('translation.extension_services_short_duration_courses')
              </a>
              <p aria-hidden="true" class="mt-1">
                {{-- Saber mais --}}
                @lang('translation.news_read_more')
              </p>
            </div>

            <div class="group relative text-sm">
              <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                <img src="{{ asset('/Infinity_cover.png') }}" alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt." class="object-center object-cover">
              </div>
              <a href="#" class="mt-6 block font-medium text-gray-900">
                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                {{-- Revista Científica --}}
                @lang('translation.scientific_journal')
              </a>
              <p aria-hidden="true" class="mt-1">
                {{-- Saber mais --}}
                @lang('translation.news_read_more')
              </p>
            </div>
          </div>

          <div>
            <p id="men-clothing-heading-mobile" class="font-medium text-gray-900">
            {{-- Departamentos / Cursos --}}
            @lang('translation.education_dep_courses')
            </p>
            <ul role="list" aria-labelledby="men-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
              
              <li class="flow-root">
                <a href="/det" class="-m-2 p-2 block text-gray-500">
                {{-- Departamento de Engenharias e Tecnologias (DET) --}}
                @lang('translation.education_det')
                </a>
              </li>

              <li class="flow-root">
                <a href="/dgc" class="-m-2 p-2 block text-gray-500">
                {{-- Departamento de Geociências (DGC) --}}
                @lang('translation.education_dgc')
                </a>
              </li>

              <li class="flow-root">
                <a href="/dcsa" class="-m-2 p-2 block text-gray-500">
                {{-- Departamento de Ciências Sociais Aplicadas (DCSA) --}}
                @lang('translation.education_dcsa')
                </a>
              </li>

              <li class="flow-root">
                <a href="/lecturers-all" class="-m-2 p-2 block text-gray-500">
                {{-- Corpo Docente --}}
                @lang('translation.education_teachers')
                </a>
              </li>
            </ul>
          </div>

          <div>
            <p id="men-accessories-heading-mobile" class="font-medium text-gray-900">
            {{-- Pós-Graduação --}}
            @lang('translation.education_post_grad_studies')
            </p>
            <ul role="list" aria-labelledby="men-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
              
              <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500">
                {{-- Prgogramas Académicos AMITY - ISPTEC --}}
                @lang('translation.education_acad_programmes') AMITY - ISPTEC
                </a>
              </li>

              <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500">
                {{-- Manutenção Industrial --}}
                @lang('translation.education_industrial_maintenence')
                </a>
              </li>

              <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500">
                {{-- Gestão de Projectos --}}
                @lang('translation.education_project_management')
                </a>
              </li>

              <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500">
                {{-- Engenharia da Refinação --}}
                @lang('translation.education_refining_eng')
                </a>
              </li>
            </ul>
          </div>

          <div>
            <p id="men-brands-heading-mobile" class="font-medium text-gray-900">
            {{-- Investigação --}}
            @lang('translation.scientific_research')
            </p>
            <ul role="list" aria-labelledby="men-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
              <li class="flow-root">
                <a href="/research-policy" class="-m-2 p-2 block text-gray-500">
                {{-- Politica para a Investigação e Desenvolvimento (I&D) --}}
                @lang('translation.scientific_research_policy')
                </a>
              </li>

              <li class="flow-root">
                <a href="/project-guide" class="-m-2 p-2 block text-gray-500">
                {{-- Guia para a Elaboração de Projectos de Investigação Científica --}}
                @lang('translation.scientific_research_project_guide')
                </a>
              </li>

              <li class="flow-root">
                <a href="/research-programmes" class="-m-2 p-2 block text-gray-500">
                {{-- Programas --}}
                @lang('translation.scientific_research_programmes')
                </a>
              </li>

            </ul>
          </div>

          <div>
            <p id="men-brands-heading-mobile" class="font-medium text-gray-900">
            {{-- Centros de Investigação --}}
            @lang('translation.scientific_research_center')
            </p>
            <ul role="list" aria-labelledby="men-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
              <li class="flow-root">
                <a href="/research-cicsa" class="-m-2 p-2 block text-gray-500">
                  {{-- Centro de Investigação das Ciências Sociais Aplicadas (CICSA) --}}
                  @lang('translation.scientific_research_aasr_center')
                </a>
              </li>

              <li class="flow-root">
                <a href="/research-cieg" class="-m-2 p-2 block text-gray-500">
                  {{-- Centro de Investigação em Engenharias e Geociências(CIEG) --}}
                  @lang('translation.scientific_research_egr_center')
                </a>
              </li>

            </ul>
          </div>

          <div>
            <p id="men-brands-heading-mobile" class="font-medium text-gray-900">
            {{-- Publicações Científicas --}}
            @lang('translation.scientific_research_publications')
            </p>
            <ul role="list" aria-labelledby="men-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
              <li class="flow-root">
                <a href="/research-impact-journal" class="-m-2 p-2 block text-gray-500">
                {{-- Publicações em Revista com Impacto --}}
                @lang('translation.scientific_research_pub_impact_journals')
                </a>
              </li>

              <li class="flow-root">
                <a href="/research-non-impact-journal" class="-m-2 p-2 block text-gray-500">
                {{-- Publicações em Revista sem Impacto --}}
                @lang('translation.scientific_research_pub_journals')
                </a>
              </li>

            </ul>
          </div>



        </div>
      </div>

      <div class="border-t border-gray-200 py-6 px-4 space-y-6">
        <div class="flow-root">
          <a href="/labs" class="-m-2 p-2 block font-medium text-gray-900">
            {{-- LabPro --}}
            @lang('translation.labpro')
          </a>
        </div>

        <div class="flow-root">
          <a href="/recruitment" class="-m-2 p-2 block font-medium text-gray-900">
            {{-- Recrutamento --}}
            @lang('translation.careers')
          </a>
        </div>
      </div>

      <div class="border-t border-gray-200 py-6 px-4 space-y-6">
        <div class="flow-root">
          <a href="/news" class="-m-2 p-2 block font-medium text-gray-900">
            {{-- Notícias --}}
            @lang('translation.news')
          </a>
          <a href="/events" class="-m-2 p-2 block font-medium text-gray-900">
            {{-- Eventos --}}
            @lang('translation.events')
          </a>
        </div>
        <div class="flow-root">
          <a href="/contact" class="-m-2 p-2 block font-medium text-gray-900">
            {{-- Contacto --}}
            @lang('translation.contacts')
          </a>
        </div>
      </div>

      <div class="border-t border-gray-200 py-6 px-4" x-data="{open: false}">
        <button @click="open = !open" type="button" class="bg-gray-100 rounded-full flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-isptec" id="menu-button" aria-expanded="true" aria-haspopup="true">
          <img src="/flags/4x3/{{ (app()->getLocale() == 'en' ? 'gb' : app()->getLocale()) }}.svg" alt="" class="w-5 h-5">
        </button>
        
        <div class="z-10 origin-top-left absolute left-0 mt-2 ml-2 w-16 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" x-cloak x-show="open" @click.away="open = false">
          <div class="py-1" role="none">
            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
            @foreach (language()->allowed() as $code => $name)
                @if ($code != app()->getLocale())
                    <a href="{{ language()->back($code) }}" class="text-gray-700 hover:text-gray-800 flex items-center m-2">
                      <img src="/flags/4x3/{{ ($code == 'en' ? 'gb' : $code) }}.svg" alt="" class="w-5 h-auto block flex-shrink-0">
                      <span class="ml-3 block text-sm font-medium">
                        {{ strtoupper($code) }}
                      </span>
                      <span class="sr-only">language</span>
                    </a>
                @endif
      
            @endforeach
            
          </div>
        </div>
      </div>
    </div>