@extends('layouts.backend')

@section('title')
Planos Curriculares
@endsection

@section('search_helper')
Insira o nome do curso e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('courseplans.index', []) }}
@endsection

@section('content')
<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">{{ $course }}</h1>
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

    <form method="post" action="{{ route('courseplans.settranslation', ['plan' => $course_id, 'lang' => $lang]) }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" x-data="{}" x-cloak>
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
              <dt class="text-sm font-medium text-gray-500">Curso</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1 sm:col-span-2 sm:mt-0">
                  <select id="course_id" name="course_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" @selected($course_id == $course->id)>{{ $course->name }}</option>
                    @endforeach
                  </select>
                </div>
                    @if($errors->has('course_id'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('course_id') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 mb-2">Disciplinas</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
                <div class="mt-1" x-data="planHandler()">
  
                  <div>
                    <div class="flow-root mt-6">
                      <ul role="list" class="-my-5 divide-y divide-gray-200">
                        <template x-for="(plan, index) in plans">
                  
                        <li class="py-4">
                          <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                              {{-- <h2> --}}
                                <div>
                                  <input type="hidden" :value="plan.id" type="text" :name="`plan[${index}][id]`" :id="`plan[${index}][id]`" class="shadow-sm block w-1/3 sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">

                                  <label :for="`plan[${index}][semester_id]`" class="block text-sm font-medium text-gray-700">Semestre</label>
                                  <div class="mt-1">
                                    <select :name="`plan[${index}][semester_id]`" :id="`plan[${index}][semester_id]`" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm">
                                      @foreach ($semesters as $semester)
                                          <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  @if ($errors->has('plan.*.semester'))
                                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('plan.*.semester_id') }}</p>
                                  @endif
                                </div>

                                <div>
                                  <label :for="`plan[${index}][subject_id]`" class="block text-sm font-medium text-gray-700">Disciplina</label>
                                  <div class="mt-1">
                                    <select :name="`plan[${index}][subject_id]`" :id="`plan[${index}][subject_id]`" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm">
                                      @foreach ($subjects as $subject)
                                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  @if ($errors->has('plan.*.subject'))
                                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('plan.*.subject_id') }}</p>
                                  @endif
                                </div>

                              {{-- </h2> --}}
                              <p class="text-sm font-medium text-gray-900 truncate">
                                <div>
                                  <label :for="`plan[${index}][theoretical]`" class="block text-sm font-medium text-gray-700">Carga Horária: T</label>
                                  <div class="mt-1">
                                    <input x-model="plan.theoretical" :value="plan.theoretical" type="number" :name="`plan[${index}][theoretical]`" :id="`plan[${index}][theoretical]`" class="shadow-sm block w-1/3 sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                  </div>
                                </div>
                              </p>
                              <p class="mt-1 text-xs text-gray-500">
                                <div>
                                  <label :for="`plan[${index}][practical]`" class="block text-sm font-medium text-gray-700">Carga Horária: P</label>
                                  <div class="mt-1">
                                    <input x-model="plan.practical" :value="plan.practical" type="number" :name="`plan[${index}][practical]`" :id="`plan[${index}][practical]`" class="shadow-sm block w-1/3 sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                  </div>
                                </div>
                              </p>

                              <p class="mt-1 text-xs text-gray-500">
                                <div>
                                  <label :for="`plan[${index}][theoretical_practical]`" class="block text-sm font-medium text-gray-700">Carga Horária: TP</label>
                                  <div class="mt-1">
                                    <input x-model="plan.theoretical_practical" :value="plan.theoretical_practical" type="number" :name="`plan[${index}][theoretical_practical]`" :id="`plan[${index}][theoretical_practical]`" class="shadow-sm block w-1/3 sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                  </div>
                                </div>
                              </p>

                              <p class="mt-1 text-xs text-gray-500">
                                <div>
                                  <label :for="`plan[${index}][weekly_hours]`" class="block text-sm font-medium text-gray-700">Carga Horária: Semanal</label>
                                  <div class="mt-1">
                                    <input readonly x-model="plan.weekly_hours" :value="weeklyHours(index)" type="number" :name="`plan[${index}][weekly_hours]`" :id="`plan[${index}][weekly_hours]`" class="shadow-sm block w-1/3 sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                  </div>
                                </div>
                              </p>

                              <p class="mt-1 text-xs text-gray-500">
                                <div>
                                  <label :for="`plan[${index}][semester_hours]`" class="block text-sm font-medium text-gray-700">Carga Horária: Semestral</label>
                                  <div class="mt-1">
                                    <input readonly x-model="plan.semester_hours" :value="semesterHours(index)" type="number" :name="`plan[${index}][semester_hours]`" :id="`plan[${index}][semester_hours]`" class="shadow-sm block w-1/3 sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                  </div>
                                </div>
                              </p>
                              
                            </div>
                            <div>
                              <template x-if="plan.id">
                                <a :href="plan.delete" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-red-900 text-white shadow-sm hover:bg-white hover:text-red-500 sm:w-auto">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                                </button>
                            </template>

                              <template x-if="!plan.id">
                                <button @click="removePlan(index)" type="button" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-white hover:text-red-500 sm:w-auto">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                                </button>
                              </template>
                            </div>
                          </div>
                        </li>
  
                        </template>
                      </ul>
                    </div>
                    
                  </div>
  
                  <div class="overflow-hidden flex justify-end mt-4">
                    <button type="button" @click.prevent="addPlan()" class="px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-yellow-400 hover:text-gray-900 sm:w-auto flex justify-end rounded-md group">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 group-hover:scale-150 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                      </svg>
                        <span class="ml-2">Adicionar Disciplinas</span>
                    </button>
                    
                </div>
  
                    @if($errors->has('plans'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('plans') }}</p>
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
       
        Alpine.data('planHandler', (src='', index) => ({
            plans: @json($plans),
            imageUrl: src,

            addPlan() {
              this.plans.push({
                semester_id: null,
                subject_id: null,
                theoretical: 0,
                practical: 0,
                theoretical_practical: 0,
                weekly_hours: 0,
                semester_hours: 0,
              });
            },

            removePlan(index) {
              this.plans.splice(index, 1);
            },

            weeklyHours(index) {
              return parseInt(this.plans[index].theoretical) + parseInt(this.plans[index].practical) + parseInt(this.plans[index].theoretical_practical);
            },

            semesterHours(index) {
              return this.weeklyHours(index) * 24;
            },

            removePlan(index) {
              this.plans.splice(index, 1);
            },

        }));

    });
</script>
@endsection