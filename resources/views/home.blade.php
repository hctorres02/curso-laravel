<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', config('app.locale')) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Home page</title>
    </head>

    <body>
        <header class="container container-narrow top-spaced">
            <hgroup>
                <h1>A blog CMS</h1>
                <p>Powered by Laravel</p>
            </hgroup>
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    @if ($categories)
                        <li x-data="{ open: false }">
                            <a href="#" @click="open=true">Categories</a>
                            <template x-teleport="body">
                                <dialog open x-show="open">
                                    <article @click.outside="open=false">
                                        <header>
                                            <h3>Categories</h3>
                                            <button rel="prev" @click="open=false"></button>
                                        </header>
                                        <nav>
                                            <aside>
                                                <ul>
                                                </ul>
                                            </aside>
                                        </nav>
                                    </article>
                                </dialog>
                            </template>
                        </li>
                    @endif
                </ul>
            </nav>
        </header>
        <main class="container container-narrow">
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
        <footer class="container container-narrow">
            <p>
                <small>
                    Styled with <a href="https://picocss.com" target="_blank">Pico CSS</a>.
                </small>
            </p>
        </footer>
    </body>

</html>