<div>
    <h2>{{ $poll->title }}</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="vote">
        @foreach ($poll->options as $option)
            <div>
                <input type="radio" id="option_{{ $option->id }}" wire:model="selectedOption" value="{{ $option->id }}">
                <label for="option_{{ $option->id }}">{{ $option->option_text }}</label>
            </div>
        @endforeach
        <button type="submit">Votar</button>
    </form>
    
</div>

