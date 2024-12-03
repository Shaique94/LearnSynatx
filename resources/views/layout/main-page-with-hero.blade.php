@extends('layout.main-page')

@section('hero-section')
    <!-- Hero Section with Transparent Image in Background -->
    <div class="relative min-h-screen bg-gradient-to-r from-blue-900 via-gray-900 to-black flex items-center text-white py-16 px-8 md:px-16" style="background-image: url('{{ asset('image/landing_page_image.jpg') }}'); background-size: cover; background-position: right center; background-blend-mode: overlay; background-color: rgba(0, 0, 0, 0.8);">
    <!-- Left Section: Text and Button -->
        <div class="flex-1 z-10">
            <h1 class="text-5xl md:text-6xl font-extrabold text-blue-500 leading-tight mb-6">
                Empower Your Future with <br><span class="text-white">Learn Syntax</span>
            </h1>
            <p class="text-lg md:text-2xl text-gray-300 mb-8 leading-relaxed">
                Learn programming, data science, AI, and more from industry experts.<br> Build your skills and excel in the IT world.
            </p>
            <a href="{{ route('explore_courses') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-8 py-3 md:px-10 md:py-4 text-xl md:text-2xl font-semibold rounded-full shadow-lg hover:scale-105 transform transition-all duration-300">
                Explore Courses
            </a>
        </div>

        <!-- Right Section: Empty space for image background visibility -->
        <div class="hidden md:block flex-1 z-10"></div>
    </div>
@endsection


