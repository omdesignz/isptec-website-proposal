<footer aria-labelledby="footer-heading" class="bg-gray-900">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="py-20 xl:grid xl:grid-cols-3 xl:gap-8">
        <div class="grid grid-cols-2 gap-8 xl:col-span-2">
          <div class="space-y-12 md:space-y-0 md:grid md:grid-cols-2 md:gap-8">
            <div>
              <h3 class="text-sm font-medium text-white">
                ISPTEC
              </h3>
              <ul role="list" class="mt-6 space-y-6">
                <li class="text-sm">
                  <a href="/board-msg" class="text-gray-300 hover:text-isptec">
                    {{-- Mensagem da Direcção Geral --}}
                    @lang('translation.msg_from_dg')
                  </a>
                </li>

                <li class="text-sm">
                  <a href="/institutional-presentation" class="text-gray-300 hover:text-isptec">
                    {{-- Apresentação Institucional --}}
                    @lang('translation.institutional_presentation')
                  </a>
                </li>

                <li class="text-sm">
                  <a href="/history" class="text-gray-300 hover:text-isptec">
                    {{-- Histórico --}}
                    @lang('translation.history')
                  </a>
                </li>

                <li class="text-sm">
                  <a href="/infrastructure" class="text-gray-300 hover:text-isptec">
                    {{-- Infraestrutura --}}
                    @lang('translation.infrastructure')
                  </a>
                </li>

                <li class="text-sm">
                  <a href="/social-welfare" class="text-gray-300 hover:text-isptec">
                    {{-- Acção Social --}}
                    @lang('translation.social_wellfare')
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <h3 class="text-sm font-medium text-white">
                {{-- Carreiras --}}
                @lang('translation.careers')
              </h3>
              <ul role="list" class="mt-6 space-y-6">
                <li class="text-sm">
                  <a href="/recruitment" class="text-gray-300 hover:text-isptec">
                    {{-- Recrutamento --}}
                    @lang('translation.recruitment')
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="space-y-12 md:space-y-0 md:grid md:grid-cols-2 md:gap-8">
            <div>
              <h3 class="text-sm font-medium text-white">
                {{-- Formações e Serviços --}}
                @lang('translation.training_services')
              </h3>
              <ul role="list" class="mt-6 space-y-6">
                <li class="text-sm">
                  <a href="/ccd" class="text-gray-300 hover:text-isptec">
                    {{-- Cursos de Curta Duração --}}
                    @lang('translation.extension_services_short_duration_courses')
                  </a>
                </li>

                <li class="text-sm">
                  <a href="/labs" class="text-gray-300 hover:text-isptec">
                    {{-- Laboratórios Profissionalizantes --}}
                    @lang('translation.labpro_long')
                  </a>
                </li>

                <li class="text-sm">
                  <a href="/lang-center" class="text-gray-300 hover:text-isptec">
                    {{-- Centro de Ensino e Línguas --}}
                    @lang('translation.extension_services_ltc')
                  </a>
                </li>
                <li class="text-sm">
                  <a href="/student-mobility" class="text-gray-300 hover:text-isptec">
                    {{-- Mobilidade Estudantil --}}
                    @lang('translation.student_mobility')
                  </a>
                </li>
                <li class="text-sm">
                  <a href="/alumni" class="text-gray-300 hover:text-isptec">
                    {{-- Alumni --}}
                    @lang('translation.alumni')
                  </a>
                </li>
                <li class="text-sm">
                  <a href="/regulations" class="text-gray-300 hover:text-isptec">
                    {{-- Regulamentos --}}
                    @lang('translation.regulations')
                  </a>
                </li>
                <li class="text-sm">
                  <a href="/academic-calendar" class="text-gray-300 hover:text-isptec">
                    {{-- Calendário Académico --}}
                    @lang('translation.acad_calendar')
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <h3 class="text-sm font-medium text-white">
                {{-- Jurídico --}}
                @lang('translation.legal')
              </h3>
              <ul role="list" class="mt-6 space-y-6">
                <li class="text-sm">
                  <a href="/privacy-policy" class="text-gray-300 hover:text-isptec">
                    {{-- Política de Privacidade --}}
                    @lang('translation.privacy_policy')
                  </a>
                </li>

                <li class="text-sm">
                  <a href="#" class="text-gray-300 hover:text-isptec">
                  {{-- Política de Cookies --}}
                  @lang('translation.cookie_policy')
                  </a>
                </li>

                <li class="text-sm">
                  <a href="#" class="text-gray-300 hover:text-isptec">
                    {{-- Termos &amp; Condições --}}
                  @lang('translation.terms_conditions')
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="mt-12 md:mt-16 xl:mt-0">
          <h3 class="text-sm font-medium text-white">
            {{-- Inscreva-se à nossa Newsletter --}}
            @lang('translation.signup_newsletter')
          </h3>
          <p class="mt-6 text-sm text-gray-300">
            {{-- Todas as notícias e eventos, enviadas para o seu correio. --}}
            @lang('translation.signup_newsletter_tag')
          </p>
          <form class="mt-2 flex sm:max-w-md">
            <label for="email-address" class="sr-only">Email</label>
            <input id="email-address" type="text" autocomplete="email" required class="appearance-none min-w-0 w-full bg-white border border-white rounded-md shadow-sm py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:border-white focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-white">
            <div class="ml-4 flex-shrink-0">
              <button type="submit" class="w-full bg-gray-300 border border-transparent rounded-full shadow-sm py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-isptec focus:outline-none ">
                {{-- Assinar --}}
                @lang('translation.signup_newsletter_button')
              </button>
            </div>
          </form>

          @include('layouts.includes._social')
        </div>
      </div>

      <div class="border-t border-gray-800 py-10">
        <p class="text-sm text-gray-400">Copyright &copy; 2021 ISPTEC</p>
      </div>
    </div>
  </footer>