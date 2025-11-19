<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', config('app.locale')) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@2/css/pico.min.css">
        <style>
            article>header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            article header:has(img) {
                padding: 0;
                overflow: hidden;
            }

            article hgroup a {
                text-decoration: none;
            }

            .container {
                max-width: 720px;
                padding-inline: calc(var(--pico-block-spacing-vertical) * 2);
            }

            .bottom-spaced {
                margin-bottom: calc(var(--pico-block-spacing-vertical) * 4);
            }

            .top-spaced {
                margin-top: calc(var(--pico-block-spacing-vertical) * 4);
            }
        </style>
        <title>Home page</title>
    </head>

    <body>
        <header class="container top-spaced">
            <hgroup>
                <h1>A blog CMS</h1>
                <p>Powered by Laravel</p>
            </hgroup>
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main class="container">
            <article>
                <header>
                    <img src="https://picsum.photos/720/405" width="720" height="405">
                </header>
                <hgroup>
                    <h2>
                        <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a>
                    </h2>
                    <p>
                        <a href="#">Lorem ipsum</a>,
                        Just now
                        &mdash; <a href="#">John Doe</a>
                    </p>
                </hgroup>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Qui accusantium quisquam cupiditate.
                    Quasi nobis adipisci iure commodi facere,
                    a asperiores aspernatur quis quos expedita!
                    Quas ullam aut quam accusamus molestiae?
                </p>
            </article>
        </main>
        <footer class="container">
            <p>
                <small>
                    Styled with <a href="https://picocss.com" target="_blank">Pico CSS</a>.
                </small>
            </p>
        </footer>
    </body>

</html>