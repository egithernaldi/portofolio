<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Portofolio;
use App\Models\SectionProfile;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Titleexperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectionprofiles = SectionProfile::all();
        $socials = Social::all();
        $skills = Skill::all();
        $experiences = Experience::all();
        $titleexperiences = Titleexperience::all();
        $portofolios = Portofolio::all();
        return view('admin.edit-section', [
            'sectionprofiles' => $sectionprofiles,
            'socials' => $socials,
            'skills' => $skills,
            'experiences' => $experiences,
            'titleexperience' => $titleexperiences,
            'portofolio' => $portofolios,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function createskills()
    {
        return view('admin.campur.createskills');
    }

    public function createexperience()
    {
        $titleexperiences =  Titleexperience::all();
        return view('admin.campur.createexperience', [
            'titleexperience' => $titleexperiences,
        ]);
    }

    public function createportofolio()
    {
        return view('admin.campur.createportofolio');
    }

    public function storeskills(Request $request)
    {
        // Validate the form data (you can customize the validation rules)
        $validatedData = $request->validate([
            'skill' => 'required|string|max:255',
            'proficient' => 'required|string|max:255',
        ]);

        // Create a new skill using the validated data
        Skill::create($validatedData);

        // Redirect back to the skills page with a success message
        return redirect()->route('admin.campur.skills')->with('success', 'Skill created successfully!');
    }

    public function storeexperience(Request $request)
    {
        $request->validate([
            'position' => 'required',
            'from' => 'required',
            'to' => 'required',
            'place' => 'required',
            'about' => 'required',
            'description' => 'required',
            'id_experience' => 'required',
        ]);

        $experience = new Experience();
        $experience->position = $request->input('position');
        $experience->from = $request->input('from');
        $experience->to = $request->input('to');
        $experience->place = $request->input('place');
        $experience->about = $request->input('about');
        $experience->description = $request->input('description');
        $experience->id_experience = $request->input('id_experience');

        $experience->save();

        return redirect()->route('admin.campur.experience')->with('success', 'experience entry created successfully!');
    }

    public function storeportofolio(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required',
            'detail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'required|url',
        ]);

        $portofolio = new Portofolio();
        $portofolio->title = $request->input('title');
        $portofolio->description = $request->input('description');
        $portofolio->category = $request->input('category');
        $portofolio->url = $request->input('url');


        // Handle image file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/portofolio');
            $portofolio->image = basename($imagePath);
        }

        // Handle detail image file upload
        if ($request->hasFile('detail')) {
            $detailImage = $request->file('detail');
            $detailImagePath = $detailImage->store('public/portofolio');
            $portofolio->detail = basename($detailImagePath);
        }

        $portofolio->save();

        return redirect()->route('admin.campur.portofolio')->with('success', 'Portofolio entry created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function aboutme()
    {
        $sectionprofiles = SectionProfile::all();
        return view('admin.campur.aboutme', [
            'sectionprofiles' => $sectionprofiles
        ]);
    }

    public function skills()
    {
        $skill = Skill::all();
        return view('admin.campur.skills', [
            'skills' => $skill,
        ]);
    }

    public function experience()
    {
        $experiences = Experience::all();
        return view('admin.campur.experience', [
            'experience' => $experiences,
        ]);
    }

    public function portofolio()
    {
        $portofolio = Portofolio::all();
        return view('admin.campur.portofolio', [
            'portofolio' => $portofolio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the section profile or social media link by its ID

        $socials = Social::find($id);

        // if (!$sectionprofiles) {
        //     // If the sectionprofiles$sectionprofiles is not found, handle the error accordingly (e.g., redirect back with a message)
        // }

        // Get all the data from the form submission
        $data = $request->all();

        // // Validate the data from the form (you can customize the validation rules)
        // $validatedData = $data->validated();

        // Update the sectionprofiles$sectionprofiles profile or social media link with the validated data
        $socials->update($data);

        // Redirect back to the edit page with a success message (you can customize this)
        return redirect()->route('admin.campur.index')->with('success', 'Section updated successfully!');
    }

    public function updateaboutme(Request $request, string $id)
    {
        // Find the section profile or social media link by its ID
        $sectionprofiles = SectionProfile::find($id);

        // if (!$sectionprofiles) {
        //     // If the sectionprofiles$sectionprofiles is not found, handle the error accordingly (e.g., redirect back with a message)
        // }

        // Get all the data from the form submission
        $data = $request->all();

        //image validation
        if (!empty($data['image'])) {
            // Check if the old image exists and delete it
            if (Storage::disk('public')->exists($sectionprofiles->image)) {
                Storage::disk('public')->delete($sectionprofiles->image);
            }
            // Store the new image
            $data['image'] = $request->file('image')->store('assets', 'public');
        } else {
            unset($data['image']);
        }
        // // Validate the data from the form (you can customize the validation rules)
        // $validatedData = $data->validated();

        // Update the sectionprofiles$sectionprofiles profile or social media link with the validated data
        $sectionprofiles->update($data);

        // Redirect back to the edit page with a success message (you can customize this)
        return redirect()->route('admin.campur.aboutme')->with('success', 'Section updated successfully!');
    }

    public function updateportofolio(Request $request, string $id)
    {
        // Find the section profile or social media link by its ID
        $portofolio = Portofolio::find($id);

        // if (!$portofolio) {
        //     // If the por$portofolio$portofolio is not found, handle the error accordingly (e.g., redirect back with a message)
        // }

        // Get all the data from the form submission
        $data = $request->all();

        //image validation
        if (!empty($data['image'])) {
            // Check if the old image exists and delete it
            if (Storage::disk('public')->exists($portofolio->image)) {
                Storage::disk('public')->delete($portofolio->image);
            }
            // Store the new image
            $imageName = basename($request->file('image')->store('portofolio', 'public'));
            $data['image'] = $imageName;
            
            
        } else {
            unset($data['image']);
        }

        //file validation
        if (!empty($data['detail'])) {
            // Check if the old image exists and delete it
            if (Storage::disk('public')->exists($portofolio->detail)) {
                Storage::disk('public')->delete($portofolio->detail);
            }
            // Store the new image
            $detailName = basename($request->file('detail')->store('portofolio', 'public'));
            $data['detail'] = $detailName;
        } else {
            unset($data['detail']);
        }
        // // Validate the data from the form (you can customize the validation rules)
        // $validatedData = $data->validated();

        // Update the por$portofolio$portofolio profile or social media link with the validated data
        $portofolio->update($data);

        // Redirect back to the edit page with a success message (you can customize this)
        return redirect()->route('admin.campur.portofolio')->with('success', 'Section updated successfully!');
    }

    public function editportofolio($id)
    {
        $portofolio = Portofolio::find($id);
        return view('admin.campur.editportofolio', [
            'portofolios' => $portofolio,
        ]);
    }

    public function updateskills(Request $request, $id)
    {
        $skill = Skill::find($id);
        $data = $request->all();
        
        $skill->update($data);

        // Redirect back to the edit page with a success message (you can customize this)
        return redirect()->route('admin.campur.skills')->with('success', 'Section updated successfully!');
    }
    public function editskills($id)
    {
        $skills = Skill::find($id);
        return view('admin.campur.editskill', [
            'skills' => $skills,
        ]);
    }

    public function updateexperience(Request $request, $id)
    {
        $experience = Experience::find($id);
        $data = $request->all();
        
        $experience->update($data);

        // Redirect back to the edit page with a success message (you can customize this)
        return redirect()->route('admin.campur.skills')->with('success', 'Section updated successfully!');
    }
    public function editexperience($id)
    {
        $experiences = Experience::find($id);
        $titleexperiences = Titleexperience::all();
        return view('admin.campur.editexperience', [
            'experiences' => $experiences,
            'titleexperience' => $titleexperiences,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroyskills($id)
    {
        // Find the skill by its ID
        $skill = Skill::findOrFail($id);

        // Delete the skill
        $skill->delete();

        // Redirect back to the skills page with a success message
        return redirect()->route('admin.campur.skills')->with('successdelete', 'Skill deleted successfully!');
    }

    public function destroyexperience($id)
    {
        // Find the skill by its ID
        $experiences = Experience::findOrFail($id);

        // Delete the skill
        $experiences->delete();

        // Redirect back to the skills page with a success message
        return redirect()->route('admin.campur.experience')->with('successdelete', 'Skill deleted successfully!');
    }

    public function destroyportofolio($id)
    {
        $portofolio = Portofolio::findOrFail($id);

        // Delete the associated image and detail image files from storage
        Storage::delete([
            'public/portofolio/' . $portofolio->image,
            'public/portofolio/' . $portofolio->detail,
        ]);

        $portofolio->delete();

        return redirect()->route('admin.campur.portofolio')->with('successdelete', 'Portofolio entry deleted successfully!');
    }

    public function sendemail(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $messageContent = $request->input('message');

        // Get the email address from SectionProfile model based on your logic
        $sectionprofiles = SectionProfile::find($id); // Replace '1' with the appropriate ID

        if (!$sectionprofiles) {
            // Handle the case where SectionProfile with the given ID is not found
            return redirect()->back()->with('error', 'Email address not found.');
        }



        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Your message has been sent. Thank you!');
    }
}
