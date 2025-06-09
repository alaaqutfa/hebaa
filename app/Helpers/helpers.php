<?php
use App\Models\Article;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Translation;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;

if (! function_exists('getCategory')) {
    function getCategory()
    {
        return Category::all();
    }
}

if (! function_exists('getArticle')) {
    function getArticle()
    {
        return Article::all();
    }
}

if (! function_exists('getFeaturedArticle')) {
    function getFeaturedArticle()
    {
        return Article::where('featured', true)->latest()->get();
    }
}

if (! function_exists('translation')) {
    function translation($key, $locale = null)
    {
        $locale      = $locale ?: App::getLocale();
        $translation = Translation::where('key', $key)
            ->where('locale', $locale)
            ->value('value');
        // if (is_null($translation) || $locale != "en") {
        if (is_null($translation)) {
            Translation::create([
                'key'    => $key,
                'locale' => $locale,
                'value'  => $key,
            ]);
            return $key;
        } else {
            return $translation;
        }

    }
}

if (! function_exists('contentTranslation')) {
    function contentTranslation($key, $defaultValue, $locale = null)
    {
        $locale  = $locale ?: App::getLocale();
        $fullKey = 'content_' . $key;

        $translation = Translation::firstOrCreate(
            ['key' => $fullKey, 'locale' => $locale],
            ['value' => $defaultValue]
        );

        return $translation->value ?? $defaultValue;
    }
}

if (! function_exists('saveImage')) {
    function saveImage(UploadedFile $file, string $path, string $disk = 'public'): string
    {
        return $file->store($path, $disk);
    }
}

if (! function_exists('saveSetting')) {
    function saveSetting(string $key, mixed $value): void
    {
        Setting::updateOrCreate(
            ['key_name' => $key],
            ['value' => $value]
        );
    }
}

if (! function_exists('getSetting')) {
    function getSetting(string $key, $default = null): mixed
    {
        $setting = Setting::where('key_name', $key)->first();

        return $setting ? $setting->value : $default;
    }
}

if (! function_exists('getHeroProjects')) {
    function getHeroProjects(): \Illuminate\Support\Collection
    {
        $projects = collect();

        for ($i = 1; $i <= 5; $i++) {
            $key       = "hero_project_$i";
            $projectId = getSetting($key);

            if ($projectId) {
                $project = Article::with(['images', 'categories'])->find($projectId);
                if ($project) {
                    $projects->put($key, $project);
                }
            }
        }

        return $projects;
    }
}
