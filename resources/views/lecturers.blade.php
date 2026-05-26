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
            <span class="block xl:inline">O SEU FUTURO</span>
            <span class="block text-isptec xl:inline">em mãos seguras</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            Conheça o nosso corpo docente
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/IMG_8412.jpeg') }}" alt="" loading="lazy"/>
  </div>
</div>

<div class="bg-white">
  <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
    <div class="space-y-12">
      <ul role="list" class="space-y-12 lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8 lg:gap-y-12 lg:space-y-0">
        <li>
          <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8">
            <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
              <a href="/lecturers-single-new-ms">
              <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/lecturers/Marcilio Santos_.jpg') }}" alt="" loading="lazy"/>
              </a>
            </div>
            <div class="sm:col-span-2">
              <div class="space-y-4">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3>Marcílio Santos</h3>
                  <p class="text-indigo-600">DEPT.</p>
                </div>
                <div class="text-lg">
                  <p class="text-gray-500"></p>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="bg-white">
  <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
    <div class="space-y-12">
      <ul role="list" class="space-y-12 lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8 lg:gap-y-12 lg:space-y-0">
        
        <li>
          <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8 pb-2">
            <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
              <a href="#">
              <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/lecturers/Abreu Liliano.jpg') }}" alt="" loading="lazy"/>
              </a>
            </div>
            <div class="sm:col-span-2">
              <div class="space-y-4">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3>Abreu Liliano</h3>
                  <p class="text-indigo-600">DEPT.</p>
                </div>
                <div class="text-lg">
                  <p class="text-gray-500"></p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li>
          <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8 pb-2">
            <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
              <a href="#">
              <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/lecturers/Adao Paulo.jpg') }}" alt="" loading="lazy"/>
              </a>
            </div>
            <div class="sm:col-span-2">
              <div class="space-y-4">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3>Adão Paulo</h3>
                  <p class="text-indigo-600">DEPT.</p>
                </div>
                <div class="text-lg">
                  <p class="text-gray-500"></p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li>
          <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8 pb-2">
            <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
              <a href="#">
              <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/lecturers/Alexandre Ernesto.jpg') }}" alt="" loading="lazy"/>
              </a>
            </div>
            <div class="sm:col-span-2">
              <div class="space-y-4">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3>Alexandre Ernesto</h3>
                  <p class="text-indigo-600">DEPT.</p>
                </div>
                <div class="text-lg">
                  <p class="text-gray-500"></p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li>
          <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8 pb-2">
            <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
              <a href="#">
              <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/lecturers/Bernardo Augusto.jpg') }}" alt="" loading="lazy"/>
              </a>
            </div>
            <div class="sm:col-span-2">
              <div class="space-y-4">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3>Bernardo Augusto</h3>
                  <p class="text-indigo-600">DEPT.</p>
                </div>
                <div class="text-lg">
                  <p class="text-gray-500"></p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li>
          <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8 pb-2">
            <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
              <a href="#">
              <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/lecturers/Bibiana Sousa.jpg') }}" alt="" loading="lazy"/>
              </a>
            </div>
            <div class="sm:col-span-2">
              <div class="space-y-4">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3>Bibiana Sousa</h3>
                  <p class="text-indigo-600">DEPT.</p>
                </div>
                <div class="text-lg">
                  <p class="text-gray-500"></p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li>
          <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8 pb-2">
            <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
              <a href="#">
              <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/lecturers/Carlos Lopes.jpg') }}" alt="" loading="lazy"/>
              </a>
            </div>
            <div class="sm:col-span-2">
              <div class="space-y-4">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3>Carlos Lopes</h3>
                  <p class="text-indigo-600">DEPT.</p>
                </div>
                <div class="text-lg">
                  <p class="text-gray-500"></p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li>
          <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8 pb-2">
            <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
              <a href="#">
              <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/lecturers/Claudia Matoso.jpg') }}" alt="" loading="lazy"/>
              </a>
            </div>
            <div class="sm:col-span-2">
              <div class="space-y-4">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3>Claudia Matoso</h3>
                  <p class="text-indigo-600">DEPT.</p>
                </div>
                <div class="text-lg">
                  <p class="text-gray-500"></p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li>
          <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8 pb-2">
            <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
              <a href="#">
              <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/lecturers/Debs Tavares.jpg') }}" alt="" loading="lazy"/>
              </a>
            </div>
            <div class="sm:col-span-2">
              <div class="space-y-4">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3>Debs Tavares</h3>
                  <p class="text-indigo-600">DEPT.</p>
                </div>
                <div class="text-lg">
                  <p class="text-gray-500"></p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li>
          <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8 pb-2">
            <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
              <a href="#">
              <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/lecturers/Frayma Sanches.jpg') }}" alt="" loading="lazy"/>
              </a>
            </div>
            <div class="sm:col-span-2">
              <div class="space-y-4">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3>Frayma Sanches</h3>
                  <p class="text-indigo-600">DEPT.</p>
                </div>
                <div class="text-lg">
                  <p class="text-gray-500"></p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li>
          <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8 pb-2">
            <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
              <a href="#">
              <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/lecturers/Leticia Bravo.jpg') }}" alt="" loading="lazy"/>
              </a>
            </div>
            <div class="sm:col-span-2">
              <div class="space-y-4">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3>Leticia Bravo</h3>
                  <p class="text-indigo-600">DEPT.</p>
                </div>
                <div class="text-lg">
                  <p class="text-gray-500"></p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <!-- More people... -->
      </ul>
    </div>
  </div>
</div>
@endsection

@section('footer_scripts')

@endsection