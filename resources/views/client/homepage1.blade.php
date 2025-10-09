<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Accueil</title>
    <!-- Lien vers le fichier CSS -->
    <link href="{{ asset('css/homepage1-style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Inclusion du header -->
    @include('partials.header')

    <div class="main-content">
        <section class="block1">
            <div class="left-side-c">
                <h1 id="hello">Hello<span id="point"></span></h1>
                <span id="my-name"><span id="ligne"></span>I'm Yoan Tioma</span>
                <h1 id="job-name">Junior Web Developer</h1>
                <div class="bouton">
                    <a href="#"><button id="projectsl">Got a Project?</button></a>
                    <a href="#" id="cv"><button id="bcv">My resume</button></a>
                </div>
            </div>
            <div class="right-side-c">
                <img src="{{ asset('image/backright.png') }}" alt="background" class="bg-img">
                <img src="{{ asset('image/moi.png') }}" alt="moi" id="moi">
            </div>
        </section>
        <section class="tools-wrapper">
            <div class="tools">
                <span>HTML5</span>
                <span>CSS3</span>
                <span>JS</span>
                <span>PHP</span>
                <span>Docker</span>
                <span>Python</span>
                <span>Laravel</span>
                <span>Github</span>
                <span>Figma</span>
                <span>Canva</span>
            </div>
        </section>

        <section class="block2">
            <div class="left-block2">
                <ul class="services">
                    <li><img src="{{asset('image/la-toile.png')}}" alt=""> Website Development</li>
                    <li><img src="{{asset('image/developpement-mobile.png')}}" alt=""> App Development</li>
                    <li><img src="{{asset('image/conception-ux.png')}}" alt=""> Automation Solution</li>
                </ul>
            </div>
            <div class="right-block2">
                <h1>About me</h1>
                <p>I'm a passionate software developer with a strong focus on building efficient, user-friendly, and scalable solutions. I enjoy turning ideas into reality through clean code and creative problem-solving. My expertise covers [your main skills: e.g., Python, Django, JavaScript, APIs], and I'm always eager to learn new technologies and take on exciting challenges.</p>

                <div class="statistique" style="text-align: center;">
                    <div class="stat-items" >
                        <h1>120<span style="color:#ff5c46;">+</span></h1>
                        <span style="color:#ffffff; ">Completed Projects</span>
                    </div>
                    <div class="stat-items">
                        <h1>95<span style="color:#ff5c46;">%</span></h1>
                        <span style="color:#ffffff;">Client Satisfaction</span>
                    </div>
                    <div  class="stat-items">
                        <h1>10<span style="color:#ff5c46;">+</span></h1>
                        <span style="color:#ffffff;" >Years of experience</span>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Inclusion du footer -->
    @include('partials.footer')

</body>
</html>