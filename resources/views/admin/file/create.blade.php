@extends('layouts.backend')

@section('title')
Ficheiros
@endsection

@section('search_helper')
Insira o ficheiro e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('files.index', []) }}
@endsection

@section('content')

<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Ficheiros</h1>
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

    <form method="post" action="{{ route('files.store') }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" x-data="{}" x-cloak> 
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
              <dt class="text-sm font-medium text-gray-500 mb-2">Ficheiros</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
                <div class="mt-1" x-data="fileHandler()">
  
                  <div>
                    <div class="flow-root mt-6">
                      <ul role="list" class="-my-5 divide-y divide-gray-200">
                        <template x-for="(file, index) in files">
                  
                        <li class="py-4">
                          <div class="flex items-center space-x-4">
                            <div class="flex h-44 w-72 rounded-full bg-yellow-400 items-center justify-center">
                              {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                              </svg> --}}
                              <template x-if="!file.file">
                                <a href="#" @click.prevent="document.getElementById(`file[${index}][file]`).click()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                              </a>
                              </template>
                              <template x-if="file.file">
                                <a href="#" @click.prevent="document.getElementById(`file[${index}][file]`).click()">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                  </svg>
                              </a>
                              </template>
                              <input class="cursor-pointer absolute hidden opacity-0 pin-r pin-t"
                                x-ref="`file[${index}][file]`"
                                type="file" @change="fileChosen(event, index)"
                                :name="`file[${index}][file]`" 
                                :id="`file[${index}][file]`">
                              
                            </div>
                            <div class="flex-1 min-w-0">
                              {{-- <h2> --}}
                                <div>
                                  <label :for="`file[${index}][name]`" class="block text-sm font-medium text-gray-700">Nome</label>
                                  <div class="mt-1">
                                    <input :value="file.name" type="text" :name="`file[${index}][name]`" :id="`file[${index}][name]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                  </div>
                                  @if ($errors->has('file.*.name'))
                                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('file.*.name') }}</p>
                                  @endif
                                </div>

                              {{-- </h2> --}}
                              <p class="text-sm font-medium text-gray-900 truncate">
                                <div>
                                  <label :for="`file[${index}][category_id]`" class="block text-sm font-medium text-gray-700">Categoria</label>
                                  <div class="mt-1">
                                    <select :value="file.category_id" :id="`file[${index}][category_id]`" :name="`file[${index}][category_id]`" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm">
                                      @foreach ($categories as $category)
                                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                                      @endforeach
                                    </select>
                                    {{-- <input :value="file.category_id" type="text" :name="`file[${index}][category_id]`" :id="`file[${index}][category_id]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder=""> --}}
                                  </div>
                                </div>
                              </p>
                              <p class="mt-1 text-xs text-gray-500">
                                <div>
                                  <label :for="`file[${index}][department_id]`" class="block text-sm font-medium text-gray-700">Departamento</label>
                                  <div class="mt-1">
                                    <select :value="file.department_id" :id="`file[${index}][department_id]`" :name="`file[${index}][department_id]`" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm">
                                      @foreach ($departments as $department)
                                          <option value="{{ $department->id }}">{{ $department->name }}</option>
                                      @endforeach
                                    </select>
                                    {{-- <input :value="file.department_id" type="text" :name="`file[${index}][department_id]`" :id="`file[${index}][department_id]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder=""> --}}
                                  </div>
                                </div>
                              </p>
                              <p class="mt-1 text-xs text-gray-500">
                                <div>
                                  <label :for="`file[${index}][link]`" class="block text-sm font-medium text-gray-700">Link</label>
                                  <div class="mt-1">
                                    <input :value="file.link" type="url" :name="`file[${index}][link]`" :id="`file[${index}][link]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                  </div>
                                </div>
                              </p>
                              <p class="mt-1 text-xs text-gray-500">
                                <div>
                                  <label :for="`file[${index}][description]`" class="block text-sm font-medium text-gray-700">Descrição</label>
                                  <div class="mt-1">
                                    <textarea rows="4" :name="`file[${index}][description]`" :id="`file[${index}][description]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="" x-text="file.description"></textarea>
                                  </div>
                                </div>
                              </p>
                            </div>
                            <div>
                              <button @click="removeFile(index)" type="button" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-white hover:text-red-500 sm:w-auto">
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
                        <span class="ml-2">Adicionar Ficheiro</span>
                    </button>
                    
                </div>
  
                    @if($errors->has('files'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('files') }}</p>
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

        Alpine.data('fileHandler', (src='', index) => ({
            files: [],

            addfile() {
              this.files.push({
                name: '',
                description: '',
                link: '',
                category_id: '',
                department_id: '',
                file: null,
              });

              console.log(this.files);
            },

            removeFile(index) {
              this.files.splice(index, 1);
            },



            fileChosen(event, index) {
              let file = event.target.files[0];
              if(!file || !file.type.indexOf('image/') === -1) return;
              this.files[index].file = null;
              let reader = new FileReader();
              this.files[index].file = file;

              this.files[index].name = file.name.substring(0, file.name.lastIndexOf('.')) || file.name;

              reader.addEventListener('load', (event, index) => {

              })

            reader.readAsDataURL(file);
                },
        }));

    });
</script>
@endsection