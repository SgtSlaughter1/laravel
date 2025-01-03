<x-layout>
    <form action="{{ route('trainees.update', $trainee->id) }}" method="POST" class="space-y-4">
        @csrf
        {{-- SPECIFIES THIS IS A PUT RWUEST TO UPDATE DATA --}}
        @method('PUT')

        <h2>Edit Trainee</h2>

        {{-- Trainee Name --}}
        <div class="flex flex-col space-y-1">
            <label class="text-sm font-normal" for="name">
                Trainee Name:
            </label>
            <input type="text" id="name" value="{{ $trainee->name }}" class="border border-gray-300 p-2 rounded"
                required />

            <!-- Trainee Strength -->
            <div class="flex flex-col space-y-1">
                <label for="skill" class="text-sm font-normal">Trainee Skill (0-100):</label>
                <input type="number" id="skill" name="skill" min="0" max="100"
                    value="{{ $trainee->skill }}" required class="border border-gray-300 p-2 rounded">
            </div>

            <!-- Trainee Bio -->
            <div class="flex flex-col space-y-1">
                <label for="bio" class="text-sm font-normal">Biography:</label>
                <textarea rows="5" id="bio" name="bio" required class="border border-gray-300 p-2 rounded resize-none">{{ $trainee->bio }}</textarea>
            </div>

            <!-- Select a Training Center -->
            <div class="flex flex-col space-y-1">
                <label for="training_center_id" class="text-sm font-normal">Select a Training Center:</label>
                <select id="training_center_id" name="training_center_id" required
                    class="border border-gray-300 p-2 rounded">
                    <option value="" disabled>Select a Center</option>
                    @foreach ($training_centers as $training_center)
                        <option value="{{ $training_center->id }}"
                            {{ $training_center->id == $trainee->training_center_id ? 'selected' : '' }}>
                            {{ $training_center->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="w-full px-4 py-2 bg-blue-400 text-white rounded hover:bg-blue-500 transition duration-300 ease-in-out">
                Update Trainee
            </button>

            <!-- Validation Errors -->
            @if ($errors->any())
                <ul class="px-4 py-2 bg-red-100">
                    @foreach ($errors->all() as $error)
                        <li class="my-2">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </form>
</x-layout>
