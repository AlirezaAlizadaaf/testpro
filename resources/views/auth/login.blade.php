<x-layout>
    <x-slot:heading>
        <h1>Login Page</h1>
    </x-slot:heading>

    <div>

        <form method="post" action="/login">
            @csrf
            <div class="flex-row ">
                <div class="mb-5">
                    <x-form-label for="email">Email</x-form-label>
                    <x-form-input name="email" placeholder="JohnDoe@gmail.com" :value="old('email')"/>
                    <x-input-error :messages="$errors->get('email')" />
                </div>
                <div>
                    <x-form-label for="password">Password</x-form-label>
                    <x-form-input name="password" type="password"/>
                    <x-input-error :messages="$errors->get('password')" />
                </div>
            </div>

            <div class="mt-5">
                <x-button type="submit">Login</x-button>
            </div>
        </form>



    </div>





</x-layout>
