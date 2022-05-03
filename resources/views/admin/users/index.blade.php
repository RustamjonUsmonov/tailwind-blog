<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Пользователи') }}
            </h2>
            @can('role-create')
               <x-button class="text-white"><a href="{{route('users.create')}}" class="font-semibold text-xl  leading-tight">
                    {{ __('Добавить пользователя') }}
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
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Пользователь</th>
                                <th class="px-4 py-3">Роль</th>
                                <th class="px-4 py-3">Настройки</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($users as $user)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 font-semibold text-black border">{{$loop->iteration}}</td>
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
                                                <p class="font-semibold text-black">{{$user->name??''}}</p>
                                                <p class="text-xs text-gray-600">{{$user->email??''}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-xs border">
                                        @forelse($user->getRoleNames() as $role)
                                            <x-button
                                                class="flex uppercase px-2 py-1 font-semibold leading-tight text-white-700 bg-white-100 hover:bg-white-50 rounded-sm m-1">
                                                {{$role}}
                                            </x-button>
                                        @empty
                                            <x-button
                                                class="flex uppercase px-2 py-1 font-semibold leading-tight text-white-700 bg-white-100 hover:bg-white-50 rounded-sm m-1">
                                                {{'No privileges!'}}
                                            </x-button>
                                        @endforelse
                                    </td>
                                    <td class="px-4 py-3 text-sm border"><div class=" grid grid-cols-3  border-0">
                                            <div class="border-0"><x-button
                                                    class="flex uppercase px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm m-1 hover:bg-yellow-500">
                                                    <a href="{{ route('users.edit',$user->id) }}">Изменить</a>
                                                </x-button></div>
                                            @can('role-delete')
                                                <div class="border-0">
                                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <x-button
                                                            class="flex uppercase px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm m-1 hover:bg-red-500">
                                                            {{ __('Удалить') }}
                                                        </x-button>
                                                    </form></div>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $users->links() !!}
            </section>
        </div>
    </div>

</x-app-layout>
