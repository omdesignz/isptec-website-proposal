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
        <h1 class="text-xl font-semibold text-gray-900">{{ $file['name'] }}</h1>
        <p class="mt-2 text-sm text-gray-700">Modificar a <strong class="font-semibold text-gray-900">tradução</strong>.</p>
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

    <form method="post" action="{{ route('files.settranslation', ['file' => $file['id'], 'lang' => $lang]) }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" x-data="{}" x-cloak>
        @method('PUT')  
        @csrf  
      <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">Dados sobre o registo</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">Pode efectuar as alterações nos campos que seguem:</p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
          <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Nome</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $file['name'] }}" type="text" name="name" id="name" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('name')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('name'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('name') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Descrição</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                  <textarea id="description" name="description" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('description')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">{{ $file['description'] }}</textarea>
                    </div>
                    @if($errors->has('description'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('description') }}</p>
                    @endif
              </dd>
          </div>

          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Categoria</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="mt-1">
                <select id="category_id" name="category_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm">
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}" @selected($file['category_id'] == $category->id)>{{ $category->name }}</option>
                  @endforeach
                </select>
                  {{-- <input value="{{ $file['category_id'] }}" type="text" name="category_id" id="category_id" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('category_id')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm"> --}}
                  </div>
                  @if($errors->has('category_id'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('category_id') }}</p>
                  @endif
            </dd>
          </div>

          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Departamento</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="mt-1">
                <select id="department_id" name="department_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm">
                  @foreach ($departments as $department)
                      <option value="{{ $department->id }}" @selected($file['department_id'] == $department->id)>{{ $department->name }}</option>
                  @endforeach
                </select>
                  {{-- <input value="{{ $file['department_id'] }}" type="text" name="department_id" id="department_id" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('department_id')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm"> --}}
                  </div>
                  @if($errors->has('department_id'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('department_id') }}</p>
                  @endif
            </dd>
          </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Link</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $file['link'] }}" type="url" name="link" id="link" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('link')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('link'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('link') }}</p>
                    @endif
              </dd>
            </div>

          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500 mb-2">Ficheiro</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
              <div class="mt-1" x-data="fileHandler()">

                <div>
                  <div class="flow-root mt-6">
                    <div class="flex items-center space-x-4">
                      <div class="flex h-44 w-72 rounded-full bg-yellow-400 items-center justify-center">
                        
                          <a href="#" @click.prevent="document.getElementById('file').click()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </a>
                        <input class="cursor-pointer absolute hidden opacity-0 pin-r pin-t"
                          x-ref="file"
                          type="file" @change="fileChosen(event)"
                          name="file" 
                          id="file">
                        
                      </div>
                    </div>
                  </div>
                  
                </div>

                  @if($errors->has('file'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('file') }}</p>
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

        Alpine.data('fileHandler', (src='') => ({
            file: null,

            fileChosen(event) {
              let file = event.target.files[0];
              if(!file || !file.type.indexOf('image/') === -1) return;
              this.file = null;
              let reader = new FileReader();
              this.file = file;

              reader.addEventListener('load', (event) => {

              })

            reader.readAsDataURL(file);
                },
        }));

    });
</script>
@endsection