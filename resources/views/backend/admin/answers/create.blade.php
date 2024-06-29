
<h1>Create Answer for "{{ $question->question_text }}"</h1>
<form action="{{ route('answers.store', $question) }}" method="POST">
    @csrf
    <label for="answer_text">Answer Text:</label>
    <input type="text" name="answer_text" id="answer_text" required>
    
    <label for="is_correct">Is Correct:</label>
    <input type="checkbox" name="is_correct" id="is_correct" value="1">
    
    <button type="submit">Create</button>
</form>
