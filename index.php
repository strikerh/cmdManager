<?php header("Access-Control-Allow-Origin: *"); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->



    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.4/examples/checkout/form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container-fluid px-sm-5">
        <div class="py-5 text-center">

            <h2>Checkout form</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form
                group has a validation state that can be triggered by attempting to submit the form without completing
                it.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Login & Action</span>
                    
                </h4>
                <form action="https://v1.mamydays.com/test.php" method="post" id="cloneToDev" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">User</label>
                            <input name="user" type="text" class="form-control" id="user" placeholder="" value=""
                                required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="lastName">Pass</label>
                            <input name="pass" type="password" class="form-control" id="pass" placeholder="" value=""
                                required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <h3>Processes:</h3>
                        </div>
                         
                        <div class="col-md-6 mb-3">
                            <div class="form-check">
                              <input name="cloning" class="form-check-input" type="checkbox"  id="cloning" checked>
                              <label class="form-check-label" for="defaultCheck1">
                                Backup & clone
                              </label>
                            </div>
                        </div>
                           <div class="col-md-6 mb-3">
                            <div class="form-check">
                              <input name="wp_config" class="form-check-input" type="checkbox"  id="wp_config" checked>
                              <label class="form-check-label" for="defaultCheck1">
                                wp Config file
                              </label>
                            </div>
                        </div>
                        
                         <div class="col-md-6 mb-3">
                            <div class="form-check">
                              <input name="export_import_db" class="form-check-input" type="checkbox"  id="export_import_db" checked>
                              <label class="form-check-label" for="defaultCheck1">
                                Export Import DB
                              </label>
                            </div>
                        </div>
                      
                         <div class="col-md-6 mb-3">
                            <div class="form-check">
                              <input name="update_db" class="form-check-input" type="checkbox" id="update_db" checked>
                              <label class="form-check-label" for="defaultCheck1">
                                update DB
                              </label>
                            </div>
                        </div>
                   
                        
                    </div>



                  
                    <button class="btn btn-primary btn-lg btn-block" type="submit">create new copy to Dev</button>
                      <hr class="mb-4">
                </form>

<div>
    <img id="loading" style="max-width:100%; display:none" src="https://i.giphy.com/media/OiC5BKaPVLl60/giphy.webp" onerror="this.onerror=null;this.src='https://i.giphy.com/OiC5BKaPVLl60.gif';" alt="loading">
    
     <img id="success" style="max-width:100%; display:none" src="https://i.giphy.com/media/eoxomXXVL2S0E/giphy.webp" onerror="this.onerror=null;this.src='https://i.giphy.com/OiC5BKaPVLl60.gif';" alt="Success">
     
     </div>
    
    
     <div id="result"></div>








                <div id="content">ayhaga <br>
                    
                </div>



            </div>



            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Process Log</h4>




         
                <div style="background-color: #ddd; border:solid 1px #bbb; padding:5px ">

                    <div class="row">
                        <div class="col-8">

                            <input  type="text" class="form-control" id="logUrl" placeholder=""
                                value="<?php echo "https://v1.mamydays.com". '/log_' . date('d-M-Y') . '.log'; ?>" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-4">
                            <button id="reload" class="btn btn-primary btn-block" type="button">load</button>

                        </div>
                    </div>

                </div>
                <div id="iframeCont"
                    style="background-color: #f4f4ff; border:solid 1px #999; padding:5px;  max-height:500px;  overflow: auto;font-size: 12px;">
                    iframe <br>

                    <pre id="iframe" style="overflow: initial;" ></pre>
                </div>






            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017-2019 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>



    <script>

 var myInterval;
   var LastIndex = 0;

 
         loadIframe();
      
      
      
        $("#cloneToDev").submit(function (event) {

            // Stop form from submitting normally
            event.preventDefault();
             $("#loading").show("fast");
             
              loadIframe(true);
             myInterval = setInterval(function () {
                  loadIframe();
             },3000); 
        
        
            // Get some values from elements on the page:
            var $form = $(this),
                user = $form.find("input[name='user']").val(),
                pass = $form.find("input[name='pass']").val(),
                url = $form.attr("action");

          
            
            var serializedData = $form.serialize();
            var $inputs = $form.find("input, select, button, textarea");
            $inputs.prop("disabled", true);

            // Send the data using post
            var posting = $.post(url, serializedData);
            console.log(posting);
            // Put the results in a div
            posting.done(function (data) {
                console.log(data);
                var content = $(data);
                $("#result").empty().append(content);
            });
        });

       
        $("#reload").click(function () {
      
            loadIframe()

        });



       function loadIframe(saveLastIndexFlag = false) {
           console.log('Load Iframe' + new Date());
           let logUrl =  $("#logUrl").val() ;
            $.get(logUrl, function (data) {
                $("#iframe").html(data);
                 $('#iframeCont').scrollTop($('#iframeCont')[0].scrollHeight);
                 
                 checkIfComplete(data,saveLastIndexFlag)
            });

        }
        
       function checkIfComplete(data,saveLastIndexFlag){
             var newVal = data.lastIndexOf("-----------------------");
           //console.log("newVal",newVal)
            //console.log("LastIndex",LastIndex)
           if(saveLastIndexFlag){
               LastIndex = newVal;
           }else{
               if(newVal != LastIndex && LastIndex!= 0){
                  console.log("Done .... ") 
                   $("#loading").hide("fast");
                    $("#success").show("fast");
                    clearInterval(myInterval);
               }
           }
          
        }
     
        

    </script>

</body>








</html>