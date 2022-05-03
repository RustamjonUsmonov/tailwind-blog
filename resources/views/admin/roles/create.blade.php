<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Добавить роль') }}
        </h2>
    </x-slot>

    <div
        class="rounded-2xl hover:shadow-2xl flex w-full px-6 bg-white md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 lg:px-16 xl:px-12 items-left justify-left my-2">
        <div class="w-full py-16 lg:py-6 ">
            <h1 class="my-12 text-2xl font-semibold tracking-tighter text-black-700 sm:text-3xl title-font my-2">
                {{'Заполните форму'}}</h1>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                @method('POST')
                <div>
                    <x-label for="name" :value="__('Название роли')"/>

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                             required autofocus/>
                </div>
                <div class="grid grid-cols-4 my-2">
                    @foreach($permission as $value)
                        <div class="col-span-2">
                            <input type="checkbox" class="p-2 m-2 text-right rounded" id="{{$value->id}}"
                                   name="permission[]" value="{{ $value->id }}">
                            <label class="text-left" for="{{ $value->id }}">{{ $value->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="flex items-center justify-between mt-4">
                    <x-button class="ml-3">
                        {{ __('Сохранить') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
