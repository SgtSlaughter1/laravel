<x-layout>
    <h1>Currently Available Trainees</h1>

    <ul>
        @foreach ($trainees as $trainee)
            <li>
                <div class="{{ $trainee['skill'] > 70 ? 'highlight' : '' }} card">
                    <div class="w-[70%] ">
                        <h3>{{ $trainee->name }} </h3>
                        <p>{{ $trainee->training_center->name }} </p>
                    </div>

                    {{-- View Details Button --}}
                    <a href="{{ route('trainees.show', $trainee->id) }}">View Details</a>

                    {{-- Edit Button --}}
                    <a href="{{ route('trainees.edit', $trainee->id) }}" class="btn-edit">Edit</a>

                </div>
            </li>
        @endforeach
    </ul>

    {{ $trainees->links() }}
</x-layout>


