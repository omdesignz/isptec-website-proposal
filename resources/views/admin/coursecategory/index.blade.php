@extends('layouts.backend')

@section('title')
Grau de Cursos Académicos
@endsection

@section('search_helper')
Insira o grau e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('coursecategories.index', []) }}
@endsection

@section('content')
<div x-data="{openForm: {{ $errors->any() ? 'true' : 'false' }}}">
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Grau de Cursos Académicos</h1>
        <p class="mt-2 text-sm text-gray-700">Uma frase descriptiva sobre existência de <strong class="font-semibold text-gray-900">Grau de Cursos Académicos</strong>.</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none group">
        <a href="#" class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-900 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-yellow-400 sm:w-auto" @click="openForm = true">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 group-hover:scale-150 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
          </svg>
          <p class="group-hover:text-gray-900 text-white">Novo</p>
        </a>
      </div>
    </div>
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
      <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gradient-to-r from-yellow-100 via-yellow-300 to-yellow-500">
          <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nome</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Descrição</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
              <span class="sr-only">Select</span>
            </th>
          </tr>
        </thead>
        <tbody>
          @forelse ($categories as $category)
          <tr x-data="{openLangDropdown_{{ $category->id }}: false}">
            <td class="relative py-4 pl-4 sm:pl-6 pr-3 text-sm">
              <div class="font-medium text-gray-900">{{ $category->name }}</div>
              {{-- <div class="mt-1 flex flex-col text-gray-500 sm:block lg:hidden">
                <span>4 GB RAM / 4 CPUs</span>
                <span class="hidden sm:inline"> · </span>
                <span>128 GB SSD disk</span>
              </div> --}}
            </td>

            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{ $category->description }}</td>
            
            <td class="relative py-2.5 pl-3 pr-4 sm:pr-6 text-right text-sm font-medium">
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    <a href="{{ route('coursecategories.show', ['category' => $category['id']]) }}" class="relative inline-flex items-center px-2.5 py-1.5 text-xs font-medium shadow-sm rounded-l-md text-white bg-gray-900 hover:bg-yellow-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150 hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                          </svg>
                    </a>
                    {{-- <a href="{{ route('coursecategories.edit', ['category' => $category->id]) }}" class="-ml-px relative inline-flex items-center px-2.5 py-1.5 text-xs font-medium shadow-sm text-white bg-gray-900 hover:bg-yellow-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150 hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                    </a> --}}
                    <a @click="openLangDropdown_{{ $category->id }} = true" href="#" class="-ml-px relative inline-flex items-center px-2.5 py-1.5 text-xs font-medium shadow-sm text-white bg-gray-900 hover:bg-yellow-400">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150 hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                      </svg>
                    </a>
                    @if ($category->deleted_at)
                      <a href="{{ route('coursecategories.restore', ['category' => $category->id]) }}" class="-ml-px relative inline-flex items-center px-2.5 py-1.5 text-xs font-medium shadow-sm rounded-r-md text-white bg-gray-900 hover:bg-yellow-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150 hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                      </a>
                    @endif
                    @if (!$category->deleted_at)
                      <a href="{{ route('coursecategories.destroy', ['category' => $category->id]) }}" class="-ml-px relative inline-flex items-center px-2.5 py-1.5 text-xs font-medium shadow-sm rounded-r-md text-white bg-gray-900 hover:bg-yellow-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150 hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                      </a>
                    @endif
                    
                  </span>
              
                  <div class="z-10 origin-top-right absolute right-0 mt-2 w-24 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" x-cloak x-show="openLangDropdown_{{ $category->id }}" @click.away="openLangDropdown_{{ $category->id }} = false">
                    <div class="py-1" role="none">
                      <a href="{{ route('coursecategories.getlang', ['category' => $category->id, 'lang' => 'en']) }}" class="text-gray-700 hover:text-gray-800 flex items-center m-2">
                        <img src="/flags/4x3/gb.svg" alt="" class="w-5 h-auto block flex-shrink-0">
                        <span class="ml-3 block text-sm font-medium">
                          GB
                        </span>
                        <span class="sr-only">language</span>
                      </a>
                      <a href="{{ route('coursecategories.getlang', ['category' => $category->id, 'lang' => 'pt']) }}" class="text-gray-700 hover:text-gray-800 flex items-center m-2">
                        <img src="/flags/4x3/pt.svg" alt="" class="w-5 h-auto block flex-shrink-0">
                        <span class="ml-3 block text-sm font-medium">
                          PT
                        </span>
                        <span class="sr-only">language</span>
                      </a>
                    </div>
                  </div>
            </td>
          </tr>
  
          @empty
          

          @endforelse
        </tbody>
        <tfoot>
          <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan="3">
              {{ $categories->links() }}
              </td>
          </tr>
      </tfoot>
      </table>
    </div>
  </div>
  @include('admin.coursecategory._slideover')
  {{-- @include('admin.coursecategories._lang_modal') --}}
</div>
  
@endsection