@section('what_we_offer')
    <!-- What We Offer Section -->
    <section class="py-16 bg-gray-800 text-white">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold text-blue-500 mb-8">What We Offer</h2>
            <div class="grid md:grid-cols-3 lg:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => 'fa-laptop-code', 'title' => 'Web Development', 'desc' => 'Build stunning websites with hands-on projects.'],
                    ['icon' => 'fa-database', 'title' => 'Data Science', 'desc' => 'Master data analysis, visualization, and machine learning.'],
                    ['icon' => 'fa-robot', 'title' => 'AI & Machine Learning', 'desc' => 'Explore cutting-edge AI technologies and applications.'],
                    ['icon' => 'fa-mobile-alt', 'title' => 'Mobile App Development', 'desc' => 'Create responsive and user-friendly mobile applications.'],
                    ['icon' => 'fa-network-wired', 'title' => 'Networking', 'desc' => 'Understand the backbone of the internet and its protocols.'],
                    ['icon' => 'fa-shield-alt', 'title' => 'Cybersecurity', 'desc' => 'Learn to protect systems from cyber threats.'],
                ] as $offer)
                <div class="p-6 bg-gray-900 rounded-lg shadow-lg hover:scale-105 transform transition duration-300">
                    <i class="fas {{ $offer['icon'] }} text-5xl text-blue-400 mb-4"></i>
                    <h3 class="text-2xl font-semibold mb-2">{{ $offer['title'] }}</h3>
                    <p class="text-gray-400">{{ $offer['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('who_we_are')
    <!-- Who We Are Section -->
    <!-- <section class="py-16 bg-gradient-to-r from-gray-900 to-blue-900 text-white">
        <div class="container mx-auto text-center max-w-4xl">
            <h2 class="text-4xl font-bold text-blue-500 mb-6">Who We Are</h2>
            <p class="text-lg text-gray-300 leading-relaxed mb-6">
                Est. 2011 - Top Web Designing Company <br>
                With more than 15 years of expertise in the field, we've established ourselves as an evolving Software Company. Over the years, we have diversified according to market needs. We optimize website rankings, boost campaign performance, enhance brand names, create quality content, and popularize brands on social media.
            </p>
            <h3 class="text-3xl font-bold text-blue-500 mb-4">Consider these steps for brand popularity in the Digital World:</h3>
            <ul class="text-lg text-gray-300 space-y-2">
                <li><strong>Define your goals</strong> - Set clear, measurable objectives for your brand.</li>
                <li><strong>Identify your target audience</strong> - Know who you're reaching out to.</li>
                <li><strong>Choose the right channels</strong> - Select platforms that align with your audience.</li>
                <li><strong>Create and implement your campaigns</strong> - Develop creative strategies to engage your audience.</li>
            </ul>
        </div>
    </section> -->
    <section class="py-24 relative bg-gradient-to-r from-gray-900 via-gray-800 to-black text-white">
    <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
        <div class="w-full justify-start items-center gap-12 grid lg:grid-cols-2 grid-cols-1">
            <!-- Left Section: Images -->
            <div class="w-full justify-center items-start gap-6 grid sm:grid-cols-2 grid-cols-1 lg:order-first order-last">
                <div class="pt-8 lg:pt-24 flex justify-end items-start gap-2.5">
                    <img 
                        class="rounded-xl object-cover shadow-lg" 
                        src="https://pagedone.io/asset/uploads/1717741205.png" 
                        alt="About Us image 1"
                    />
                </div>
                <div class="flex justify-start items-start gap-2.5">
                    <img 
                        class="sm:ml-0 ml-auto rounded-xl object-cover shadow-lg" 
                        src="https://pagedone.io/asset/uploads/1717741215.png" 
                        alt="About Us image 2"
                    />
                </div>
            </div>
            <!-- Right Section: Content -->
            <div class="w-full flex flex-col justify-center lg:items-start items-center gap-10">
                <div class="w-full flex flex-col justify-start items-center lg:items-start gap-6">
                    <h2 class="text-blue-500 text-4xl font-bold leading-normal lg:text-start text-center">
                        Empowering Each Other to Succeed
                    </h2>
                    <p class="text-gray-300 text-lg leading-relaxed lg:text-start text-center">
                        Every project we've undertaken has been a collaborative effort, where every person involved 
                        has left their mark. Together, we've not only constructed softwares but also built enduring 
                        connections that define our success story.
                    </p>
                </div>
                <div class="w-full flex flex-wrap lg:justify-start justify-center gap-10">
                    <div class="flex flex-col items-center lg:items-start">
                        <h3 class="text-blue-400 text-4xl font-bold">10+</h3>
                        <p class="text-gray-400 text-base">Years of Experience</p>
                    </div>
                    <div class="flex flex-col items-center lg:items-start">
                        <h3 class="text-blue-400 text-4xl font-bold">125+</h3>
                        <p class="text-gray-400 text-base">Successful Projects</p>
                    </div>
                    <div class="flex flex-col items-center lg:items-start">
                        <h3 class="text-blue-400 text-4xl font-bold">52+</h3>
                        <p class="text-gray-400 text-base">Happy Clients</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

                                            
@endsection

@section('footer')
    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- About Us -->
            <div>
                <h3 class="text-xl font-bold mb-4">About Us</h3>
                <p class="text-gray-400">
                    At LearnSyntax, we are committed to providing high-quality programming education that empowers students to excel in the IT industry. Our hands-on approach and real-world projects ensure that our students are job-ready.
                </p>
            </div>
            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                <ul>
                    <li><a href="#" class="text-gray-400 hover:text-blue-500">About</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-blue-500">Courses</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-blue-500">Contact Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-blue-500">Privacy & Policy</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-blue-500">Terms & Conditions</a></li>
                </ul>
            </div>
            <!-- Contact Us -->
            <div>
                <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                <p class="text-gray-400">Comestro TechLabs Pvt Ltd.</p>
                <p class="text-gray-400">Purnea, Bihar, India</p>
                <p class="text-gray-400">Email: <a href="mailto:info@comestro.com" class="text-blue-500 hover:underline">info@comestro.com</a></p>
                <p class="text-gray-400">Phone: <a href="tel:+919546805580" class="text-blue-500 hover:underline">+91-9546805580</a></p>
            </div>
        </div>
        <div class="text-center mt-8 text-gray-500">
            &copy; 2024 Comestro TechLabs Pvt Ltd. All Rights Reserved.
        </div>
    </footer>
@endsection
