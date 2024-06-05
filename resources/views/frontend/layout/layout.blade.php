<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="antialiased">

    <div class="flex flex-col min-h-screen">
        <!-- Header start  -->
        @include("frontend.partials.header")

        <!-- Main Content -->
        <main class="flex-1 ">

            <section class="h-96 flex flex-col justify-center items-center">
                <h1 class="text-4xl ">Upload File</h1>
                <form action="{{ route('convert-to-apng') }}" method="POST" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <input require="true" class="w-full " name="img" type="file">

                    <select name="format" class="w-full d-block my-5 border py-2 rounded-lg">
                        <option value="png">PNG</option>
                        <option value="jpg">JPG</option>
                        <option value="gif">GIF</option>
                    </select>
                    <button type="submit" class="btn bg-blue-500 px-5 py-1 text-white text-xl uppercase rounded-lg mt-6">Convert</button>
                </form>


                @if (session('message'))
                <div class="alert alert-success bg-green-500 text-white py-1 px-5 rounded-lg mt-5 text-lg capitalize">
                    {{ session('message') }}
                </div>

                @endif

                @if(session('imageUrl'))
                <a class="text-white text-xl mt-5 bg-green-500 rounded-lg p-2" href="{{ session('imageUrl') }}" download>Download Image</a>
                @endif


            </section>

        </main>

        <!-- Footer start  -->
        @include("frontend.partials.footer")
    </div>


</body>

</html>
