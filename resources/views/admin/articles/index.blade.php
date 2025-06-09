@extends('admin.layouts.app')

@section('title', translation('Projects'))

@section('content')
    <div class="projects-container container">

        <div class="top-bar">

            <div class="title">
                <h1>{{ translation('Projects') }}</h1>
            </div>

            <div class="actions">

                <a href="{{ route('admin.articles.create') }}" class="btn">
                    <span>{{ translation('Add New') }}</span>
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="10" width="8.75"
                        viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                </a>

            </div>

        </div>

        <div class="table-wrapper">
            <div class="table-container overflow-x-auto">
                <table>
                    <thead>
                        <tr>
                            <th>{{ translation('Title') }}</th>
                            <th>{{ translation('Date') }}</th>
                            <th>{{ translation('Categories') }}</th>
                            <th>{{ translation('Cover Image') }}</th>
                            <th>{{ translation('Gallery') }}</th>
                            <th>{{ translation('Featured') }}</th>
                            <th>{{ translation('Published') }}</th>
                            <th>{{ translation('Published At') }}</th>
                            <th>{{ translation('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($articles) > 0)
                            @foreach ($articles as $article)
                                <tr>
                                    <!-- العنوان -->
                                    <td class="px-4 py-2 font-medium text-gray-800 dark:text-gray-200">
                                        {{ $article->title }}
                                    </td>

                                    <!-- التاريخ -->
                                    <td class="px-4 py-2 font-medium text-gray-800 dark:text-gray-200">
                                        {{ $article->date }}
                                    </td>

                                    <!-- الفئات -->
                                    <td class="px-4 py-2">
                                        @foreach ($article->categories as $category)
                                            <span
                                                class="inline-block px-2 py-1 mx-2 text-xs font-semibold text-white bg-blue-600 rounded">
                                                {{ $category->name }}
                                            </span>
                                        @endforeach
                                    </td>

                                    <!-- صورة الغلاف -->
                                    <td class="px-4 py-2">
                                        @if ($article->image)
                                            <img src="{{ asset('storage/' . $article->image) }}"
                                                class="w-20 h-20 object-cover rounded border" alt="صورة الغلاف">
                                        @endif
                                    </td>

                                    <!-- صور متعددة -->
                                    <td class="px-4 py-2">
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($article->images as $img)
                                                <img src="{{ asset('storage/' . $img->image) }}"
                                                    class="w-16 h-16 object-cover rounded border" alt="صورة إضافية">
                                            @endforeach
                                        </div>
                                    </td>

                                    <!-- حالة التمييز -->
                                    <td class="px-4 py-2">
                                        @if ($article->featured)
                                            <span
                                                class="text-green-600 font-semibold">{{ translation('Featured') }}</span>
                                        @else
                                            <span class="text-red-600 font-semibold">{{ translation('Not Featured') }}</span>
                                        @endif
                                    </td>

                                    <!-- حالة النشر -->
                                    <td class="px-4 py-2">
                                        @if ($article->is_published)
                                            <span
                                                class="text-green-600 font-semibold">{{ translation('Published') }}</span>
                                        @else
                                            <span class="text-red-600 font-semibold">{{ translation('Draft') }}</span>
                                        @endif
                                    </td>

                                    <!-- تاريخ النشر -->
                                    <td class="px-4 py-2">
                                        {{ $article->published_at ? $article->published_at->format('Y-m-d H:i') : '—' }}
                                    </td>

                                    <!-- الإجراءات -->
                                    <td class="px-4 py-2">
                                        <div class="flex justify-center items-center space-x-2 text-sm">
                                            <a href="{{ route('admin.articles.edit', $article->slug) }}"
                                                class="text-blue-600 hover:text-blue-800" title="تعديل">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.articles.destroy', $article->id) }}"
                                                method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800"
                                                    title="حذف"><svg class="w-5 h-5" aria-hidden="true"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">
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
