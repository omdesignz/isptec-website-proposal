@extends('layouts.backend')

@section('title')
Clube de Leitura - Membros
@endsection

@section('search_helper')
Insira o nome da parceria / protocolo e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('ltcmemberships.index', []) }}
@endsection

@section('content')

<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Clube de Leitura - Membros</h1>
        <p class="mt-2 text-sm text-gray-700">Partilha os acontecimentos da instituição com o <strong class="font-semibold text-gray-900">mundo</strong>.</p>
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

    <form method="post" action="{{ route('ltcmemberships.store') }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" x-data="imgPreview" x-cloak> 
        @csrf  
      <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">Dados sobre o registo</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500"></p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
          <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Categoria</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1 sm:col-span-2 sm:mt-0">
                  <select id="category_id" name="category_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                    @if($errors->has('category_id'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('category_id') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Nome</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="" type="text" name="name" id="name" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('name')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('name'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('name') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Apelido</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="" type="text" name="surname" id="surname" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('surname')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('surname'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('surname') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Tipo de Membro</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                  <fieldset class="">
                    <legend class="sr-only">Member Type</legend>
                    <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                      <div class="flex items-center">
                        <input value="S" id="S" name="member_type" type="radio" checked class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                        <label for="S" class="ml-3 block text-sm font-medium text-gray-700">Estudante</label>
                      </div>
                
                      <div class="flex items-center">
                        <input value="E" id="E" name="member_type" type="radio" class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                        <label for="E" class="ml-3 block text-sm font-medium text-gray-700">Funcionário</label>
                      </div>
                
                      <div class="flex items-center">
                        <input value="O" id="O" name="member_type" type="radio" class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                        <label for="O" class="ml-3 block text-sm font-medium text-gray-700">Outro</label>
                      </div>
                    </div>
                  </fieldset>
                    </div>
                    @if($errors->has('member_type'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('member_type') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Email</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="" type="email" name="email" id="email" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('email')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('email'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('email') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500"></dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
                  <div class="mt-1">
                    <div class="flex justify-end">
                        <button type="submit" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-yellow-400 hover:text-gray-900 sm:w-auto">
                          Submeter
                        </button>
                      </div>
                  </div>
                     
                </dd>
            </div>
          </dl>
          
        </div>
    
        
      </div>
    </form>
</div>
@endsection

@section('page_footer_scripts')

@endsection