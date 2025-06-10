@extends('admin.layouts.app')

@section('title', translation('Categories'))

@section('content')
    <div class="categories-container container">

        <div class="top-bar">

            <div class="title">
                <h1>
                    {{ translation('Categories') }}
                </h1>
            </div>

            <div class="actions">

                <button type="button" class="btn" @click="openModal('add-category-modal')" tabindex="1">
                    <span>{{ translation('Add New') }}</span>
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="10" width="8.75"
                        viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                </button>

            </div>

        </div>

        <div class="table-wrapper">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>{{ translation('Name') }}</th>
                            <th>{{ translation('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="text-sm">
                                        {{ translation($category->name) }}
                                    </td>
                                    <td class="actions">
                                        <div class="flex justify-center items-center space-x-4 text-sm">
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Edit"
                                                @click="openModal('edit-category-modal-{{ $category->id }}')">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2">
                                    {{ translation('No data found.') }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('modal')
    <!-- Add Category Modal -->
    <div id="add-category-modal" class="modal">
        <!-- Modal -->
        <div class="modal-content" role="dialog">
            <!-- Header -->
            <header>
                <h2>{{ translation('Add Category') }}</h2>
                <button @click="closeModal('add-category-modal')">
                    ✕
                </button>
            </header>

            <!-- Form -->
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <label>
                    <span>{{ translation('Category name') }}</span>
                    <input name="name" value="{{ old('name') }}"
                        placeholder="{{ translation('Enter category name') }}" required />
                    @error('name')
                        <span class="validate-msg invalid">{{ translation($message) }}</span>
                    @enderror
                </label>

                <!-- Footer -->
                <button type="submit" class="submit">
                    {{ translation('Add') }}
                </button>

            </form>
        </div>
    </div>
    @foreach ($categories as $category)
        <!-- Edit Category Modal -->
        <div id="edit-category-modal-{{ $category->id }}" class="modal">
            <!-- Modal -->
            <div class="modal-content" role="dialog">
                <!-- Header -->
                <header>
                    <h2>{{ translation('Edit Category') }}</h2>
                    <button @click="closeModal('edit-category-modal-{{ $category->id }}')">
                        ✕
                    </button>
                </header>

                <!-- Form -->
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $category->id }}" />

                    <label>
                        <span>{{ translation('Category name') }}</span>
                        <input name="name" value="{{ $category->name }}"
                            placeholder="{{ translation('Enter category name') }}" required />
                        @error('name')
                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                        @enderror
                    </label>

                    <button type="submit" class="submit">
                        {{ translation('Save') }}
                    </button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
