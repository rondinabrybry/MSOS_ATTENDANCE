<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $validatedData = $request->validated();

        if ($request->hasFile('profile_image')) {
            
            $image = $request->file('profile_image');
            $destinationPath = public_path('storage/profile_images');
            $quality = 75;
    
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
    
            $imageType = $image->getClientOriginalExtension();
            switch ($imageType) {
                case 'jpg':
                case 'jpeg':
                    $originalImage = imagecreatefromjpeg($image->getPathname());
                    break;
                case 'png':
                    $originalImage = imagecreatefrompng($image->getPathname());
                    break;
                case 'gif':
                    $originalImage = imagecreatefromgif($image->getPathname());
                    break;
                default:
                    return response()->json(['error' => 'Invalid image format'], 400);
            }
    
            list($originalWidth, $originalHeight) = getimagesize($image->getPathname());
    
            $maxWidth = 800;
            $maxHeight = 800; 
    
            $aspectRatio = $originalWidth / $originalHeight;
            if ($originalWidth > $originalHeight) {
                $newWidth = min($maxWidth, $originalWidth);
                $newHeight = $newWidth / $aspectRatio;
            } else {
                $newHeight = min($maxHeight, $originalHeight);
                $newWidth = $newHeight * $aspectRatio;
            }
    
            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
    
            imagecopyresampled($resizedImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
    
            $compressedImageName = time() . '_' . $image->getClientOriginalName();
            $compressedImagePath = $destinationPath . '/' . $compressedImageName;
    
            switch ($imageType) {
                case 'jpg':
                case 'jpeg':
                    imagejpeg($resizedImage, $compressedImagePath, $quality);
                    break;
                case 'png':
                    imagepng($resizedImage, $compressedImagePath, floor($quality / 10));
                    break;
                case 'gif':
                    imagegif($resizedImage, $compressedImagePath);
                    break;
            }
    
            imagedestroy($originalImage);
            imagedestroy($resizedImage);
    
            $validatedData['profile_image'] = 'profile_images/' . $compressedImageName;
        }

        $user->fill($validatedData);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

        public function updateMissing(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'course' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'section1' => 'required|string|max:255',
            'time_preference' => 'required|string|max:255',
            'student_id' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email', 'course', 'section', 'section1', 'time_preference', 'student_id'));

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }

}
