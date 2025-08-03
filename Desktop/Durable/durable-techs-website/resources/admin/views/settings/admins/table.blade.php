<table class="w-full border-t text-sm text-left text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-4 py-3">ID</th>
            <th scope="col" class="px-4 py-3">Name</th>
            <th scope="col" class="px-4 py-3">Email</th>
            <th scope="col" class="px-4 py-3">Role</th>
            <th>
                <span class="sr-only">Actions</span>
            </th>
        </tr>
    </thead>
    <tbody>
        @if ($admins->count() > 0)
            @foreach ($admins as $key => $item)
                <tr class="bg-white border-t hover:bg-gray-50">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                        {{ $loop->index + 1 }}</th>
                    <td class="px-4 py-3">{{ $item->name }}</td>
                    <td class="px-4 py-3">{{ $item->email }}</td>
                    <td class="px-4 py-3">
                        @foreach ($item->roles as $role)
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-[3px] rounded">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>

                    <td class="px-4 py-3 flex items-center justify-end">
                        <button id="apple-imac-{{ $loop->index + 1 }}-dropdown-button"
                            data-dropdown-toggle="apple-imac-{{ $loop->index + 1 }}-dropdown"
                            class="inline-flex items-center px-2 py-1 text-sm font-medium text-center text-gray-600 hover:text-gray-900 rounded-md focus:outline-none"
                            type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                        <div id="apple-imac-{{ $loop->index + 1 }}-dropdown"
                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="p-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="apple-imac-{{ $loop->index + 1 }}-dropdown-button">
                                {{-- on trush  --}}
                                @if (request()->query('v'))
                                    @if (Auth::guard('admin')->user()->can('admin.disabled'))
                                        <li>
                                            <a id="hideShowModal" data-modal-target="hideShowModal-{{ $item->id }}"
                                                data-modal-toggle="hideShowModal-{{ $item->id }}"
                                                class="block py-2 cursor-pointer px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Enable</a>
                                        </li>
                                    @endif
                                    @if (Auth::guard('admin')->user()->can('admin.delete'))
                                        <li>
                                            <a id="deleteButton" data-modal-target="deleteModal-{{ $item->id }}"
                                                data-modal-toggle="deleteModal-{{ $item->id }}"
                                                class="block py-2 cursor-pointer px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                        </li>
                                    @endif
                                    {{-- on index  --}}
                                @else
                                    @if (Auth::guard('admin')->user()->can('admin.edit'))
                                        <li>
                                            <a href="{{ route('admin.admins.edit', $item->id) }}"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                    @endif
                                    @if (Auth::guard('admin')->user()->can('admin.disabled'))
                                        <li>
                                            <a id="hideShowButton"
                                                data-modal-target="hideShowModal-{{ $item->id }}"
                                                data-modal-toggle="hideShowModal-{{ $item->id }}"
                                                class="block py-2 cursor-pointer px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Disable</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>

                        @if (request()->query('v'))
                            @if (Auth::guard('admin')->user()->can('admin.delete'))
                                @include('admin::components.delete', [
                                    'target' => 'admins',
                                    'text' =>
                                        'Are you sure ? are you want to delete "<span class="text-red-600"> ' .
                                        $item->username .
                                        '</span> " ?',
                                ])
                            @endif
                            @if (Auth::guard('admin')->user()->can('admin.disabled'))
                                @include('admin::components.hide-show', [
                                    'target' => 'admins',
                                    'text' =>
                                        'Are you sure ? are you want to enable "<span class="text-red-600"> ' .
                                        $item->username .
                                        '</span> " ?',
                                    'type' => 'show',
                                ])
                            @endif
                        @else
                            @if (Auth::guard('admin')->user()->can('admin.disabled'))
                                @include('admin::components.hide-show', [
                                    'target' => 'admins',
                                    'text' =>
                                        'Are you sure ? are you want to disable "<span class="text-red-600"> ' .
                                        $item->username .
                                        '</span> " ?',
                                    'type' => 'hide',
                                ])
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center bg-red-500 text-white py-2 font-semibold">NOT FOUND ANY DATA!!
                </td>
            </tr>
        @endif
    </tbody>
</table>
