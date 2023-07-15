<nav class="navbar navbar-expand-lg d-flex align-items-center justify-content-between" style="font-size:larger;background:var(--secondary);font-family:aboreto;font-weight:bold">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="border: 3px solid white;">
            <span class="navbar-toggler-icon"><img src="assets/img/list.png" style="width:inherit;" alt=""></span>
        </button>
        <h2 class="mx-2" style="color: white;">VC Quiz</h2>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav  mx-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="showHomePage">Home</a>
                </li>
                <!--   <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="showTestPage">Test</a>
                        </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="showQuizList">Test List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="showQuestionList">Question List</a>
                </li>
            </ul>
            <span class="d-flex flex-wrap g-3">
                <div class="dropdown mx-3" style="font-family: poppins;">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Theme <img src="assets/img/palette.png" style="width:1.5rem;" alt="">
                    </button>
                    <ul class="dropdown-menu theme">
                        <li class="theme-list">
                            <a class="dropdown-item" style="background:black;" href="#"></a>
                            <a class="dropdown-item" style="background:blueviolet;" href="#"></a>
                            <a class="dropdown-item" style="background:crimson;" href="#"></a>
                            <a class="dropdown-item" style="background:teal;" href="#"></a>
                            <a class="dropdown-item" style="background:orangered;" href="#"></a>
                            <a class="dropdown-item" style="background:seagreen;" href="#"></a>
                        </li>
                    </ul>
                </div>
                <h3 id="uname" class="text-white m-0"> Welcome <?php echo $uname ?> </h3>
                <span>
                    <?php if ($role !== "G") { ?>
                        <a href="logout"><button type="button" id="logOutBtn" class="btn btn-outline-light mx-3">Log Out</button></a>
                    <?php } else { ?>
                        <button type="button" id="logInBtn" class="btn btn-outline-light mx-3" data-bs-toggle="modal" data-bs-target="#logIn">Log In</button>
                    <?php } ?>
                </span>
            </span>
        </div>

    </div>
</nav>

<!-- login modal -->
<div class="modal fade" id="logIn" tabindex="-1" aria-labelledby="logInLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="logInLabel">Login </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container d-flex shadow rounded" style="background: linear-gradient(0deg, #198754 0%, #22e289 100%);">

                    <form class="row w-100 g-3 m-3 Qentry" id="logInForm">
                        <div class="col-md-12 form-floating">
                            <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email">
                            <label for="email">Enter Email Email </label>

                        </div>
                        <div class="col-md-12 form-floating">
                            <input type="password" class="form-control" placeholder="Enter Password" name="pass" id="pass">
                            <label for="pass">Enter Password </label>

                        </div>


                        <div class="col-md-12 d-flex align-items-center justify-content-end">
                            <button type="submit" onclick="chkLogIn(event)" class="btn btn-lg btn-outline-light">Add <img src="assets/img/plus.png" style="width:1.5rem" alt=""></button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- login model end -->
<script>
    function chkLogIn(e) {
     //   e.preventDefault();
        console.log("its working")
        let email = $('email').value;
        let pass = $('pass').value;

        let obj = {
            'email': email,
            'pass': pass
        };
        fetch("chkLogin", {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(obj)

                /*    }).then(function(response) 
                   {return response.text().then(function(text) {console.log(text)})})  */
            }).then(response => response.json())
            .then(data => {
                let st = '';
                //   console.log(data['role']);
                if (data.status != 0) {
                    $('logInLabel').innerHTML = "Invalid email or Password";
                } else {
                    var myModalEl = document.getElementById('logIn');
                    var modal = bootstrap.Modal.getInstance(myModalEl)
                    modal.hide();

                    // $('header').innerHTML = data['header'];
                     $('role').value = data['role'];
                     $('uname').innerHTML = data['uname'];
                     $('logInBtn').parentElement.innerHTML ='<a href="logout"><button type="button" id="logOutBtn" class="btn btn-outline-light mx-3">Log Out</button></a>';
                    $('header').innerHTML = data['header'];
                }
            });
    }

    let colors = document.querySelectorAll('.theme-list a');

    colors.forEach(color => {
        color.onclick = () => {
            let background = color.style.background;
            // let root = document.querySelector(':root');
            // root.classList.add(background);
          //  console.log(background)
             document.querySelector(':root').className = background;
            //   document.querySelector(':root').style.setProperty('--secondary',background);
        }
    });
</script> 