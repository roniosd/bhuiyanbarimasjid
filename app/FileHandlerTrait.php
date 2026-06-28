<?php

namespace App;

use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait FileHandlerTrait
{

    // ! Add Admin Activities---------------------------------
    public function AdminActivity($componentType, $componentId, $action)
    {
        if (!Auth::check()) {
            return;
        }

        $adminName = Auth::user()->full_name;
        $adminUrl = route('adminmanage.show', Auth::id());
        // $componentUrl = route($componentType . '.show', $componentId);

        $task = "<a href='{$adminUrl}'>{$adminName}</a> {$action} a {$componentType}";

        ActivityLog::create([
            'admin_id' => Auth::id(),
            'task' => $task,
            'component_type' => strtolower($componentType),
            'component_id' => $componentId,
            'action' => strtolower($action),
            'created' => now(),
        ]);
    }
    // !-----------------------------------------------------------



    // ! For Delete Old Photo 
    protected function deletePhoto(?string $photo, ?string $path): void
    {
        $filename = storage_path("app/public/{$path}/{$photo}");
        if ($photo && file_exists($filename)) {
            unlink($filename);
        }
    }
    // ! For Store image



    protected function uploadPhoto($file, string $path): string
    {
        $imageManager = new ImageManager(new Driver());
        $img = $imageManager->read($file);

        //! Resize to fit within 1320x550 while maintaining aspect ratio (no upscale)
        $img = $img->scaleDown(width: 1320, height: 550);

        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $folderPath = public_path('storage/' . $path);

        //! Ensure the folder exists
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $img->save($folderPath . '/' . $imageName);

        return $imageName;
    }








    // !Short A string.....
    public function shortText($text, $length)
    {
        return Str::limit($text, $length);
    }

    // !Convert as a human style Date..
    public function getDate($date, $formate)
    {
        return Carbon::parse($date)->format($formate);
    }

    // !Convert English data to bangla date..
    public function getBangla($date)
    {
        return str_replace(
            [
                '0',
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec',
                'Sunday',
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday'
            ],
            [
                '০',
                '১',
                '২',
                '৩',
                '৪',
                '৫',
                '৬',
                '৭',
                '৮',
                '৯',
                'জানুয়ারি',
                'ফেব্রুয়ারি',
                'মার্চ',
                'এপ্রিল',
                'মে',
                'জুন',
                'জুলাই',
                'আগস্ট',
                'সেপ্টেম্বর',
                'অক্টোবর',
                'নভেম্বর',
                'ডিসেম্বর',
                'রবিবার',
                'সোমবার',
                'মঙ্গলবার',
                'বুধবার',
                'বৃহস্পতিবার',
                'শুক্রবার',
                'শনিবার'
            ],
            $date
        );
    }

    public function routeNames()
    {
        return collect(app('router')->getRoutes())
            ->map(fn($route) => $route->getName())
            ->filter()
            ->reject(fn($name) => str_ends_with($name, 'store'))
            ->unique()
            ->values()
            ->takeWhile(fn($name) => $name !== 'homePage')
            ->all();
    }

    public function templates()
    {

        $path = resource_path('views/frontend/views/templates');
        $files = File::files($path);

        $templates = [];
        foreach ($files as $file) {
            $template = pathinfo($file, PATHINFO_FILENAME);
            $template = str_replace('.blade', '', $template);
            $templates[] = $template;
        }
        return $templates;
    }
}
