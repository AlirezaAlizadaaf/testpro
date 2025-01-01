<x-layout>
    <x-slot:heading>
        {{$post->user->name}}
    </x-slot:heading>
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">

            <div class="mt-10 ">

                <div >
                    <strong><h1>{{$post->title}}</h1></strong>
                </div>
                <div class="mt-10">
                    <p>{{$post->body}}</p>
                </div>
            </div>

            <ul class="border p-3 mt-2 border-b border-gray-900/10 pb-12">
                @foreach($post->comment as $comment)
                    <li class="flex">
                        <div>
                            {{$comment->content}}
                        </div>
                        <form method="POST" action="/comments/{{$comment->id}}/destroy">
                            @csrf
                            @method('delete')
                            <button   type="submit" class="text-red-500 " >Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>


            <div class="mt-3">

                <form method="POST" action="/comments/{{$post->id}}/store" class="mt-1">
                    @csrf
                    <textarea name="content" id="content" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="leave your comment"></textarea>
                    <x-button>
                        Save Comment
                    </x-button>
                </form>
            </div>


        </div>
        <div class="flex gap-3">
            <form method="POST" action="/posts/{{$post->id}}" >
                @csrf
                @method('delete')
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Delete
                </button>
            </form>

            <x-link href="/posts/{{$post->id}}/edit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Update
            </x-link>
        </div>
    </div>
</x-layout>
