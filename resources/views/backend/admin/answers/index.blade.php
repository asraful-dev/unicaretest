
<h1>Answers for "{{ $question->question_text }}"</h1>
<a href="{{ route('answers.create', $question) }}">Create Answer</a>
<ul>
    @foreach ($answers as $answer)
        <li>{{ $answer->answer_text }} @if($answer->is_correct) (Correct) @endif</li>
    @endforeach
</ul>
