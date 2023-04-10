<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ai: Lyric Generator</title>
</head>
<body>
    <h1>Lyric Generator</h1>
    <form method="POST" action="{{ route('result') }}">
        @csrf
        <label>Create your song lyric</label>
        <br><br>
        <input type="text" name="topic" placeholder="topic">
        <br><br>
        <input type="text" name="style" placeholder="style">
        {{-- <br><br>
        <input type="text" name="language" placeholder="language"> --}}
        <br><br>
        <div class="language-picker js-language-picker" data-trigger-class="btn btn--subtle ">
            {{-- <form action="" class="language-picker__form"> --}}
            <label for="language-picker-select"></label>
            <select name="language" id="language">
                <option lang="de" value="german">German</option>
                <option lang="en" value="english" selected>English</option>
                <option lang="fr" value="french">French</option>
                <option lang="tr" value="turkish">Turkish</option>
                <option lang="sp" value="spanish">Spanish</option>
                <option lang="it" value="italian">Italian</option>
            </select>
            {{-- </form> --}}
        </div>
        <br><br>
        <button>Generation</button>
    </form>
    @if (isset($result))
        <h3>Output:</h3>
        <div style="white-space: pre-line">{{ $result }}</div>
        <br><br>
        <h3>Cover Photo:</h3>
        <br><br>
        <img src="{{ $image }}" alt="song-image" style="width: 400px; height: 400px; border-radius: 20px;" />
    @endif
</body>
</html>
{{-- style="white-space: pre-line" --}}
