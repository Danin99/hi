@extends('admin::layouts.body')
@include('admin::components.meta', [
    'title' => 'Create Role -',
])

@section('content')
    <div class="px-8 sm:ml-64 bg-[#f1f5f9] h-screen">
        <div class="pt-14 pb-8">
            <div class="gap-4">

                <div class="pt-6 mb-5 rounded-md flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.roles.index') }}" type="button"
                            class="flex gap-3 items-center px-5 py-3 justify-center text-white bg-[#3c50e0] bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm focus:outline-none">
                            <i class="fa-solid fa-arrow-left mt-[1px]"></i>
                            Back
                        </a>
                        <h1 class="text-2xl font-bold text-[#1c2441]">Create Role</h1>
                    </div>
                    <nav class="font-normal">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-500">Dashboard /</a>
                        <a href="{{ route('admin.roles.index') }}" class="text-gray-500">Role /</a>
                        <span class="text-blue-500">Create</span>
                    </nav>
                </div>

                <form action="{{ route('admin.roles.store') }}" method="POST" class="bg-white p-6 border">
                    @csrf

                    <div>
                        <label for="name" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Role
                            Name</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full py-[8px] px-3"
                            placeholder="Enter Name" required />
                    </div>

                    <div class="py-3">
                        <h1 class="text-lg py-2 font-semibold">Permissions</h1>

                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="checkPermissionAll" value="1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-md focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkPermissionAll"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900">All</label>
                        </div>

                        @php $i = 1; @endphp
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            @foreach ($permission_groups as $group)
                                <div class="flex items-center ps-4 border border-gray-200 rounded-md">
                                    <input type="checkbox"
                                        class="form-check-input w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                                        id="{{ $i }}Management" value="{{ $group->name }}"
                                        data-class="role-{{ $i }}-management-checkbox">
                                    <label for="{{ $i }}Management"
                                        class="w-full ms-2 cursor-pointer h-full flex items-center text-sm font-medium text-gray-900 dark:text-gray-300">{{ $group->name }}</label>
                                </div>

                                <ul
                                    class="role-{{ $i }}-management-checkbox overflow-hidden text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @php
                                        $permissions = App\User::getpermissionsByGroupName($group->name);
                                        $j = 1;
                                    @endphp
                                    @foreach ($permissions as $permission)
                                        <li class="w-full border-gray-200 hover:bg-gray-100">
                                            <div class="flex items-center ps-3">
                                                <input id="checkPermission{{ $permission->id }}"
                                                    value="{{ $permission->name }}" name="permissions[]" type="checkbox"
                                                    value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="checkPermission{{ $permission->id }}"
                                                    class="w-full py-2 ms-2 text-sm font-medium text-gray-900 cursor-pointer">{{ $permission->name }}</label>
                                            </div>
                                        </li>
                                        @php  $j++; @endphp
                                    @endforeach
                                </ul>

                                @php  $i++; @endphp
                            @endforeach
                        </div>

                    </div>


                    <button type="submit" class="bg-green-500 py-[6px] px-5 rounded-sm text-white text-xl font-normal">Save</button>
                </form>


            </div>
        </div>
    </div>

    <script type="module">
        $("#checkPermissionAll").click(function() {
            if ($(this).is(':checked')) {
                // check all the checkbox
                $('input[type=checkbox]').prop('checked', true);
            } else {
                // un check all the checkbox
                $('input[type=checkbox]').prop('checked', false);
            }
        });

        document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
            checkbox.addEventListener('click', function() {
                checkPermissionByGroup(this.dataset.class, this);
            });
        });

        function checkPermissionByGroup(className, checkThis) {
            const groupIdName = $("#" + checkThis.id);
            const classCheckBox = $('.' + className + ' input');

            if (groupIdName.is(':checked')) {
                classCheckBox.prop('checked', true);
            } else {
                classCheckBox.prop('checked', false);
            }

            implementAllChecked();
        }

        function implementAllChecked() {
            const countPermissions = {{ count($all_permissions) }};
            const countPermissionGroups = {{ count($permission_groups) }};

            if ($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)) {
                $("#checkPermissionAll").prop('checked', true);
            } else {
                $("#checkPermissionAll").prop('checked', false);
            }
        }
    </script>
@endsection
