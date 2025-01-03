<x-layout>
    <x-slot:heading>Posts</x-slot:heading>

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 space-y-5">
            <div class="mx-auto max-w-2xl lg:mx-0 flex">
                <div>
                    <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">From the blog</h2>
                    <p class="mt-2 text-lg/8 text-gray-600">Learn how to grow your business with our expert advice.</p>

                </div>
               <div>
                   <x-link  href="/posts/create">Create post</x-link>
                </div>
            </div>
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
               @foreach($posts as $post)
                    <article class="border p-10">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="2020-03-16" class="text-gray-500">{{$post->created_at}}</time>
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    {{$post->title}}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{$post->body}}</p>
                        </div>
                        <div class="relative mt-8 flex items-center gap-x-4">
                            <div class="text-sm/6">
                                <p class="font-semibold text-gray-900">
                                    <span class="absolute inset-0"></span>
                                    {{$post->user->name}}
                                </p>
                            </div>
                        </div>


                        <div class="mt-5 flex justify-between " >

                            @can('edit' , $post)
                                <x-link href="posts/{{$post->id}}/edit" >
                                    Update
                                </x-link>

                                <form method="POST" action="/posts/{{$post->id}}    ">
                                    @csrf
                                    @method('DELETE')
                                    <x-button type="submit">Delete</x-button>
                                </form>
                            @endcan
                                <x-link href="posts/{{$post->id}}">
                                    Comments
                                </x-link>

                        </div>

                    </article>

               @endforeach

                <!-- More posts... -->
            </div>
            <div >
                {{$posts->links()}}
            </div>

        </div>
    </div>

</x-layout>
