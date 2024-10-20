<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WYSIWYG Editor</title>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script><style type="text/css" id="operaUserStyle"></style>
  

    <x-head.tinymce-config />

</head>

<body>
    
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarul" aria-controls="navbarul" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarul">
                <ul class="navbar-nav ms-auto right font">
                    <li class="nav-item">
                        <a class="nav-link" href="/">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories">CATEGORIES</a>
                    </li>
                    <li class="nav-item">
                      <a  href="{{ url('/graf') }}" class="pdf-button nav-link">GRAF!</a>
                    </li>
                    <li class="nav-item">
                      <a  href="{{ route('generate.pdf') }}" class="pdf-button nav-link">Generate PDF</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('/editor') }}" class="editor-button nav-link">Open Editor</a>
                    </li>
                    @auth
                    <li class="mx-2 nav-item">
                      <button onclick="location.href='/dashboard'" class="btn btn-primary">Dashboard</button>
                    </li>

                    <li class="nav-item">
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                      </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>\
    </nav>

    <div style="margin-top: 100px; margin-inline: 8rem; color:white; min-height: 75vh;">
        @auth
        <div style="text-align: center;">
            <h1>WYSIWYG Editor: </h1>
            <x-forms.tinymce-editor />
        </div>

        <br><br><br>
        @endauth


        <div>
            @foreach ($editoros as $record)
            {!! $record->editoros !!}

            @auth
                <form action="{{ route('editoros.destroy', $record->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Opravdu chcete tento záznam smazat?');">Smazat</button>
                </form>

            @endauth
        @endforeach
        </div>
    </div>



        <footer>
    
            <div class="menu">
              <li><a href="#HOME">HOME</a></li>
              <li><a href="#CATEGORIES">CATEGORIES</a></li>
          </div>
          <div class="menu">
          <li><a href="/login">admin</a></li>
          </div> 
          </footer>
   
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');

        html {
            scroll-behavior: smooth;
            scroll-padding: 6rem;
            font-family: 'Montserrat', sans-serif;
            color-scheme: dark light;
            background-color: rgba(33, 37, 41, 1);
        }

        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            line-height: 1.5;
            background-color: rgba(33, 37, 41, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        .color {
            background-image: linear-gradient(46deg, #ff0000, #ffe000);
        }

        .white {
            color: white;
        }

        .navbar-nav .nav-item .nav-link {
            position: relative;
            padding-bottom: 10px;
            color: white;

        }

        @media (min-width: 992px) {
            .navbar-expand-lg .navbar-collapse {
                display: flex !important;
                flex-basis: auto;
                flex-direction: column;
                flex-wrap: wrap;
                align-content: center;
                justify-content: center;
                align-items: center;
            }
        }

        ul {
            list-style: none;
        }

        .img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 2px solid white;
            float: left;
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            background-size: cover;
            background-blend-mode: multiply;
            animation: morph 8s ease-in-out infinite;
            background-image: linear-gradient(46deg, #ff0000, #ffe000);
        }

        @keyframes morph {
            0% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }

            50% {
                border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;

            }

            100% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }
        }

        .wrapper {
            max-width: 50rem;
            margin-left: auto;
            margin-right: auto;
            padding-inline: 6rem;
        }

        .wrapper2 {
            display: flex;
            max-width: 80rem;
            flex-wrap: nowrap;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .wrapper2 li {
            list-style: none;
        }

        .wrapper2 li a {
            font-size: 1.2em;
            color: white;
            margin: 0 10px;
            list-style: none;
            text-decoration: none;
            opacity: 0.7;
            transition: 0.3s;
        }

        .wrapper2 li a:hover {
            opacity: 1;
        }

        .section-title {
            font-size: 5rem;
            color: white;
        }

        .site-title {
            font-size: 6rem;
            text-align: center;
        }

        .section-info {
            color: white;
            font-size: 20px;
        }

        section {
            padding-block: 5rem;

        }

        .diagonal {
            --skew-angle: -5deg;
            --background: linear-gradient(46deg, #ff0000, #ffe000);

            position: relative;
            isolation: isolate;
        }

        .diagonal::after {
            content: '';
            background: var(--background);
            position: absolute;
            z-index: -1;
            inset: 0;
            transform: skewY(var(--skew-angle));
        }

        .container-fluid1 {
            display: flex;
            flex-direction: column;
            align-content: center;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        footer {
            position: relative;
            width: 100%;
            background-image: linear-gradient(46deg, #ff0000, #ffe000);
            min-height: 100px;
            padding: 20px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        footer .social-links,
        footer .menu {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
        }

        footer .social-links li,
        footer .menu li {
            list-style: none;
        }

        footer .social-links li a,
        footer .menu li a {
            font-size: 2em;
            color: white;
            margin: 0 10px;
            display: inline-block;
            transition: 0.2s ease-in;
        }

        footer .social-links li a:hover {
            transform: translateY(-5px);
        }

        footer .menu li a {
            font-size: 1.2em;
            color: white;
            margin: 0 10px;
            display: inline-block;
            text-decoration: none;
            opacity: 0.5;
        }

        footer .menu li a:hover {
            opacity: 1;
        }

        @media only screen and (max-width: 700px) {
            .container-fluid1 {
                display: flex;
                flex-direction: column;
                align-content: center;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                justify-self: center;
                align-self: center;
            }

            .section-title {
                font-size: 4rem;
            }
        }

        @media only screen and (max-width: 775px) {
            .site-title {
                font-size: 4rem;
            }

            .wrapper2 {
                display: flex;
                max-width: 50rem;
                flex-wrap: wrap;
                flex-direction: column;
                align-items: center;
                margin: 5px;
            }

            .zkrek {
                padding-top: 25px;
            }
        }

        .css-selector {
            background: linear-gradient(46deg, #ff0000, #ffe000);
            ;
            background-size: 800% 800%;

            -webkit-animation: animace 15s ease infinite;
            -moz-animation: animace 15s ease infinite;
            -o-animation: animace 15s ease infinite;
            animation: animace 15s ease infinite;
        }

        @-webkit-keyframes animace {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        @-moz-keyframes animace {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        @-o-keyframes animace {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        @keyframes animace {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }
    </style>
    <script>
        AOS.init();
    </script>
</body>

</html>
