<x-skeleton judul="Register">
    <div class="bg-linear-to-r from-green-300 to-green-50 flex items-center justify-center min-h-screen p-4 kedebideri-medium">
        <div class="bg-white shadow-lg rounded-2xl flex w-full max-w-4xl overflow-hidden">

            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-2xl font-bold mb-6">Register</h2>

                <form class="space-y-4" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <label class="block mb-1 font-medium">Nama</label>
                        <input type="text" name="name" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nama anda">
                        @error('name')
                        <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Email</label>
                        <input type="email" name="email" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" placeholder="Masukkan email anda">
                        @error('email')
                        <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Password</label>
                        <div class="relative w-full">
                            <input type="password" name="password"
                                  class="pass w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500"
                                  placeholder="Masukkkan password anda">
                            <button type="button"
                                    onclick="togglePassword(this)"
                                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 cursor-pointer">

                                <!-- Eye Off (default) -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 eye-off" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13.875 18.825A10.05 10.05 0 0112 19.5C7 19.5 2.73 16.08 1 12c.46-1.12 1.11-2.17 1.93-3.12M9.88 9.88a3 3 0 104.24 4.24M15 12a3 3 0 00-3-3" />
                                </svg>

                                <!-- Eye On -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 eye-on hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                        <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Password Konfirmasi</label>
                        <div class="relative w-full">
                            <input type="password" name="password_confirmation" id="pas"
                                  class="pas w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500"
                                  placeholder="Masukkkan password anda">
                        </div>
                        @error('password_confirmation')
                        <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <p class="text-gray-400">Sudah punya akun? <a href="{{ url('/login') }}" class="text-blue-300 hover:text-blue-600">login sekarang</a></p>

                    <button type="submit"
                            class="w-full bg-blue-500 text-white py-2 my-2 rounded-lg hover:bg-blue-700 transition cursor-pointer">
                        Register
                    </button>
                </form>
            </div>

            <div class="hidden md:block w-1/2">
                <img src="https://cdn.pixabay.com/photo/2020/05/17/11/57/street-5181293_1280.jpg"
                     alt="Example"
                     class="w-full h-full object-cover">
            </div>

        </div>
    </div>
</x-skeleton>
