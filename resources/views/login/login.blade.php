<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen w-screen bg-[#edf2f7]">
    <div class="flex h-full w-full">
        <div class="hidden lg:block lg:w-2/3 bg-cover" style="background-image: url('{{ asset('images/bg1.jpg') }}');">
            <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                <div>
                    <h2 class="text-4xl font-bold text-white">Desa Sijago-jago</h2>
                    <p class="max-w-xl mt-3 text-gray-300">
                        Masuk sebagai admin untuk dapat melakukan perubahan tampilan website Desa Sijago-jago
                    </p>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center w-full lg:w-1/3 bg-white px-6">
            <div class="w-full max-w-md">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-gray-700">Admin</h2>
                    <p class="mt-3 text-gray-500">Sign in untuk masuk sebagai Admin</p>
                </div>

                <div class="mt-8">
                    @if ($errors->has('loginError'))
                        <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ $errors->first('loginError') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm text-gray-600">Username</label>
                            <input type="name" name="name" id="name" placeholder="Input username" value="{{ old('name') }}"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border 
                                       border-gray-200 rounded-md focus:border-blue-400 
                                       focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="mt-6 relative">
                            <div class="flex justify-between mb-2">
                                <label for="password" class="text-sm text-gray-600">Password</label>
                            </div>

                            <input type="password" name="password" id="password" placeholder="Input Password"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border 
                                        border-gray-200 rounded-md focus:border-blue-400 
                                        focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />

                            <!-- Eye button -->
                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-3 flex items-center mt-7 text-gray-400">
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943
                     9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform 
                                       bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 
                                       focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Sign in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            // Ganti icon jadi "eye-off"
            eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 
                     0-8.268-2.943-9.542-7a9.964 9.964 0 
                     012.165-3.368M6.219 6.219A9.955 9.955 0 
                     0112 5c4.477 0 8.268 2.943 9.542 
                     7a9.965 9.965 0 01-4.043 5.197M15 
                     12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18"/>`;
        } else {
            passwordInput.type = "password";
            // Ganti icon balik ke "eye"
            eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 
                     2.943 9.542 7-1.274 4.057-5.065 
                     7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
        }
    }
</script>
