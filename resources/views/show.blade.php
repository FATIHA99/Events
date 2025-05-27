<x-app-layout>
<div class="container py-8 mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
    
        <div class="relative h-64 sm:h-80 md:h-96 overflow-hidden">
            <img src="{{ $event->image_url ?? 'https://i.postimg.cc/ydVbJpYP/Capture-d-cran-2025-05-27-215237.png' }}" 
                 alt="{{ $event->name }}" 
                 class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-6 text-white">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="px-3 py-1 bg-blue-600 rounded-full text-sm font-medium">{{ $event->category ?? 'Event' }}</span>
                    <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm">{{ $event->date }}</span>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">{{ $event->name }}</h1>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ $event->location }}</span>
                </div>
            </div>
        </div>

    
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-6 sm:p-8">
          
            <div class="lg:col-span-2">
           
                <section class="mb-10">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800 border-b pb-2">About This Event</h2>
                    <div class="prose max-w-none text-gray-600">
                        {!! nl2br(e($event->description)) !!}
                    </div>
                </section>

              
                <section class="mb-10">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800 border-b pb-2">Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-blue-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Date & Time</h3>
                                <p class="mt-1 text-gray-600">
                                    {{ $event->date }}<br>
                                    @if($event->time)
                                        {{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}
                                    @else
                                        Time TBD
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-blue-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Location</h3>
                                <p class="mt-1 text-gray-600">
                                    {{ $event->location }}<br>
                                    @if($event->address)
                                        <span class="text-sm">{{ $event->address }}</span>
                                    @endif
                                </p>
                                @if($event->map_link)
                                <a href="{{ $event->map_link }}" target="_blank" class="inline-flex items-center mt-2 text-sm text-blue-600 hover:text-blue-800">
                                    View on map
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                @endif
                            </div>
                        </div>

                        @if($event->organizer)
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-blue-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Organizer</h3>
                                <p class="mt-1 text-gray-600">{{ $event->organizer }}</p>
                                @if($event->organizer_contact)
                                <a href="mailto:{{ $event->organizer_contact }}" class="inline-flex items-center mt-2 text-sm text-blue-600 hover:text-blue-800">
                                    Contact organizer
                                </a>
                                @endif
                            </div>
                        </div>
                        @endif

                       
                    </div>
                </section>

             
                @if($event->additional_info)
                <section class="mb-10">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800 border-b pb-2">Additional Information</h2>
                    <div class="prose max-w-none text-gray-600">
                        {!! nl2br(e($event->additional_info)) !!}
                    </div>
                </section>
                @endif
            </div>

       
            <div class="lg:col-span-1">
             
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm sticky top-6 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Register</h3>
                        <span class="px-2 py-1 text-xs font-semibold leading-5 rounded-full 
                                   {{ $event->isFull() ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                            {{ $event->isFull() ? 'Event Full' : 'Seats Available' }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <span class="text-3xl font-bold text-gray-900">{{ $event->rsvps_count }}</span>
                            <span class="text-gray-600">/ {{ $event->rsvp_limit ?? '∞' }}</span>
                        </div>
                        <span class="text-sm text-gray-500">attendees registered</span>
                    </div>

                    @auth
                        @if($event->isRSVPdBy(auth()->id()))
                            <button class="w-full flex items-center justify-center px-4 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                You're Registered
                            </button>
                        @elseif($event->isFull())
                            <button class="w-full px-4 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-400 cursor-not-allowed" disabled>
                                Event at Capacity
                            </button>
                        @else
                            <form action="{{ route('events.rsvp', $event->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center justify-center px-4 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                    Register Now
                                </button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-4 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                            Login to Register
                        </a>
                    @endauth

                 
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Share this event</h4>
                        <div class="flex space-x-3">
                            <a href="#" class="text-gray-400 hover:text-blue-600">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-400">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-red-600">
                                <span class="sr-only">Email</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.25 9.006a.75.75 0 01.75-.75h12a.75.75 0 010 1.5H6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H6z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                @if($event->tags)
                <div class="mt-6 bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-3">Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(explode(',', $event->tags) as $tag)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ trim($tag) }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

</x-app-layout>