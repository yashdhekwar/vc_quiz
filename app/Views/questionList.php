<div class="container-fluid">
    <div class="vw-80 mx-auto my-3 d-flex  justify-content-between flex-wrap">
        <h2>Questions</h2>
        <span class=" d-flex align-items-center">
            <input type="search" id="searchQuestion" name="searchQuestion" placeholder="Question Name" value="" class="form-control">

            <!-- model start -->
            <?php if ($role == "A" || $role == "F") { ?>
                <button type="button" id="questionEntryBtn" class="btn btn-success mx-3" data-bs-toggle="modal" data-bs-target="#questionEntry"><img src="assets/img/plus.png" style="width:1.5rem" alt=""> Question</button>
            <?php } ?>
            <div class="modal fade" id="questionEntry" tabindex="-1" aria-labelledby="questionEntryLabel" aria-hidden="true" style="display: none;">
                <?php echo $questionEntry ?>
                <!-- <div class="modal-dialog modal-fullscreen">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="questionEntryLabel">Add New Question</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                     
                                <div class="container d-flex shadow rounded"
                              style="background: linear-gradient(0deg, #198754 0%, #22e289 100%); height:70vh;">
                  
                              <form class="row g-3 m-3 Qentry" id="qentry">
                                
                                  <div class="col-12 form-floating">
                                      <input type="text" class="form-control" placeholder="Question" name="questions" id="questions">
                                      <label for="questions">Question No 1 </label>
                  
                                  </div>
                                  <div class="col-md-6 form-floating">
                                      <input type="text" class="form-control" placeholder="Option1" name="opt1" id="opt1">
                                      <label for="opt1">Option 1</label>
                  
                                  </div>
                                  <div class="col-md-6 form-floating">
                                      <input type="text" class="form-control" placeholder="place" name="opt2" id="opt2">
                                      <label for="opt2">Option 2</label>
                  
                                  </div>
                                  <div class="col-md-6 form-floating">
                                      <input type="text" class="form-control" placeholder="place" name="opt3" id="opt3">
                                      <label for="opt3">Option 3</label>
                  
                                  </div>
                                  <div class="col-md-6 form-floating">
                                      <input type="text" class="form-control" placeholder="place" name="opt4" id="opt4">
                                      <label for="opt4">Option 4</label>
                  
                                  </div>
                                  <div class="col-md-4 form-floating">
                                      <input type="text" class="form-control" placeholder="place" name="ans" id="ans">
                                      <label for="ans">Answer</label>
                                      
                                  </div>
                                  <div class="col-md-4 form-floating">
                                      <input type="text" class="form-control" placeholder="place" name="moduleid" id="mouduleid">
                                      <label for="mouduleid">Topic</label>
                  
                                  </div>
                                  <div class="col-md-4 form-floating">
                                      <input type="text" class="form-control" placeholder="place" name="moduleid" id="stopicId">
                                      <label for="stopicId">Sub Topic</label>
                  
                                  </div>
                                  <div class="col-md-12 form-floating">
                                      <input type="text" class="form-control" placeholder="place" name="explaination" id="Explaination">
                                      <label for="Explaination">Explaination</label>
                  
                                  </div>
                                  <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-lg btn-outline-light">Add <img src="assets/img/plus.png" style="width:1.5rem" alt=""></button>
                                  </div>
                  
                              </form>
                          </div>
                         
                            </div>
                          </div>
                        </div> -->
            </div>
            <!-- model end -->
        </span>
    </div>
    <!-- list start -->
    <div id="" class="container shadow rounded" style="background: linear-gradient(0deg, rgba(219,255,218,1) 0%, rgba(255,255,255,1) 100%); height: 80vh;overflow: auto;">
        <div id="questionList" class="row g-3 d-flex justify-content-center flex-wrap m-2">
            <!-- <div class="card m-2 qcard">
                        <div class="card-body">
                            <p class="card-text">What is the full form of HTML ? </p>
                        </div>
                        <div class="card-footer">
                            <span class="d-flex justify-content-between align-items-center"
                                style="font-family:poppins;">
                                <button type="button" class="btn btn-outline-success"><img src="assets/img/edit.png"
                                        style="width: 1.5rem;" alt=""> Edit</button>
                                <button type="button" class="btn btn-outline-success"><img src="assets/img/bin.png"
                                        style="width: 1.5rem;" alt=""> Delete</button>
                            </span>
                        </div>
                    </div> -->
        </div>

    </div>
</div>
<!-- <script>
     //   saveQuestion
   // get topic list dropdown
   //get questionl list

    
</script> -->
<script>
    let getQuestionList = () => {
        let st = '';
        fetch('getQuestionList', {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                },
            }).then(response => response.json())
            .then(data => {
                data.forEach(element => {
                    //   console.log(element.qid);
                    st += '<div id="card' + element.qid + '" style="height:22rem" class="card m-2 qcard">';
                    st += '<div style="overflow-y: auto;" class="card-body">';
                    st += ' <p class="card-text">';
                    st += element.questions;
                    st += '</p>';
                    st += '</div>';
                    st += '<div class="card-footer">';
                    st += '<?php if ($role == "A" || $role == "F") { ?>';
                    st += ' <span class="d-flex justify-content-between align-items-center" style="font-family:poppins;">';
                    st += '<button type="button"  onclick="editQuestion(' + element.qid + ')"  class="btn btn-outline-success"><img src="assets/img/edit.png" style="width: 1.5rem;" alt=""> Edit</button>';
                    st += ' <button type="button" onclick="delQuestion(' + element.qid + ')" class="btn btn-outline-success"><img src="assets/img/bin.png" style="width: 1.5rem;"  alt=""> Delete</button>';
                    st += '</span>';
                    st += '<?php } ?>';
                    st += ' </div>';
                    st += ' </div>';

                    // search start
                    const search = document.querySelector('#searchQuestion');
                    search.addEventListener('input', function(e) {
                        let filter;
                        filter = search.value.toUpperCase();
                        const isVisible = element.questions.toUpperCase().includes(filter);
                        if (isVisible == false) {
                            $('card' + element.qid + '').style.display = "none";
                        } else {
                            $('card' + element.qid + '').style.display = "";
                        }
                    });


                    // search end
                });
                $('questionList').innerHTML = st;
            });
    }
    getQuestionList();
</script>
<script src="assets/js/question.js"></script>