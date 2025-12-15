<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PracticeArea;
use App\Models\Partner;
use App\Models\Experience;

class PageController extends Controller
{
    // About Page
    public function about()
    {
        $page = Page::where('slug', 'about')
            ->where('is_published', true)
            ->firstOrFail();

        return view('pages.about', compact('page'));
    }

    // Practice Areas
    public function practiceIndex()
    {
        $areas = PracticeArea::where('published', true)
            ->orderBy('order')
            ->get();

        return view('pages.practice-areas', compact('areas'));
    }

    public function practiceShow(string $slug)
    {
        $area = PracticeArea::where('slug', $slug)
            ->where('published', true)
            ->firstOrFail();

        return view('pages.practice-area-show', compact('area'));
    }

    // Partners
    public function partnersIndex()
    {
        $partners = Partner::where('published', true)
            ->orderBy('order')
            ->get();

        return view('pages.partners', compact('partners'));
    }

    public function partnerShow(string $slug)
    {
        $partner = Partner::where('slug', $slug)
            ->where('published', true)
            ->firstOrFail();

        return view('pages.partner-show', compact('partner'));
    }

    // Experiences
    public function experiencesIndex()
    {
        $experiences = Experience::where('published', true)
            ->latest()
            ->get();

        return view('pages.experiences', compact('experiences'));
    }

    public function experienceShow(int $id)
    {
        $experience = Experience::where('id', $id)
            ->where('published', true)
            ->firstOrFail();

        return view('pages.experience-show', compact('experience'));
    }
}
