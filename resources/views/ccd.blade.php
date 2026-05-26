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
            <span class="block xl:inline">Cursos de</span>
            <span class="block text-isptec xl:inline">Curta Duração</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/2P7A7767.jpg') }}" alt="" loading="lazy"/>
  </div>
</div>






<div class="px-4 sm:px-6 lg:px-8 pt-12">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Cursos Disponíveis</h1>
        <p class="mt-2 text-sm text-gray-700">Escolha o seu próximo desafio.</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <div>
            <label for="search" class="block text-sm font-medium text-gray-700">Pesquisa</label>
            <div class="mt-1 relative flex items-center">
              <input type="text" name="search" id="search" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md">
              
            </div>
          </div>
      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <table class="min-w-full divide-y divide-gray-300">
            <thead>
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">Nome</th>
                <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Área</th>
                <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Formador</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0">
                  <span class="sr-only">Action</span>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">AutoCAD 3D</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Engenharia Civil</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Cristiano Zua</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                  <a href="#" class="text-gray-900 hover:text-isptec">Detalhes<span class="sr-only">, Lindsay Walton</span></a>
                </td>
              </tr>

              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">Hidráulica e Pneumática</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Engenharia Mecânica</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Pedro Semedo / Domingos Caboco</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                  <a href="#" class="text-gray-900 hover:text-isptec">Detalhes<span class="sr-only">, Lindsay Walton</span></a>
                </td>
              </tr>

              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">Gestão de Conflitos</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Soft Skills</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Celso da Silva</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                  <a href="#" class="text-gray-900 hover:text-isptec">Detalhes<span class="sr-only">, Lindsay Walton</span></a>
                </td>
              </tr>

              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">Atendimento ao Cliente</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Soft Skills</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Bebiana Sousa</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                  <a href="#" class="text-gray-900 hover:text-isptec">Detalhes<span class="sr-only">, Lindsay Walton</span></a>
                </td>
              </tr>

              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">Photoshop CC</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Design</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Fernando Caita</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                  <a href="#" class="text-gray-900 hover:text-isptec">Detalhes<span class="sr-only">, Lindsay Walton</span></a>
                </td>
              </tr>
  
              <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <hr class="mt-6">
  </div>

@endsection

@section('footer_scripts')

@endsection