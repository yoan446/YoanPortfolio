<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La b@se Portfolio</title>
    @vite('resources/css/app.css')
    <!-- Lien vers le fichier CSS -->
    <link href="{{ asset('css/homepage1-style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>  
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Inclusion du header -->
    @include('partials.header')

    <div class="main-content" id="home">
        <section class="block1">
            <div class="left-side-c">
                <h1 id="hello">Hello<span id="point"></span></h1>
                <span id="my-name"><span id="ligne"></span>I'm Yoan Tioma</span>
                <h1 id="job-name">Junior Web Developer</h1>
                <div class="bouton">
                    <a href="#contacts"><button id="projectsl">Got a Project?</button></a>
                    <a href="{{ asset('document/CV Yoan Tioma.pdf') }}" id="cv"><button id="bcv">My resume</button></a>
                </div>
            </div>
            <div class="right-side-c">
                <!-- moon c'est le cercle qui est derière l'image id moi -->
                <div class="moon"></div>
                <img src="{{ asset('image/me.png') }}" alt="moi" id="moi">
            </div>
        </section>

        <section class="tools-wrapper" id="about">
            <div class="tools" id="tools-container">
                <!-- Les technologies seront chargées ici -->
            </div>
        </section>

        <!-- <section class="block2" >
            <div class="left-block2">
                <ul class="services">
                    <li><img src="{{asset('image/la-toile.png')}}" alt=""> Website Development</li>
                    <li><img src="{{asset('image/developpement-mobile.png')}}" alt=""> App Development</li>
                    <li><img src="{{asset('image/conception-ux.png')}}" alt=""> Automation Solution</li>
                </ul>
            </div>
            <div class="right-block2">
                <h1 style=" color: #ff5c46;" >About me</h1>
                <p >I am a passionate software developer dedicated to designing and building high-performance, 
                    secure, and scalable applications. My expertise spans backend development with Laravel, 
                    API design, role and permission management (Spatie), and frontend integration using 
                    modern frameworks such as Next.js and React. I have strong experience in containerization 
                    with Docker, deployment on cloud platforms like Render, and system performance monitoring 
                    using Prometheus, Grafana, Locust, and Node Exporter. I’m driven by a desire to create 
                    efficient and user-centered solutions, blending clean code, automation, and innovation.
                </p>

                <div class="statistique">
                    <div class="stat-items" >
                        <h1>5<span style="color: #ff5c46;">+</span></h1>
                        <span style="color: #ffffff; ">Completed Projects</span>
                    </div>
                    <div class="stat-items" style="margin-left: 30px;">
                        <h1>75<span style="color: #ff5c46;">%</span></h1>
                        <span style="color: #ffffff;">Client Satisfaction</span>
                    </div>
                    <div  class="stat-items" style="margin-left: 30px;">
                        <h1>3<span style="color: #ff5c46;">+</span></h1>
                        <span style="color: #ffffff;" >Years of experience</span>
                    </div>
                </div>
            </div>
        </section> -->
       <section class="text-gray-600 body-font" id="block2">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                    <img class="object-cover object-center rounded" alt="hero" src="{{ asset('image/you.jpg') }}" id="about-img">
                </div>
                <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900" id="about-titre">Who am i?
                    </h1>
                    <p class="mb-8 leading-relaxed" id="about-description">I am a passionate software developer dedicated to designing and building high-performance, 
                        secure, and scalable applications. My expertise spans backend development with Laravel, 
                        API design, role and permission management (Spatie), and frontend integration using 
                        modern frameworks such as Next.js and React. I have strong experience in containerization 
                        with Docker, deployment on cloud platforms like Render, and system performance monitoring 
                        using Prometheus, Grafana, Locust, and Node Exporter. I’m driven by a desire to create 
                        efficient and user-centered solutions, blending clean code, automation, and innovation.
                    </p>
                </div>
            </div>
        </section>

        <section class="block3" id="projects">
            <div class="project-header">
                <h1>Projects</h1>
                <h4>Here you will find some of the personal and clients projects that I created with each project containing its own case study</h4>
            </div>

            <div id="projects-container"></div>
        </section>

        <section class="block4" id="contacts">
            <div class="contact">
                <div class="contact-left-side">
                    <div class="contact-header">
                        <span class="contact-label">Contacts</span>
                        <h2>Have a project?<br>Let's talk!</h2>
                    </div>
                    <button class="btn-submit">Submit</button>
                </div>
                <!-- je suis le plus fort -->
                
                <div class="contact-right-side">
                    <form class="contact-form">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- Inclusion du footer -->
    @include('partials.footer')
    <script src="{{ asset('js/visitor-side.js') }}"></script>
</body>
</html>