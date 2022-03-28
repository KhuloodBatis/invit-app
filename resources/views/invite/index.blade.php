<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invite Code') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">

                    @if(!auth()->user()->reachedInviteCodeRequestLimit())
                    <form action="{{ route('invites') }}" method="post">
                        @csrf

                        <x-button>Request an invite code </x-button>
                    </form>
                    @endif
                    @foreach ($invitCodes as $code)
                        <div>
                            <div>

                                <br>
                                @if ($code->approved())
                                   <span x-data x-on:click="console.log('abc')">{{ $code->code }}</span>

                                    ({{ $code->quantity_used }}//{{ $code->quantity }} uses)
                                @else
                                    (pending)
                                    requested {{ $code->created_at->toDateString() }}
                                @endif


                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
