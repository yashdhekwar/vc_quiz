<div class="container-fluid">
    <div class="vw-80 mx-auto my-3 d-flex  justify-content-between flex-wrap">
        <h2>Quizzes</h2>
        <span class=" d-flex align-items-center">

                <input type="search" id="searchQuiz" name="searchQuiz" placeholder="Search Quiz" value="" class="form-control">
          <?php if($role =="A" || $role=="F" ){ ?>
            <button type="button" id="quizEntryBtn" class="btn btn-success mx-3" data-bs-toggle="modal" data-bs-target="#quizEntry"><img src="assets/img/plus.png" style="width:1.5rem" alt="">
                Quiz</button>
            <?php } ?>
            <div class="modal fade" id="quizEntry" tabindex="-1" aria-labelledby="quizEntryLabel" aria-hidden="true" style="display: none;">
                <!-- <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="quizEntryLabel">Add New Quiz</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container d-flex shadow rounded" style="background: linear-gradient(0deg, #198754 0%, #22e289 100%);">

                                <form class="row w-100 g-3 m-3 Qentry" id="topicEntry">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="moduleid" name="moduleid" id="moduleid" value="" readonly>
                                    </div>
                                    <div class="col-md-12 form-floating">
                                        <input type="text" class="form-control" placeholder="Quiz Name" name="mname"  id="mname" value="">
                                        <label for="mname">Topic Name </label>

                                    </div>


                                    <div class="col-md-12 d-flex justify-content-end">
                                        <button type="submit" onclick="saveQuiz(event)" class="btn btn-lg btn-outline-light">Add <img src="assets/img/plus.png" style="width:1.5rem" alt=""></button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div> -->
                <?php echo $quizEntry ?>
            </div>
            <!-- model end -->
        </span>
    </div>
    <!-- list start -->
    <div class="container shadow rounded" style="background: linear-gradient(0deg, rgba(219,255,218,1) 0%, rgba(255,255,255,1) 100%); height: 80vh;overflow: auto;">
        <div id="listCard" class="row g-3 d-flex justify-content-center flex-wrap m-2">
            <!-- <div class="card m-2 qcard">
                <div class="card-body text-center">
                    <p class="card-text"> HTML </p>
                </div>
                <div class="card-footer">
                    <span class="d-flex justify-content-between align-items-center" style="font-family:poppins;">
                        <button type="button" class="btn btn-outline-success"><img src="assets/img/edit.png" style="width: 1.5rem;" alt=""> Edit</button>
                        <button type="button" class="btn btn-outline-success"><img src="assets/img/bin.png" style="width: 1.5rem;" alt=""> Delete</button>
                    </span>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- <script>
         let tquestions = [];
         let cqno = 0;

         savequiz
   

        get quiz list

    start test


         rec ans 
 

         show question

     show result

            edit quiz
        
             del quiz
</script> -->
<script>
    // list of quiz 
let getQuizList = () => {
    let st = '';
    fetch('getQuizList', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        // body: JSON.stringify(fdObj),
    }).then(response => response.json())
        .then(data => {
            //      console.log(data);

            //   quizList.push(data);

            data.forEach(element => {
                //  console.log(element.moduleid);
                st += ' <div id="card' + element.moduleid + '" class="card m-2 qcard">';
                st += '<div class="card-body text-center">';
                st += '<p class="card-text">';
                st += element.mname;
                st += '</p>';
                st += '</div>';
                st += '<div class="card-footer">';
                st += '<span class="d-flex justify-content-between align-items-center" style="font-family:poppins;">';
                st += '<button type="button" onclick= "startTest(' + element.moduleid + ')" class="btn btn-outline-success"><img src="assets/img/start.png" style="width: 1.5rem;" alt="">Start</button>';
                st += '<?php if($role =="A" || $role=="F" ){ ?>';
                st += '<button type="button" onclick= "editQuiz(' + element.moduleid + ')" class="btn btn-outline-success"><img src="assets/img/edit.png" style="width: 1.5rem;" alt=""> Edit</button>';

                st += '<button type="button" onclick= "delQuiz(' + element.moduleid + ')" class="btn btn-outline-success"><img src="assets/img/bin.png" style="width: 1.5rem;" alt=""> Delete</button>';
                st += '<?php } ?>';
                st += '</span>';
                st += '</div>';
                st += ' </div>';

                // search fucntion 

                const search = document.querySelector('#searchQuiz');
                search.addEventListener('input', function (e) {
                    let filter;
                    filter = search.value.toUpperCase();
                    const isVisible = element.mname.toUpperCase().includes(filter);
                    if (isVisible == false) {
                        $('card' + element.moduleid + '').style.display = "none";
                    } else {
                        $('card' + element.moduleid + '').style.display = "";
                    }
                });

                // searchfunction end 
            });
            $('listCard').innerHTML = st;


        });
}
getQuizList();
</script>
<script src="assets/js/quiz.js"></script>
<script src="assets/js/test.js"></script>