@extends('layouts.backend')

@section('page_scripts')
<x-head.tinymce-config/>
@endsection

@section('search_helper')
Insira o notícia e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('posts.index', []) }}
@endsection

@section('title')
Notícias
@endsection

@section('content')
<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">{{ $post['title'] }}</h1>
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

    <form method="post" action="{{ route('posts.settranslation', ['post' => $post['id'], 'lang' => $lang]) }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" x-data="imgPreview" x-cloak>
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
                    <input value="{{ $post['title'] }}" type="text" name="title" id="title" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('title')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('title'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('title') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Imagem de Capa</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                @if ($post['featured_image'])
                  <img src="{{$post['featured_image'][0]->getUrl()}}" alt="" class="object-cover h-96 w-96 rounded-2xl">
                @endif
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
            <dt class="text-sm font-medium text-gray-500">Legenda da Imagem de Capa</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="mt-1">
                  <input value="{{ $post['featured_image_caption'] }}" type="text" name="featured_image_caption" id="featured_image_caption" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('featured_image_caption')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                  </div>
                  @if($errors->has('featured_image_caption'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('featured_image_caption') }}</p>
                  @endif
            </dd>
        </div>

        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Sumário</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <div class="mt-1">
              <textarea id="summary" name="summary" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('summary')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">{{ $post['summary'] }}</textarea>
                </div>
                @if($errors->has('summary'))
                <p class="mt-2 text-sm text-red-500">{{ $errors->first('summary') }}</p>
                @endif
          </dd>
      </div>

      <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Corpo</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
          <div class="mt-1">
            <textarea id="body" name="body" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('body')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">{{ $post['body'] }}</textarea>
              </div>
              @if($errors->has('body'))
              <p class="mt-2 text-sm text-red-500">{{ $errors->first('body') }}</p>
              @endif
        </dd>
      </div>

      <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Imagens em Destaque</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
          <div class="mt-1" x-data="multipleImageViewer()">

            <div class="bg-white">
              <div class="max-w-2xl mx-auto py-2 sm:py-2 lg:max-w-7xl">
            
                <div class="mt-1 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                  @forelse ($post['featured_images'] as $image)
                  <div>
                    <div class="relative">
                      <div class="relative w-full h-72 rounded-lg overflow-hidden">
                        <img src="{{$image->getUrl()}}" alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls." class="w-full h-full object-center object-cover">
                      </div>
                      <div class="relative mt-4">
                        <h4 class="text-xs font-medium text-gray-900">{{ $image->name }}</h4>
                        <p class="mt-1 text-xs text-gray-500">{{ $image->type }}</p>
                        <p class="mt-1 text-xs text-gray-500">{{ $image->human_readable_size }}</p>
                      </div>
                      <div class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                        <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                        <p class="relative text-lg font-semibold text-white">
                          <a href="{{ route('posts.deletesingleattachment', ['model_id' => $image->id]) }}" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-white hover:text-red-500 sm:w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                          </a>
                        </p>
                      </div>
                    </div>
                    
                  </div>
                  @empty
                    
                  @endforelse
                  
                  <template x-for="(file, index) in imagesArray">
                  <div>
                    <div class="relative">
                      <div class="relative w-full h-72 rounded-lg overflow-hidden">
                        <img :src="file.src" alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls." class="w-full h-full object-center object-cover">
                      </div>
                      <div class="relative mt-4">
                        <h4 class="text-xs font-medium text-gray-900" x-text="file.name"></h4>
                        <p class="mt-1 text-xs text-gray-500" x-text="file.type"></p>
                        <p class="mt-1 text-xs text-gray-500" x-text="file.size.toFixed(2) + ' MB'"></p>
                      </div>
                      <div class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                        <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                        <p class="relative text-lg font-semibold text-white">
                          <button @click="removeFile(index)" type="button" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-white hover:text-red-500 sm:w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                          </button>
                        </p>
                      </div>
                    </div>
                    
                  </div>
                  </template>
                </div>
              </div>
            </div>

            <div class="overflow-hidden flex justify-end">
              <button type="button" @click.prevent="$refs.featured_images.click()" class="px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-yellow-400 hover:text-gray-900 sm:w-auto flex justify-end rounded-md group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 group-hover:scale-150 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                  <span class="ml-2">Seleccionar Imagens</span>
              </button>
              <input class="cursor-pointer absolute hidden opacity-0 pin-r pin-t"
                     x-ref="featured_images"
                     type="file" @change="previewFiles" 
                     accept="image/*" 
                     name="featured_images[]" 
                     id="featured_images" 
                     multiple="true">
                  </div>

                      {{-- </div> --}}
                      @if($errors->has('featured_images'))
                      <p class="mt-2 text-sm text-red-500">{{ $errors->first('featured_images') }}</p>
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
                        @forelse ($post['documents'] as $document)
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
                                <a href="{{ route('posts.deletesingleattachment', ['model_id' => $document->id]) }}" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-white hover:text-red-500 sm:w-auto">
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
        
                          @if($errors->has('featured_images'))
                          <p class="mt-2 text-sm text-red-500">{{ $errors->first('featured_images') }}</p>
                          @endif
                    </dd>
                </div>

                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Publicação</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <div class="mt-1">
                        <input value="{{ $post['published_at'] }}"
                               type="datetime-local" 
                               name="published_at" 
                               pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"
                               id="published_at" 
                               class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('published_at')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                        </div>
                        @if($errors->has('published_at'))
                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('published_at') }}</p>
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