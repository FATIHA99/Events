<x-app-layout>
  

  
        <section class="filters">
          <div class="container">
            <form action="{{ route('dashboard') }}" method="GET">
              <div class="input-wrapper">
                <input 
                  type="text" 
                  name="location" 
                  id="location" 
                  placeholder="Filter By Location (e.g., casa, agadir)" 
                  value="{{ request('location') }}"
                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <button type="submit" class="px-4 py-2  text-white rounded-lg filter-btn">
                  Filter
                </button>
                @if(request('location'))
                  <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">
                    Clear
                  </a>
                @endif
              </div>
            </form>
          </div>
        </section>
    
        <section class="events-section">
            <div class="container events-grid" id="eventsContainer">
                @foreach($events as $event)
                <div class="event-card" data-location="{{ strtolower($event->location) }}" onclick="window.location.href='{{ route('events.show', $event->id) }}'" style="cursor: pointer;">
                        <img src="https://tse4.mm.bing.net/th?id=OIP.XuAEHQzWH1qR8n4A0qZlFgHaE7&pid=Api&P=0&h=180" alt="Event">
                        <div class="event-info">
                            <h3>{{ $event->name }}</h3>
                            <p class="event-meta">📅 {{ $event->date }}<br>📍 {{ $event->location }}</p>
                            <p class="event-description">{{ $event->description }}</p>
                            <div class="event-footer">
                                @auth
                                    @if($event->isRSVPdBy(auth()->id()))
                                        <button class="rsvp-btn" disabled>✓ Registered</button>
                                    @elseif($event->isFull())
                                        <button class="rsvp-btn disabled" disabled>Event Full</button>
                                    @else
                                        <form action="{{ route('events.rsvp', $event->id) }}" method="POST" class="rsvp-form">
                                            @csrf
                                            <button type="submit" class="rsvp-btn">RSVP</button>
                                        </form>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="rsvp-btn">Login to RSVP</a>
                                @endauth
                                <span class="rsvp-count">{{ $event->rsvps_count }} / {{ $event->rsvp_limit ?? '∞' }} attending</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
 
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const locationFilter = document.getElementById('locationFilter');
            const eventCards = document.querySelectorAll('.event-card');
            
            locationFilter.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                eventCards.forEach(card => {
                    const location = card.getAttribute('data-location');
                    
                    if (location.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
    @endpush
</x-app-layout>