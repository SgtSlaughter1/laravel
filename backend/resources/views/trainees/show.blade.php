<x-layout>
    <h2>{{ $trainee->name }}'s Profile</h2>

    {{-- trainee info --}}
    <div class="bg-gray-200 p-4 rounded">
        <p><strong>Skill Level: {{ $trainee->skill }} </strong></p>
        <p><strong>Id: {{ $trainee->id }} </strong></p>
        <p><strong>About me:</strong></p>
        <p>{{ $trainee->bio }} </p>
    </div>

    {{-- training center info --}}
    <div class="border-2 border-dashed bg-white px-4 pb-4 my-4 rounded">
        <h3>Training Center Information</h3>
        <p><strong>Training Ceneter Name:</strong>
            {{ $trainee->training_center->name }}
        </p>
        <p><strong>About the Training Center: </strong>
            {{ $trainee->training_center->description }}
        </p>
    </div>

    <form action="{{ route('trainees.destroy', $trainee->id) }}" method="POST"
        onsubmit="return confirm('Are you sure you want to delete this trainee?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn my-4"> Delete Trainee</button>
    </form>
</x-layout>
