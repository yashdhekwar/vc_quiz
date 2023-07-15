<div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="quizEntryLabel">Add New Quiz</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container d-flex shadow rounded" style="background: linear-gradient(0deg, #198754 0%, #22e289 100%);">

                                <form class="row w-100 g-3 m-3 Qentry" id="topicEntry">
                                    <div class="col-md-12">
                                        <input type="hidden" class="form-control" placeholder="moduleid" name="moduleid" id="moduleid" value="<?= esc($moduleid) ?>" readonly>
                                    </div>
                                    <div class="col-md-12 form-floating">
                                        <input type="text" class="form-control" placeholder="Quiz Name" name="mname"  id="mname" value="<?= esc($mname) ?>">
                                        <label for="mname">Topic Name </label>

                                    </div>


                                    <div class="col-md-12 d-flex justify-content-end">
                                        <button type="submit" onclick="saveQuiz(event)" class="btn btn-lg btn-outline-light">Add <img src="assets/img/plus.png" style="width:1.5rem" alt=""></button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>