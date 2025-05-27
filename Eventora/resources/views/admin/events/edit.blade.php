<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-8 ">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-6">
                <h1 class="text-3xl font-extrabold text-gray-900">Edit Event</h1>
            </div>

            <form action="{{ route('admin.update', $event->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Event Name</label>
                    <input name="name" value="{{ $event->name }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="text">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="date">Date</label>
                    <input name="date" type="date" value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">

                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="location">Location</label>
                    <input name="location" value="{{ $event->location }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="text">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                    <textarea name="description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ $event->description }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rsvp_limit">RSVP Limit</label>
                    <input name="rsvp_limit" type="number" value="{{ $event->rsvp_limit }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                        Update Event
                    </button>
                    <a href="{{ route('admin.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Back</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
