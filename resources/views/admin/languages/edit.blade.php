@php use Illuminate\Support\Str; @endphp

@extends('admin.layouts.app')

@section('title', translation('Translate'))

@section('content')

    <div class="container">

        <div class="title">
            <h1>{{ translation('Translate') . ' ' . $locale }}</h1>
        </div>

        <div class="table-wrapper mb-6">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>{{ translation('Key') }}</th>
                            <th>{{ translation('Translate') }}</th>
                            <th>{{ translation('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($translations) > 0)
                            @foreach ($translations as $tr)
                                <tr>
                                    <td>{{ $tr->key }}</td>
                                    <td>
                                        <form
                                            action="{{ route('admin.translations.update', ['locale' => $locale, 'key' => $tr->key]) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="page" value="{{ request()->get('page', 1) }}">
                                            @if (Str::contains($tr->key, 'content_'))
                                                <label>
                                                    <div class="iconed-input">
                                                        <textarea name="value" class="content-editor">{{ $tr->value }}</textarea>
                                                        <button type="submit" class="icon-content">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    @error('value')
                                                        <span class="validate-msg invalid">{{ translation($message) }}</span>
                                                    @enderror
                                                </label>
                                            @else
                                                <label>
                                                    <div class="iconed-input">
                                                        <input type="text" name="value" value="{{ $tr->value }}"
                                                            required />
                                                        <button type="submit" class="icon">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    @error('value')
                                                        <span class="validate-msg invalid">{{ translation($message) }}</span>
                                                    @enderror
                                                </label>
                                            @endif
                                        </form>
                                    </td>
                                    <td class="actions">
                                        <div class="flex justify-center items-center space-x-4 text-sm">
                                            <form action="{{ route('admin.translations.destroy', $tr->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="page"
                                                    value="{{ request()->get('page', 1) }}">
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
                            <tr>
                                <td colspan="3">
                                    {{ $translations->links() }}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="3">
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

@push('scripts')
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        const editors = [];

        // تفعيل المحرر على كل textarea لديها الكلاس content-editor
        document.querySelectorAll('.content-editor').forEach((textarea, index) => {
            ClassicEditor
                .create(textarea)
                .then(editor => {
                    editors.push({
                        textarea,
                        editor
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });

        // عند إرسال أي فورم، نقوم بتحديث القيمة من المحرر إلى textarea
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                editors.forEach(({
                    textarea,
                    editor
                }) => {
                    textarea.value = editor.getData();
                });
            });
        });
    </script>
@endpush
