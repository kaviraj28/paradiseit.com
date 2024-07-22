<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\News;
use App\Models\Page;
use App\Models\Popup;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Member;
use App\Models\Review;
use App\Models\Careers;
use App\Models\Counter;
use App\Models\Partner;
use App\Models\Pricing;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Sliders;
use App\Models\Progress;
use App\Models\Services;
use App\Models\ClientTab;
use App\Models\Blogcategory;
use App\Models\ProjectCategory;
use App\Models\ClientRegistration;

class FrontendController extends Controller
{
    public function home()
    {
        //Sliders
        $sliders = Sliders::oldest('order')->first();
        $partners = Partner::where('status', 1)->oldest('order')->get();
        $counters = Counter::oldest('order')->get();
        $blogs = News::where('status', 1)->latest()->limit(3)->get();
        $teams = Member::where('status', 1)->oldest('order')->limit(8)->get();
        $progress = Progress::where('status', 1)->oldest('order')->get();
        $whowe = Page::whereId(13)->where('status', 1)->first();
        $popups = Popup::where('status', 1)->oldest('order')->get();

        return view('frontend.home.index', compact(['sliders', 'partners', 'blogs', 'teams', 'counters',  'whowe', 'progress', 'popups']));
    }

    public function pagesingle($slug)
    {
        $content = Page::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            if ($content->template == 1) {

                return view('frontend.page.side', compact('content'));
            } elseif ($content->template == 2) {

                $reviews = Review::oldest('order')->limit(4)->get();
                $teams = Member::oldest('order')->limit(6)->get();
                $counters = Counter::oldest('order')->get();
                $projects = Project::where('status', 1)->limit(4)->get();
                $faqs = Faq::where('status', 1)->oldest('order')->limit(3)->get();
                $progress = Progress::where('status', 1)->oldest('order')->get();
                $partners = Partner::where('status', 1)->oldest('order')->get();
                $whowe = Page::whereId(13)->where('status', 1)->first();
                return view('frontend.page.about', compact(['content', 'teams', 'reviews', 'counters', 'projects', 'faqs', 'progress', 'partners', 'whowe']));
            } elseif ($content->template == 3) {

                $branchs = Branch::whereStatus(1)->oldest('order')->get();
                return view('frontend.page.contact', compact(['content', 'branchs']));
            } elseif ($content->template == 4) {

                $teams = Member::oldest('order')->get();
                return view('frontend.page.team', compact(['content', 'teams']));
            } elseif ($content->template == 5) {

                $reviews = Review::oldest('order')->get();
                return view('frontend.page.review', compact(['content', 'reviews']));
            } elseif ($content->template == 6) {

                $faqs = Faq::oldest('order')->get();
                return view('frontend.page.faq', compact(['content', 'faqs']));
            } elseif ($content->template == 7) {

                $partners = ClientTab::where('status', 1)->oldest('order')->get();
                return view('frontend.page.partner', compact(['content', 'partners']));
            } elseif ($content->template == 8) {

                $blogs = News::latest()->get();
                $categorys = Blogcategory::where('status', 1)->where('parent_id', 0)->limit(5)->get();
                return view('frontend.page.blog', compact('content', 'blogs', 'categorys'));
            } elseif ($content->template == 9) {

                $services = Services::where('status', 1)->oldest('order')->get();
                return view('frontend.page.service', compact(['content', 'services']));
            } elseif ($content->template == 10) {

                return view('frontend.page.gallery', compact(['content']));
            } elseif ($content->template == 11) {

                $categorys = BlogCategory::where('status', 1)->where('parent_id', 0)->oldest('order')->paginate(12);
                return view('frontend.page.blogcategory', compact(['content', 'categorys']));
            } elseif ($content->template == 12) {

                $category = ProjectCategory::with(['projects' => function ($q) {
                    $q->whereStatus(1);
                }])->where('status', 1)->oldest('order')->get();

                return view('frontend.page.project', compact(['content', 'category']));
            } elseif ($content->template == 13) {

                return view('frontend.page.code', compact(['content']));
            } elseif ($content->template == 15) {
                $careers = Careers::whereStatus(1)->latest()->get();
                return view('frontend.page.career', compact(['content', 'careers']));
            } elseif ($content->template == 16) {
                return view('frontend.page.client', compact(['content']));
            } elseif ($content->template == 17) {
                $courses = Course::whereStatus(1)->oldest('order')->get();

                return view('frontend.page.course', compact(['content', 'courses']));
            } elseif ($content->template == 14) {

                $all_blogs = News::get();
                $all_pages = Page::where('status', 1)->get();
                $all_blog_cats = BlogCategory::where('status', 1)->get();
                $all_servs = Services::where('status', 1)->get();
                $all_projects = Project::where('status', 1)->get();

                return response()->view('frontend.page.sitemap', compact(['all_blogs', 'all_pages', 'all_blog_cats', 'all_servs', 'all_projects']))->header('Content-Type', 'text/xml');
            } else {

                $blogs = News::where('status', 1)->limit(5)->get();
                $categorys = Blogcategory::where('status', 1)->limit(5)->get();

                return view(
                    'frontend.page.default',
                    compact(['content', 'blogs', 'categorys'])
                );
            }
        } else {
            return view('errors.404');
        }
    }

    public function blogsingle($slug)
    {
        $content = News::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            if ($content->post_view == null) {
                $content->post_view = 1;
                $content->save();
            } else {
                $content->increment('post_view', 1);
            }
            $blogs = News::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
            $categorys = Blogcategory::where('status', 1)->limit(6)->get();
            return view('frontend.blog.show', compact(['content', 'blogs', 'categorys']));
        } else {
            return view('errors.404');
        }
    }

    public function thankyou()
    {
        return view('frontend.client.thankyou');
    }

    public function clientregistrationsingle($id)
    {
        $content = ClientRegistration::where('slug', $id)->first();
        if ($content) {
            if ($content->status == 0) {
                return view('frontend.client.show', compact(['content']));
            } else {
                return redirect()->route('thankyou')->with(['content' => $content]);
            }
        } else {
            return view('errors.404');
        }
    }

    public function projectcategory($slug)
    {
        $content = ProjectCategory::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $projects = Project::whereCategory($content->id)->where('status', 1)->oldest('order')->get();
            return view('frontend.projectcategory.show', compact(['content', 'projects']));
        } else {
            return view('errors.404');
        }
    }

    public function servicesingle($slug)
    {
        $content = Services::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $services = Services::where('status', 1)->where('id', '!=', $content->id)->limit(6)->get();
            $pricing = Pricing::where('status', 1)->where('services', $content->id)->limit(3)->get();
            return view('frontend.service.show', compact(['content', 'services', 'pricing']));
        } else {
            return view('errors.404');
        }
    }

    public function coursesingle($slug)
    {
        $content = Course::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $courses = Course::where('status', 1)->where('id', '!=', $content->id)->limit(6)->get();
            return view('frontend.course.show', compact(['content', 'courses']));
        } else {
            return view('errors.404');
        }
    }
    public function projectsingle($slug)
    {
        $content = Project::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $projects = Project::where('status', 1)->where('id', '!=', $content->id)->limit(6)->get();
            return view('frontend.project.show', compact(['content', 'projects']));
        } else {
            return view('errors.404');
        }
    }
    public function careersingle($slug)
    {
        $content = Careers::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $careers = Careers::where('status', 1)->where('id', '!=', $content->id)->limit(6)->get();
            if ($content->deadline) {
                $diff = now()->diffInDays($content->deadline);
                switch ($diff) {
                    case $diff < 8:
                        $deadline = $diff . ' Days';
                        break;

                    case $diff > 7 && $diff < 15:
                        $deadline = '2 Weeks';
                        break;

                    case $diff > 14 && $diff < 22:
                        $deadline = '3 Weeks';
                        break;

                    case $diff > 21 && $diff < 29:
                        $deadline = '4 Weeks';
                        break;

                    case $diff > 29 && $diff < 36:
                        $deadline = '5 Weeks';
                        break;

                    case $diff > 35 && $diff < 43:
                        $deadline = '6 Weeks';
                        break;

                    case $diff > 42 && $diff < 50:
                        $deadline = '7 Weeks';
                        break;

                    default:
                        $deadline = '8+ Weeks';
                }
            } else {
                $deadline = '';
            }
            $blogs = News::where('status', 1)->limit(5)->get();
            return view('frontend.careers.show', compact(['content', 'careers', 'deadline', 'blogs']));
        } else {
            return view('errors.404');
        }
    }

    public function categorysingle($slug)
    {
        $content = Blogcategory::where('slug', $slug)->first();
        if ($content) {
            $subcategories = BlogCategory::where('parent_id', $content->id)->oldest('order')->get();
            $blogs = News::whereHas('blogcategory', function ($q) use ($slug) {
                $q->where('slug', '=', $slug);
            })->get();
            return view('frontend.blogcategory.show', compact('content', 'subcategories', 'blogs'));
        } else {
            return view('errors.404');
        }
    }
}
