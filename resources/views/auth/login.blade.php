<!doctype html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full">

<div class="bg-cover bg-center bg-fixed" style="background-image: url('https://picsum.photos/1920/1080')">
    <div class="h-screen flex justify-center items-center">
        <div class="bg-white mx-4 p-8 rounded shadow-md w-full md:w-1/2 lg:w-1/3">
            <h1 class="text-3xl font-bold mb-8 text-center">Login</h1>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-4">
                    <x-forms.label>Email Address</x-forms.label>
                    <x-forms.input placeholder="john@example.com" type="email" name="email"/>
                   <x-forms.error name="email"></x-forms.error>
                </div>
                <div class="mb-4">
                    <x-forms.label>Password</x-forms.label>
                    <input
                    <x-forms.input type="password" name="password"/>
                    <a class="text-gray-600 hover:text-gray-800" href="#">Forgot your password?</a>
                </div>
                <div class="mb-6">
                    <x-forms.button type="submit">Login</x-forms.button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>
