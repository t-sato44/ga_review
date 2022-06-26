<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('名前') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="name_kana" value="{{ __('フリガナ') }}" />
                <x-jet-input id="name_kana" class="block mt-1 w-full" type="text" name="name_kana" :value="old('name_kana')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('パスワード') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('パスワードの確認') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="birth_date" value="{{ __('誕生日') }}" />
                <x-jet-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="nickname" value="{{ __('レビューネーム') }}" />
                <x-jet-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="old('nickname')" required />
            </div>

            <!-- level -->
            <div>
                <x-jet-label for="level" value="{{__('ゲームレベル') }}" />

                <div class="form-group row">
               @for($i=1;$i <= 3;$i++)
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" id="graphic-{{ $i }}" name="level" value="{{ $i }}">
                     <label class="form-check-label" for="inlineRadio01">レベル{{ $i }}</label>
                  </div>
               @endfor
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('ご登録済みの方はこちら') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('新規登録') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
