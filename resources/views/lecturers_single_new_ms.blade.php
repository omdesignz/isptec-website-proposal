@extends('layouts.front')

@section('content')
<main class="py-10" x-data="{ selected: '' }">
    <!-- Page header -->
    <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
      <div class="flex items-center space-x-5">
        <div class="flex-shrink-0">
          <div class="relative">
            <a href="#" @click="selected = ''">
              <img class="h-48 w-48 rounded-full border-8 border-yellow-300" src="{{ asset('/lecturers/Marcilio Santos_.jpg') }}" alt="" loading="lazy"/>
            <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
            </a>
          </div>
        </div>
        <div>
          <h1 class="text-2xl font-bold text-gray-900" @click="selected = ''">Marcílio Manuel dos Santos</h1>
          <p class="text-sm font-medium text-gray-500">PhD em Física Quântica Experimental, Universidade de Aberdeen</p>
        </div>
      </div>
      <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
        <a href="https://scitke.com" target="_blank" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-isptec">
          Página Associada
        </a>
        <a href="https://orcid.org/0000-0002-2906-8872" target="_blank" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-900 hover:bg-isptec transform transition-all hover:scale-125 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-isptec">
          Perfil ORCID
        </a>
      </div>
    </div>

    {{-- Tabbed Menu For Profile Sections --}}
    <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8 mt-2" x-data="{ selectedMobile: '' }">
      <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select a tab</label>
        <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
        <select x-model="selected" id="tabs" name="tabs" class="block w-full focus:ring-yellow-300 focus:border-yellow-300 border-gray-300 rounded-md">
          <option>Perfil</option>
          <option value="option-1">Trabalhos / Artigos Publicados</option>
          <option value="option-2">Trabalhos de TCC Orientados</option>
          <option value="option-3">Projectos de Investigação</option>
          <option value="option-4">Participações em Eventos Científicos</option>
          <option value="option-5">Associções das Quais é Membro</option>
        </select>
      </div>
      <div class="hidden sm:block">
        <div class="border-b border-gray-200">
          <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <!-- Current: "border-yellow-500 text-yellow-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
            <a href="#option-1" x-on:click="selected = 'option-1'" x-bind:class="{ 'border-yellow-300': selected === 'option-1' }" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
              <!--
                Heroicon name: solid/user
    
                Current: "text-yellow-500", Default: "text-gray-400 group-hover:text-gray-500"
              -->
              
              <span>Trabalhos / Artigos Publicados</span>
            </a>
    
            <a href="#option-2" x-on:click="selected = 'option-2'" x-bind:class="{ 'border-yellow-300': selected === 'option-2' }" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
              <span>Trabalhos de TCC Orientados</span>
            </a>
    
            <a href="#option-3" x-on:click="selected = 'option-3'" x-bind:class="{ 'border-yellow-300': selected === 'option-3' }" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
              <!-- Heroicon name: solid/users -->
              <span>Projectos de Investigação</span>
            </a>
    
            <a href="#option-4" x-on:click="selected = 'option-4'" x-bind:class="{ 'border-yellow-300': selected === 'option-4' }" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
              <!-- Heroicon name: solid/credit-card -->
              
              <span>Participações em Eventos Científicos</span>
            </a>

            <a href="#option-5" x-on:click="selected = 'option-5'" x-bind:class="{ 'border-yellow-300': selected === 'option-5' }" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
              <!-- Heroicon name: solid/credit-card -->
              
              <span>Associações das Quais é Membro</span>
            </a>
          </nav>

          {{-- <div x-show.transition.in.opacity.duration.750ms="selected === 'option-1'" class="p-4">
            ...1
          </div>

          <div x-show.transition.in.opacity.duration.750ms="selected === 'option-2'" class="p-4">
            ...2
          </div>

          <div x-show.transition.in.opacity.duration.750ms="selected === 'option-3'" class="p-4">
            ...3
          </div>

          <div x-show.transition.in.opacity.duration.750ms="selected === 'option-4'" class="p-4">
            ...4
          </div>

          <div x-show.transition.in.opacity.duration.750ms="selected === 'option-5'" class="p-4">
            ...5
          </div> --}}
        </div>
      </div>
    </div>

    <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-1">
      <div x-show="selected === 'option-1'" class="p-4" 
      x-transition:enter="transition ease-in-out duration-750"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
     >
        
        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
          Artigos / Publicações / Livros / Blogs
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                  <!-- Heroicon name: solid/paper-clip -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                  </svg>
                  <span class="ml-2 flex-1 w-0">
                    M.M. Dos Santos, et al., 'Towards Quantum Gravity Measurement by Cold Atoms', J. Plasma Physics (2013), vol. 79, part 4, pp. 437_442.
                  </span>
              </div>
              <div class="ml-4 flex-shrink-0">
                  <a href="https://www.cambridge.org/core/journals/journal-of-plasma-physics/article/abs/toward-quantum-gravity- measurement-by-cold-atoms/71773F064F41CAF94CDD2B3A15A62062" class="font-medium text-isptec hover:text-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                          </svg>
                  </a>
              </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                  <!-- Heroicon name: solid/paper-clip -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                  </svg>
                  <span class="ml-2 flex-1 w-0">
                    KCP Gabriel, AA Marcilio dos Santos, M Joana, N Correia, ‘Strategy to biodiesel Production Throught the Reactive Distillation Column Using Palm oil as feedstock’, Egyptian Journal of Petroleum, (2018);
                  </span>
              </div>
              <div class="ml-4 flex-shrink-0">
                  <a href="https://journals.co.za/doi/abs/10.1016/j.sajce.2019.02.001" class="font-medium text-isptec hover:text-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                          </svg>
                  </a>
              </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span class="ml-2 flex-1 w-0">
                      Biodiesel Production
                    </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <a href="https://www.researchgate.net/profile/Marcilio-Dos-Santos- Phd/publication/331960906_STRATEGY_TO_BIODIESEL_PRODUCTION_THROUGHT_THE_REACTIVE_DISTILATION_CO LUMN_USING_PALM_OIL_AS_FEEDSTOCK/links/5c950f88a6fdccd460336015/STRATEGY-TO-BIODIESEL- PRODUCTION-THROUGHT-THE-REACTIVE-DISTILATION-COLUMN-USING-PALM-OIL-AS-FEEDSTOCK.pdf" class="font-medium text-isptec hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                          </svg>
                    </a>
                </div>
                </li>
                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                  <div class="w-0 flex-1 flex items-center">
                      <!-- Heroicon name: solid/paper-clip -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                      </svg>
                      <span class="ml-2 flex-1 w-0">
                        AACB, Kamila Colombo, Laércio Ender, M.M.Santos, ‘Production of biodiesel from Soybean Oil and Methanol, catalyzed by calcium oxide in a recycle reactor’, Somosth African Journal of Chemical Engineering, (2019)
                      </span>
                  </div>
                  <div class="ml-4 flex-shrink-0">
                      <a href="https://www.sciencedirect.com/science/article/pii/S1026918518300945" class="font-medium text-isptec hover:text-gray-700">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                          </svg>
                      </a>
                  </div>
                  </li>
                  <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                    <div class="w-0 flex-1 flex items-center">
                        <!-- Heroicon name: solid/paper-clip -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                        <span class="ml-2 flex-1 w-0">
                          Diana Fumuassuca, M.M. Dos Santos, Antonio A. Chivanga, Pinch Analysis Applied to Atmospheric Distillation Column, Angolan Mineral, Oil and Gas Journal, Vol 1, (2020)
                        </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                        <a href="https://www.researchgate.net/profile/Marcilio-Dos-Santos- Phd/publication/343991262_Pinch_Analysis_Applied_to_Atmospheric_Distillation_Column/links/5fb6ccb3a6fdcc6cc6 4be8f5/Pinch-Analysis-Applied-to-Atmospheric-Distillation-Column.pdf" class="font-medium text-isptec hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                          </svg>
                        </a>
                    </div>
                    </li>
                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                      <div class="w-0 flex-1 flex items-center">
                          <!-- Heroicon name: solid/paper-clip -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                          </svg>
                          <span class="ml-2 flex-1 w-0">
                            Blog
                          </span>
                      </div>
                      <div class="ml-4 flex-shrink-0">
                          <a href="https://www.facebook.com/Scitecknoweledgy" class="font-medium text-isptec hover:text-gray-700">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                          </svg>
                          </a>
                      </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Website
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            <a href="https://www.Scitke.com" class="font-medium text-isptec hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                          </svg>
                            </a>
                        </div>
                        </li>
          </ul>
          </dd>
      </div>

      </div>

      <div x-show="selected === 'option-2'" class="p-4" 
      x-transition:enter="transition ease-in-out duration-750"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100">
        

        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
          Orientações de TCC, Dissertações, Teses
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                  <!-- Heroicon name: solid/paper-clip -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                  </svg>
                  <span class="ml-2 flex-1 w-0">
                    Co-supervisor do Mestrado em Petróleo, “Commissioning of Subsea Christmas Tree”, Paulo Simão, University of Manchester, 2015-2016, Manchester, UK
                  </span>
              </div>
              <div class="ml-4 flex-shrink-0">
                  
              </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                  <!-- Heroicon name: solid/paper-clip -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                  </svg>
                  <span class="ml-2 flex-1 w-0">
                    The Physics and Computer Aided Design of a Magneto-Optical Trap, Co-supervision, November- March, Honours Year Project, (2013), P.S. Heymann, University of Aberdeen, UK
                  </span>
              </div>
              <div class="ml-4 flex-shrink-0">
                  
              </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span class="ml-2 flex-1 w-0">
                      Elaboração da Proposta do Curso de Pós-graduação em Mestrado de Engenharia de Petróleos e Geociências para o ISPTEC ainda a ser aprovado pelo Ministério do Ensino Superior (2016)
                    </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                    
                </div>
                </li>
                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                  <div class="w-0 flex-1 flex items-center">
                      <!-- Heroicon name: solid/paper-clip -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                      </svg>
                      <span class="ml-2 flex-1 w-0">
                        Elaboração da Proposta do Curso de Pós-graduação em Especialização em Geociências de Petróleos para o ISPTEC, proposta a ser aprovada pelo Ministério do Ensino Superior (2016)
                      </span>
                  </div>
                  <div class="ml-4 flex-shrink-0">
                      
                  </div>
                  </li>
                  <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                    <div class="w-0 flex-1 flex items-center">
                        <!-- Heroicon name: solid/paper-clip -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                        <span class="ml-2 flex-1 w-0">
                          Orientou a Monografia Intitulado: Integração Energética da Unidade de Destilação Atmosférica de Petróleo Usando o Método Pinch; Rosa Fumuassuca, Dept. Engenharia Química, ISPTEC, (2017)
                        </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                        
                    </div>
                    </li>
                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                      <div class="w-0 flex-1 flex items-center">
                          <!-- Heroicon name: solid/paper-clip -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                          </svg>
                          <span class="ml-2 flex-1 w-0">
                            Orientou a Monografia Intitulado: Tratamentos de Águas Industriais em Refinarias de Petróleo; Naiol Shneider de Abreu Chinjenje, Dep. Engenharia Química, ISPTEC, (2017)
                          </span>
                      </div>
                      <div class="ml-4 flex-shrink-0">
                          
                      </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Reciclagem de Polietileno de Baixa Densidade; Ailton Correia José Kapassola, Dep. Engenharia Química, ISPTEC, (2017)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Produção do Polietileno de Alta Densidade; Anatoli Luis Diogo António, Dep. Engenharia Química, ISPTEC, (2017)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Produção de Óleos Lubrificantes; Anibal Pintinho Canzenze, Dep. Engenharia Química, ISPTEC, (2017)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Processo do Fabrico do Cimento; Elisandra Lima do Nascimento Alberto, Dep. Engenharia Química, ISPTEC, (2017)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Reforma Catalítica: Viabilidade de Restruturação da Unidade 700- Platforming da Refinaria de Luanda; Gracinda Jéssica Verdades Pimenta, Dep. Engenharia Química, ISPTEC, (2017)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Produção do Papel A partir do Bagaço da Cana de Açucar; Gracinda Jéssica Verdades Pimenta, Dep. Engenharia Química, ISPTEC, (2017)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Produção de Fibras para Confecção Têxtil a partir de Garrafas Plásticas recicladas; Marlene Luzia da Silva Mendes, Dep. Engenharia Química, ISPTEC, (2018)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Reutilização do Pneu para Produção do Asfalto; Naftal Reginaldo Muedi Quimino, Dep. Engenharia Química, ISPTEC, (2018)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Optimização Energética do Processo de Refinação De Petróleo Para a Produção de Óleos Básicos De Lubrificação; Helenio Nascimento Ernesto , Dep. Engenharia Química, ISPTEC, (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Modelagem de Veículo Baja Offroad com Auxílio de Software de Simulação Multicorpos, Tchiver Mondlane Martins Cardoso, Dep. Engenharia Mecânica, ISPTEC, (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Produção de Fertilizantes a Partir de Resíduos Orgânicos, Aura Chinaualile Capela Gideão, Dep. Engenharia Química, ISPTEC, (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Valorização dos Resíduos Industriais: Produção de Biogás e Biofertilizantes em Agro-Industrias, Esperança da Glória Marques Pinto, Dep. Engenharia Química, ISPTEC, (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Desenho, Construção e Ensaio de Uma Turbina Hidráulica de Vórtice Gravitacional, Eleázar Kelven Xavier Faustino, Dep. Engenharia Mecânica, ISPTEC, (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Produção de Bio-Etanol a Partir do Amido de Mandioca, Ariane Rebeca Lusadisu Nhany, Dep. Engenharia Química, ISPTEC, (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Desenvolvimento dos Injectores dos Motores De Propulsão Rocket Mandume A E Ekuikui II do Projecto - PIDEIRA, Júlio José Lubua;Dep. Engenharia Química, ISPTEC, (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Implementação de Turbobombas em Motores de Propulsão De Foguete- Uma Aplicação para o PIDEIRA; Chelsia Teodósia Da Silva José, Dep. Engenharia Mecânica, ISPTEC, (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Integração do Rocket do Pidera Sistema de Controle de Performance Usando Simulink E Labview; Ataíde Ringote De Castro Jorge, Dep. Engenharia Mecânica, ISPTEC, (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou a Monografia Intitulado: Construção E Simulação de Uma Câmara de Combustão do Motor A Propulsão Líquida, Mandume-A do Primeiro Estágio Do Pideira; Eurico Edwander Sampaio dos Santos, Dep. Engenharia Mecânica, ISPTEC, (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Orientou A Monografia Intitulado: Proposta de Construção do Mecanismo Gimbal para Controle de Atitude do Rocket do PIDEIRA; Benison Daniel Massala, Dep. Engenharia Mecânica, ISPTEC, (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
          </ul>
          
          </dd>
      </div>
      
      </div>

      <div x-show="selected === 'option-3'" class="p-4"
      x-transition:enter="transition ease-in-out duration-750"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100">
        

        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
          Projectos
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Coordenador do Projecto: Ventilador Mecanico A18 (Não invasivo) e Esmeralda (Invasivo) – Projecto em fase de execução para salvar vítimas do Covid-19, Aplicável a Patente, ISPTEC e Grupo Brisas (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Co-criador do Túnel de Desinfestação na prevenção contra o Covid-19, ISPTEC (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Coordenador da Equipa de Desenvolvimento do Alcool Glicerinado Antisséptico no ISPTEC para a prevenção do Covid-19 com potencial industrial (2020)
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Coordenador da Equipa de "Souda Câustica" no ISPTEC 2020-Presente
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Coodernador da Equipa do "Extração de Silício para fabrico de paines solares". 2020- presente
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Coordenador do PIDEIRA - Projecto de Desenvolvimento do Rocket Angolano e Microsatelites (Cubesat)- 2018-presente
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Coordenador do Projecto: Carro Eléctrico - 2019-presente
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Coordenador do Projecto: Green Hydrogen - 2021- presente
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Coordenador do Projecto: Quantum Gravity, Information and Computing, 2014-presente
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Coordenador do Projecto: Reverse Engineering Program, 2018-presente
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            
                        </div>
                      </li>
          </ul>
        
          </dd>
      </div>


      </div>

      <div x-show="selected === 'option-4'" class="p-4"
      x-transition:enter="transition ease-in-out duration-750"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100">
        
        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Eventos / Conferências / Webinars / Seminários
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                  <!-- Heroicon name: solid/paper-clip -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                  </svg>
                  <span class="ml-2 flex-1 w-0">
                    Young Atom Opticians (YAO), Talk, 8-12 April Conference, (2013), University of Birmingham, UK
                  </span>
              </div>
              <div class="ml-4 flex-shrink-0">
                  <a href="https://www.facebook.com/YAO2013/" class="font-medium text-isptec hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                  </a>
              </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                  <!-- Heroicon name: solid/paper-clip -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                  </svg>
                  <span class="ml-2 flex-1 w-0">
                    Quantum Fields, Gravity and Information, Talk, 3-5 April Conference, (2013), University of Nottingham, UK
                  </span>
              </div>
              <div class="ml-4 flex-shrink-0">
                  <a href="https://qfgi2013.weebly.com/uploads/1/1/2/6/11269792/conference_program_modified.pdf" class="font-medium text-isptec hover:text-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                  </a>
              </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span class="ml-2 flex-1 w-0">
                      Atom Interferometry, Attendance, 14-20 July Summer course, (2013), International School of Physics 'Enrico Fermi', Lake Como, Italy
                    </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <a href="https://primo.rowan.edu/discovery/fulldisplay/alma9920940780205201/01ROWU_INST:ROWAN" class="font-medium text-isptec hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                    </a>
                </div>
                </li>
                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                  <div class="w-0 flex-1 flex items-center">
                      <!-- Heroicon name: solid/paper-clip -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                      </svg>
                      <span class="ml-2 flex-1 w-0">
                        The Principles and Applications of Control in Quantum Systems, Poster, 4-8 August Conference, (2014), Institute of Mathematics ' Isaac Newton', University of Cambridge, UK
                      </span>
                  </div>
                  <div class="ml-4 flex-shrink-0">
                      <a href="https://www.newton.ac.uk/event/qcew01/" class="font-medium text-isptec hover:text-gray-700">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                      </a>
                  </div>
                  </li>
                  <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                    <div class="w-0 flex-1 flex items-center">
                        <!-- Heroicon name: solid/paper-clip -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                        <span class="ml-2 flex-1 w-0">
                          International Petroleum Conference in Advanced Technologies in Oil Exploration and Production, Talk, 14-15 March, (2016), Skyna Hotel, Luanda, Angola;
                        </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                        <a href="#" class="font-medium text-isptec hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                        </a>
                    </div>
                    </li>
                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                      <div class="w-0 flex-1 flex items-center">
                          <!-- Heroicon name: solid/paper-clip -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                          </svg>
                          <span class="ml-2 flex-1 w-0">
                            Óptica Quântica e Atómica, Talk, 5 Outubro (2018), Faculdade de Ciências, Universidade Agostinho Neto, Luanda, Angola.
                          </span>
                      </div>
                      <div class="ml-4 flex-shrink-0">
                          <a href="#" class="font-medium text-isptec hover:text-gray-700">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                          </a>
                      </div>
                      </li>
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <span class="ml-2 flex-1 w-0">
                              Impacto da Metrologia no Processo de Diversificação da Economia Nacional, Workshop sobre Metrologia, Talk, IANORQ, 23 de Maio (2019), Luanda, Angola.
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            <a href="#" class="font-medium text-isptec hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                            </a>
                        </div>
                        </li>
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                          <div class="w-0 flex-1 flex items-center">
                              <!-- Heroicon name: solid/paper-clip -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                              </svg>
                              <span class="ml-2 flex-1 w-0">
                                Visita Científica - Team of Quantum Optics, University of Kwazulu Natal, 22-29 de Julho (2019), Kwazulu-Natal, South Africa.
                              </span>
                          </div>
                          <div class="ml-4 flex-shrink-0">
                              <a href="#" class="font-medium text-isptec hover:text-gray-700">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                              </a>
                          </div>
                          </li>
                          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 flex items-center">
                                <!-- Heroicon name: solid/paper-clip -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                                <span class="ml-2 flex-1 w-0">
                                  Webinar sobre o UNI-AO - Programa de formação de Cursos de Pos-graduação da Embaixada Francesa, online, 20 Julho (2020), Luanda, Angola.
                                </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                </a>
                            </div>
                            </li>
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                              <div class="w-0 flex-1 flex items-center">
                                  <!-- Heroicon name: solid/paper-clip -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                  </svg>
                                  <span class="ml-2 flex-1 w-0">
                                    Seminário sobre a criação, gestão e indexação de Revistas Científicas, MESCTI, 29 de Julho, 5 e 12 de Agosto (2020). online, Luanda e México.
                                  </span>
                              </div>
                              <div class="ml-4 flex-shrink-0">
                                  <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                  </a>
                              </div>
                              </li>
                              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                    <!-- Heroicon name: solid/paper-clip -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0">
                                      Covid-19 Processo de Testagem, Clinica Girassol, 4 de Setembro (2020), Luanda, Angola.
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                    </a>
                                </div>
                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                  <div class="w-0 flex-1 flex items-center">
                                      <!-- Heroicon name: solid/paper-clip -->
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                      </svg>
                                      <span class="ml-2 flex-1 w-0">
                                        Apresentação da Revista Cientifica AMOGJ, ISPTEC, 9 de Outubro (2020), Luanda, Angola.
                                      </span>
                                  </div>
                                  <div class="ml-4 flex-shrink-0">
                                      <a href="https://www.isptec.co.ao/noticia/isptec-acolhe-o-acto-oficial-do-lancamento-da-revista-cientifica-angolan-mineral-oil- and-gas-journal-(amogji)" class="font-medium text-isptec hover:text-gray-700">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                      </a>
                                  </div>
                                  </li>
                                  <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <!-- Heroicon name: solid/paper-clip -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                        </svg>
                                        <span class="ml-2 flex-1 w-0">
                                          Estudante Finalista do ISPTEC, Workshop, ISPTEC, 26 de Novembro (2020), Luanda, Angola.
                                        </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                        </a>
                                    </div>
                                    </li>
                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                      <div class="w-0 flex-1 flex items-center">
                                          <!-- Heroicon name: solid/paper-clip -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                          </svg>
                                          <span class="ml-2 flex-1 w-0">
                                            Agil Webinar, ISPTEC, Online, 3 de Março (2021), Luanda, Angola e Brasil.
                                          </span>
                                      </div>
                                      <div class="ml-4 flex-shrink-0">
                                          <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                          </a>
                                      </div>
                                      </li>
                                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                        <div class="w-0 flex-1 flex items-center">
                                            <!-- Heroicon name: solid/paper-clip -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                            </svg>
                                            <span class="ml-2 flex-1 w-0">
                                              1º Programa Nacional de Educação Fiscal da AGT, Abertura, ISPTEC, Luanda - Angola
                                            </span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <a href="https://www.isptec.co.ao/noticia/director-geral-do-isptec-preside-cerimonia-de-abertura-do-1-programa-nacional-de- educacao-fiscal-da-(agt)" class="font-medium text-isptec hover:text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                            </a>
                                        </div>
                                        </li>
                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                          <div class="w-0 flex-1 flex items-center">
                                              <!-- Heroicon name: solid/paper-clip -->
                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                              </svg>
                                              <span class="ml-2 flex-1 w-0">
                                                Dia Mundial da Engenharia Sustentável, ISPTEC, 4 de Março (2021), Luanda, Angola.
                                              </span>
                                          </div>
                                          <div class="ml-4 flex-shrink-0">
                                              <a href="https://www.isptec.co.ao/noticia/isptec-celebra-o-dia-mundial-da-engenharia-para-o-desenvolvimento-sustentavel" class="font-medium text-isptec hover:text-gray-700">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                              </a>
                                          </div>
                                          </li>
                                          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                            <div class="w-0 flex-1 flex items-center">
                                                <!-- Heroicon name: solid/paper-clip -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                </svg>
                                                <span class="ml-2 flex-1 w-0">
                                                  Workshop Dia Mundial das Águas, EPAL, Luanda, 19 de Março (2021), Luanda, Angola.
                                                </span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                </a>
                                            </div>
                                            </li>
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                              <div class="w-0 flex-1 flex items-center">
                                                  <!-- Heroicon name: solid/paper-clip -->
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                  </svg>
                                                  <span class="ml-2 flex-1 w-0">
                                                    Conselho Nacional do Ensino Superior, MESCTI, Online, 29 de Março (2021), Luanda, Angola
                                                  </span>
                                              </div>
                                              <div class="ml-4 flex-shrink-0">
                                                  <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                  </a>
                                              </div>
                                              </li>
                                              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <!-- Heroicon name: solid/paper-clip -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0">
                                                      Jornadas Científicas, Washable - Ambiente, Universidade Catolica, 22 de Abril (2021), Luanda, Angola
                                                    </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                    <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                    </a>
                                                </div>
                                                </li>
                                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                  <div class="w-0 flex-1 flex items-center">
                                                      <!-- Heroicon name: solid/paper-clip -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                      </svg>
                                                      <span class="ml-2 flex-1 w-0">
                                                        O Impacto da Lei da Protecção de Dados Pessoais nas Insituições de Ensino Superior, Webinar, 28 Abril (2021), Luanda, Angola.
                                                      </span>
                                                  </div>
                                                  <div class="ml-4 flex-shrink-0">
                                                      <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                      </a>
                                                  </div>
                                                  </li>
                                                  <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <!-- Heroicon name: solid/paper-clip -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0">
                                                          Semana Academica de Engenharia Mecânica, Abertura e Participação, ISPTEC, 10 de Maio 2021, Luanda, Angola.
                                                        </span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        <a href="https://www.isptec.co.ao/noticia/isptec-realiza-a-1-edicao-da-semana-academica-de-engenharias" class="font-medium text-isptec hover:text-gray-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                        </a>
                                                    </div>
                                                    </li>
                                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                      <div class="w-0 flex-1 flex items-center">
                                                          <!-- Heroicon name: solid/paper-clip -->
                                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                          </svg>
                                                          <span class="ml-2 flex-1 w-0">
                                                            7º Forum da AIESPA, Universidade Jean Piaget, 20-21 de Maio (2021), Luanda, Angola.
                                                          </span>
                                                      </div>
                                                      <div class="ml-4 flex-shrink-0">
                                                          <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                          </a>
                                                      </div>
                                                      </li>
                                                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                        <div class="w-0 flex-1 flex items-center">
                                                            <!-- Heroicon name: solid/paper-clip -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                            </svg>
                                                            <span class="ml-2 flex-1 w-0">
                                                              Conferencia de Gestão de Dados Petrolíferos, ANPG, Online, 27-28 de Maio (2021), Luanda, Angola e USA
                                                            </span>
                                                        </div>
                                                        <div class="ml-4 flex-shrink-0">
                                                            <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                            </a>
                                                        </div>
                                                        </li>
                                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                          <div class="w-0 flex-1 flex items-center">
                                                              <!-- Heroicon name: solid/paper-clip -->
                                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                              </svg>
                                                              <span class="ml-2 flex-1 w-0">
                                                                Exposição de Projectos de Estudantes do Departamento de Ciências Sociais Aplicadas, Participação, ISPTEC, 25 de Junho 2021, Luanda, Angola.
                                                              </span>
                                                          </div>
                                                          <div class="ml-4 flex-shrink-0">
                                                              <a href="https://www.isptec.co.ao/noticia/estudantes-do-isptec-realizam-exposicao-de-projectos-" class="font-medium text-isptec hover:text-gray-700">
                                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                              </a>
                                                          </div>
                                                          </li>
                                                          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                            <div class="w-0 flex-1 flex items-center">
                                                                <!-- Heroicon name: solid/paper-clip -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                                </svg>
                                                                <span class="ml-2 flex-1 w-0">
                                                                  Workshop da AAU Association of African Universities, Acra, Ghana, Online, 6-8 de Julho (2021), Accra, Ghana.
                                                                </span>
                                                            </div>
                                                            <div class="ml-4 flex-shrink-0">
                                                                <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                            </li>
                                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                              <div class="w-0 flex-1 flex items-center">
                                                                  <!-- Heroicon name: solid/paper-clip -->
                                                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                                  </svg>
                                                                  <span class="ml-2 flex-1 w-0">
                                                                    Seminario Transição Ecológica, Digital e Diplomacia Climática, 22 Setembro (2021), Hotel Epic Sana. , Luanda, Angola.
                                                                  </span>
                                                              </div>
                                                              <div class="ml-4 flex-shrink-0">
                                                                  <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                                  </a>
                                                              </div>
                                                              </li>
                                                              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                                <div class="w-0 flex-1 flex items-center">
                                                                    <!-- Heroicon name: solid/paper-clip -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                                    </svg>
                                                                    <span class="ml-2 flex-1 w-0">
                                                                      Conselho Consultivo de Inovação e Empreendedorismo do MESCTI, 8 Outubro (2021), Luanda, Angola.
                                                                    </span>
                                                                </div>
                                                                <div class="ml-4 flex-shrink-0">
                                                                    <a href="#" class="font-medium text-isptec hover:text-gray-700">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                                    </a>
                                                                </div>
                                                                </li>
                                                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                                  <div class="w-0 flex-1 flex items-center">
                                                                      <!-- Heroicon name: solid/paper-clip -->
                                                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                                      </svg>
                                                                      <span class="ml-2 flex-1 w-0">
                                                                        Semana Academica de Engenharia Química, Abertura e Participação, ISPTEC, 18-22 de Outubro 2021, Luanda, Angola.
                                                                      </span>
                                                                  </div>
                                                                  <div class="ml-4 flex-shrink-0">
                                                                      <a href="https://www.isptec.co.ao/noticia/-semana-academica-de-engenharia-do-isptec-atrai-oradores-internacionais" class="font-medium text-isptec hover:text-gray-700">
                                                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                                      </a>
                                                                  </div>
                                                                  </li>
                                                                  <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                                    <div class="w-0 flex-1 flex items-center">
                                                                        <!-- Heroicon name: solid/paper-clip -->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                                        </svg>
                                                                        <span class="ml-2 flex-1 w-0">
                                                                          Concurso Nacional Universitário de Programação, AOCPC, ISPTEC, 9-10 de Novembro 2021, Luanda, Angola.
                                                                        </span>
                                                                    </div>
                                                                    <div class="ml-4 flex-shrink-0">
                                                                        <a href="https://www.isptec.co.ao/noticia/concurso-de-programacao-estudantes-do-isptec-irao-pela-2-vez-representar-angola- no-egipto" class="font-medium text-isptec hover:text-gray-700">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                                        </a>
                                                                    </div>
                                                                    </li>
                                                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                                      <div class="w-0 flex-1 flex items-center">
                                                                          <!-- Heroicon name: solid/paper-clip -->
                                                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                                          </svg>
                                                                          <span class="ml-2 flex-1 w-0">
                                                                            Semana Academica de Engenharia de Produção Industrial, Abertura e Participação, ISPTEC, 22 Novembro 2021, Luanda, Angola.
                                                                          </span>
                                                                      </div>
                                                                      <div class="ml-4 flex-shrink-0">
                                                                          <a href="https://www.isptec.co.ao/noticia/isptec-realiza-semana-academica-de-engenharia-de-producao-industrial" class="font-medium text-isptec hover:text-gray-700">
                                                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                                          </a>
                                                                      </div>
                                                                      </li>
                                                                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                                        <div class="w-0 flex-1 flex items-center">
                                                                            <!-- Heroicon name: solid/paper-clip -->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                                            </svg>
                                                                            <span class="ml-2 flex-1 w-0">
                                                                              CICSA Ciclo de Palestra e Seminários sobre Debate Económico, participação, ISPTEC, 03 Dezembro 2021, Luanda, Angola.
                                                                            </span>
                                                                        </div>
                                                                        <div class="ml-4 flex-shrink-0">
                                                                            <a href="https://www.isptec.co.ao/noticia/cicsa--isptec-realiza-acesos-debates-economicos-com-ciclo-de-palestras-e- seminarios" class="font-medium text-isptec hover:text-gray-700">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                                                    </svg>
                                                                            </a>
                                                                        </div>
                                                                        </li>
          </ul>
          </dd>
      </div>
      
      </div>

      <div x-show="selected === 'option-5'" class="p-4"
      x-transition:enter="transition ease-in-out duration-750"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100">
        

        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Associações/Afiliações/Colaborações
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span class="ml-2 flex-1 w-0">
                      Institute of Mechanical Engineers (IMechE) - Membros afiliado a IMechE (Instituto de Engenheiro Mecânicos). E correntemente somos associado AIMechE - Membros afiliado a IMechE (Instituto de Engenheiro Mecânicos). E correntemente somos associado AIMechE
                    </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                    
                </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span class="ml-2 flex-1 w-0">
                      Institute of Physics (IoP) - Também está a afiliado à IoP (Instituto de Física), e é atualmente membro da mesma instituição
                    </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                    
                </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span class="ml-2 flex-1 w-0">
                      Ordem dos Engenheiros de Angola (OEA) - Membro Activo da Ordem dos Engenheiros de Angola - nº 5017
                    </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                    
                </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span class="ml-2 flex-1 w-0">
                      Associação Angola de Manutenção e Gestão de Activos (AAMGA) - Eleito como Vogal da Direcção no mandato de 2018-2021
                    </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                    
                </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span class="ml-2 flex-1 w-0">
                      Comissão Nacional Electrotécnica (CNE) do IANORQ - Membro Activo da Comissão Nacional Electrotécnica Coordenada pelo IANORQ. Temos a missão de trabalharmos para o melhoramento e adequação das normas electrotécnica Nacional (Angola)
                    </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                    
                </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span class="ml-2 flex-1 w-0">
                      Comissão para Criação e Instalação da Empresa de Energias Renováveis Sonangol – ENI - Membro Activo da Comissão de Criação e Instalação da empresa de energias renováveis 2018-2020 (Angola)
                    </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                    
                </div>
              </li>
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span class="ml-2 flex-1 w-0">
                      Associação dos Antigos Estudantes Angolanos no Reino Unido (AAEARU) - Membro activo da associação
                    </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                    
                </div>
              </li>
  </ul>
          
          </dd>
      </div>


      </div>
    </div>

    <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-1" x-show="selected == ''">
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
                    Marcílio Manuel dos Santos
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Cargo e/ou titulo actual
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    Director Geral
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Departamento Afiliado
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    Departamento de Engenharias e Tecnologias
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Contactos Institucionais
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    marcilio.santos@isptec.co.ao | 226 690 323/24
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Orcid ID
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    0000-0002-2906-8872
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Disciplinas Leccionadas
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    Tópicos de Engenharia de Petróleo; Pesquisa Operacional 1 e 2
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Histórico Académico
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    2014 - PhD em Física Quântica Experimental, Universidade de Aberdeen <br> <br>
                    2011 - MEng Mecanica e Controlo, Universidade de Aberdeen
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Trajectória Profissional
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    2012 - 2014: Durante o seu doutoramento trabalhou como o Assistente Principal de Investigação Científica em Física Quântica no laboratório de ultracold atoms na Universidade de Aberdeen. É de notar que o mesmo construiu tal laboratório de raiz, sendo assim o primeiro laboratório de física quântica, após a descoberta do electrão por JJ Thompson, naquela universidade. Neste laboratório teve como objectivo o desenvolvimento de uma nova tecnologia de inspeção de risers e pipelines para a BP. Durante ainda o seu doutoramento, esteve a receber o seu treinamento experimental e a trabalhar em Rutherford Appleton Laboratory (RAL) em Oxford, onde aprendeu as técnicas de Experimental Quantum Optics e os princípios funcionais de uma rede de laboratórios. De salientar que o RAL é considerado como um dos maiores polos científicos do Reino Unido. <br> <br>
                    2014-2016: Afecto a Academia Sonangol, no Departamento de Educação Corporativa como técnico de formação, em que o seu objectivo foi o de desenhar, gerir e prever as formações de quadros dentro do Grupo Sonangol. Ainda dentro do mesmo departamento fez parte de uma equipa multidisciplinar para a criação e instalação do primeiro Centro de Investigação e Tecnologia da Indústria Petrolífera (CPD) da Sonangol E.P. agora denominada Coordenação do Centro de Investigação Científica e Inovação. <br> <br>
                    2014-Presente: Colabora como Professor do ISPTEC, em que lecciona cadeiras técnicas como Pesquisa Operacional (3o Ano universitário) e Tópicos de Engenharia de Petróleo (5o Ano universitário). Por outro lado, realizou também trabalhos de consultoria e montagem nos laboratórios profissionalizantes do ISPTEC nesta altura. Um exemplo do mesmo são as montagens dos Laboratórios de Observações que formam um conglomerado de 5 laboratórios no total. <br> <br>
                    2017- 2020: Director dos Laboratórios Profissionalizantes dos ISPTEC – colaborando como Professor do ISPTEC. E como Director dos Laboratórios Profissionalizantes, o mesmo geriu um leque de 34 laboratórios e 27 funcionários. Os laboratórios têm como objectivo dar cobertura ao tripé de ensino: Ensino, Investigação Científica e Extensão Universitária, em que neste último, encontram-se as prestações de serviços. <br> <br>
                    2020 - Presente: Director Geral do ISPTEC – Nesta nova missão, o Director tem como missão principal posicionar o ISPTEC nos Rankings Internacionais como THE World Ranking nos próxmos 6-8 anos. <br> <br>
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                    Áreas de Interesse / Área de Investigação
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-justify">
                    Quantum Gravity; Atom Interferometry; Quantum Physics, Quantum information / Computing; Renewable Energy (Fuel cells, Biodiesel, solar, Green hydrogen), Aerospace (rocketry), control engineering, Automotive, Carbon sequestration, Reverse Engineering, Artificial Intelligence, Chaos, Science communication, Clean Water and Sustainability.
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
    </div>
  </main>
@endsection