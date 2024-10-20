<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Flags</title>
    <link rel="stylesheet" href="node_modules/flag-icons/css/flag-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icons/6.6.6/css/flag-icons.min.css">

    <!-- Bootstrap CSS and other styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .flag-container {
            display: flex;
            flex-wrap: wrap;
        }
        .flag-item {
            margin: 10px;
            text-align: center;
        }
        .flag-icon {
            font-size: 32px;
            display: block;
        }
        .flag-label {
            margin-top: 5px;
            font-size: 14px;
        }
        /* Additional navbar styling */
        .navbar-nav .nav-item .nav-link {
            position: relative;
            padding-bottom: 10px;
            color: white;
        }
        .white {
            color: white;
        }
    </style>
</head>

<body>

    <!-- Navbar from the other page -->
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
                        <a href="{{ url('/graf') }}" class="pdf-button nav-link">GRAF!</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('generate.pdf') }}" class="pdf-button nav-link">Generate PDF</a>
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
        </div>
    </nav>

    <!-- Country flags -->
    <section style="margin-top: 4rem;">
        <h1>Country Flags</h1>
        <div class="flag-container">
            <!-- Vlajky zde budou zobrazeny -->
        </div>
    </section>

    <script>
        // Seznam dvoupísmenných ISO kódů zemí
        const countries = [
            'af', 'ax', 'al', 'dz', 'as', 'ad', 'ao', 'ai', 'aq', 'ag', 'ar', 'am', 'aw', 'au', 'at', 'az', 'bs', 'bh', 'bd', 'bb',
            'by', 'be', 'bz', 'bj', 'bm', 'bt', 'bo', 'bq', 'ba', 'bw', 'bv', 'br', 'io', 'bn', 'bg', 'bf', 'bi', 'cv', 'kh', 'cm',
            'ca', 'ky', 'cf', 'td', 'cl', 'cn', 'cx', 'cc', 'co', 'km', 'ck', 'cr', 'hr', 'cu', 'cw', 'cy', 'cz', 'ci', 'cd', 'dk',
            'dj', 'dm', 'do', 'ec', 'eg', 'sv', 'gq', 'er', 'ee', 'sz', 'et', 'fk', 'fo', 'fm', 'fj', 'fi', 'fr', 'gf', 'pf', 'tf',
            'ga', 'gm', 'ge', 'de', 'gh', 'gi', 'gr', 'gl', 'gd', 'gp', 'gu', 'gt', 'gg', 'gn', 'gw', 'gy', 'ht', 'hm', 'va', 'hn',
            'hk', 'hu', 'is', 'in', 'id', 'ir', 'iq', 'ie', 'im', 'il', 'it', 'jm', 'jp', 'je', 'jo', 'kz', 'ke', 'ki', 'kw', 'kg',
            'la', 'lv', 'lb', 'ls', 'lr', 'ly', 'li', 'lt', 'lu', 'mo', 'mg', 'mw', 'my', 'mv', 'ml', 'mt', 'mh', 'mq', 'mr', 'mu',
            'yt', 'mx', 'md', 'mc', 'mn', 'me', 'ms', 'ma', 'mz', 'mm', 'na', 'nr', 'np', 'nl', 'nc', 'nz', 'ni', 'ne', 'ng', 'nu',
            'nf', 'kp', 'mk', 'mp', 'no', 'om', 'pk', 'pw', 'pa', 'pg', 'py', 'pe', 'ph', 'pn', 'pl', 'pt', 'pr', 'qa', 'cg', 'ro',
            'ru', 'rw', 're', 'bl', 'sh', 'kn', 'lc', 'mf', 'pm', 'vc', 'ws', 'sm', 'st', 'sa', 'sn', 'rs', 'sc', 'sl', 'sg', 'sx',
            'sk', 'si', 'sb', 'so', 'za', 'gs', 'kr', 'ss', 'es', 'lk', 'ps', 'sd', 'sr', 'sj', 'se', 'ch', 'sy', 'tw', 'tj', 'tz',
            'th', 'tl', 'tg', 'tk', 'to', 'tt', 'tn', 'tm', 'tc', 'tv', 'tr', 'ug', 'ua', 'ae', 'gb', 'um', 'us', 'uy', 'uz', 'vu',
            've', 'vn', 'vg', 'vi', 'wf', 'eh', 'ye', 'zm', 'zw'
        ];

        const container = document.querySelector('.flag-container');

        // Vytvoření vlajek a jejich popisků
        countries.forEach(code => {
            const flagItem = document.createElement('div');
            flagItem.classList.add('flag-item');
            
            const flagIcon = document.createElement('span');
            flagIcon.classList.add('flag-icon', 'fi', `fi-${code}`);
            
            const flagLabel = document.createElement('div');
            flagLabel.classList.add('flag-label');
            flagLabel.textContent = code.toUpperCase();
            
            flagItem.appendChild(flagIcon);
            flagItem.appendChild(flagLabel);
            container.appendChild(flagItem);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
