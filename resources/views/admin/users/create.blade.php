<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Добавить пользователя') }}
        </h2>
    </x-slot>

    <div
        class="rounded-2xl hover:shadow-2xl flex w-full px-6 bg-white md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 lg:px-16 xl:px-12 items-left justify-left my-2">
        <div class="w-full py-16 lg:py-6 mb-3">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Имя')"/>

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                             autofocus/>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')"/>

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required/>
                </div>

                <!-- Name -->
                <div class="mt-4">
                    <x-label for="phone" :value="__('Номер телефона')"/>

                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                             required
                             autofocus/>
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Пароль')"/>

                    <x-input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required autocomplete="new-password"/>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Подтвердите пароль')"/>

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                             type="password"
                             name="password_confirmation" required/>
                </div>
                <div class="mt-4">
                    <x-label :value="__('Выберите роль')"/>
                    <div class="grid grid-cols-4 my-2">
                        @foreach($roles as $value)
                            <div class="col-span-2">
                                <input type="checkbox" class="p-2 m-2 text-right rounded" id="{{$value}}"
                                       name="roles[]" value="{{ $value }}">
                                <label class="text-left" for="{{ $value }}">{{ $value }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Сохранить') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
