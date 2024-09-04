<!doctype html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin|Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full">

<div class="bg-cover bg-center bg-fixed" style="background-image: url('https://picsum.photos/1920/1080')">
    <div class="h-screen flex justify-center items-center">
        <div class="bg-white mx-4 p-8 rounded shadow-md w-full md:w-1/2 lg:w-1/3">
            <h1 class="text-3xl font-bold mb-8 text-center">Register</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="mb-4">
                    <x-forms.label>First Name</x-forms.label>
                    <x-forms.input placeholder="John" name="first_name" required />
                </div>
                <div class="mb-4">
                    <x-forms.label>Last Name</x-forms.label>
                    <x-forms.input placeholder="Doe" name="last_name" required />
                </div>
                <div class="mb-4">
                    <x-forms.label>Email</x-forms.label>
                    <x-forms.input placeholder="johndoe@example.com" name="email" type="email" required />
                </div>
                <div class="mb-4">
                    <x-forms.label>Password</x-forms.label>
                    <x-forms.input name="password" type="password" required />
                </div>
                <div class="mb-4">
                    <x-forms.label>Role</x-forms.label>
                    <x-forms.select name="role" type="text" required >
                        <option value="administrator">Administrator</option>
                        <option value="salesman">Salesman</option>
                    </x-forms.select>
                </div>
                <div class="mb-6">
                    <x-forms.button type="submit">Register</x-forms.button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>
