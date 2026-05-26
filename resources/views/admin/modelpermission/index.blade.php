@extends('layouts.backend')

@section('title')
Regras de Acesso
@endsection

@section('search_helper')
Insira o nome da secção e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('modelpermissions.index', []) }}
@endsection

@section('content')
<div>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Regras de Acesso</h1>
        <p class="mt-2 text-sm text-gray-700">Uma frase descriptiva sobre existência de <strong class="font-semibold text-gray-900">Regras de Acesso</strong>.</p>
      </div>
      
    </div>
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
      <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gradient-to-r from-yellow-100 via-yellow-300 to-yellow-500">
          <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nome</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Página</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
              <span class="sr-only">Select</span>
            </th>
          </tr>
        </thead>
        <tbody>
          @forelse ($models as $model)
          <tr x-data="{openLangDropdown_{{ $model['id'] }}: false}">
            <td class="relative py-4 pl-4 sm:pl-6 pr-3 text-sm">
              <div class="font-medium text-gray-900">{{ $model['name'] }}</div>
              <div class="mt-1 flex flex-col text-gray-500 sm:block lg:hidden">
                <span>{{ $model['name'] }}</span>
                <span class="hidden sm:inline"> · </span>
              </div>
            </td>

            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{ $model['name'] }}</td>
            
            <td class="relative py-2.5 pl-3 pr-4 sm:pr-6 text-right text-sm font-medium">
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    <a href="{{ route('modelpermissions.show', ['permission' => $model['id']]) }}" class="relative inline-flex items-center px-2.5 py-1.5 text-xs font-medium shadow-sm rounded-md text-white bg-gray-900 hover:bg-yellow-400">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 transform transition-all duration-200 hover:scale-150 hover:text-gray-900">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                          </svg>                          
                    </a>
            </td>
          </tr>
  
          @empty

          @endforelse
        </tbody>
        <tfoot>
          <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan="3">
              
              </td>
          </tr>
      </tfoot>
      </table>
    </div>
  </div>
</div>
  
@endsection