<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2>
                {{ __('Роли') }}
            </h2>
            @can('role-create')
                <x-button class="text-white"><a href="{{route('roles.create')}}" class="font-semibold text-xl leading-tight">
                    {{ __('Добавить роль') }}
                </a></x-button>
            @endcan
        </div>
    </x-slot>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-3 border-b border-gray-200">
            <section class="container mx-auto p-6 font-mono">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-200 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Роль</th>
                                <th class="px-4 py-3">Всего пользователей</th>
                                <th class="px-4 py-3">Доступы</th>
                                <th class="px-4 py-3">Настройки</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($roles as $role)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                     src="https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes.png"
                                                     alt="" loading="lazy"/>
                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                     aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-black">{{$role->name}}</p>
                                                <p class="text-xs text-gray-600">{{$role->guard_name}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center px-4 py-3 text-ms font-semibold border">{{$role->users_count}}</td>
                                    <td class="px-4 py-3 text-xs border  ">
                                        <div class="flex">
                                            @foreach($role->permissions as $permission)
                                                <div class="border-0">
                                                    <button
                                                        class="py-2 px-4 text-center  rounded-md text-white text-sm  flex uppercase px-2 py-1 font-semibold  leading-tight text-green-600 bg-green-100 hover:bg-green-50 rounded-sm m-1">
                                                        {{$permission->name}}
                                                    </button></div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm border ">
                                        <x-button
                                            class="flex uppercase px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm m-1 hover:bg-yellow-500">
                                            <a href="{{route('roles.edit',$role->id)}}">Изменить</a>
                                        </x-button>
                                        @can('role-delete')
                                            <form action="{{route('roles.destroy',$role->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <x-button
                                                    class="flex uppercase px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm m-1 hover:bg-red-500">
                                                    {{ __('Удалить') }}
                                                </x-button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>


    {!! $roles->links() !!}
</x-app-layout>
