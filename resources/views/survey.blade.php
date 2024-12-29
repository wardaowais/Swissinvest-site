

@extends('layouts.app')

@section('content')
<style>
.form-check.radio-form{
  border: none !important;
  background-color: transparent !important;
  margin-left: 10px;
}

.form-check.radio-form{
  display: flex;
  align-items: center;
}
.form-check.radio-form input{
  margin-bottom: 4px;
  margin-right: 5px;
}
</style>
<div class="container my-5">
    <form>
        <!-- Basic Info Section -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input class="form-control" id="age" placeholder="Enter your age">
        </div>

        <div class="form-group">
            <label for="visitFrequency">How Often Do You Visit the Hospital?</label>
            <select class="form-select" id="visitFrequency">
                <option>Select</option>
                <option>Frequently</option>
                <option>Occasionally</option>
                <option>Rarely</option>
                <option>Never</option>
            </select>
        </div>

        <!-- Repeated Question Section -->
        <div id="question-section">
            <!-- Repeat this group as needed -->
            <div class="question-group mt-3">
                <p>When You Visit, are you usually able to find what you are looking for?</p>
                <div class="d-flex justify-content-between gap-3">
                    <div>
                        <div class="form-check radio-form mb-3">
                            <input class="form-check-input " type="radio" name="findWhatLookingFor" id="findAlways" value="Always">
                            <label class="form-check-label" for="findAlways">Always</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findSometimes" value="Sometimes">
                            <label class="form-check-label" for="findSometimes">Sometimes</label>
                        </div>
                    </div>
                   <div>
                    <div class="form-check radio-form mb-3">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findRarely" value="Rarely">
                        <label class="form-check-label" for="findRarely">Rarely</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findNever" value="Never">
                        <label class="form-check-label" for="findNever">Never</label>
                    </div>
                   </div>
                </div>
            </div>

            <div class="question-group mt-4">
                <p>Do you usually find the Doctors and other staff that you are looking for in the hospital?</p>
                <div class="d-flex justify-content-between gap-3">
                    <div>
                        <div class="form-check radio-form mb-3">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findAlways" value="Always">
                            <label class="form-check-label" for="findAlways">Always</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findSometimes" value="Sometimes">
                            <label class="form-check-label" for="findSometimes">Sometimes</label>
                        </div>
                    </div>
                   <div>
                    <div class="form-check radio-form mb-3">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findRarely" value="Rarely">
                        <label class="form-check-label" for="findRarely">Rarely</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findNever" value="Never">
                        <label class="form-check-label" for="findNever">Never</label>
                    </div>
                   </div>
                </div>
            </div>
            <div class="question-group mt-4">
                <p>When You Visit, are you usually able to find what you are looking for?</p>
                <div class="d-flex justify-content-between gap-3">
                    <div>
                        <div class="form-check radio-form mb-3">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findAlways" value="Always">
                            <label class="form-check-label" for="findAlways">Always</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findSometimes" value="Sometimes">
                            <label class="form-check-label" for="findSometimes">Sometimes</label>
                        </div>
                    </div>
                   <div>
                    <div class="form-check radio-form mb-3">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findRarely" value="Rarely">
                        <label class="form-check-label" for="findRarely">Rarely</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findNever" value="Never">
                        <label class="form-check-label" for="findNever">Never</label>
                    </div>
                   </div>
                </div>
            </div>
            <div class="question-group mt-4">
                <p>Do You usually find the DoctorsAnd other staff that you are looking i the hospital?</p>
                <div class="d-flex justify-content-between gap-3">
                    <div>
                        <div class="form-check radio-form mb-3">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findAlways" value="Always">
                            <label class="form-check-label" for="findAlways">Always</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findSometimes" value="Sometimes">
                            <label class="form-check-label" for="findSometimes">Sometimes</label>
                        </div>
                    </div>
                   <div>
                    <div class="form-check radio-form mb-3">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findRarely" value="Rarely">
                        <label class="form-check-label" for="findRarely">Rarely</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findNever" value="Never">
                        <label class="form-check-label" for="findNever">Never</label>
                    </div>
                   </div>
                </div>
            </div>
            <div class="question-group mt-4">
                <p>When You Visit, are you usually able to find what you are looking for?</p>
                <div class="d-flex justify-content-between gap-3">
                    <div>
                        <div class="form-check radio-form mb-3">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findAlways" value="Always">
                            <label class="form-check-label" for="findAlways">Always</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findSometimes" value="Sometimes">
                            <label class="form-check-label" for="findSometimes">Sometimes</label>
                        </div>
                    </div>
                   <div>
                    <div class="form-check radio-form mb-3">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findRarely" value="Rarely">
                        <label class="form-check-label" for="findRarely">Rarely</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findNever" value="Never">
                        <label class="form-check-label" for="findNever">Never</label>
                    </div>
                   </div>
                </div>
            </div>
            <div class="question-group mt-4">
                <p>Do You usually find the DoctorsAnd other staff that you are looking i the hospital?</p>
                <div class="d-flex justify-content-between gap-3">
                    <div>
                        <div class="form-check radio-form mb-3">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findAlways" value="Always">
                            <label class="form-check-label" for="findAlways">Always</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findSometimes" value="Sometimes">
                            <label class="form-check-label" for="findSometimes">Sometimes</label>
                        </div>
                    </div>
                   <div>
                    <div class="form-check radio-form mb-3">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findRarely" value="Rarely">
                        <label class="form-check-label" for="findRarely">Rarely</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findNever" value="Never">
                        <label class="form-check-label" for="findNever">Never</label>
                    </div>
                   </div>
                </div>
            </div>
            <div class="question-group mt-4">
                <p>When You Visit, are you usually able to find what you are looking for?</p>
                <div class="d-flex justify-content-between gap-3">
                    <div>
                        <div class="form-check radio-form mb-3">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findAlways" value="Always">
                            <label class="form-check-label" for="findAlways">Always</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findSometimes" value="Sometimes">
                            <label class="form-check-label" for="findSometimes">Sometimes</label>
                        </div>
                    </div>
                   <div>
                    <div class="form-check radio-form mb-3">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findRarely" value="Rarely">
                        <label class="form-check-label" for="findRarely">Rarely</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findNever" value="Never">
                        <label class="form-check-label" for="findNever">Never</label>
                    </div>
                   </div>
                </div>
            </div>
            <div class="question-group mt-4">
                <p>Do You usually find the DoctorsAnd other staff that you are looking i the hospital?</p>
                <div class="d-flex justify-content-between gap-3">
                    <div>
                        <div class="form-check radio-form mb-3">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findAlways" value="Always">
                            <label class="form-check-label" for="findAlways">Always</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findSometimes" value="Sometimes">
                            <label class="form-check-label" for="findSometimes">Sometimes</label>
                        </div>
                    </div>
                   <div>
                    <div class="form-check radio-form mb-3">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findRarely" value="Rarely">
                        <label class="form-check-label" for="findRarely">Rarely</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findNever" value="Never">
                        <label class="form-check-label" for="findNever">Never</label>
                    </div>
                   </div>
                </div>
            </div>
            <div class="question-group mt-4">
                <p>When You Visit, are you usually able to find what you are looking for?</p>
                <div class="d-flex justify-content-between gap-3">
                    <div>
                        <div class="form-check radio-form mb-3">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findAlways" value="Always">
                            <label class="form-check-label" for="findAlways">Always</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findSometimes" value="Sometimes">
                            <label class="form-check-label" for="findSometimes">Sometimes</label>
                        </div>
                    </div>
                   <div>
                    <div class="form-check radio-form mb-3">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findRarely" value="Rarely">
                        <label class="form-check-label" for="findRarely">Rarely</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findNever" value="Never">
                        <label class="form-check-label" for="findNever">Never</label>
                    </div>
                   </div>
                </div>
            </div>
            <div class="question-group mt-4">
                <p>Do You usually find the DoctorsAnd other staff that you are looking i the hospital?</p>
                <div class="d-flex justify-content-between gap-3">
                    <div>
                        <div class="form-check radio-form mb-3">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findAlways" value="Always">
                            <label class="form-check-label" for="findAlways">Always</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findSometimes" value="Sometimes">
                            <label class="form-check-label" for="findSometimes">Sometimes</label>
                        </div>
                    </div>
                   <div>
                    <div class="form-check radio-form mb-3">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findRarely" value="Rarely">
                        <label class="form-check-label" for="findRarely">Rarely</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="findWhatLookingFor" id="findNever" value="Never">
                        <label class="form-check-label" for="findNever">Never</label>
                    </div>
                   </div>
                </div>
            </div>
        </div>

           <div class="question-group mt-4"> 
            <p>Anything you would like us to improve?</p> 
            <div class="textarea-container">
                <textarea class="form-control custom-textarea" placeholder="Type Here..."></textarea>
                <button type="button" class="btn btn-teal finish-button">Finish</button>
            </div>
           </div>
        

           <div class="button-container mt-3">
            <button class="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M15 19l-7-7 7-7" />
                </svg>
                Previous
            </button>
            
            <button class="button" href="./survey1.html">
                Next
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        <div class="mt-3">
            <img class="img-fuild w-100" src="medci.png" alt="">
        </div>
    </form>
</div>
@endsection
@section('scripts')
@endsection