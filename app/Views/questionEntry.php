<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="questionEntryLabel">Add New Question</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="container d-flex shadow rounded" style="background: linear-gradient(0deg, #198754 0%, #22e289 100%); height:70vh;">

                <form class="row g-3 m-3 Qentry" id="qentry">

                    <input type="hidden" class="form-control" placeholder="Question" name="qid" id="qid" value="<?= esc($qid) ?>">

                    <div class="col-12 form-floating">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Question" value="<?= esc($questions) ?>" name="questions" id="questions">
                        <label for="questions">Question No 1 </label>

                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Option1" name="opt1" id="opt1" value="<?= esc($opt1) ?>">
                        <label for="opt1">Option 1</label>

                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Option2" name="opt2" id="opt2" value="<?= esc($opt2) ?>">
                        <label for="opt2">Option 2</label>

                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" autocomplete="off" placeholder="place" name="opt3" id="opt3" value="<?= esc($opt3) ?>">
                        <label for="opt3">Option 3</label>

                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" autocomplete="off" placeholder="place" name="opt4" id="opt4" value="<?= esc($opt4) ?>">
                        <label for="opt4">Option 4</label>

                    </div>
                    <div class="col-md-4 form-floating">
                        <input type="text" class="form-control" autocomplete="off" placeholder="place" name="ans" id="ans" value="<?= esc($ans) ?>">
                        <label for="ans">Answer</label>

                    </div>
                    <div id="tsection" class="col-md-4">
                        <div class="select-topic">
                            <input type="hidden" class="form-control" placeholder="module id" name="moduleid" id="moduleid" value="<?= esc($moduleid) ?>" readonly>
                            <input type="text" class="form-control" placeholder="Topic"  id="topicId" readonly>
                        </div>
                        <div class="card topicList mt-2">
                            <div class="col-10 my-3 mx-auto">
                                <input type="search" id="tsearch" name="tsearch" placeholder="Search" value="" class="form-control">
                            </div>
                            <div id="options" class="list-group optGroup">
                                

                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 form-floating">
                                      <input type="text" class="form-control" placeholder="place" name="moduleid" id="stopicId">
                                      <label for="stopicId">Sub Topic</label>
                  
                                  </div> -->
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control" placeholder="place" name="explaination" id="explaination" value="<?= esc($explaination) ?>" autocomplete="off">
                        <label for="explaination">Explaination</label>

                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" onclick="saveQuestion(event);" class="btn btn-lg btn-outline-light">Add <img src="assets/img/plus.png" style="width:1.5rem" alt=""></button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- <script>

    // topic list

    /* function getTopicList(ctrl) {
        //  console.log(ctrl.id);
        obj = {
            'nam': $(ctrl.id).value
        };
      
        fetch("getTopicList", {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(obj)
            }).then(response => response.json())
            .then(data => {
                getList(ctrl, data);
            })
    }*/
</script> -->