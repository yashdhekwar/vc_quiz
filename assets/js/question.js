function saveQuestion(e) {
    e.preventDefault();
    form = $('qentry');
    fd = new FormData(form);
    fdObj = {};

    for (let [key, value] of fd) {
        fdObj[key] = value;
    }
    console.log(fdObj);
    fetch('saveQuestion', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(fdObj),
    }).then(response => response.json())
        .then(data => {
            console.log("Saved");
            form.reset();
            getQuestionList();
        })


}

//------------

let getTopicList = () => {
    let list = '';
    fetch('getQuizList', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        // body: JSON.stringify(fdObj),
    }).then(response => response.json())
        .then(data => {
            //    console.log(data);
            data.forEach(element => {
                list += '<a href="#" class="aplha list-group-item list-group-item-action">';
                list += '<span>';
                list += element.moduleid;
                list += '</span>';
                list += ' - ' + element.mname;
                list += '</a>';
            });

            $('options').innerHTML = list;


            const topic = document.querySelector('#tsection');
            const selTopic = document.querySelector('.select-topic');
            const TopicId = document.querySelector('#topicId');
            const search = document.querySelector('#tsearch');
            const options = document.querySelector('.optGroup');
            const optionsList = document.querySelectorAll('.optGroup a');

            let a = options.getElementsByTagName("a");

            selTopic.addEventListener('click', function () {
                topic.classList.toggle('tshow');
            });
            optionsList.forEach(function (optionListSingle) {
                optionListSingle.addEventListener('click', function () {
                    text = this.textContent;
                    let mid = this.childNodes[0].innerText;
                    $('moduleid').value = mid;
                    console.log(mid);
                    TopicId.value = text;
                    topic.classList.remove('tshow');
                });
            });
            search.addEventListener('input', function () {
                let filter, i, textValue;
                filter = search.value.toUpperCase();

                //  a = options.getElementsByTagName("a");

                for (i = 0; i < a.length; i++) {
                    acount = a[i];
                    textValue = acount.textContent || acount.innerText;
                    //  console.log(textValue)
                    if (textValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";

                    } else {
                        a[i].style.display = "none";
                    }
                }
            });

        });
}
getTopicList();

//------------
/*
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
                st += '<?php if($role =="A" || $role=="F" ){ ?>';
                st += ' <span class="d-flex justify-content-between align-items-center" style="font-family:poppins;">';
                st += '<button type="button"  onclick="editQuestion(' + element.qid + ')"  class="btn btn-outline-success"><img src="assets/img/edit.png" style="width: 1.5rem;" alt=""> Edit</button>';
                st += ' <button type="button" onclick="delQuestion(' + element.qid + ')" class="btn btn-outline-success"><img src="assets/img/bin.png" style="width: 1.5rem;"  alt=""> Delete</button>';
                st += '</span>';
                st += '<?php } ?>';
                st += ' </div>';
                st += ' </div>';

                // search start
                const search = document.querySelector('#searchQuestion');
                search.addEventListener('input', function (e) {
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

//---------------------

*/

function delQuestion(qid) {
    qid = parseInt(qid);
    console.log(qid);
    obj = {
        "qid": qid
    };
    fetch('delQuestion', {
        method: 'POST',// or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(obj),
    }).then(response => response.text())
        .then(text => {
            alert(text);
            if (text == "Deleted") {
                console.log(qid);
                getQuestionList();
            }
        });
}

//---------------------
function editQuestion(qid) {
    qid = parseInt(qid);
    console.log(qid);
    obj = {
        "qid": qid
    };

    fetch('editQuestion', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(obj),
    }).then(response => response.text())
        .then(text => {
            console.log(text);
            $('questionEntry').innerHTML = text;
            let modal = $('questionEntryBtn');
            const myModal = new bootstrap.Modal(document.getElementById('questionEntry'));
            myModal.show(modal);
            getQuestionList();
            //     form.reset();

        });
}

//--------------------------
