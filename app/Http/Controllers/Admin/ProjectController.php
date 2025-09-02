<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;


use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'homepageprojectimage' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'homepageprojecttitle' => 'required|string|max:255',
            'homepageprojectheading' => 'required|string|max:255',
            'project_status' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'project_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'project_view_page_description' => 'required',
            'project_view_page_about_description' => 'required',
        ]);

        if ($request->hasFile('homepageprojectimage')) {
            $homepageprojectimage = 'homepageprojectimage_' . time() . '.' . $request->homepageprojectimage->extension();
            $request->homepageprojectimage->move(public_path('uploads/projects'), $homepageprojectimage);
            $data['homepageprojectimage'] = $homepageprojectimage;
        }

        if ($request->hasFile('project_image')) {
            $projectImageName = 'project_image_' . time() . '.' . $request->project_image->extension();
            $request->project_image->move(public_path('uploads/projects'), $projectImageName);
            $data['project_image'] = $projectImageName;
        }
        $data['slug'] = Str::slug($request->project_title, '-');
        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $data = Project::findOrFail($id);
        return view('admin.projects.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'homepageprojectimage' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'homepageprojecttitle' => 'required|string|max:255',
            'homepageprojectheading' => 'required|string|max:255',
            'project_status' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'project_view_page_description' => 'required',
            'project_view_page_about_description' => 'required',
        ]);

        $project = Project::findOrFail($id);

        if ($request->hasFile('homepageprojectimage')) {
            // Delete the old image if it exists
            if ($project->homepageprojectimage) {
                $oldImagePath = public_path('uploads/projects/' . $project->homepageprojectimage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $homepageprojectimage = 'homepageprojectimage_' . time() . '.' . $request->homepageprojectimage->extension();
            $request->homepageprojectimage->move(public_path('uploads/projects'), $homepageprojectimage);
            $data['homepageprojectimage'] = $homepageprojectimage;
        }

        if ($request->hasFile('project_image')) {
            // Delete the old image if it exists
            if ($project->project_image) {
                $oldImagePath = public_path('uploads/projects/' . $project->project_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $projectImageName = 'project_image_' . time() . '.' . $request->project_image->extension();
            $request->project_image->move(public_path('uploads/projects'), $projectImageName);
            $data['project_image'] = $projectImageName;
        }
        $data['slug'] = Str::slug($request->project_title, '-');
        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete the images if they exist
        if ($project->homepageprojectimage) {
            $oldImagePath = public_path('uploads/projects/' . $project->homepageprojectimage);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        if ($project->project_image) {
            $oldImagePath = public_path('uploads/projects/' . $project->project_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
