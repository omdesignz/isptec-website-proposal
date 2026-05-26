<nav aria-label="Top" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-cloak>
      <div class="border-b border-gray-200">
        <div class="h-16 flex items-center">
          <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
          <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="bg-white p-2 rounded-md text-gray-400 lg:hidden">
            <span class="sr-only">Open menu</span>
            <!-- Heroicon name: outline/menu -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>

          <!-- Logo -->
          <div class="ml-4 flex lg:ml-0">
            <a href="/">
              <span class="sr-only">ISPTEC</span>
              <img class="h-8 w-auto" src="/logo_horizontalw.svg" alt="">
            </a>
          </div>

          <!-- Flyout menus -->
          <div class="hidden lg:ml-8 lg:block lg:self-stretch invisible1" x-data="{ womenFlyoutMenuOpen: false, menFlyoutMenuOpen: false, extensionFlyoutMenuOpen: false, researchFlyoutMenuOpen: false }">
            <div class="h-full flex space-x-8">
              <div class="flex">
                <div class="relative flex">
                  <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                  <button type="button" @click="womenFlyoutMenuOpen = !womenFlyoutMenuOpen" @click.away="womenFlyoutMenuOpen = false" class="border-transparent text-gray-700 hover:text-gray-800 relative z-20 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px" aria-expanded="false">
                    {{-- Sobre --}}
                    @lang('translation.about_isptec')
                  </button>
                </div>

                <!--
                  'Women' flyout menu, show/hide based on flyout menu state.

                  Entering: "transition ease-out duration-200"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "transition ease-in duration-150"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute top-full inset-x-0 text-sm text-gray-500" x-cloak x-show="womenFlyoutMenuOpen"
                    {{-- x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" --}}
                    >
                  <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                  <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                  <div class="relative bg-gradient-to-t from-yellow-100 via-yellow-100 to-yellow-50 z-20">
                    <div class="max-w-7xl mx-auto px-8">
                      <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-16">
                        <div class="col-start-2 grid grid-cols-2 gap-x-8">
                          <div class="group relative text-base sm:text-sm">
                            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                              <img src="{{ asset('/campaign/2P7A7672.jpg') }}" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-center object-cover">
                            </div>
                            <a href="/labs" class="mt-6 block font-medium text-gray-900">
                              <span class="absolute z-20 inset-0" aria-hidden="true"></span>
                              {{-- Laboratórios Profissionalizantes --}}
                            @lang('translation.labpro_long')
                            </a>
                            <p aria-hidden="true" class="mt-1">
                              {{-- Saber mais --}}
                            @lang('translation.news_read_more')
                            </p>
                          </div>

                          <div class="group relative text-base sm:text-sm">
                            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                              <img src="{{ asset('/campaign/2P7A3422.jpg') }}" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-center object-cover">
                            </div>
                            <a href="/library" class="mt-6 block font-medium text-gray-900">
                              <span class="absolute z-20 inset-0" aria-hidden="true"></span>
                              {{-- Biblioteca --}}
                              @lang('translation.education_library')
                            </a>
                            <p aria-hidden="true" class="mt-1">
                              {{-- Saber mais --}}
                              @lang('translation.news_read_more')
                            </p>
                          </div>
                        </div>
                        <div class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">
                          <div>
                            <p id="Clothing-heading" class="font-medium text-gray-900">
                              ISPTEC
                            </p>
                            <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="/board-msg" class="hover:text-gray-800">
                                  {{-- Mensagem da Direcção Geral --}}
                                  @lang('translation.msg_from_dg')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/institutional-presentation" class="hover:text-gray-800">
                                  {{-- Apresentação Institucional --}}
                                  @lang('translation.institutional_presentation')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">
                                  {{-- Organigrama --}}
                                  @lang('translation.org_chart')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/mvv" class="hover:text-gray-800">
                                  {{-- Missão, Visão e Valores --}}
                                  @lang('translation.mission_vision_values')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/history" class="hover:text-gray-800">
                                  {{-- Histórico --}}
                                  @lang('translation.history')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/infrastructure" class="hover:text-gray-800">
                                  {{-- Infraestrutura --}}
                                  @lang('translation.infrastructure')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">
                                  {{-- Legislação --}}
                                  @lang('translation.legislation')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/protocols" class="hover:text-gray-800">
                                  {{-- Convénios e Protocolos --}}
                                  @lang('translation.aggr_protocols')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/social-welfare" class="hover:text-gray-800">
                                  {{-- Acção Social --}}
                                  @lang('translation.social_wellfare')
                                </a>
                              </li>
                            </ul>
                          </div>

                          <div>
                            <p id="Accessories-heading" class="font-medium text-gray-900 uppercase">
                              {{-- SERVIÇOS --}}
                              @lang('translation.acad_services')
                            </p>
                            <ul role="list" aria-labelledby="Accessories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="/academic-calendar" class="hover:text-gray-800">
                                  {{-- Calendário Académico --}}
                                  @lang('translation.acad_calendar')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/regulations" class="hover:text-gray-800">
                                  {{-- Regulamentos --}}
                                  @lang('translation.regulations')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/edicts" class="hover:text-gray-800">
                                  {{-- Editais --}}
                                  @lang('translation.edicts')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="http://portal.isptec.co.ao/projetos/portal_online/index.php" class="hover:text-gray-800">
                                  {{-- Portal Online --}}
                                  @lang('translation.online_portal')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/student-mobility" class="hover:text-gray-800">
                                  {{-- Mobilidade Estudantil --}}
                                  @lang('translation.student_mobility')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/alumni" class="hover:text-gray-800">
                                  {{-- Alumni --}}
                                  @lang('translation.alumni')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="http://portal.isptec.co.ao/projetos/concurso/inscricao/index.php?&tid=0&lid=0&pid=17&sid=74824d0b44b" class="hover:text-gray-800">
                                  {{-- Inscrições Online --}}
                                  @lang('translation.online_registrations')
                                </a>
                              </li>
                            </ul>
                          </div>

                          <div>
                            <p id="Brands-heading" class="font-medium text-gray-900 uppercase">
                              {{-- COMUNICAÇÃO --}}
                              @lang('translation.communication')
                            </p>
                            <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">
                                  {{-- Manual de Identidade --}}
                                  @lang('translation.communication_branding')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/newsletters" class="hover:text-gray-800">
                                  {{-- Newsletters --}}
                                  @lang('translation.communication_newsletters')
                                </a>
                              </li>

                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Start Ensino -->
              <div class="flex">
                <div class="relative flex">
                  <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                  <button type="button" @click="menFlyoutMenuOpen = !menFlyoutMenuOpen" @click.away="menFlyoutMenuOpen = false" class="border-transparent text-gray-700 hover:text-gray-800 relative z-20 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px" aria-expanded="false">
                    {{-- Ensino --}}
                    @lang('translation.education')
                  </button>
                </div>

                <!--
                  'Men' flyout menu, show/hide based on flyout menu state.

                  Entering: "transition ease-out duration-200"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "transition ease-in duration-150"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute top-full inset-x-0 text-sm text-gray-500" x-cloak x-show="menFlyoutMenuOpen"
                    {{-- x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" --}}
                    >
                  <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                  <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                  <div class="relative bg-gradient-to-t from-yellow-100 via-yellow-100 to-yellow-50 z-20">
                    <div class="max-w-7xl mx-auto px-8">
                      <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-16">
                        <div class="col-start-2 grid grid-cols-2 gap-x-8">
                          <div class="group relative text-base sm:text-sm">
                            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                              <img src="{{ asset('/campaign/2P7A7767.jpg') }}" alt="Drawstring top with elastic loop closure and textured interior padding." class="object-center object-cover">
                            </div>
                            <a href="/ccd" class="mt-6 block font-medium text-gray-900">
                              <span class="absolute z-20 inset-0" aria-hidden="true"></span>
                              {{-- Cursos de Curta Duração --}}
                              @lang('translation.extension_services_short_duration_courses')
                            </a>
                            <p aria-hidden="true" class="mt-1">
                              {{-- Saber mais --}}
                              @lang('translation.news_read_more')
                            </p>
                          </div>

                          <div class="group relative text-base sm:text-sm">
                            <!-- <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                              <img src="{{ asset('/Infinity_cover.png') }}" alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt." class="object-center object-cover">
                            </div>
                            <a href="#" class="mt-6 block font-medium text-gray-900">
                              <span class="absolute z-20 inset-0" aria-hidden="true"></span>
                              Revista Científica
                            </a>
                            <p aria-hidden="true" class="mt-1">Saber mais</p> -->
                          </div>
                        </div>
                        <div class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">

                          <div>
                            <p id="Accessories-heading" class="font-medium text-gray-900">
                              {{-- Departamentos / Cursos --}}
                              @lang('translation.education_dep_courses')
                            </p>
                            <ul role="list" aria-labelledby="Accessories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="/det" class="hover:text-gray-800">
                                {{-- Departamento de Engenharias e Tecnologias (DET) --}}
                                  @lang('translation.education_det')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/dgc" class="hover:text-gray-800">
                                {{-- Departamento de Geociências (DGC) --}}
                                  @lang('translation.education_dgc')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/dcsa" class="hover:text-gray-800">
                                {{-- Departamento de Ciências Sociais Aplicadas (DCSA) --}}
                                  @lang('translation.education_dcsa')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/lecturers-all" class="hover:text-gray-800">
                                {{-- Corpo Docente --}}
                                  @lang('translation.education_teachers')
                                </a>
                              </li>

                            </ul>
                          </div>

                          <div>
                            <p id="Clothing-heading" class="font-medium text-gray-900">
                              {{-- Pós-Graduação --}}
                              @lang('translation.education_post_grad_studies')
                            </p>
                            <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">
                                  {{-- Prgogramas Académicos AMITY - ISPTEC --}}
                                  @lang('translation.education_acad_programmes') AMITY - ISPTEC
                                </a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">
                                  {{-- Manutenção Industrial --}}
                                  @lang('translation.education_industrial_maintenence')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">
                                  {{-- Gestão de Projectos --}}
                                  @lang('translation.education_project_management')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">
                                {{-- Engenharia da Refinação --}}
                                @lang('translation.education_refining_eng')
                                </a>
                              </li>
                            </ul>
                          </div>

                          <div>
                            <p id="Brands-heading" class="font-medium text-gray-900">
                              {{-- Mestrados --}}
                              @lang('translation.education_master_studies')
                            </p>
                            <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">
                                -
                                </a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">
                                -
                                </a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">
                                -
                                </a>
                              </li>

                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">
                                -
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Ensino -->

              <!-- Start Investigação -->
              <div class="flex">
                <div class="relative flex">
                  <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                  <button type="button" @click="researchFlyoutMenuOpen = !researchFlyoutMenuOpen" @click.away="researchFlyoutMenuOpen = false" class="border-transparent text-gray-700 hover:text-gray-800 relative z-20 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px" aria-expanded="false">
                    {{-- Investigação --}}
                    @lang('translation.scientific_research')
                  </button>
                </div>

                <!--
                  'Men' flyout menu, show/hide based on flyout menu state.

                  Entering: "transition ease-out duration-200"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "transition ease-in duration-150"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute top-full inset-x-0 text-sm text-gray-500" x-cloak x-show="researchFlyoutMenuOpen"
                    {{-- x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" --}}
                    >
                  <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                  <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                  <div class="relative bg-gradient-to-t from-yellow-100 via-yellow-100 to-yellow-50 z-20">
                    <div class="max-w-7xl mx-auto px-8">
                      <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-16">
                        <div class="col-start-2 grid grid-cols-2 gap-x-8">

                        <div class="group relative text-base sm:text-sm">
                            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                              <img src="{{ asset('/Infinity_cover.png') }}" alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt." class="object-center object-cover">
                            </div>
                            <a href="https://infinity.isptec.co.ao" class="mt-6 block font-medium text-gray-900">
                              <span class="absolute z-20 inset-0" aria-hidden="true"></span>
                              {{-- Revista Científica --}}
                              @lang('translation.scientific_journal')
                            </a>
                            <p aria-hidden="true" class="mt-1">
                              {{-- Saber mais --}}
                              @lang('translation.news_read_more')
                            </p>
                          </div>

                          <div class="group relative text-base sm:text-sm">
                            <!-- <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                              <img src="{{ asset('/campaign/2P7A7767.jpg') }}" alt="Drawstring top with elastic loop closure and textured interior padding." class="object-center object-cover">
                            </div>
                            <a href="#" class="mt-6 block font-medium text-gray-900">
                              <span class="absolute z-20 inset-0" aria-hidden="true"></span>
                              Cursos de Curta Duração
                            </a>
                            <p aria-hidden="true" class="mt-1">Saber mais</p> -->
                          </div>

                        </div>
                        <div class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">

                        <div>
                            <p id="Brands-heading" class="font-medium text-gray-900">
                              {{-- Investigação --}}
                              @lang('translation.scientific_research')
                            </p>
                            <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="/research-policy" class="hover:text-gray-800">
                                {{-- Politica para a Investigação e Desenvolvimento (I&D) --}}
                                @lang('translation.scientific_research_policy')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/project-guide" class="hover:text-gray-800">
                                {{-- Guia para a Elaboração de Projectos de Investigação Científica --}}
                                @lang('translation.scientific_research_project_guide')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/research-programmes" class="hover:text-gray-800">
                                {{-- Programas --}}
                                @lang('translation.scientific_research_programmes')
                                </a>
                              </li>
                            </ul>
                          </div>

                          <div>
                            <p id="Accessories-heading" class="font-medium text-gray-900">
                              {{-- Centros de Investigação --}}
                              @lang('translation.scientific_research_center')
                            </p>
                            <ul role="list" aria-labelledby="Accessories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="/research-cicsa" class="hover:text-gray-800">
                                {{-- Centro de Investigação das Ciências Sociais Aplicadas (CICSA) --}}
                                @lang('translation.scientific_research_aasr_center')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/research-cieg" class="hover:text-gray-800">
                                {{-- Centro de Investigação em Engenharias e Geociências(CIEG) --}}
                                @lang('translation.scientific_research_egr_center')

                                </a>
                              </li>

                            </ul>
                          </div>

                          <div>
                            <p id="Clothing-heading" class="font-medium text-gray-900">
                              {{-- Publicações Científicas --}}
                              @lang('translation.scientific_research_publications')
                            </p>
                            <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="/research-impact-journal" class="hover:text-gray-800">
                                  {{-- Publicações em Revista com Impacto --}}
                                  @lang('translation.scientific_research_pub_impact_journals')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/research-non-impact-journal" class="hover:text-gray-800">
                                {{-- Publicações em Revista sem Impacto --}}
                                @lang('translation.scientific_research_pub_journals')
                                </a>
                              </li>

                              
                            </ul>
                          </div>

                          

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Investigação -->


              <!-- Start Extensão -->
              <div class="flex">
                <div class="relative flex">
                  <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                  <button type="button" @click="extensionFlyoutMenuOpen = !extensionFlyoutMenuOpen" @click.away="extensionFlyoutMenuOpen = false" class="border-transparent text-gray-700 hover:text-gray-800 relative z-20 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px" aria-expanded="false">
                    {{-- Extensão --}}
                    @lang('translation.extension_services')
                  </button>
                </div>

                <!--
                  'Men' flyout menu, show/hide based on flyout menu state.

                  Entering: "transition ease-out duration-200"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "transition ease-in duration-150"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute top-full inset-x-0 text-sm text-gray-500" x-cloak x-show="extensionFlyoutMenuOpen"
                    {{-- x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" --}}
                    >
                  <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                  <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                  <div class="relative bg-gradient-to-t from-yellow-100 via-yellow-100 to-yellow-50 z-20">
                    <div class="max-w-7xl mx-auto px-8">
                      <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-16">
                        <div class="col-start-2 grid grid-cols-2 gap-x-8">
                          <div class="group relative text-base sm:text-sm">
                            <!-- <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                              <img src="{{ asset('/campaign/2P7A7767.jpg') }}" alt="Drawstring top with elastic loop closure and textured interior padding." class="object-center object-cover">
                            </div>
                            <a href="#" class="mt-6 block font-medium text-gray-900">
                              <span class="absolute z-20 inset-0" aria-hidden="true"></span>
                              Cursos de Curta Duração
                            </a>
                            <p aria-hidden="true" class="mt-1">Saber mais</p> -->
                          </div>

                          <div class="group relative text-base sm:text-sm">
                            <!-- <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                              <img src="{{ asset('/Infinity_cover.png') }}" alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt." class="object-center object-cover">
                            </div>
                            <a href="#" class="mt-6 block font-medium text-gray-900">
                              <span class="absolute z-20 inset-0" aria-hidden="true"></span>
                              Revista Científica
                            </a>
                            <p aria-hidden="true" class="mt-1">Saber mais</p> -->
                          </div>
                        </div>
                        <div class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">

                          <div>
                            <p id="Accessories-heading" class="font-medium text-gray-900">
                              {{-- Extensão --}}
                              @lang('translation.extension_services')
                            </p>
                            <ul role="list" aria-labelledby="Accessories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="/extension-policy" class="hover:text-gray-800">
                                {{-- Política de Extensão --}}
                                @lang('translation.extension_services_policy')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/extension-programmes" class="hover:text-gray-800">
                                {{-- Programas --}}
                                @lang('translation.extension_services_programmes')
                                </a>
                              </li>

                              <li class="flex">
                                <a href="/extension-career" class="hover:text-gray-800">
                                {{-- Serviços de Carreira e Empregabilidade --}}
                                @lang('translation.extension_services_employment_careers')
                                </a>
                              </li>

                            </ul>
                          </div>

                          <div>
                            <p id="Clothing-heading" class="font-medium text-gray-900">
                              {{-- Centro de Ensino de Línguas --}}
                              @lang('translation.extension_services_ltc')
                            </p>
                            <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="/lang-center" class="hover:text-gray-800">
                                  {{-- - Apresentação --}}
                                  - @lang('translation.extension_services_ltc_presentation')
                                </a>
                              </li>
                            </ul>
                          </div>

                          <div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Extensão -->

              <a href="/labs" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
                {{-- LABPro --}}
                @lang('translation.labpro')
              </a>
            </div>
          </div>

          <div class="ml-auto flex items-center invisible1">
            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
              <a href="/news" class="text-sm font-medium text-gray-700 hover:text-gray-800">
                @lang('translation.news')
              </a>
              <a href="/events" class="text-sm font-medium text-gray-700 hover:text-gray-800">
                @lang('translation.events')
              </a>
              <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
              <a href="/contact" class="text-sm font-medium text-gray-700 hover:text-gray-800">
                @lang('translation.contacts')
              </a>
            </div>

            <div class="hidden lg:ml-8 lg:flex">
              {{-- <a href="#" class="text-gray-700 hover:text-gray-800 flex items-center">
                <img src="/flags/4x3/pt.svg" alt="" class="w-5 h-auto block flex-shrink-0">
                <span class="ml-3 block text-sm font-medium">
                  PT
                </span>
                <span class="sr-only">language</span>
              </a> --}}
              <!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative inline-block text-left" x-data="{open: false}">
  <div>
    {{-- {{ config('app.locales')[app()->getLocale()] }} --}}
    <button @click="open = !open" type="button" class="bg-gray-100 rounded-full flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-isptec" id="menu-button" aria-expanded="true" aria-haspopup="true">
      <span class="sr-only">Open options</span>
      <!-- Heroicon name: solid/dots-vertical -->
      {{-- <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
      </svg> --}}
      <img src="/flags/4x3/{{ (app()->getLocale() == 'en' ? 'gb' : app()->getLocale()) }}.svg" alt="" class="w-5 h-5">
    </button>
  </div>

  <!--
    Dropdown menu, show/hide based on menu state.

    Entering: "transition ease-out duration-100"
      From: "transform opacity-0 scale-95"
      To: "transform opacity-100 scale-100"
    Leaving: "transition ease-in duration-75"
      From: "transform opacity-100 scale-100"
      To: "transform opacity-0 scale-95"
  -->
  <div class="z-10 origin-top-right absolute right-0 mt-2 w-24 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" x-cloak x-show="open" @click.away="open = false">
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

            <!-- Search -->
            <div class="flex lg:ml-6" x-data="{open: false}">
              <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
                <span class="sr-only">Search</span>
                <!-- Heroicon name: outline/search -->
                <svg @click="open = !open" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </a>

              <div class="relative z-20" role="dialog" aria-modal="true">
                <!--
                  Background backdrop, show/hide based on modal state.
              
                  Entering: "ease-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in duration-200"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity" x-show="open"></div>
              
                <div class="fixed inset-0 z-20 overflow-y-auto p-4 sm:p-6 md:p-20" x-show="open">
                  <!--
                    Command palette, show/hide based on modal state.
              
                    Entering: "ease-out duration-300"
                      From: "opacity-0 scale-95"
                      To: "opacity-100 scale-100"
                    Leaving: "ease-in duration-200"
                      From: "opacity-100 scale-100"
                      To: "opacity-0 scale-95"
                  -->
                  <div class="mt-12 mx-auto max-w-xl transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all" x-cloak x-show="open" @keydown.escape="open = false" @click.away="open = false">
                    <div class="relative">
                      <!-- Heroicon name: solid/search -->
                      <svg class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                      </svg>
                      <input type="text" class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-800 placeholder-gray-400 focus:ring-0 sm:text-sm" placeholder="Pesquisar..." role="combobox" aria-expanded="false" aria-controls="options">
                    </div>
              
                    <!-- Results, show/hide based on command palette state -->
                    <ul class="max-h-96 scroll-py-3 overflow-y-auto p-3" id="options" role="listbox">
                      <!-- Active: "bg-gray-100" -->
                      <li class="group flex cursor-default select-none rounded-xl p-3" id="option-1" role="option" tabindex="-1">
                        {{-- <div class="flex h-10 w-10 flex-none items-center justify-center rounded-lg bg-indigo-500">
                          <!-- Heroicon name: outline/pencil-alt -->
                          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                          </svg>
                        </div>
                        <div class="ml-4 flex-auto">
                          <!-- Active: "text-gray-900", Not Active: "text-gray-700" -->
                          <p class="text-sm font-medium text-gray-700">Text</p>
                          <!-- Active: "text-gray-700", Not Active: "text-gray-500" -->
                          <p class="text-sm text-gray-500">Add freeform text with basic formatting options.</p>
                        </div> --}}
                      </li>
              
                      <!-- More items... -->
                    </ul>
              
                    <!-- Empty state, show/hide based on command palette state -->
                    <div class="py-14 px-6 text-center text-sm sm:px-14">
                      <!-- Heroicon name: outline/exclamation-circle -->
                      <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <p class="mt-4 font-semibold text-gray-900">Nenhum resultado encontrado</p>
                      <p class="mt-2 text-gray-500">Nenhum dado encontrado para este termo de pesquisa. Por favor, tente novamente.</p>
                    </div>
                  </div>
                </div>
              </div>


            </div>

            
          </div>
        </div>
      </div>
    </nav>