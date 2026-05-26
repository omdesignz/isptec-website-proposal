@extends('layouts.backend')

@section('title')
Cursos de Curta Duração
@endsection

@section('search_helper')
Insira o nome do curso e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('shortdurationcourses.index', []) }}
@endsection

@section('content')

<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Cursos de Curta Duração</h1>
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

    <form method="post" action="{{ route('shortdurationcourses.store') }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" x-data="imgPreview" x-cloak> 
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
              <dt class="text-sm font-medium text-gray-500">Departamento</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1 sm:col-span-2 sm:mt-0">
                  <select id="department_id" name="department_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                  </select>
                </div>
                    @if($errors->has('department_id'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('department_id') }}</p>
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
              <dt class="text-sm font-medium text-gray-500">Professor Interno</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1 sm:col-span-2 sm:mt-0">
                  <select id="employee_id" name="employee_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                    @endforeach
                  </select>
                </div>
                    @if($errors->has('employee_id'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('employee_id') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Professor Externo</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="" type="text" name="external_employee" id="external_employee" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('external_employee')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('external_employee'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('external_employee') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Descrição</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                  <textarea id="description" name="description" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('description')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm"></textarea>
                    </div>
                    @if($errors->has('description'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('description') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Status</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                  <fieldset class="border-t border-b border-gray-200">
                    {{-- <legend class="sr-only">Show on Contact Page?</legend> --}}
                    <div class="divide-y divide-gray-200">
                      <div class="relative flex items-start py-4">
                        <div class="min-w-0 flex-1 text-sm">
                          <label for="status" class="font-medium text-gray-700"></label>
                          <p id="status-description" class="text-gray-500">Define se o curso em questão continua activo.</p>
                        </div>
                        <div class="ml-3 flex h-5 items-center">
                          <input value="1" checked id="status" aria-describedby="status-description" name="status" type="checkbox" class="h-4 w-4 rounded-full border-gray-300 text-yellow-400">
                        </div>
                      </div>
                      
                    </div>
                  </fieldset>
                    </div>
                    @if($errors->has('status'))
                      <p class="mt-2 text-sm text-red-500">{{ $errors->first('status') }}</p>
                    @endif
              </dd>
            </div>

            

          
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Imagem de Capa</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  <template x-if="imgsrc">
                    <p class="mt-2">
                    <img :src="imgsrc" class="object-cover h-96 w-96 rounded-2xl">
                    </p>
                  </template>
                  <div class="overflow-hidden flex justify-end">
                    <button type="button" @click.prevent="$refs.featured_image.click()" class="px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-yellow-400 hover:text-gray-900 sm:w-auto flex justify-end rounded-md group">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 group-hover:scale-150 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                      </svg>
                        <span class="ml-2">Seleccionar Imagem</span>
                    </button>
                    <input class="cursor-pointer absolute hidden opacity-0 pin-r pin-t"
                           x-ref="featured_image"
                           type="file" @change="previewFile"
                           accept="image/*" 
                           name="featured_image" 
                           id="featured_image">
                </div>
                      @if($errors->has('featured_image'))
                      <p class="mt-2 text-sm text-red-500">{{ $errors->first('featured_image') }}</p>
                      @endif
                </dd>
            </div>


          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Documentos</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
              <div class="mt-1" x-data="multipleFileViewer()">

                <div>
                  <div class="flow-root mt-6">
                    <ul role="list" class="-my-5 divide-y divide-gray-200">
                      <template x-for="(file, index) in filesArray">
                
                      <li class="py-4">
                        <div class="flex items-center space-x-4">
                          <div class="flex h-8 w-8 rounded-full bg-yellow-400 items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            
                          </div>
                          <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate" x-text="file.name"></p>
                            <p class="mt-1 text-xs text-gray-500" x-text="file.type"></p>
                            <p class="mt-1 text-xs text-gray-500" x-text="file.size.toFixed(2) + ' MB'"></p>
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

                <div class="overflow-hidden flex justify-end">
                  <button type="button" @click.prevent="$refs.documents.click()" class="px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-yellow-400 hover:text-gray-900 sm:w-auto flex justify-end rounded-md group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 group-hover:scale-150 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                      <span class="ml-2">Seleccionar Documentos</span>
                  </button>
                  <input class="cursor-pointer absolute hidden opacity-0 pin-r pin-t"
                         x-ref="documents"
                         type="file" @change="previewFiles" 
                         name="documents[]" 
                         id="documents" multiple="true">
              </div>

                  @if($errors->has('documents'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('documents') }}</p>
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
        Alpine.data('imgPreview', () => ({
            imgsrc:null,
            previewFile() {
            let file = this.$refs.featured_image.files[0];
            if(!file || file.type.indexOf('image/') === -1) return;
            this.imgsrc = null;
            let reader = new FileReader();

            reader.onload = e => {
                this.imgsrc = e.target.result;
            }

            reader.readAsDataURL(file);
            
            }
        }));


        Alpine.data('multipleFileViewer', () => ({
            filesArray: [],

            previewFiles() {
              for (let i = 0; i < event.target.files.length; i++) {
              let file = event.target.files[i];

              if(file.type.match('image')) continue;

              let picReader = new FileReader();
              picReader.addEventListener('load', (event) => {
                // let imageFile = event.target;

                this.filesArray.push({
                  size: file.size / 1024 **2,
                  name: file.name.substring(0, file.name.lastIndexOf('.')) || file.name,
                  type: file.type
                });

              })
              picReader.readAsDataURL(file);
              
            }
            },

            removeFile(index) {
              this.filesArray.splice(index, 1);
            }
        }));

    });
</script>
@endsection