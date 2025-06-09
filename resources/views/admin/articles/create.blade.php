@extends('admin.layouts.app')

@section('title', translation('Add Project'))

@push('links')
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container mb-6">

        <div class="title">
            <h1>{{ translation('Add New Project') }}</h1>
        </div>

        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- العنوان -->
            <label>
                <span>{{ translation('Title') }}</span>
                <input type="text" name="title" value="{{ old('title') }}"
                    placeholder="{{ translation('Enter your project title') }}" required>
                @error('title')
                    <span validate-msg invalid>{{ $message }}</span>
                @enderror
            </label>

            <!-- التاريخ -->
            <label class="mt-4">
                <span>{{ translation('Date') }}</span>
                <input type="date" name="date" value="{{ old('date') }}"
                    placeholder="{{ translation('Enter your project date') }}" required>
                @error('date')
                    <span validate-msg invalid>{{ $message }}</span>
                @enderror
            </label>

            <!-- المحتوى -->
            <label class="mt-4">
                <span>{{ translation('Content') }}</span>
                <textarea name="content" id="editor" style="min-height: 200px;">{{ old('content') }}</textarea>
                @error('content')
                    <span validate-msg invalid>{{ $message }}</span>
                @enderror
            </label>

            <!-- الفئات -->
            <label class="mt-4">
                <span>{{ translation('Categories') }}</span>
                <select id="categories-select" name="categories[]" multiple class="w-full border rounded px-3 py-2">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('categories')
                    <span validate-msg invalid>{{ $message }}</span>
                @enderror
            </label>

            <!-- صورة أساسية -->
            <label class="mt-4">
                <span>{{ translation('Basic Image') }}</span>
                <input type="file" id="basicImage" name="image" @change="handleBasicImage($event)"
                    class="w-full upload-image-input" hidden required />
                <button type="button" class="upload-image-btn" @click="triggerFile('basicImage')">
                    {{ translation('Upload Image') }}
                </button>
                <img v-if="basicImagePreview" :src="basicImagePreview" class="w-32 h-32 object-cover rounded cursor-pointer"
                    @click="triggerFile('basicImage')" alt="Basic Image" />
                @error('image')
                    <span validate-msg invalid>{{ $message }}</span>
                @enderror
            </label>

            <!-- صور متعددة -->
            <label class="mt-4">
                <span>{{ translation('Multiple Images') }}</span>
                <input type="file" id="multipleImage" name="images[]" @change="handleMultipleImages($event)"
                    class="w-full upload-image-input" multiple hidden />
                <button type="button" class="upload-image-btn" @click="triggerFile('multipleImage')">
                    {{ translation('Upload Images') }}
                </button>
                <div class="flex flex-wrap gap-2 mt-2" v-if="multipleImagePreviews.length">
                    <img v-for="(src, index) in multipleImagePreviews" :key="index" :src="src"
                        class="w-20 h-20 object-cover rounded border" />
                </div>
                @error('images.*')
                    <span validate-msg invalid>{{ $message }}</span>
                @enderror
            </label>

            <!-- حالة النشر -->
            <label class="inline-flex items-center flex-row my-6">
                <input type="checkbox" name="is_published" class="form-checkbox">
                <span class="ml-2">{{ translation('Direct Publish') }}</span>
            </label>

            <!-- حالة التمييز -->
            <label class="inline-flex items-center flex-row mb-6">
                <input type="checkbox" name="featured" class="form-checkbox">
                <span class="ml-2">{{ translation('Mark as Featured') }}</span>
            </label>

            <!-- زر الإرسال -->
            <button type="submit" class="submit">
                {{ translation('Add') }}
            </button>
        </form>

    </div>
@endsection


@push('scripts')
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <!-- Tom Select -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {})
            .catch(error => {
                console.error(error);
            });
        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('#editor').value = CKEDITOR.instances.editor.getData();
        });
        new TomSelect('#categories-select', {
            plugins: ['remove_button'],
            maxItems: null,
            placeholder: "{{ translation('Select your project categories') }}"
        });
    </script>
@endpush
