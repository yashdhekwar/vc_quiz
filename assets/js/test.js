// start Test section 
let tquestions = [];
// current question
let cqno = 0;
function startTest(mid) {
    mid = parseInt(mid);

    obj = {
        "mid": mid
    };
    fetch('getTest', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(obj),
    }).then(response => response.json())
        .then(data => {
            let modQuestions = data['ques'];
            //   console.log(modQuestions);
            // tquestions.push(modQuestions);
            for (let i = 0; i < modQuestions.length; i++) {
                tquestions.push(modQuestions[i]);
            }
            for (i = 0; i < tquestions.length; i++) {
                tquestions[i]['sans'] = 0;
            }
            //  console.log(tquestions);
            $('main').innerHTML = data['testPage'];
            $('nofQuestion').innerHTML = tquestions.length;
            showQues(0);
                    let tbl = $('tbl');
            let nofQuestion = tquestions.length;
                let tbl_cols = 5;
                let tbl_no_rows = parseInt(nofQuestion / tbl_cols);
                for (n = 0; n < tbl_no_rows; n++) {
                    let r = tbl.insertRow();
                    for (j = 1; j <= tbl_cols; j++) {
                        let c = r.insertCell();
                        let v = n * 5 + j;
                        c.id = "cell"+v;
                        c.innerText = v;
                        $("cell"+v).addEventListener('click', function () {
                         //   console.log(v-cqno);
                           showQues((v-cqno)-1);
                        });
                    }
                } 
            //    console.log(text);
            //    $('main').innerHTML = text;
            
        });
     
    

      
}

//-------------


function showQues(id = 0) {
    cqno += id;
    //   console.log(cqno);
    if (cqno == -1) {
        cqno = 0;
        alert("No prev. Question");

    }
    if (cqno == 10) {
        cqno = 9;
        alert("No further Question");
    }
 //     console.log(tquestions.length);
    let pwidth = (cqno + 1) / tquestions.length * 100;
    $('pbar').style.width = pwidth + '%';
    $('qno').innerText = cqno + 1;
    $('ques').innerText = tquestions[cqno]['questions'];
    $('lblbtnradio1').innerText = tquestions[cqno]['opt1'];
    $('btnradio1').checked = false;
    $('lblbtnradio2').innerText = tquestions[cqno]['opt2'];
    $('btnradio2').checked = false;
    $('lblbtnradio3').innerText = tquestions[cqno]['opt3'];
    $('btnradio3').checked = false;
    $('lblbtnradio4').innerText = tquestions[cqno]['opt4'];
    $('btnradio4').checked = false;

        // if($('btnradio1').checked = true){
        //     $('cell'+(cqno+1)).style.background = "red";
        // }
    //    console.log(tquestions)
    if(tquestions[cqno]['sans'] == 1){
        $('btnradio1').checked = true;
    }else if(tquestions[cqno]['sans'] == 2){
        $('btnradio2').checked = true;
    }else if(tquestions[cqno]['sans'] == 3){
        $('btnradio3').checked = true;
    }else if(tquestions[cqno]['sans'] == 4){
        $('btnradio4').checked = true;
    } 
}


//------------

function recAns(n) {
    tquestions[cqno]['sans'] = n;
    if(tquestions[cqno]['sans'] !== 0){
         $('cell'+(cqno+1)).style.background = "red";
    }
}

//-----

function showResult() {
    let resultSt = '';
    resultSt += '<div class="d-flex align-items-center justify-content-center flex-wrap">';
    resultSt += '<table class="table shadow-sm text-center table-success m-3 table-bordered">';
    resultSt += '<thead>';
    resultSt += '<tr>';
    resultSt += '<th scope="col">';
    resultSt += 'Question No';
    resultSt += '</th>';
    resultSt += '<th scope="col">';
    resultSt += 'Question';
    resultSt += '</th>';
    resultSt += '</tr>';
    resultSt += '</thead>';
    resultSt += '<tbody class="table-group-divider">';

    totc = 0;
    totw = 0;
    totus = 0;
    
    for (i = 0; i < tquestions.length; i++) {
        console.log(tquestions[i]['sans']);
        if (tquestions[i]['sans'] == 0) {
            totus++;
            resultSt += '<tr>';
            resultSt += '<th scope="row">';
            resultSt += (i + 1);
            resultSt += '</th>';
            resultSt += '<th>';
            resultSt += 'Unsolved';
            resultSt += '</th>';
            resultSt += '</tr>'
        } else if (tquestions[i]['sans'] == tquestions[i]['ans']) {
            totc++;
            resultSt += '<tr>';
            resultSt += '<th scope="row">';
            resultSt += (i + 1);
            resultSt += '</th>';
            resultSt += '<th>';
            resultSt += 'Correct';
            resultSt += '</th>';
            resultSt += '</tr>'
            // resultSt = resultSt + "Q.No. " + (i+1) + " : Correct Answer!<br>";
        } else {
            totw++;
            resultSt += '<tr>';
            resultSt += '<th scope="row">';
            resultSt += (i + 1);
            resultSt += '</th>';
            resultSt += '<th>';
            resultSt += 'Worng Answer';
            resultSt += '</th>';
            resultSt += '</tr>'
            //       resultSt = resultSt + "Q.No. " + (i+1) + " : Wrong Answer!<br>";

        }
    }
    resultSt += '</tbody>';
    resultSt += '</table>';
    resultSt += '<table class="table  shadow-sm text-center table-success m-3 table-bordered">';
    resultSt += '<thead>';
    resultSt += '<tr>';
    resultSt += '<th scope="col">';
    resultSt += 'Total Correct';
    resultSt += '</th>';
    resultSt += '<th scope="col">';
    resultSt += 'Total Wrong';
    resultSt += '</th>';
    resultSt += '<th scope="col">';
    resultSt += 'Total Unsolved';
    resultSt += '</th>';
    resultSt += '</tr>';
    resultSt += '</thead>';
    resultSt += '<tbody class="table-group-divider">';
    resultSt += '<tr>';
    resultSt += '<th scope="row">';
    resultSt += totc;
    resultSt += '</th>';
    resultSt += '<th scope="row">';
    resultSt += totw;
    resultSt += '</th>';
    resultSt += '<th scope="row">';
    resultSt += totus;
    resultSt += '</th>';
    resultSt += '</tr>'
    resultSt += '</tbody>';
    resultSt += '</table>';
    resultSt += '</div>';
    if (confirm(totus + " questions are remaining. \n Are you want to submit a answer")) {
        $("testContainer").innerHTML = resultSt;
        $('tbl').innerHTML = "";

  } else {
     showQues(0);
     return;
  }

}

