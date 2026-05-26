@extends('layouts.backend')

@section('title')
Colaboradores
@endsection

@section('search_helper')
Insira o nome do colaborador e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('employees.index', []) }}
@endsection

@section('content')
<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">{{ $employee['full_name'] }}</h1>
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

    <form method="post" action="{{ route('employees.settranslation', ['employee' => $employee['id'], 'lang' => $lang]) }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" x-data="imgPreview" x-cloak>
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
              <dt class="text-sm font-medium text-gray-500">Gênero</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                  <fieldset class="">
                    <legend class="sr-only">Gender</legend>
                    <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                      <div class="flex items-center">
                        <input value="M" id="male" name="gender" type="radio" @checked($employee['gender'] == 'M' || old('gender') == 'M') class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                        <label for="male" class="ml-3 block text-sm font-medium text-gray-700">Masculino</label>
                      </div>
                
                      <div class="flex items-center">
                        <input value="F" id="female" name="gender" type="radio" @checked($employee['gender'] == 'F' || old('gender') == 'F') class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                        <label for="female" class="ml-3 block text-sm font-medium text-gray-700">Feminino</label>
                      </div>
                    </div>
                  </fieldset>
                    </div>
                    @if($errors->has('gender'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('gender') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Nome Completo</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $employee['full_name'] }}" type="text" name="full_name" id="full_name" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('full_name')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('full_name'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('full_name') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Email</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $employee['email'] }}" type="email" name="email" id="email" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('email')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('email'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('email') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Contacto</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $employee['tel_no'] }}" type="number" name="tel_no" id="tel_no" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('tel_no')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('tel_no'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('tel_no') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Extensão</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $employee['extension'] }}" type="number" name="extension" id="extension" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('extension')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('extension'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('extension') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Orcid ID</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $employee['orcid_id'] }}" type="text" name="orcid_id" id="orcid_id" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('orcid_id')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('orcid_id'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('orcid_id') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Data de Nascimento</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $employee['dob'] }}"
                           type="datetime-local" 
                           name="dob" 
                           pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"
                           id="dob" 
                           class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('dob')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('dob'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('dob') }}</p>
                    @endif
              </dd>
          </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Sumário</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                  <textarea id="description" name="description" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('description')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">{{ $employee['description'] }}</textarea>
                    </div>
                    @if($errors->has('description'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('description') }}</p>
                    @endif
              </dd>
          </div>

          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">É Nacional?</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="mt-1">
                <fieldset class="">
                  <legend class="sr-only">Is Nacional?</legend>
                  <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                    <div class="flex items-center">
                      <input value="1" id="yes" name="is_national" type="radio" @checked($employee['is_national'] == '1' || old('is_national') == '1') class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                      <label for="yes" class="ml-3 block text-sm font-medium text-gray-700">SIM</label>
                    </div>
              
                    <div class="flex items-center">
                      <input value="0" id="no" name="is_national" type="radio" @checked($employee['is_national'] == '0' || old('is_national') == '0') class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                      <label for="no" class="ml-3 block text-sm font-medium text-gray-700">NÃO</label>
                    </div>
                  </div>
                </fieldset>
                  </div>
                  @if($errors->has('is_national'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('is_national') }}</p>
                  @endif
            </dd>
          </div>

          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">É Docente?</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="mt-1">
                <fieldset class="">
                  <legend class="sr-only">Is Lecturer?</legend>
                  <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                    <div class="flex items-center">
                      <input value="1" id="yes" name="is_lecturer" type="radio" @checked($employee['is_lecturer'] == '1' || old('is_lecturer') == '1') class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                      <label for="yes" class="ml-3 block text-sm font-medium text-gray-700">SIM</label>
                    </div>
              
                    <div class="flex items-center">
                      <input value="0" id="no" name="is_lecturer" type="radio" @checked($employee['is_lecturer'] == '0' || old('is_lecturer') == '0') class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                      <label for="no" class="ml-3 block text-sm font-medium text-gray-700">NÃO</label>
                    </div>
                  </div>
                </fieldset>
                  </div>
                  @if($errors->has('is_lecturer'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('is_lecturer') }}</p>
                  @endif
            </dd>
          </div>

          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Receber Felicitação?</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="mt-1">
                <fieldset class="">
                  <legend class="sr-only">Receive Birthday Notification?</legend>
                  <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                    <div class="flex items-center">
                      <input value="1" id="yes" name="receive_bday_notification" type="radio" @checked($employee['receive_bday_notification'] == 1 || old('receive_bday_notification') == 1) class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                      <label for="yes" class="ml-3 block text-sm font-medium text-gray-700">SIM</label>
                    </div>
              
                    <div class="flex items-center">
                      <input value="0" id="no" name="receive_bday_notification" type="radio" @checked($employee['receive_bday_notification'] == 0 || !old('receive_bday_notification') == 0) class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                      <label for="no" class="ml-3 block text-sm font-medium text-gray-700">NÃO</label>
                    </div>
                  </div>
                </fieldset>
                  </div>
                  @if($errors->has('receive_bday_notification'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('receive_bday_notification') }}</p>
                  @endif
            </dd>
          </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Fotografia</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                @if (count($employee['avatar']))
                  <img src="{{$employee['avatar'][0]->getUrl()}}" alt="" class="object-cover h-96 w-96 rounded-2xl">
                @endif
                <template x-if="imgsrc">
                  <p class="mt-2">
                  <img :src="imgsrc" class="object-cover h-96 w-96 rounded-2xl">
                  </p>
                </template>
                <div class="overflow-hidden flex justify-end">
                  <button type="button" @click.prevent="$refs.avatar.click()" class="px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-yellow-400 hover:text-gray-900 sm:w-auto flex justify-end rounded-md group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 group-hover:scale-150 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                      <span class="ml-2">Seleccionar Imagem</span>
                  </button>
                  <input class="cursor-pointer absolute hidden opacity-0 pin-r pin-t"
                         x-ref="avatar"
                         type="file" @change="previewFile"
                         accept="image/*" 
                         name="avatar" 
                         id="avatar">
              </div>
                    @if($errors->has('avatar'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('avatar') }}</p>
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
                        @forelse ($employee['documents'] as $document)
                          <li class="py-4">
                            <div class="flex items-center space-x-4">
                              <div class="flex h-8 w-8 rounded-full bg-yellow-400 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                
                              </div>
                              <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $document->name }}</p>
                                <p class="mt-1 text-xs text-gray-500">{{ $document->type }}</p>
                                <p class="mt-1 text-xs text-gray-500">{{ $document->human_readable_size }}</p>
                              </div>
                              <div>
                                <a href="{{ route('employees.deletesingleattachment', ['model_id' => $document->id]) }}" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-white hover:text-red-500 sm:w-auto">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                                </a>
                              </div>
                            </div>
                          </li>
                        @empty
                          
                        @endforelse
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
        
                          @if($errors->has('avatars'))
                          <p class="mt-2 text-sm text-red-500">{{ $errors->first('avatars') }}</p>
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
            let file = this.$refs.avatar.files[0];
            if(!file || file.type.indexOf('image/') === -1) return;
            this.imgsrc = null;
            let reader = new FileReader();

            reader.onload = e => {
                this.imgsrc = e.target.result;
            }

            reader.readAsDataURL(file);
            
            }
        }));

        Alpine.data('imageViewer', (src = '') => ({
            imageUrl: src,

                fileChosen(event) {
                this.fileToDataUrl(event, src => this.imageUrl = src)
                },

                fileToDataUrl(event, callback) {
                if (! event.target.files.length) return

                let file = event.target.files[0],
                    reader = new FileReader()

                reader.readAsDataURL(file)
                reader.onload = e => callback(e.target.result)
                },
        }));

        Alpine.data('multipleImageViewer', () => ({
            imagesArray: [],

            previewFiles() {
              for (let i = 0; i < event.target.files.length; i++) {
              let file = event.target.files[i];

              if(!file.type.match('image')) continue;

              let picReader = new FileReader();
              picReader.addEventListener('load', (event) => {
                let imageFile = event.target;

                this.imagesArray.push({
                  src: imageFile.result,
                  size: file.size / 1024 **2,
                  name: file.name.substring(0, file.name.lastIndexOf('.')) || file.name,
                  type: file.type
                });

              })
              picReader.readAsDataURL(file);
              
            }
            },

            removeFile(index) {
              this.imagesArray.splice(index, 1);
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