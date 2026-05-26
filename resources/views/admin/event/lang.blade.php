@extends('layouts.backend')

@section('page_scripts')
<x-head.tinymce-config/>
@endsection

@section('search_helper')
Insira o evento e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('events.index', []) }}
@endsection

@section('title')
Eventos
@endsection

@section('content')
<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">{{ $event['title'] }}</h1>
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

    <form method="post" action="{{ route('events.settranslation', ['event' => $event['id'], 'lang' => $lang]) }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" x-data="imgPreview" x-cloak>
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
              <dt class="text-sm font-medium text-gray-500">Título</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $event['title'] }}" type="text" name="title" id="title" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('title')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('title'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('title') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Link</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $event['link'] }}" type="url" name="link" id="link" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('link')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('link'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('link') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Início</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $event['start_date'] }}"
                           type="datetime-local"
                           pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"
                           name="start_date" 
                           id="start_date" 
                           class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('start_date')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('start_date'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('start_date') }}</p>
                    @endif
              </dd>
          </div>

          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Fim</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="mt-1">
                  <input value="{{ $event['end_date'] }}"
                        type="datetime-local"
                        pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"
                        name="end_date" 
                        id="end_date" 
                        class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('end_date')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                  </div>
                  @if($errors->has('end_date'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('end_date') }}</p>
                  @endif
            </dd>
        </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Imagem de Capa</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                @if (count($event['featured_image']) > 0)
                  <img src="{{ $event['featured_image'][0]?->getUrl() }}" alt="" class="object-cover h-96 w-96 rounded-2xl" loading="lazy" />
                @endif
                <template x-if="imgsrc">
                  <p class="mt-2">
                  <img :src="imgsrc" class="object-cover h-96 w-96 rounded-2xl" loading="lazy" />
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
            <dt class="text-sm font-medium text-gray-500 mb-2">Prelectores</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
              <div class="mt-1" x-data="speakerHandler()">

                <div>
                  <div class="flow-root mt-6">
                    <ul role="list" class="-my-5 divide-y divide-gray-200">
                      
                      <template x-for="(speaker, index) in speakers">
                      <li class="py-4">
                        <input :value="speaker.id" type="hidden" :name="`speaker[${index}][id]`" :id="`speaker[${index}][id]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">

                        <div class="flex items-center space-x-4">
                          <div class="flex h-44 w-72 rounded-full bg-yellow-400 items-center justify-center">
                            <template x-if="!speaker.avatar">
                              <a href="#" @click.prevent="document.getElementById(`speaker[${index}][avatar]`).click()">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                              </svg>
                            </a>
                            </template>
                            <template x-if="speaker.avatar">
                              <a href="#" @click.prevent="document.getElementById(`speaker[${index}][avatar]`).click()">
                              <img :src="speaker.avatar" class="object-cover h-96 w-96 rounded-2xl" loading="lazy" />
                            </a>
                            </template>
                            <input class="cursor-pointer absolute hidden opacity-0 pin-r pin-t"
                              x-ref="`speaker[${index}][avatar]`"
                              type="file" @change="fileChosen(event, index)"
                              accept="image/*" 
                              :name="`speaker[${index}][avatar]`" 
                              :id="`speaker[${index}][avatar]`">
                            
                          </div>
                          <div class="flex-1 min-w-0">
                            {{-- <h2> --}}
                              <div>
                                <label :for="`speaker[${index}][full_name]`" class="block text-sm font-medium text-gray-700">Nome</label>
                                <div class="mt-1">
                                  <input :value="speaker.full_name" type="text" :name="`speaker[${index}][full_name]`" :id="`speaker[${index}][full_name]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                </div>
                                @if ($errors->has('speaker.*.full_name'))
                                <p class="mt-2 text-sm text-red-500">{{ $errors->first('speaker.*.full_name') }}</p>
                                @endif
                              </div>

                            {{-- </h2> --}}
                            <p class="text-sm font-medium text-gray-900 truncate">
                              <div>
                                <label :for="`speaker[${index}][topic]`" class="block text-sm font-medium text-gray-700">Tema</label>
                                <div class="mt-1">
                                  <input :value="speaker.topic" type="text" :name="`speaker[${index}][topic]`" :id="`speaker[${index}][topic]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                </div>
                              </div>
                            </p>
                            <p class="mt-1 text-xs text-gray-500">
                              <div>
                                <label :for="`speaker[${index}][contact]`" class="block text-sm font-medium text-gray-700">Contacto</label>
                                <div class="mt-1">
                                  <input :value="speaker.contact" type="text" :name="`speaker[${index}][contact]`" :id="`speaker[${index}][contact]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                </div>
                              </div>
                            </p>
                            <p class="mt-1 text-xs text-gray-500">
                              <div>
                                <label :for="`speaker[${index}][bio]`" class="block text-sm font-medium text-gray-700">Bio</label>
                                <div class="mt-1">
                                  <textarea rows="4" :name="`speaker[${index}][bio]`" :id="`speaker[${index}][bio]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="" x-text="speaker.bio"></textarea>
                                </div>
                              </div>
                            </p>
                          </div>
                          <div>
                            <button @click="removeSpeaker(index)" type="button" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-white hover:text-red-500 sm:w-auto">
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
                  <button type="button" @click.prevent="addSpeaker()" class="px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-yellow-400 hover:text-gray-900 sm:w-auto flex justify-end rounded-md group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 group-hover:scale-150 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                      <span class="ml-2">Adicionar Prelectores</span>
                  </button>
                  
              </div>

                  @if($errors->has('speakers'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('speakers') }}</p>
                  @endif
            </dd>
        </div>

          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Localização</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="mt-1">
                  <input value="{{ $event['venue'] }}" type="text" name="venue" id="venue" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('venue')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                  </div>
                  @if($errors->has('venue'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('venue') }}</p>
                  @endif
            </dd>
        </div>

        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Sumário</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="mt-1">
                <textarea id="description" name="description" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('description')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">{{ $event['description'] }}</textarea>
                  </div>
                  @if($errors->has('description'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('description') }}</p>
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
                        @forelse ($event['documents'] as $document)
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
                                <a href="{{ route('events.deletesingleattachment', ['model_id' => $document->id]) }}" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-white hover:text-red-500 sm:w-auto">
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

        Alpine.data('speakerHandler', (src='', index) => ({
            speakers: @json($event['speakers']),
            imageUrl: src,

            // if({{$event['speakers']->count() > 0}}) {
            //   console.log({{$event['speakers']}});
            // }

            addSpeaker() {
              this.speakers.push({
                full_name: '',
                topic: '',
                contact: '',
                bio: '',
                avatar: null,
              });
            },

            removeSpeaker(index) {
              this.speakers.splice(index, 1);
            },

            fileChosen(event, index) {
              let file = event.target.files[0];
            if(!file || file.type.indexOf('image/') === -1) return;
            this.imageUrl = null;
            this.speakers[index].avatar = null;
            let reader = new FileReader();

            reader.onload = e => {
                this.imageUrl = e.target.result;
                this.speakers[index].avatar = e.target.result;
            }

            reader.readAsDataURL(file);
                },
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