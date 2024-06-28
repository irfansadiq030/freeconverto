<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FreeConverto - Effortless File and Image Conversion Online</title>
    <meta name="description" content="Welcome to FreeConverto! Easily convert your files and images from one format to another with our free, fast, and user-friendly online tool. Convert documents, images, audio, and video files seamlessly. No downloads or installations required. Discover the simplicity of FreeConverto today!">
    <meta name="keywords" content="file converter, image converter, online file conversion, free file converter, document converter, audio converter, video converter, convert files online, format conversion, free file conversion tool">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="antialiased">

    <div class="flex flex-col min-h-screen">
        <!-- Header start  -->
        @include("frontend.partials.header")

        <!-- Main Content -->
        <main class="flex-1 ">

            <section class=" my-5 flex flex-col justify-center items-center">
                <h1 class="text-3xl font-bold">Upload Unlimited Images to convert</h1>



            </section>

            <section class="bg-white p-7 shadow-lg w-1/2 mx-auto min-h-60 rounded-xl ">
                <form action="{{ route('convert-to-apng') }}" class="dropzone w-full rounded-2xl min-h-60 bg-slate-50 border-2 border-dashed border-gray-300 flex flex-col justify-center items-center" id="myGreatDropzone">
                    @csrf
                    <button class="bg-blue-500 block text-white font-medium text-lg py-4 px-12 rounded-md " id="custom-button">
                        Select Images
                    </button>


                </form>
            </section>
            <div class="dz-preview-container w-1/2 h-28 mx-auto mt-8 overflow-y-auto" id="dz-preview-container"></div>

            <!-- Feature Cards   -->
            @include("frontend.partials.feature-cards")

        </main>

        <!-- Footer start  -->
        @include("frontend.partials.footer")
    </div>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>
