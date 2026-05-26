@extends('layouts.front')

@section('content')
<section class="bg-white overflow-hidden">
  <div class="relative max-w-7xl mx-auto pt-20 pb-12 px-4 sm:px-6 lg:px-8 lg:py-20">
    <svg class="absolute top-full left-0 transform translate-x-80 -translate-y-24 lg:hidden" width="784" height="404" fill="none" viewBox="0 0 784 404" aria-hidden="true">
      <defs>
        <pattern id="e56e3f81-d9c1-4b83-a3ba-0d0ac8c32f32" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="784" height="404" fill="url(#e56e3f81-d9c1-4b83-a3ba-0d0ac8c32f32)" />
    </svg>

    <svg class="hidden lg:block absolute right-full top-1/2 transform translate-x-1/2 -translate-y-1/2" width="404" height="784" fill="none" viewBox="0 0 404 784" aria-hidden="true">
      <defs>
        <pattern id="56409614-3d62-4985-9a10-7ca758a8f4f0" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="784" fill="url(#56409614-3d62-4985-9a10-7ca758a8f4f0)" />
    </svg>

    <div class="relative lg:flex lg:items-center">
      <div class="aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
        <img class="object-cover shadow-lg rounded-lg" src="{{ asset('/campaign/IMG_8412.jpeg') }}" alt="" loading="lazy"/>
      </div>

      <div class="relative lg:ml-10">
        <svg class="absolute top-0 left-0 transform -translate-x-8 -translate-y-24 h-36 w-36 text-indigo-200 opacity-50" stroke="currentColor" fill="none" viewBox="0 0 144 144" aria-hidden="true">
          <path stroke-width="2" d="M41.485 15C17.753 31.753 1 59.208 1 89.455c0 24.664 14.891 39.09 32.109 39.09 16.287 0 28.386-13.03 28.386-28.387 0-15.356-10.703-26.524-24.663-26.524-2.792 0-6.515.465-7.446.93 2.327-15.821 17.218-34.435 32.11-43.742L41.485 15zm80.04 0c-23.268 16.753-40.02 44.208-40.02 74.455 0 24.664 14.891 39.09 32.109 39.09 15.822 0 28.386-13.03 28.386-28.387 0-15.356-11.168-26.524-25.129-26.524-2.792 0-6.049.465-6.98.93 2.327-15.821 16.753-34.435 31.644-43.742L121.525 15z" />
        </svg>
        <blockquote class="relative">
          <div class="leading-9 font-medium text-gray-900">
            <p class="text-justify">
            O ISPTEC foi fundado com uma proposta diferenciada baseada na elaboração dos processos educativos centrados nos princípios da indissociabilidade entre ensino, investigação e desenvolvimento e extensão. Desenvolve-se o ensino articulado com a investigação no percurso das actividades em sala de aula.
            </p><br>
            <p class="text-justify">Este procedimento promove a acção com reflexão, a implementação da investigação científica por projectos e a interacção com a comunidade através de projectos de extensão. Nesta perspectiva, o ISPTEC promove a formação académica e científica de profissionais capacitados, para contribuírem no desenvolvimento sustentável de Angola.</p><br>
            <p class="text-justify">
            Por outro lado, a infraestrutura construída no ISPTEC deve resultar na inserção real dos seus académicos na instituição promovendo a convivência na diversidade cultural e social, como princípios formativos característicos de uma instituição de ensino superior.
            </p><br>
            <p class="text-justify">
            É com base nestes princípios que apresentamos à comunidade em geral o Instituto Superior Politécnico de Tecnologias e Ciências (ISPTEC), como uma instituição de ideias, de pensamentos diferenciados e de integração com os diversos segmentos sociais que surge para agregar valor nos processos formativos da República de Angola.
            </p><br>
            <p class="text-justify font-bold">
            Seja bem-vindo ao ISPTEC!
            </p>
          </div>
          <footer class="mt-8">
            <div class="flex">
              <div class="flex-shrink-0 lg:hidden">
                <img class="h-12 w-12 rounded-full" src="{{ asset('/lecturers/Jose Samuco.jpg') }}" alt="" loading="lazy"/>
              </div>
              <div class="ml-4 lg:ml-0">
                <div class="text-base font-medium text-gray-900">Marcílio Santos</div>
                <div class="text-base font-medium text-isptec">Director Geral</div>
              </div>
            </div>
          </footer>
        </blockquote>
      </div>
    </div>
  </div>
</section>
@endsection

@section('footer_scripts')

@endsection