<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La b@se Portfolio</title>
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
                <img src="{{ asset('image/moi.png') }}" alt="moi" id="moi">
            </div>
        </section>

        <section class="tools-wrapper" id="about">
            <div class="tools" id="tools-container">
                <!-- Les technologies seront chargées ici -->
            </div>
        </section>

        <section class="block2" >
            <div class="left-block2">
                <ul class="services">
                    <li><img src="{{asset('image/la-toile.png')}}" alt=""> Website Development</li>
                    <li><img src="{{asset('image/developpement-mobile.png')}}" alt=""> App Development</li>
                    <li><img src="{{asset('image/conception-ux.png')}}" alt=""> Automation Solution</li>
                </ul>
            </div>
            <div class="right-block2">
                <h1 style=" color: #ff5c46;" >About me</h1>
                <p >I'm a passionate software developer with a strong focus on building efficient, user-friendly, and scalable solutions. I enjoy turning ideas into reality through clean code and creative problem-solving. My expertise covers [your main skills: e.g., Python, Django, JavaScript, APIs], and I'm always eager to learn new technologies and take on exciting challenges.</p>

                <div class="statistique">
                    <div class="stat-items" >
                        <h1>120<span style="color: #ff5c46;">+</span></h1>
                        <span style="color: #ffffff; ">Completed Projects</span>
                    </div>
                    <div class="stat-items" style="margin-left: 30px;">
                        <h1>95<span style="color: #ff5c46;">%</span></h1>
                        <span style="color: #ffffff;">Client Satisfaction</span>
                    </div>
                    <div  class="stat-items" style="margin-left: 30px;">
                        <h1>10<span style="color: #ff5c46;">+</span></h1>
                        <span style="color: #ffffff;" >Years of experience</span>
                    </div>
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
                
                <div class="contact-right-side">
                    <form class="contact-form">
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