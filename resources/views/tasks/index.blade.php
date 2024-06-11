<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tasks') }}
            </h2>
            <a href="{{ route('tasks.create') }}"><x-primary-button>{{ __('Create task') }}</x-primary-button></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        S.No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($tasks->count() > 0)
                                    @foreach ($tasks as $key => $task)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4">
                                                {{ $key + 1 }}
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $task->title }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $task->description }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $task->status }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <a
                                                    href="{{ route('tasks.edit', ['task' => $task]) }}"><x-primary-button>{{ __('Edit') }}</x-primary-button></a>
                                                <a
                                                    href="{{ route('tasks.index', ['task' => $task]) }}"><x-danger-button>{{ __('Delete') }}</x-danger-button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if (request()->get('task'))
        <x-modal name="confirm-user-deletion" :show="true" focusable>
            <form method="post" action="{{ route('tasks.destroy', ['task' => request()->get('task')]) }}"
                class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete this task?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your task is deleted, all of its data will be permanently deleted.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <a href="{{ route('tasks.index') }}">
                        <x-secondary-button>
                            {{ __('Cancel') }}
                        </x-secondary-button>
                    </a>

                    <x-danger-button type="submit" class="ms-3">
                        {{ __('Delete task') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    @endif
</x-app-layout>
