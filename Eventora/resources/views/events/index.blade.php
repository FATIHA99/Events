

<div class="container">

    <h1 class="mb-4">Create Event</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Event creation form --}}
    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input name="location" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>RSVP Limit</label>
            <input type="number" name="rsvp_limit" class="form-control">
        </div>
        <button class="btn btn-primary">Create</button>
    </form>

    <hr class="my-5">

    <h2>Events</h2>
    <div class="row">
        @foreach($events as $event)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>{{ $event->name }}</h5>
                        <p><strong>Date:</strong> {{ $event->date }}</p>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p>{{ $event->description }}</p>
                        <p><strong>RSVP Limit:</strong> {{ $event->rsvp_limit ?? 'No limit' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

