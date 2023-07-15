// list of quiz 
/*
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

*/
//-----------

// save quiz 

function saveQuiz(e) {
    e.preventDefault();
    form = $('topicEntry');
    fd = new FormData(form);
    //   console.log(fd);
    fdObj = {};
    for (let [key, value] of fd) {
        fdObj[key] = value;
    };
    //    console.log(fdObj);
    fetch('saveQuiz', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(fdObj),
    }).then(response => response.json())
        .then(data => {
            console.log("Saved");
            //    form.reset();
            getQuizList();
        })

}

//----------------------------------

//    delete quiz 


function delQuiz(mid) {
    mid = parseInt(mid);
    //  console.log(mid);
    obj = {
        "mid": mid
    };
    fetch('delQuiz', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(obj),
    }).then(response => response.text())
        .then(text => {
            alert(text);
            if (text == "Deleted") {
                //   console.log(mid);
                getQuizList();
            }
        });
}


//--------------
function editQuiz(mid) {
    moduleid = parseInt(mid);
    // console.log(mid);
    obj = {
        "moduleid": moduleid
    };

    fetch('editQuiz', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(obj),
    }).then(async response => response.text())
        .then(text => {
            //    console.log(text);
            $('quizEntry').innerHTML = text;
            let modal = $('quizEntryBtn');
            const myModal = new bootstrap.Modal(document.getElementById('quizEntry'));
            myModal.show(modal);
            getQuizList();
            //     form.reset();

        });
}


//--------------



