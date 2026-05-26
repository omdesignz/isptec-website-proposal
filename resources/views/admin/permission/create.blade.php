@extends('layouts.backend')

@section('title')
Permissões
@endsection

@section('search_helper')
Insira a descrição da permissão e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('permissions.index', []) }}
@endsection

@section('content')

<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Permissões</h1>
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

    <form method="post" action="{{ route('permissions.store') }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" x-data="{}" x-cloak> 
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
              <dt class="text-sm font-medium text-gray-500 mb-2">Permissões</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
                <div class="mt-1" x-data="permissionHandler()">
  
                  <div>
                    <div class="flow-root mt-6">
                      <ul role="list" class="-my-5 divide-y divide-gray-200">
                        <template x-for="(permission, index) in permissions">
                  
                        <li class="py-4">
                          <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                              {{-- <h2> --}}
                                <div>
                                  <label :for="`permission[${index}][name]`" class="block text-sm font-medium text-gray-700">Nome</label>
                                  <div class="mt-1">
                                    <input :value="permission.name" type="text" :name="`permission[${index}][name]`" :id="`permission[${index}][name]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                  </div>
                                  @if ($errors->has('permission.*.name'))
                                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('permission.*.name') }}</p>
                                  @endif
                                </div>

                                <div>
                                  <label :for="`permission[${index}][label]`" class="block text-sm font-medium text-gray-700">Descrição</label>
                                  <div class="mt-1">
                                    <input :value="permission.label" type="text" :name="`permission[${index}][label]`" :id="`permission[${index}][label]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                  </div>
                                  @if ($errors->has('permission.*.label'))
                                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('permission.*.label') }}</p>
                                  @endif
                                </div>
                            </div>
                            <div>
                              <button @click="removePermission(index)" type="button" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-white hover:text-red-500 sm:w-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                              </button>
                            </div>
                          </div>
                        </li>
  
                        </template>
                      </ul>
                    </div>
                    
                  </div>
  
                  <div class="overflow-hidden flex justify-end mt-4">
                    <button type="button" @click.prevent="addfile()" class="px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-yellow-400 hover:text-gray-900 sm:w-auto flex justify-end rounded-md group">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 group-hover:scale-150 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                      </svg>
                        <span class="ml-2">Adicionar Permissão</span>
                    </button>
                    
                </div>
  
                    @if($errors->has('permissions'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('permissions') }}</p>
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
<script>
    document.addEventListener('alpine:init', () => {

        Alpine.data('permissionHandler', (src='', index) => ({
            permissions: [],

            addfile() {
              this.permissions.push({
                name: '',
                label: ''
              });

              console.log(this.permissions);
            },

            removePermission(index) {
              this.permissions.splice(index, 1);
            }

        }));

    });
</script>
@endsection