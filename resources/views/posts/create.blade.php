<x-layout>
    <x-slot:heading> Creat New Post</x-slot:heading>

    <form  method="POST" action="/posts">
        @CSRF

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
                <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label for="title">Title</x-form-label>
                        <x-form-input name="title" placeholder="about today's event"></x-form-input>
                        <x-input-error :messages="$errors->get('title')"/>
                    </div>

                    <div class="col-span-full">
                        <x-form-label for="body">Post</x-form-label>
                        <div class="mt-2">
                            <textarea name="body" id="body" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required></textarea>
                        </div>
                        <p class="mt-3 text-sm/6 text-gray-600">Write your post.</p>
                        <x-input-error :messages="$errors->get('body')"/>
                    </div>
                </div>
            </div>
        </div>



        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/posts" class="text-red-600">Cancel</a>
            <x-button type="submit">save</x-button>
        </div>
    </form>


</x-layout>
