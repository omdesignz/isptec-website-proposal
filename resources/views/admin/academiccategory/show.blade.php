@extends('layouts.backend')

@section('title')
Níveis Académicos
@endsection

@section('search_helper')
Insira o nível e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('academiccategories.index', []) }}
@endsection

@section('content')
<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">{{ $category['name'] }}</h1>
        {{-- <p class="mt-2 text-sm text-gray-700">A visualizar o tópico <strong class="font-semibold text-gray-900">{{$category['name']}}</strong>.</p> --}}
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none group">
        <a href="{{ url()->previous() }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-900 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-yellow-400 sm:w-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 group-hover:scale-150 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
        </svg>
          <p class="group-hover:text-gray-900 text-white">Voltar</p>
        </a>
      </div>
    </div>

      <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-2">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">Dados sobre o registo</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500"></p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
          <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Nome</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    {{ $category['name'] }}
                </div>
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Descrição</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    {{ $category['description'] }}
                </div>
              </dd>
            </div>

          </dl>
          
        </div>
    
        
      </div>
    </form>

</div>
@endsection