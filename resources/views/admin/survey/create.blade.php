@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Create Survey</h1>

        <form method="POST" action="{{ route('survey.store') }}">
            @csrf

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div id="questions-container">
                <div class="question mb-3">
                    <label for="question">Question</label>
                    <input type="text" name="questions[0][question]" class="form-control" required>

                    <label for="type">Type</label>
                    <select name="questions[0][type]" class="form-control question-type" required>
                        <option value="text">Text</option>
                        <option value="multiple_choice">Multiple Choice</option>
                        <option value="yes_no">Yes/No</option>
                    </select>

                    <div class="options-container mt-2" style="display: none;">
                        <label>Options</label>
                        <div class="options-group">
                            <div class="d-flex mb-1">
                                <input type="text" name="questions[0][options][]" class="form-control me-2" placeholder="Option 1">
                                <button type="button" class="btn btn-danger remove-option">Remove</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary add-option">Add Option</button>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-info mt-3" id="add-question">Add Question</button>
            <button type="submit" class="btn btn-success mt-3">Create Survey</button>
        </form>
    </div>

    <script>
        let questionIndex = 1;

        // Add new question block
        document.getElementById('add-question').addEventListener('click', function () {
            const container = document.getElementById('questions-container');
            const newQuestion = container.firstElementChild.cloneNode(true);

            // Reset inputs
            newQuestion.querySelectorAll('input, select').forEach(input => {
                input.name = input.name.replace(/\d+/, questionIndex);
                input.value = '';
            });

            // Hide options container initially
            newQuestion.querySelector('.options-container').style.display = 'none';

            container.appendChild(newQuestion);
            questionIndex++;
        });

        // Toggle options container and manage dynamic options
        document.addEventListener('change', function (e) {
            if (e.target.classList.contains('question-type')) {
                const optionsContainer = e.target.closest('.question').querySelector('.options-container');
                if (e.target.value === 'multiple_choice') {
                    optionsContainer.style.display = 'block';
                } else {
                    optionsContainer.style.display = 'none';
                }
            }
        });

        // Add new option
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('add-option')) {
                const optionsGroup = e.target.previousElementSibling;
                const optionCount = optionsGroup.children.length + 1;
                const questionIndex = e.target.closest('.question').querySelector('input').name.match(/\d+/)[0];

                const newOption = document.createElement('div');
                newOption.classList.add('d-flex', 'mb-1');
                newOption.innerHTML = `
                    <input type="text" name="questions[${questionIndex}][options][]" class="form-control me-2" placeholder="Option ${optionCount}">
                    <button type="button" class="btn btn-danger remove-option">Remove</button>
                `;
                optionsGroup.appendChild(newOption);
            }

            // Remove option
            if (e.target.classList.contains('remove-option')) {
                e.target.closest('.d-flex').remove();
            }
        });
    </script>
@endsection
