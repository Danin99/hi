<table class="w-full border-t text-sm text-left text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-4 py-3">ID</th>
            <th scope="col" class="px-4 py-3">Name</th>
            <th scope="col" class="px-4 py-3">Permissions</th>
            <th>
                <span class="sr-only">Actions</span>
            </th>
        </tr>
    </thead>
    <tbody>
        @if ($roles->count() > 0)
            @foreach ($roles as $key => $item)
                <tr class="bg-white border-t hover:bg-gray-50">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                        {{ $key + 1 }}</th>
                    <td class="px-4 py-3">{{ $item->name }}</td>
                    <td class="px-4 py-3">
                        @foreach ($item->permissions as $perm)
                            <span class="badge badge-info mr-1">
                                {{ $perm->name }}
                            </span>
                        @endforeach
                    </td>

                    <td class="px-4 py-3 flex items-center justify-end">
                        <button id="apple-imac-{{ $key + 1 }}-dropdown-button"
                            data-dropdown-toggle="apple-imac-{{ $key + 1 }}-dropdown"
                            class="inline-flex items-center px-2 py-1 text-sm font-medium text-center text-gray-600 hover:text-gray-900 rounded-md focus:outline-none"
                            type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                        <div id="apple-imac-{{ $key + 1 }}-dropdown"
                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="p-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="apple-imac-{{ $key + 1 }}-dropdown-button">
                                @if (Auth::guard('admin')->user()->can('role.edit'))
                                    <li>
                                        <a href="{{ route('admin.roles.edit', $item->id) }}"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                @endif
                                @if (Auth::guard('admin')->user()->can('role.delete'))
                                    <li>
                                        <a id="deleteButton" data-modal-target="deleteModal-{{ $item->id }}"
                                            data-modal-toggle="deleteModal-{{ $item->id }}"
                                            class="block py-2 cursor-pointer px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        @if (Auth::guard('admin')->user()->can('role.delete'))
                            <div id="deleteModal-{{ $item->id }}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="deleteModal-{{ $item->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <form class="p-4 md:p-5 text-center" action="{{route('admin.roles.destroy', $item->id)}}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                you
                                                sure you want to delete this product?</h3>
                                            <button type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="deleteModal-{{ $item->id }}" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3" class="text-center bg-red-500 text-white py-2 font-semibold">NOT FOUND ANY DATA!!
                </td>
            </tr>
        @endif
    </tbody>
</table>
