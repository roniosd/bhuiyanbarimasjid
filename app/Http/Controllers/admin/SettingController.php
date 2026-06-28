<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\HomepageSetting;
use App\Models\Setting;
use Illuminate\Http\Request; 
use function PHPUnit\Framework\fileExists;

class SettingController extends Controller
{
    use FileHandlerTrait, AccessTrait;
    // !Setting Update
    public function index()
    {
        if ($this->hasPermission()) {
            return view('admin.views.update.siteSetting');
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
    public function update(Request $request)
    {
        $request->validate([
            'favicon' => 'image|max:2024|mimes:png,jpg,jpeg,gif,bmp,max_height=512',
            'flogo' => 'image|max:2024|mimes:png,jpg,jpeg,gif,bmp',
            'logo' => 'image|max:2024|mimes:png,jpg,jpeg,gif,bmp',
            'mlogo' => 'image|max:2024|mimes:png,jpg,jpeg,gif,bmp',
            'email' => 'email',
            'description' => 'string|max:200',
        ]);
        $setting = Setting::first();
        $data = [];
        foreach (['favicon', 'flogo', 'logo', 'mlogo'] as $fileName) {
            if ($request->hasFile($fileName)) {
                $this->deletePhoto($setting->$fileName, 'logos');
                $data[$fileName] = $this->uploadPhoto($request->file($fileName), 'logos');
                sleep(1);
            }
        }
        $allInputs = [
            'title',
            'tagline',
            'tnt',
            'mobile',
            'slider',
            'email',
            'address',
            'description',
            'copyright',
            'terms',
            'phone',
            'header'
        ];


        foreach ($allInputs as $inputName) {
            if ($request->$inputName) {
                $data[$inputName] = $request->$inputName;
            }
        }
        if ($data && $setting->update($data)) {
            $this->AdminActivity('setting', $setting->id, 'update');
            return back()->with('success', 'Update successfully!');
        } else {
            return back()->with('error', 'Something went wrong.');
        }
    }

    // ! Social Setting Update
    public function social()
    {
        if ($this->hasPermission()) {
            return view('admin.views.update.socialLinkSetting');
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
    public function socialUpdate(Request $request)
    {
        $request->validate([
            'social_links' => 'array',
        ]);

        $socialLinks = $request->input('social_links');
        $setting = Setting::first();
        if ($setting && $socialLinks) {
            $inputValue = json_encode($socialLinks);
            if ($setting->update(['social_links' => $inputValue])) {
                $this->AdminActivity('Social Links', $setting->id, 'update');
                return back()->with('success', 'Updated successfully!');
            }
        } else {
            return back()->with('error', 'No setting record found.');
        }
    }

    // ! Homepage Setting Update
    public function homepage()
    {
        if ($this->hasPermission()) {
            return view('admin.views.update.homepageSetting');
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
    public function homepageUpdate(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'btn_label' => 'nullable|string|max:255',
            'btn_link' => 'nullable|url',
            'short_descreption' => 'nullable|string',
            'status' => 'required|in:published,unpublished',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sections' => 'nullable|array'
        ]);
        $data = $request->all();
        $setting = HomepageSetting::first();
        
        // Handle image
        if ($request->hasFile('photo')) {
            $this->deletePhoto($setting->photo, 'homepage');

            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'homepage');
        }

        if ($data && $setting->update($data)) {
            return back()->with('success', 'Homepage updated successfully!');
        } else {
            return back()->with('error', 'Something went wrong.');
        }


    }

    // ! Contact Update
    public function orgContact()
    {
        if ($this->hasPermission()) {
            return view('admin.views.update.updateContact');
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
    public function orgContactUpdate(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required',
            'email' => 'nullable|email',
            'tnt' => 'nullable|string',
            'mobile' => 'nullable|string',
            'map' => 'nullable|url'
        ]);
 


        if (Contact::updateOrCreate(
    ['id' => Contact::first()?->id],
    $validated
)) {
            return back()->with('success', 'Organization contact updated successfully!');
        } else {
            return back()->with('error', 'Something went wrong.');
        }


    }

}



