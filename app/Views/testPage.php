<div class="container">
    <div class="row shadow rounded text-center" style="background:whitesmoke;margin-top:0.5rem;">
        <div class="col-md-4">
            <h3 style="font-family:'Teko' ;" class="my-2">Quiz Time <span class="text-warning">12:00</span></h3>
        </div>
        <div class="col-md-4">
            <h3 style="font-family:'Teko' ;" class="my-2">No. of Question : <span id="nofQuestion" class="text-primary">10</span>
            </h3>
        </div>
        <!--        <div class="col-md-3">
            <h3 style="font-family:'Teko' ;" class="my-2">Test Name : <span class="text-success">HTML</span>
            </h3>
        </div> -->
        <div class="col-md-3">
            <span class="d-flex justify-content-end">
                <button type="button" onclick="showResult()" class="btn btn-danger my-2 ">End Exam</button>
            </span>
        </div>
    </div>
    <div class="b-divider"></div>

    <div id="testContainer" class="row shadow rounded text-center table-responsive" style="background:whitesmoke;">
        <div class="progress">
            <div class="progress-bar" id="pbar" style="width:10%;background:green;">
            </div>
        </div>
        <div class="col-12 my-2">
            <h3 style="color: brown;">Question <span id="qno">1</span></h3>
            <h2 style="font-family:'Lobster';color:var(--secondary)" id="ques">What is the full form of HTML?
            </h2>
        </div>
        <div class="row ms-1">
            <div class="col-md-6 d-flex">
                <input type="radio" class="btn-check" name="btnradio" onclick="recAns(1)" id="btnradio1" autocomplete="off">
                <label class="btn btn-outline-success my-2 option" id="lblbtnradio1" for="btnradio1">Hyper Text Markup Language </label>
            </div>
            <div class="col-md-6 d-flex">
                <input type="radio" class="btn-check" name="btnradio" onclick="recAns(2)" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-success my-2 option" id="lblbtnradio2" for="btnradio2">Hyper Total Mail Language</label>
            </div>
            <div class="col-md-6 d-flex">
                <input type="radio" class="btn-check" name="btnradio" onclick="recAns(3)" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-success my-2 option" id="lblbtnradio3" for="btnradio3">Hyper Text Makeup Language</label>
            </div>
            <div class="col-md-6 d-flex">
                <input type="radio" class="btn-check" name="btnradio" onclick="recAns(4)" id="btnradio4" autocomplete="off">
                <label class="btn btn-outline-success my-2 option" id="lblbtnradio4" for="btnradio4">High Text Markup Language</label>
            </div>
        </div>
        <div class="col-10 mx-auto d-flex align-items-center justify-content-between  my-3">
            <img src="assets/img/previous.png" onclick="showQues(-1)" style="width:3rem;" alt="">
            <img src="assets/img/next (1).png" onclick="showQues(1)" style="width:3rem;" alt="">
        </div>

    </div>
    <div class="b-divider"></div>
    <div class="row shadow rounded text-center d-flex justify-content-center align-items-center" style="background:whitesmoke">
        <div id="chartSection" class="col-md-10">

        </div>
    </div>
    <div class="b-divider"></div>
    <div class="row shadow rounded text-center d-flex justify-content-center align-items-center" style="background:whitesmoke">
        <table  class="table table-bordered table-dark border-light my-3 w-75" id="tbl">
                
        </table>
    </div>

</div>
