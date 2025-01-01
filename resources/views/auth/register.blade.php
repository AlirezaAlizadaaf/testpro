<x-layout>
    <x-slot:heading>
        Register Page
    </x-slot:heading>

    <div>
        <form method="POST" action="/register">
            @CSRF
            <div>
                <x-form-label for="name">Name</x-form-label>
                <x-form-input type="text" name="name" :value="old('name')"/>
                <x-input-error :messages="$errors->get('name')"  />
            </div>
            <div>
                <x-form-label for="email">Email</x-form-label>
                <x-form-input name="email" :value="old('email')" type="email"/>
                <x-input-error :messages="$errors->get('email')" />
            </div>
            <div>
                <x-form-label for="password">password</x-form-label>
                <x-form-input name="password" type="password" />
                <x-input-error :messages="$errors->get('password')" />
            </div>
            <div>
                <x-form-label for="password_confirmation"> confirm password</x-form-label>
                <x-form-input name="password_confirmation" type="password" />

            </div>

           <div class="mt-5">
               <x-button type="submit">Register</x-button>
           </div>
        </form>
    </div>
</x-layout>
