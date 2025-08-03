@extends('admin::layouts.body')
@include('admin::components.meta', [
    'title' => config('dummy.admin.lables.dashboard.text'),
])

@section('content')
    <div class="px-8 sm:ml-64 bg-[#f1f5f9] h-screen">
        <div class="pt-14 pb-8">
            <div class="gap-4">

                <div class="pt-6 mb-5 rounded-md flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.roles.create') }}" type="button"
                            class="flex gap-3 items-center px-5 py-3 justify-center text-white bg-[#3c50e0] bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm focus:outline-none">
                            <i class="fa-solid fa-arrow-left mt-[1px]"></i>
                            Back
                        </a>
                        <h1 class="text-2xl font-bold text-[#1c2441]">Create Role</h1>
                    </div>
                    <nav class="font-normal">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-500">Dashboard /</a>
                        <a href="{{ route('admin.roles.index') }}" class="text-gray-500">Role /</a>
                        <span class="text-blue-500">Edit</span>
                    </nav>
                </div>

                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" class="bg-white p-6 border">
                    @method('PUT')
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Role
                            Name</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full py-[8px] px-3"
                            placeholder="Enter Name" value="{{$role->name}}" required />
                    </div>

                    <div class="py-3">

                        <h1 class="text-lg py-2">Permissions</h1>

                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="checkPermissionAll" value="1" type="checkbox"
                                {{ App\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkPermissionAll"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900">All</label>
                        </div>

                        @php $i = 1; @endphp
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            @foreach ($permission_groups as $group)
                                @php
                                    $permissions = App\User::getpermissionsByGroupName($group->name);
                                    $j = 1;
                                @endphp

                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input type="checkbox"
                                        class="form-check-input w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                                        id="{{ $i }}Management" value="{{ $group->name }}"
                                        data-class="role-{{ $i }}-management-checkbox"
                                        {{ App\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                    <label for="{{ $i }}Management"
                                        class="w-full ms-2 h-full flex items-center text-sm font-medium text-gray-900 dark:text-gray-300">{{ $group->name }}</label>
                                </div>
                                <ul
                                    class="role-{{ $i }}-management-checkbox text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach ($permissions as $permission)
                                        <li class="w-full border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input type="checkbox" name="permissions[]"
                                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                    id="checkPermission{{ $permission->id }}"
                                                    value="{{ $permission->name }}"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                                <label for="checkPermission{{ $permission->id }}"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ $permission->name }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                @php  $i++; @endphp
                            @endforeach

                        </div>
                    </div>

                    <button type="submit" class="bg-green-500 py-[6px] px-5 rounded-sm text-white text-xl font-normal">Update</button>
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

        function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.' + groupClassName + ' input');
            const groupIDCheckBox = $("#" + groupID);

            // if there is any occurance where something is not selected then make selected = false
            if ($('.' + groupClassName + ' input:checked').length == countTotalPermission) {
                groupIDCheckBox.prop('checked', true);
            } else {
                groupIDCheckBox.prop('checked', false);
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
