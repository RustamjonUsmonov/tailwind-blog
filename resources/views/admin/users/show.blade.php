<x-app-layout>
    <x-slot name="header">
        {{ __('Show User') }}
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            <div class="row">

                <div class="col-lg-12 margin-tb">

                    <div class="pull-left">

                        <h2> Show User</h2>

                    </div>

                    <div class="pull-right">

                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>

                    </div>

                </div>

            </div>


            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Name:</strong>

                        {{ $user->name }}

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Email:</strong>

                        {{ $user->email }}

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Roles:</strong>

                        @if(!empty($user->getRoleNames()))

                            @foreach($user->getRoleNames() as $v)

                                <label class="badge badge-success">{{ $v }}</label>

                            @endforeach

                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
